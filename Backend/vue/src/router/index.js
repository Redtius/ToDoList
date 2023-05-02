import {createRouter} from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import Register from "../views/Register.vue";
import Login from "../views/Login.vue";
import Todolist from "../views/Todolist.vue";
import {createWebHistory} from "vue-router";
import DefaultLayout from "../components/DefaultLayout.vue";
import store from "../store/index.js";
import AuthLayout from "../components/AuthLayout.vue";

const routes = [
  {
    path:'/',
    component:DefaultLayout,
    meta : {
      requiresAuth:true
    },
    children : [
      {
        path:'/Dashboard',
        name:'Dashboard',
        component:Dashboard
      },
      {
        path:'/Todolist',
        name:'Todolist',
        component:Todolist
      },

    ]
  },
  {
    path:'/auth',
    redirect:'/login',
    name:'Auth',
    component:AuthLayout,
    children:[
      {
        path:'/Register',
        name:'Register',
        component:Register
      },
      {
        path:'/Login',
        name:'Login',
        component:Login
      },
    ],
  },



]

const router = createRouter({
  history:createWebHistory(),
  routes
})

router.beforeEach((to,from,next)=>{
  if(to.meta.requiresAuth &&!store.state.user.token){
    next({name:'Login'})
  }
  else if (store.state.user.token && (to.name==='Login' || to.name==='Register')){
    next({name:'Dashboard'})
  }
  else
  {next();
  }
})

export default router;
