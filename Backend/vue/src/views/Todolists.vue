<template>
  <div class="">
    <table class="table w-full">
      <thead class="bg-neutral-700">
      <tr class="grid grid-cols-4">
      <th class="col-span-2 bg-inherit text-white">Title</th>
      <th class="col-span-1 bg-inherit text-white">Created at</th>
      </tr>
      </thead>
      <div v-if="loading" class="text-center"><progress class="progress w-56"></progress></div>
      <tbody v-else>
      <tr v-for="todolist in this.Lists" :key="todolist.id" class="grid grid-cols-4">
        <td class="col-span-2 bg-inherit hover:animate-pulse cursor-pointer">{{todolist.title}}</td>
        <td class="col-span-1 bg-inherit cursor-default">{{todolist.created_at.substring(0,10)}}</td>
        <td class="col-span-1 grid grid-cols-2 bg-inherit">
          <div class="flex justify-center items-center w-full  col-span-1">
            <i class="fa-solid fa-pen text-neutral-700 hover:animate-pulse cursor-pointer"></i>
          </div>
          <div class="flex justify-center items-center w-full  col-span-1">
            <i class="fa-solid fa-circle-xmark text-red-700 hover:animate-pulse cursor-pointer"></i>
          </div>
        </td>
      </tr>
      <tr class="grid grid-cols-4">
        <td class="col-span-3 bg-gray-100"></td>
        <td class="col-span-1 bg-neutral-700 flex justify-center items-center text-white rounded-b-lg dropdown dropdown-bottom dropdown-end">
            <label tabindex="0" class="btn bg-inherit border-none hover:bg-inherit text-3xl hover:animate-pulse">
              <i class="fa-solid fa-square-plus bg-inherit"></i>
            </label>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-80">
              <li><input type="text" placeholder="New List?" v-model="this.NewList.data.title" class="input w-full max-w-xs text-gray-500 active:bg-neutral-700 focus:text-black" /></li>
              <li><label tabindex="0" class="btn m-1 bg-neutral-700 hover:bg-color-neutral-400" @click="this.AddList">Add</label></li>
            </ul>

        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>

import {mapActions, mapState} from "vuex";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";

export default {
  name: "Todolists",
  components: {FontAwesomeIcon},
  data(){
    return {Lists : [{title:'',created_at: ''}],
    NewList:{data:{title:''}},
      loading:false,
    }
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
    async AddList(){
      this.loading=true
      this.$store.dispatch('CreateList',this.NewList.data)
      await this.$store.dispatch('GetLists').then(()=>{this.Lists=this.todolists.data})
      this.loading=false
    }


  },
  async created(){
    this.loading=true;
    await this.$store.dispatch('GetLists').then(()=>{this.Lists=this.todolists.data})
    this.loading=false;

  },
}
</script>
