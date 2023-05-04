<template>
  <h1 class="text-3xl font-bold">Sign Up</h1>
  <div class="py-5">
  <div class="form-control w-screen max-w-xs">
    <label class="label">
      <span class="label-text">Email :</span>
      <span class="label-text-alt">Make sure it's permanent</span>
    </label>
    <input type="email" placeholder="E-mail" v-model="this.data.email" class="input input-bordered w-full max-w-xs" />
  </div> <!--Email Input-->
  <div class="form-control w-screen max-w-xs">
    <label class="label">
      <span class="label-text">Username :</span>
    </label>
    <input type="text" placeholder="Username" v-model="this.data.username" class="input input-bordered w-full max-w-xs" />
  </div> <!--Username Input-->
  <div class="grid grid-cols-2 max-w-xs gap-4">
    <div class="form-control">
      <label class="label">
        <span class="label-text">First Name :</span>
      </label>
      <input type="text" placeholder="First Name" v-model="this.data.fname" class="input input-bordered w-full max-w-xs" />
    </div>
    <div class="form-control">
      <label class="label">
        <span class="label-text">Last Name :</span>
      </label>
      <input type="text" placeholder="Last Name" v-model="this.data.lname" class="input input-bordered w-full max-w-xs" />
    </div>
  </div> <!--Full Name-->
  <div class="grid grid-cols-2 max-w-xs gap-4">
    <div class="form-control">
      <label class="label">
        <span class="label-text">Password :</span>
      </label>
      <input type="password" placeholder="Password" v-model="this.data.password" class="input input-bordered w-full max-w-xs" />
    </div>
    <div class="form-control">
      <label class="label">
        <span class="label-text">Confirm Password :</span>
      </label>
      <input type="password" placeholder="Confirm Password" v-model="this.data.password_confirmation" class="input input-bordered w-full max-w-xs" />
    </div>
  </div> <!--Password-->
  </div>
  <button class="btn max-w-xs " :disabled="!HasInputData" @click="this.signup" >Sign Up</button>


</template>

<script>
import store from "../store/store.js";
import {mapActions,mapState} from 'vuex';
export default {
  name: "Register",

  data(){
    return {
      data:{
      email:'',
      username:'',
      fname:'',
      lname:'',
      password:'',
      password_confirmation:''
     }
    }
  },

  computed : {
    HasInputData: function(){
      return this.data.email.length>0 &&
        this.data.username.length>0 &&
        this.data.fname.length>0 &&
        this.data.lname.length>0 &&
        this.data.password.length>0 && this.data.password_confirmation.length>0;
    }

  },
  methods : {
    ...mapActions([
      'signup'
    ]),
    signup(){
      this.$store.dispatch('signup',this.data)
    }
    },
}
</script>

