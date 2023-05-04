import {createStore} from "vuex";
import axios from "axios";
import '../axios.js';
import router from "../router/router.js";


const store = createStore(
  {
    state:{
      user:{
        data:{
          email:sessionStorage.getItem('EMAIL'),
          username:sessionStorage.getItem('USERNAME'),
          fname:sessionStorage.getItem('FNAME'),
          lname:sessionStorage.getItem('LNAME'),
          password:'',
          password_confirmation:''
        },
        token: sessionStorage.getItem('TOKEN') ,
      },
    },
    getters:{},
    mutations:{
      SetUser(state,payload){
        state.user.data=payload.user;
        sessionStorage.setItem('EMAIL',payload.user.email);
        sessionStorage.setItem('USERNAME',payload.user.username);
        sessionStorage.setItem('FNAME',payload.user.fname);
        sessionStorage.setItem('LNAME',payload.user.lname);
        state.user.token=payload.token;
        sessionStorage.setItem('TOKEN',payload.token)
      },
      ClearUserData(state){
        state.user = {
          data: {
            email: '',
            username: '',
            fname: '',
            lname: '',
            password: '',
            password_confirmation: ''
          },
          token: ''
        };
        sessionStorage.removeItem('EMAIL');
        sessionStorage.removeItem('USERNAME');
        sessionStorage.removeItem('FNAME');
        sessionStorage.removeItem('LNAME');
        sessionStorage.removeItem('TOKEN');
      }
    },
    actions: {
      async signup({commit}, FormData) {
        try {
          const response = await axios.post('register', FormData);
          const data = response.data;
          commit('SetUser', data);
          router.push('/Todolists');
        } catch (error) {
          console.error(error)
        }
      },
      async login({commit}, FormData) {
        try {
          const response = await axios.post('login', FormData);
          const data = response.data;
          commit('SetUser', data);
          router.push('/Todolists');
        } catch (error) {
          console.error(error)
        }
      },
      async logout({commit}){
        try{
          const token=store.state.user.token;
          console.log('1')
          const config = {
            headers: { Authorization: `Bearer ${token}` }
          };
          await axios.post('logout',null,config);
          commit('ClearUserData');
          router.push('/Login');
        }catch(error){
          console.error(error)
          if (error.response && error.response.status === 401){
            commit('ClearUserData')
            router.push('/Login');
          }
        }

      }
    },

    modules:{}
  }
)

export default store;
