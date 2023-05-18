<template>
  <form @submit.prevent="login">
    <h1 class="text-3xl font-bold">Login</h1>
    <div class="py-5">
      <div class="form-control w-screen max-w-xs">
        <label class="label">
          <span class="label-text">Email :</span>
        </label>
        <input type="email" placeholder="E-mail" v-model="this.data.email" class="input input-bordered w-full max-w-xs" />
      </div> <!--Email Input-->
      <div class="form-control w-screen max-w-xs">
        <label class="label">
          <span class="label-text">Password :</span>
        </label>
        <input type="password" placeholder="Password" v-model="this.data.password" class="input input-bordered w-full max-w-xs" />
      </div> <!--Password Input-->
    </div>
    <button class="btn max-w-xs " :disabled="!HasInputData" @click="this.login" >Login</button>
  </form>
</template>

<script>
import {mapActions, mapState} from "vuex";

export default {
  name: "Login",
  data(){
    return{
      data:{
        email:'',
        password:''
      },
    };
  },
  computed:{
    HasInputData: function(){
      return this.data.email.length>0 &&
        this.data.password.length>0;
    },
    ...mapState([
      'user'
    ]),

  },
  methods:{
    ...mapActions([
      'login'
    ]),
    login(){
      this.$store.dispatch('login',this.data);
    },
  }

}
</script>
