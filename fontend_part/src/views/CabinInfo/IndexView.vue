<template>
  <div>
      <!-- main form -->
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card custom__card">
                    <div class="card-header">
                        <h4>Cabin List</h4>
                        <router-link class="btn btn-primary menu-style" :to="{ name: 'cabin-add'}">Cabin Add</router-link> 
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
                                        <th>Cabin Name</th>
                                        <th>Cabin Details</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="item in cabinlist" :key="item.cabin_no">
                                            <td>{{ item.cabin_no }}</td>
                                            <td>{{ item.cabin_name }}</td>
                                            <td>{{ item.cabin_description }}</td>
                                            <td>
                                                <router-link class="btn btn-primary shadow btn-xs sharp mr-1" style="color:#fff" :to="{ name: 'cabin-edit', params:{id:item.cabin_no} }">Edit</router-link>
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
        cabinlist:[]
      }
    },

    async mounted() {
      let result = await axios.get('http://127.0.0.1:8000/api/cabin');
      this.cabinlist = result.data.data
    },



}
</script>