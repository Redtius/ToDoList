<template>
  <button class="btn" @click="this.logout">Logout</button>
</template>

<script>
import {mapActions, mapState} from "vuex";
export default {
  name: "Todolists",
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
