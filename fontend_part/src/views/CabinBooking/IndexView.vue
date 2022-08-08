<template>
  <div>
    <!-- main form -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card custom__card">
            <div class="card-header">
              <h4>Cabin Booking List</h4>
              <router-link
                class="btn btn-primary menu-style"
                :to="{ name: 'cabin-booking-add' }"
                >Cabin Booking</router-link
              >
            </div>
            <div class="card-body">
              <!-- main work -->
              <div class="container">
                <div class="row">
                  <div class="col-md-10 m-auto">
                    <!-- <table class="table table-bordered">
                                        <thead>
                                            
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in cabinbookinglist" :key="item.booking_id">
                                                <td>{{  }}</td>
                                                <td>{{ item. }}</td>
                                                <td></td>
                                                <td>{{ item. }}</td>
                                                <td>{{ item. }}</td>
                                                <td>
                                                    <router-link :to="{ name: 'cabin-booking-edit', params:{id:item.booking_id} }" class="btn btn-primary shadow btn-xs sharp mr-1" style="color:#fff"> Edit
                                                    </router-link>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table> -->

                    <!-- vuetify data table -->
                    <v-data-table
                      :headers="headers"
                      :items="cabinbookinglist"
                      :items-per-page="5"
                      class="elevation-1"
                    ></v-data-table>
                    <!-- vuetify data table -->
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
import axios from "axios";
export default {
  data() {
    return {
      headers: [
        {
          text: "Cabin Name",
          value: "cabin_name",
        },
        {
          text: "Date",
          value: "booking_date",
        },
        {
          text: "Shift",
          value: 'shift_type == "e" ? "Evening" : "Morning" ',
        },
        {
          text: "Surgeon",
          value: "dr_name",
        },
        {
          text: "Patient",
          value: "patient_name",
        },
        {
          text: "Action",
          value: "",
        },
      ],
      cabinbookinglist: [],
    };
  },

  async mounted() {
    let result = await axios.get("http://127.0.0.1:8000/api/cabin-booking");
    this.cabinbookinglist = result.data.data;
  },
};
</script>
