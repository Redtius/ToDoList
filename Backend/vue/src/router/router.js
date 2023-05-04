import {createRouter,createWebHistory} from "vue-router";
import Login from "../views/Login.vue";
import register from "../views/Register.vue";
import Todolists from "../views/Todolists.vue";
import DefaultLayout from "../components/DefaultLayout.vue";
import Tasks from "../views/Tasks.vue";
import store from "../store/store.js";




const routes = [
  {
    path:'/login',
    name:'login',
    component:Login,
  },
  {
    path:'/Register',
    name:'register',
    component:register,
  },
  {
    path:'/home',
    name:'home',
    component: DefaultLayout,
    meta : {
      RequiresAuth:true
    },
    children:[
  {
    path:'/Todolists',
    name:'Todolists',
    component:Todolists,
  },
  // {
  //   path:'/Todolists/:id',
  //   name:':id',
  //   component:Tasks,
  //   props:true
  // }
  ]
  },
]
const router = createRouter({
  history:createWebHistory(),
  routes
})

router.beforeEach((to,from,next)=>{
  const isAuth = store.state.user.token;
  if(to.meta.RequiresAuth && !isAuth ){
    next({name:'login'})
  }
  else if (!to.meta.RequiresAuth && isAuth)
  {
    next({name:'Todolists'})
  }
  else
  {
    next();
  }
})


export default router;
