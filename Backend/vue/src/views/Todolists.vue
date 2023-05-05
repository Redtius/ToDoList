<template>
  <div class="">
    <table class="table w-full">
      <thead class="bg-neutral-700">
      <tr class="grid grid-cols-3">
      <th class="col-span-2 bg-inherit text-white">Title</th>
      <th class="col-span-1 bg-inherit text-white">Created at</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="todolist in this.Lists" :key="todolist.id" class="grid grid-cols-3 hover:bg-neutral-400">
        <td class="col-span-2 bg-inherit">{{todolist.title}}</td>
        <td class="col-span-1 bg-inherit">{{todolist.created_at.substring(0,10)}}</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>

import {mapActions, mapState} from "vuex";

export default {
  name: "Todolists",
  data(){
    return {Lists : []}
  },

  computed:{
    ...mapState({
      todolists : state => state.todolists.data
    }),


  },
  methods:{
    ...mapActions[(
      'GetLists'
    )],


  },
  async created(){
    await this.$store.dispatch('GetLists').then(()=>{this.Lists=this.todolists.data})
  },
}
</script>
