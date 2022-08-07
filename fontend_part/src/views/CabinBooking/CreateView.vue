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
                    <!-- <div class="mb-3">
                    <label class="form-label">Select Cabin</label>-->

                    <!-- <option v-for="(value, index) in course" v-bind:value="value.id" v-bind:selected="index === 0">
                                                        {{ value.course_name }}
                    </option>-->

                    <!-- <select class="form-control" v-model="form.cabin_no">

                                                <option v-for="(cabin) in cabinlist" :key="cabin.cabin_no" :value="cabin.cabin_no">{{ cabin.cabin_name }}</option>
                                            </select>


                                            <small class="text-danger" v-if="errors.cabin_no">{{errors.cabin_no[0]}}</small>
                    </div>-->

                    <div class="mb-3">
                      <label class="form-label">Date</label>

                      <v-text-field v-model="form.booking_date" :rules="nameRules" required
                      type="date"></v-text-field>

                      <!-- <input type="date" class="form-control" v-model="form.booking_date"> -->

                      <small
                        class="text-danger"
                        v-if="errors.booking_date"
                      >{{errors.booking_date[0]}}</small>
                    </div>

                    <!-- <div class="mb-3">
                                            <label class="form-label">Cabin Shift</label>

                                            <select class="form-control" v-model="form.shift_type">
                                                <option value="m">Morning</option>
                                                <option value="e">Evening</option>
                                        </select>

                                            <small class="text-danger" v-if="errors.shift_type">{{errors.shift_type[0]}}</small>
                    </div>-->

                    <div class="mb-3">
                      <label class="form-label">Doctor</label>

                      <!-- <select class="form-control" v-model="form.surgeon_id">

                                                <option v-for="(doctor) in doctorList" :key="doctor.id" :value="doctor.id">{{ doctor.dr_name }}({{ doctor.dr_id }})</option>

                      </select>-->

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

                      <!-- <select class="form-control" v-model="form.petient_id">

                                                <option v-for="(patient) in patientList" :key="patient.id" :value="patient.id">{{ patient.patient_name }}({{ patient.patient_id }})</option>
                      </select>-->

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
                      <tbody>
                        <tr v-for="(cabin) in cabinlist" :key="cabin.cabin_no">
                          <td>{{ cabin.cabin_no }}. ({{ cabin.cabin_name }})</td>
                          <td>
                            <v-radio-group v-model="row" row>
                              <v-radio label="Morning" value="Morning"></v-radio>
                              <v-radio label="Evening" value="Evening"></v-radio>
                            </v-radio-group>
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
        shift_type: null,
        petient_id: null,
        surgeon_id: null
      },
      errors: {},
      cabinlist: [],
      patientList: [],
      doctorList: []
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
    this.cabinlist = result.data.data;
    this.patientList = patientList.data;
    this.doctorList = doctorList.data;
  },

  // method
  methods: {
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