<template>
  <div id="content">
    <div class="title">Sportradar Event Calendar</div>

    <div>
      <h3>Filter</h3>
    </div>

    <b-form-select
      v-model="primary_category"
      :options="optionsForCategory"
      @change="filterByPrimaryCategory"
    >
      <option
        v-for="category in primaryCategories"
        v-bind:value="category.id"
        v-bind:key="category.id"
      >
        {{ category.display_name }}
      </option>
    </b-form-select>

    <!-- SELECT HOME TEAM-->
    <b-form-select
      v-if="primary_category"
      v-model="home_team"
      @change="filterTeams"
    >
      <option
        v-for="team in homeTeamOptions"
        v-bind:value="team.id"
        v-bind:key="team.id"
      >
        {{ team.display_name }}
      </option>
    </b-form-select>

    <!-- SELECT AWAY TEAM-->
    <b-form-select v-if="home_team" v-model="away_team">
      <option
        v-for="team in awayTeamOptions"
        v-bind:value="team.id"
        v-bind:key="team.id"
      >
        {{ team.display_name }}
      </option>
    </b-form-select>

    <!-- Date Time -->
    <div>
      <label for="example-datepicker">Choose a date for Event:</label>
      <datetime
        id="example-datepicker"
        v-model="start_time"
        class="mb-2"
        type="datetime"
      ></datetime>
    </div>

    <!-- Primary Event buttons-->
    <b-button v-if="!id" variant="success" v-on:click="createEvent"
      >Create</b-button
    >
    <b-button v-if="id" variant="warning" v-on:click="updateEvent"
      >Update</b-button
    >
    <b-button v-if="id" variant="primary" v-on:click="resetEvent"
      >Cancel</b-button
    >
    <div id="table">  
      <!-- Table for Events-->
      <table id="eventList" v-if="events && events.length > 0">
        <tr>
          <th>Home Team</th>
          <th>Away Team</th>
          <th>Date</th>
          <th>Action</th>
          <th>Category</th>
        </tr>

        <tr v-for="event in events" :key="event.id">
          <td v-if="event && event.hasOwnProperty('home_team')">
            {{ event.home_team.display_name }}
          </td>
          <td v-if="event && event.hasOwnProperty('away_team')">
            {{ event.away_team.display_name }}
          </td>
          <td v-if="event && event.hasOwnProperty('start_time')">
            {{new Date(event.start_time).toString()}}
          </td>
          <td>
            <b-button variant="warning" v-on:click="editEvent(event)"
              >Edit</b-button
            >
            <b-button variant="danger" v-on:click="deleteEvent(event)"
              >Delete</b-button
            >
          </td>
          <td>{{event.primary_category.display_name}}</td>
        </tr>
      </table>
  </div>
</div>

</template>

<script>
import DatePicker from 'vue2-datepicker'

  export default {
    components:{
    datetime: DatePicker
  },
    data() {
      return{
        events: null,
        home_team: null,
        away_team: null,
        primary_category: null,
        primaryCategories: null,
        allTeams: null,
        start_time: null,
        id: null,
        homeTeamOptions: [],
        awayTeamOptions: [],
        optionsForCategory: [{ value: null, text: 'Choose a category', disabled: false}],
      }
    },
    mounted() {
      this.getEvents()
      this.getPrimaryCategory()
      this.getTeams()
    },
    methods: {
    filterTeams() {
      this.awayTeamOptions = this.homeTeamOptions.filter(team => team.id !== this.home_team)
    },
    filterByPrimaryCategory() {
      this.homeTeamOptions = this.allTeams.filter(team => team.primary_category_id === this.primary_category)
      this.home_team = null
      this.away_team = null
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
      let self = this
      axios.post('/api/event/store',{
        home_team_id: this.home_team,
        away_team_id: this.away_team,
        primary_category_id: this.primary_category,
        start_time: this.start_time
        })
      .then(function (response)
      {
        alert("Event saved")
        self.getEvents()
      })
      .catch(function (error)
      {
        alert(error.message[0])
      });
    },
    deleteEvent(event) /* Send the ID of the event only*/
    {
      axios.post(`/api/event/delete/${event.id}`)
      .then(function (response)
      {
        alert("The event has been deleted")
      })
      .catch(function (error)
      {
        alert(error.message[0])
      })
    },
    editEvent(event)/*EDIT HERE*/
    {
      this.home_team = event.home_team_id
      this.away_team = event.away_team_id
      this.start_time = event.start_time
      this.primary_category = event.primary_category_id
      this.id = event.id
    },
     updateEvent()/*UPDATE HERE*/
    {
      let self = this
      axios.post(`/api/event/edit/${this.id}`, {
        home_team_id: this.home_team,
        away_team_id: this.away_team,
        primary_category_id: this.primary_category,
        start_time: this.start_time,
      })
      .then(function (response)
      {
        self.getEvents()
        alert("Updated")
      })
      .catch(function (error)
      {
        alert(error.message[0])
      })
    },
    resetEvent()
    {
      this.home_team = null
      this.away_team = null
      this.start_time = null
      this.primary_category = null
      this.id = null
    },
    getPrimaryCategory()
    {
      axios.get('/api/primary-categories').then((response)=>
      {
        this.primaryCategories = response.data
      }).catch(error =>
      {
        alert(error.message[0])
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
#content {
  width: 1000px;
  margin: 0 auto;
  position: relative;
}

#table{
  height: 500px;
  border:2px solid #010042;
  overflow:auto;
  

}

.title {
  position: relative;
  margin: 20px 0 20px 0;
  width: 100%;
  text-align: center;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  font-weight: bold;
  font-size: 25px;
  color: black;
}

#eventList {
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#eventList td,
#eventList th {
  border: 1px solid #ddd;
  padding: 8px;
}

#eventList tr:nth-child(even) {
  background-color: #f2f2f2;
}

#eventList tr:hover {
  background-color: #ddd;
}

#eventList th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #010042;
  color: white;
}

td,
b-button {
  text-align: center;
}
</style>