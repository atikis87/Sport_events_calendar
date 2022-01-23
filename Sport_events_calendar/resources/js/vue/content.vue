<template>
  <div>
    <input v-model="home_team" placeholder="Add new home-team">

    <input v-model="away_team" placeholder="Add new away-team">



    <select v-model="primary_category">
      <option disabled value="">Choose a Sport</option>
      <option>A</option>
      <option>B</option>
      <option>C</option>
    </select>
    <span>Selected:</span>


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
start_time: null
      }
    },
    mounted() {
      this.getEvents()
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
            createEvent() {},
            deleteEvent() {},
            editEvent() {}
        }
  }
</script>

<style scoped>
.labelForm{
  width:200px;


}
</style>