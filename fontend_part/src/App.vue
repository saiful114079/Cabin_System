<template>
  <v-app>
    <v-app-bar app color="primary" dark >
      <div class="d-flex align-center">
        <!-- menu link -->
        <router-link class="menu-style" :to="{ name: 'home'}">Home</router-link>  | 
        <router-link class="menu-style" :to="{ name: 'cabin-list'}">Cabin Information </router-link>  | 
        <router-link class="menu-style" :to="{ name: 'cabin-booking-add'}"> Cabin Booking</router-link> 
        <!-- menu link -->
      </div>
    </v-app-bar>

    <v-main>
      <router-view/>
    </v-main>
  </v-app>
</template>

<script>

export default {
  name: 'App',

  data: () => ({
    //
  }),
};
</script>


<style>
  .menu-style {
	color: #fff !important;
	text-decoration: none;
	margin: 0 10px;
}
</style>
