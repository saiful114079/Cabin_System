<template>
  <div>
    <!-- main form -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card custom__card">
            <div class="card-header">
              <h4>Cabin Booking</h4>
              <router-link
                class="btn btn-primary menu-style"
                :to="{ name: 'cabin-book-list'}"
              >Cabin Bokking List</router-link>
            </div>
            <div class="card-body">
              <form @submit.prevent="storeCabinBooking" ref="storeCabinBookingReset">
                <div class="row">
                  <!-- main part -->

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label">Date</label>

                      <!-- <v-text-field v-model="form.booking_date" :rules="nameRules" required
                      type="date"></v-text-field>-->

                      <v-date-picker
                        v-model="form.booking_date"
                       
                        v-on:change="bookingDate()"
                      ></v-date-picker>

                      <small
                        class="text-danger"
                        v-if="errors.booking_date"
                      >{{errors.booking_date[0]}}</small>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Doctor</label>
                      <v-autocomplete
                        v-model="form.surgeon_id"
                        item-value="id"
                        item-text="dr_name"
                        :items="doctorList"
                        dense
                        filled
                        label="Select Doctor"
                        v-on:change="doctorListing()"
                      ></v-autocomplete>

                      <!-- <v-text-field v-on:click="doctorListing()" v-model="form.surgeon_id"></v-text-field> -->

                      <small class="text-danger" v-if="errors.surgeon_id">{{errors.surgeon_id[0]}}</small>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Patient</label>
                      <v-autocomplete
                        v-model="form.petient_id"
                        item-value="id"
                        item-text="patient_name"
                        :items="patientList"
                        dense
                        filled
                        label="Select Patient"
                      ></v-autocomplete>
                      <small class="text-danger" v-if="errors.petient_id">{{errors.petient_id[0]}}</small>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Cabin Name</label>
                      <input type="hidden" v-model="form.cabin_no">
                      <v-text-field v-model="form.cabin_name"
                      type="text"></v-text-field>
                      <small class="text-danger" v-if="errors.cabin_name">{{errors.cabin_name[0]}}</small>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Cabin Shift</label>
                      <v-text-field v-model="form.shift_type"
                      type="text"></v-text-field>
                      <small class="text-danger" v-if="errors.shift_type">{{errors.shift_type[0]}}</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  <!-- main part -->

                  <!-- cabin part -->
                  <div class="col-md-8">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Cabin</th>
                          <th>Shift</th>
                          <th>Patient</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(cabin, index) in cabinlist" :key="index">
                          <td>{{ index+1 }}. ({{ cabin.cabin_name }})</td>

                          <!-- <input type="text" v-model="form.cabin_number" > -->
                          <td>
                            <!-- input button -->
                            <v-radio-group >
                              <v-radio v-on:click="cabinInfo('Morning',index+1,cabin.cabin_name)"
                                label="Morning"
                                value="Morning" disabled=""
                              ></v-radio>
                              <v-radio v-on:click="cabinInfo('Evening',index+1,cabin.cabin_name)"
                                label="Evening"
                                value="Evening"
                              ></v-radio>
                            </v-radio-group>
                            <!-- input button -->
                          </td>

                          <td>
                              
                          </td>

                        </tr>
                      </tbody>
                    </table>



                    <div>
                    
                        <li v-for="(cabin, index) in dateWiseCabin" :key="index">{{ cabin.cabin_name }}</li>
                    </div>
                  </div>
                  <!-- cabin part -->


                  <!-- cabin part -->
                </div>
              </form>
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
  // Data Bingding
  data() {
    return {
      form: {
        cabin_no: null,
        cabin_name: null,
        booking_date: null,
        shift_type: null,
        petient_id: null,
        surgeon_id: null,
      },
      errors: {},
      cabinlist: [],
      patientList: [],
      doctorList: [],
      cabinbooking: [],
      dateWiseCabin:[],
    };
  },

  async mounted() {
    let result = await axios.get("http://127.0.0.1:8000/api/cabin");
    let patientList = await axios.get(
      "http://127.0.0.1:8000/api/patient-some-list"
    );
    let doctorList = await axios.get(
      "http://127.0.0.1:8000/api/doctor-some-list"
    );

    let cabinbooking = await axios.get(
      "http://127.0.0.1:8000/api/cabin-booking"
    );
    this.cabinbooking = cabinbooking.data.data;

    this.cabinlist = result.data.data;
    this.patientList = patientList.data;
    this.doctorList = doctorList.data;
  },

  // method
  methods: {
    cabinInfo(shift,cabin_no,cabin_name){
      this.form.cabin_no = cabin_no;
      this.form.cabin_name = cabin_name;
      this.form.shift_type = shift;
    },

    /* ==== Doctor Listing ==== */
    doctorListing(){
      console.log(this.form.surgeon_id);
    }, 
    /* ==== Doctor Listing ==== */ 


    bookingDate() {
      

        let result = axios.post("http://127.0.0.1:8000/api/cabin-booking-filter/date", this.form)
        this.dateWiseCabin = result.data



    },

    storeCabinBooking() {
      axios
        .post("http://127.0.0.1:8000/api/cabin-booking", this.form)
        .then(() => {
          this.$refs.storeCabinBookingReset.reset();

          console.log("Successfully Added New Cabin Booking");
          this.$router.push({ name: 'cabin-book-list' })
          // // alert =========
          // Toast.fire({
          //     icon: 'success',
          //     title: 'Successfully Save This Partner'
          // })
          // alert =========
        })
        .catch(error => (this.errors = error.response.data.errors));
    }
  }
};
</script>