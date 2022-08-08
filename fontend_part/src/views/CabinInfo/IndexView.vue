<template>
  <div>
  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card custom__card">
            <div class="card-header">
              <h4>Cabin List</h4>
              <router-link
                class="btn btn-primary menu-style"
                :to="{ name: 'cabin-add' }"
                >Cabin Add</router-link
              >
            </div>
            <div class="card-body">
          
              <div class="container">
                <div class="row">
                  <div class="col-md-7 m-auto">
                    <template>
                      <v-data-table
                        :headers="headers"
                        :items="cabinlist"
                        :items-per-page="5"
                        item-key="name"
                        class="elevation-1"
                        loading
                        loading-text="Loading... Please wait"
                      ></v-data-table>
                    </template>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
 
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      headers: [
        {
          text: "Cabin ID",
          value: "cabin_no",
        },
        {
          text: "Cabin Name",
          value: "cabin_name",
        },

        {
          text: "Cabin Description",
          value: "cabin_description",
        },
        {
          text: "Action",
          value: "cabin_description",
          //   <router-link class="btn btn-primary shadow btn-xs sharp mr-1" style="color:#fff" :to="{ name: 'cabin-edit', params:{id:item.cabin_no} }">Edit</router-link>
        },
      ],
      cabinlist: [],
    };
  },

  async mounted() {
    let result = await axios.get("http://127.0.0.1:8000/api/cabin");
    this.cabinlist = result.data.data;
  },
};
</script>
