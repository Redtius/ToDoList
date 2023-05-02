import {createRouter} from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import Register from "../views/Register.vue";
import Login from "../views/Login.vue";
import Todolist from "../views/Todolist.vue";
import {createWebHistory} from "vue-router";


const routes = [
  {
    path:'/Register',
    name:Register,
    component:Register
  },
  {
    path:'/Login',
    name:Login,
    component:Login
  },
  {
    path:'/Dashboard',
    name:Dashboard,
    component:Dashboard
  },
  {
    path:'/:Here',
    name:Todolist,
    component:Todolist
  }

]

const router = createRouter({
  history:createWebHistory(),
  routes
})

export default router;
