<template>
  <div>
      <!-- main form -->
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card custom__card">
                    <div class="card-header">
                        <h4>Cabin Create</h4>
                        <router-link class="btn btn-primary menu-style" :to="{ name: 'cabin-list'}">Cabin List</router-link> 
                    </div>
                    <div class="card-body">
                        <!-- main part -->
                        <div class="col-md-4 m-auto">
                            <form @submit.prevent="storeCabinInfo" ref="storeCabinInfo">
                            <div class="mb-3">
                                <label class="form-label">Cabin No</label>
                                <input type="text" class="form-control" v-model="form.cabin_no">
                                <small class="text-danger" v-if="errors.cabin_no">{{errors.cabin_no[0]}}</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cabin Name</label>
                                <input type="text" class="form-control" v-model="form.cabin_name">
                                <small class="text-danger" v-if="errors.cabin_name">{{errors.cabin_name[0]}}</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cabin Description</label>
                                <textarea class="form-control" cols="30" rows="5" v-model="form.cabin_description"></textarea>
                                <small class="text-danger" v-if="errors.cabin_description">{{errors.cabin_description[0]}}</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
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
  name: 'HomeView',

  // Data Bingding
    data(){
        return {
            form:{
                cabin_no: null,
                cabin_name: null,
                cabin_description: null,
            },
            errors:{}
        }
    },

    // method
    methods:{


        storeCabinInfo(){
            axios.post('http://127.0.0.1:8000/api/cabin',this.form)
            .then(() =>{

                this.$refs.storeCabinInfo.reset();
                
                alert('Successfully Added New Cabin');
                // this.$router.push({ name: 'list-partner' })
                // // alert =========
                // Toast.fire({
                //     icon: 'success',
                //     title: 'Successfully Save This Partner'
                // })
                // alert =========
            })
            .catch( error => this.errors = error.response.data.errors )
        }
    }




}
</script>