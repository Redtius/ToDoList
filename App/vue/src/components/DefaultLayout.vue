<template>
  <div class="">
  <header class="w-screen mb-20">

  <nav class="navbar bg-base-100">
    <div class="navbar-start">
      <router-link class="btn btn-ghost normal-case text-xl" :to="{name:'Todolists'}" > ToDoYou </router-link>
    </div>
    <div class="navbar-end">
      <button class="btn" @click="this.logout">Logout</button>
    </div>
  </nav>
  </header>
  <main class="block">
    <div class="flex justify-center">
      <router-view class="bg-gray-200 w-1/2"></router-view>
    </div>

  </main>
  </div>

</template>

<script>
import {mapActions, mapState} from "vuex";

export default {
  name: "DefaultLayout",
  computed:{
    ...mapState([
      'user'
    ]),
    ...mapActions([
      'logout'
    ]),
    logout(){
      this.$store.dispatch('logout');
    }

  },
  methods:{
    test(){
      console.log(this.user.token);
      console.log(this.user.data.username);
    },
  }
}
</script>

<style scoped>

</style>
