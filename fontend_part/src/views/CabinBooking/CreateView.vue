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
                        :min="new Date().toISOString().substr(0, 10)"
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
                      ></v-autocomplete>
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
                              <v-radio
                                label="Morning"
                                value="Morning"
                              ></v-radio>
                              <v-radio
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
                  </div>

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
        booking_date: null,
        // shift_type: null,
        petient_id: null,
        surgeon_id: null,
      },
      errors: {},
      cabinlist: [],
      patientList: [],
      doctorList: [],
      cabinbooking: []
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
    bookingDate() {
      axios
        .post("http://127.0.0.1:8000/api/cabin-booking-filter/date", this.form.booking_date)
        .then(() => {
          // this.$refs.storeCabinBookingReset.reset();

          // alert("Successfully Added New Cabin Booking");
          // this.$router.push({ name: 'list-partner' })
          // // alert =========
          // Toast.fire({
          //     icon: 'success',
          //     title: 'Successfully Save This Partner'
          // })
          // alert =========
        })
        .catch(error => (this.errors = error.response.data.errors));
    },

    storeCabinBooking() {
      axios
        .post("http://127.0.0.1:8000/api/cabin-booking", this.form)
        .then(() => {
          this.$refs.storeCabinBookingReset.reset();

          alert("Successfully Added New Cabin Booking");
          // this.$router.push({ name: 'list-partner' })
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