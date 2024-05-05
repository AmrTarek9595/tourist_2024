
require('./bootstrap');

import { createApp } from "vue";
import home from "./components/user/home.vue";
import destination from "./components/user/destination.vue";
import about from "./components/user/about.vue";
import destination_details from "./components/user/destination_details.vue";
//import second from "./components/second.vue";
import Layout from "./components/user/Layout.vue";
import notFound from "./components/user/notFound.vue";

import { createRouter, createWebHistory } from "vue-router";



const router = createRouter({
    history: createWebHistory(),
  
    routes: [
      {
        path: "/:catchAll(.*)",
      component: notFound
      },
      // feel free to add more routes here (yeah, and your root '/' route too :) )
      {
        path: "/",
      
      component: home,
      meta: {title: 'home'},

      },
      {
        path: "/about",
      name: "about",
      component: about

      },
      {
        path: "/destination",
      name: "destination",
      component: destination,
     
      },
      {
      path: '/details', 
      component: destination_details,
      params: {end:':id',key:':key'}  
    }
          ]
  });
  
  

//Vue.component('example-component', require('./components/home.vue').default);
createApp(Layout).use(router).mount("#app");
