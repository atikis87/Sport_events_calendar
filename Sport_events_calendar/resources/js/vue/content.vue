<template>
  <div>
    <select v-model="primary_category">
      <option disabled value="">Choose a Sport</option>
      <option>A</option>
      <option>B</option>
      <option>C</option>
    </select>



    <select v-if="primary_category" v-model="home_team">
      <option disabled value="">Select Home Team</option>
      <option>A</option>
      <option>B</option>
      <option>C</option>
    </select>


    <select v-if="primary_category" v-model="away_team">
      <option disabled value="">Select Away Team</option>
      <option>A</option>
      <option>B</option>
      <option>C</option>
    </select>





    <datetime v-model="start_time"></datetime>


    <button v-on:click="createEvent">Create</button>
    <button v-on:click="deleteEvent">Delete</button>
    <button v-on:click="editEvent">Edit</button>

    <table v-if="events.length > 0">

                    <tr>
                        <th width="50%">Home test</th>
                        <th width="50%">Away</th>
                    </tr>

                    <tr v-for="event in events" :key="event.id">
                        <td v-if="event && event.hasOwnProperty('home_team')">{{ event.home_team.display_name }}</td>
                        <td v-if="event && event.hasOwnProperty('away_team')">{{ event.away_team.display_name }}</td>
                    </tr>
</table>

  </div>
</template>

<script>
import { Datetime } from 'vue-datetime';
  export default {
    components: {
    datetime: Datetime
  },
    data() {
      return {
        text: '',
        value: '',
        events: null,
        home_team: null,
        away_team: null,
        primary_category: null,
        primaryCategories: null,
        allTeams: null,
        start_time: null
      }
    },
    mounted() {
      this.getEvents()
      this.getPrimaryCategory()
      this.getTeams()
    },
    methods: {
    getEvents(){
        axios.get('/api/events')
              .then((response)=>{
                this.events = response.data
              }).catch(error => {
                console.log(error)
              })
            },
    createEvent()
            {
              axios.post('/api/event/store', {  
                name: this.name,  
                description: this.description  
                })  
                .then(function (response) {  
                    currentObj.output = response.data;  
                })  
                .catch(function (error) {  
                    currentObj.output = error;  
                });  
            },
    deleteEvent() {},
    editEvent() {},
    getPrimaryCategory(){
              axios.get('/api/primary-categories')
              .then((response)=>{
                this.primaryCategories = response.data
              }).catch(error => {
                console.log(error)
              })
              
    },
        getTeams(){
              axios.get('/api/teams')
              .then((response)=>{
                this.allTeams = response.data
              }).catch(error => {
                console.log(error)
              })
              
    }
    },
        
  }
</script>

<style scoped>
.labelForm{
  width:200px;


}
</style>