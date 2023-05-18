<template>
<div>

  <h1 class="bg-gray-100 w-full text-3xl p-10 flex justify-center items-center">It's Time to Grind</h1>

  <table class="bg-gray-100 w-full">
    <thead class="bg-gray-100 mb-5">
    <tr class="grid grid-cols-2 text-md text-bold">
      <td class="flex">
        Task
      </td>
      <td class="flex justify-end text-md text-bold">
        Status
      </td>

    </tr>
    </thead>
    <tbody>
    <tr v-for="Task in this.Tasks" :key="Task.id" class="grid grid-cols-2 py-2">
      <td class="flex justify-start">
        <div class="form-control">
          <label class="label cursor-pointer">
            <span class="label-text">{{Task.name}}</span>
          </label>
        </div>

      </td>
      <td class="">
        <div class="flex justify-end">

          <input v-if="CheckStatus(Task.status)" @click="ToggleChecked(0,Task.id)" type="checkbox" checked="Checked" class="checkbox checkbox-primary text-md mx-2.5" />
          <input v-else type="checkbox" @click="ToggleChecked(1,Task.id)" class="checkbox checkbox-primary text-md mx-2.5" />

        </div>

      </td>
    </tr>
    <tr class="flex justify-center">
      <td class="">
        <div class="form-control">
          <label class="label cursor-pointer">
            <input type="text" v-model="NewTask.name" placeholder="New Task?" class="input input-ghost w-full max-w-xs" @keyup.enter="CreateTask()" />
          </label>
        </div>
      </td>

    </tr>

    </tbody>
  </table>
</div>
</template>

<script>

import {mapState,mapMutations,mapActions} from "vuex";

export default {
  name: "List",
  data(){
    return {
     Tasks : [{id:'',name:'',status:'',created_at: ''}],
      NewTask : {name:'',status:'Undone'},

      }
  },

  computed:{
    ...mapState([
      'currentlist',
      'tasks'
    ])
  },

  methods:{
    ...mapActions([
      'Gettasks',
      'CreateTask',
      'Togglestatus'
    ]),

    CheckStatus(status){
      return status==="Done";
    },

    async CreateTask(){
      await this.$store.dispatch('CreateTask',this.NewTask);
      //update the state
      await this.$store.dispatch('Gettasks').then(()=>{this.Tasks=this.tasks});
    },

    async ToggleChecked(status,taskid){
      console.log(status);
        await this.$store.dispatch('Togglestatus',{taskid,status});
      await this.$store.dispatch('Gettasks').then(()=>{this.Tasks=this.tasks});

    }

  },

  async created(){
    await this.$store.dispatch('Gettasks').then(()=>{this.Tasks=this.tasks})
  },


}
</script>
