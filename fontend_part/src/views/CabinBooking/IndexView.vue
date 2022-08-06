<template>
  <div>
      <!-- main form -->
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card custom__card">
                    <div class="card-header">
                        <h4>Cabin Booking List</h4>
                        <router-link class="btn btn-primary menu-style" :to="{ name: 'cabin-booking-add'}">Cabin Booking</router-link> 
                    </div>
                    <div class="card-body">
                        <!-- main work -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 m-auto">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                            <th>Cabin No</th>
                                            <th>Date</th>
                                            <th>Shift</th>
                                            <th>Surgeon</th>
                                            <th>Patient</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in cabinbookinglist" :key="item.booking_id">
                                                <td>{{ item.cabin_name }}</td>
                                                <td>{{ item.booking_date }}</td>
                                                <td>{{ item.shift_type == 'm' ? 'Morning' : 'Evening' }}</td>
                                                <td>{{ item.dr_name }}</td>
                                                <td>{{ item.patient_name }}</td>
                                                <td>
                                                    <router-link :to="{ name: 'cabin-booking-edit', params:{id:item.booking_id} }" class="btn btn-primary shadow btn-xs sharp mr-1" style="color:#fff"> Edit
                                                    </router-link>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- main part -->
                    </div>
                    
                </div>
            </div>
          
        </div>
      </div>
      <!-- main form -->
  </div>
</template>

<script>
import axios from 'axios'
export default {

    data(){
      return{
        cabinbookinglist:[]
      }
    },

    async mounted() {
      let result = await axios.get('http://127.0.0.1:8000/api/cabin-booking');
      this.cabinbookinglist = result.data.data
    },



}




</script>