import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView.vue'
/* Cabin Router */
import CabinList from '../views/CabinInfo/IndexView.vue' 
import CabinAdd from '../views/CabinInfo/CreateView.vue' 
import CabinEdit from '../views/CabinInfo/EditView.vue' 
/* Cabin Booking Router */ 
import CabinBookingAdd from '../views/CabinBooking/CreateView.vue' 
import CabinBookingList from '../views/CabinBooking/IndexView.vue' 
import CabinBookingEdit from '../views/CabinBooking/EditView.vue' 

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  /* Cabin router */ 
  {
    path: '/cabin-list',
    name: 'cabin-list',
    component: CabinList,
  },
  {
    path: '/cabin-add',
    name: 'cabin-add',
    component: CabinAdd,
  },
  {
    path: '/cabin-edit/:id',
    name: 'cabin-edit',
    component: CabinEdit,
  },
  /* Cabin router */ 

  /* Cabin booking router */ 
  {
    path: '/cabin-booking-add',
    name: 'cabin-booking-add',
    component: CabinBookingAdd
  },
  {
    path: '/cabin-booking-edit/:id',
    name: 'cabin-booking-edit',
    component: CabinBookingEdit
  },
  {
    path: '/cabin-book-list',
    name: 'cabin-book-list',
    component: CabinBookingList
  },
  /* Cabin booking router */ 




  
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
