import {createStore} from "vuex";
import axios from "axios";
import '../axios.js';
import router from "../router/router.js";


const store = createStore(
  {
    state:{
      user:{
        data:{
          email:'',
          username:'',
          fname:'',
          lname:'',
          password:'',
          password_confirmation:''
        },
        token:'',
      },
    },
    getters:{},
    mutations:{
      SetUser(state,{data,token}){
        state.user.data=data;
        state.user.token=token;
      }
    },
    actions:{
      async signup({commit},FormData){
        try{
          const response = await axios.post('register',FormData);
          const data = response.data;
          const token = response.token;
          commit('SetUser',{data,token});
          router.push('/Login');
        }
        catch (error){
          console.error(error)
        }}
    },
    modules:{}
  }
)

export default store;
