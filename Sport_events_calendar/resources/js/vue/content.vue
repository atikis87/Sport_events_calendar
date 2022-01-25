<template>
<div id="content">
<div class="title">Sportradar Event Calendar</div>

<b-form-select v-model="primary_category">
  <option v-for="category in primaryCategories" v-bind:value="category.id" v-bind:key="category.id">
    {{ category.display_name }}
  </option>
</b-form-select>

<!-- SELECT HOME TEAM-->
<b-form-select v-if="primary_category" v-model="home_team" @select="filterTeams">
  <option v-for="team in allTeams" v-bind:value="team.id" v-bind:key="team.id">
    {{ team.display_name }}
  </option>
</b-form-select>

<!-- SELECT AWAY TEAM-->
<b-form-select v-if="home_team" v-model="away_team">
  <option v-for="team in allTeams" v-bind:value="team.id" v-bind:key="team.id">
    {{ team.display_name }}
  </option>
</b-form-select>

<!-- Date Time -->
  <div>
    <label for="example-datepicker">Choose a date for Event:</label>
    <b-form-datepicker id="example-datepicker" v-model="start_time" class="mb-2"></b-form-datepicker>
  </div>

<!-- Event buttons-->
  <b-button variant="success" v-on:click="createEvent">Create</b-button>

<!-- for the table-->
  <b-button variant="warning" v-on:click="editEvent">Edit</b-button>
  <b-button variant="danger" v-on:click="deleteEvent">Delete</b-button>

  <!-- Table for Events-->
  <table v-if="events.length > 0">
    <tr>
        <th width="50%">Date</th>
        <th width="50%"></th>
        <th width="50%">Home Team</th>
        <th width="50%">Away Team</th>

    </tr>

    <tr v-for="event in events" :key="event.id">
        <td v-if="event && event.hasOwnProperty('home_team')">{{ event.home_team.display_name }}</td>
        <td v-if="event && event.hasOwnProperty('away_team')">{{ event.away_team.display_name }}</td> 
        <b-button variant="warning" v-on:click="editEvent(event.id)">Edit</b-button>
        <b-button variant="danger" v-on:click="deleteEvent(event.id)">Delete</b-button>
    </tr>
  </table>
</div>
</template>

<script>
import { Datetime } from '@/vue-datetime'
import VueNotifications from 'vue-notifications'

  export default {
    components:{
    datetime: Datetime
  },
    notifications: {
    errorMessage: {
      type: VueNotifications.types.error,
      title: 'Error'
    },
    successMessage: {
      type: VueNotifications.types.success,
      title: 'Success'
    }
  },
    data(){
      return{
        events: null,
        home_team: null,
        away_team: null,
        primary_category: null,
        primaryCategories: null,
        allTeams: null,
        start_time: null,
      }
    },
    mounted() {
      this.getEvents()
      this.getPrimaryCategory()
      this.getTeams()
    },
    methods: {
    filterTeams() {
      console.log('teams are filtered')
    },
    getEvents()
    {
      axios.get('/api/events').then((response)=>
      {
        this.events = response.data
      }).catch(error =>
      {
        console.log(error)
      })
    },
    createEvent()
    {
      console.log( 'home_team_id', this.home_team)
      axios.post('/api/event/store',{
        home_team_id: this.home_team,
        away_team_id: this.away_team,
        primary_category_id: this.primary_category,
        start_time: this.start_time
        })  
      .then(function (response)
      {  
        //display success
      
        console.log(response.data)  
      })  
      .catch(function (error)
      {  
        //display error.... call this.showError()
        // foreach() loop maybe
       console.log(error)  
      });  
    },
    deleteEvent($id) /* Send the ID of the event only*/
    {
      axios.post('/api/event/delete',{$id})  
      .then(function (response)
      {  
        currentObj.output = response.data;  
      })  
      .catch(function (error)
      {  
        currentObj.output = error;  
      });  

    },
    editEvent($id)/*EDIT HERE*/
    {
      axios.post('/api/event/edit',{home_team: this.home_team,description: this.description})  
      .then(function (response)
      {  
        currentObj.output = response.data;  
      })  
      .catch(function (error)
      {  
        currentObj.output = error;  
      });  


    },
    getPrimaryCategory()
    {
      axios.get('/api/primary-categories').then((response)=>
      {
        this.primaryCategories = response.data
      }).catch(error =>
      {
        console.log(error)
      })
              
    },
    getTeams()
    {
      axios.get('/api/teams')
      .then((response)=>
      {
        this.allTeams = response.data
      }).catch(error =>
      {
        console.log(error)
      })
      
    }
    },
        
  }
</script>

<style scoped>
#content{
  width:800px;
  margin:0 auto;
  position: relative;
}

.title{
  position: relative;
  margin:20px 0 20px 0;
  width:100%;
  text-align: center;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  font-weight: bold;
  font-size:25px;
  color:black;
}

.add{
  position: relative;
  margin-top:20px;
  width:100%;
  text-align: left;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  font-weight: bold;
  font-size:20px;
  color:#494949;
}

.choose_cat{
width:200px;
position: fixed;
top: 230px;
right:50%;
}




.labelForm{
  width:300px;
}



.date_time{
width:100px;
position: relative;
top: -30px;
left:200px;

}



</style>