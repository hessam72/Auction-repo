<template>
    <div class="flex justify-around">
 <!-- You can actually customize padding on a select element now: -->
<select @change="filter()" placeholder="choose a category" v-model="category" class="form-input px-4 py-3 rounded">
 
  <option value="1">one</option>
  <option value="30">main</option>
  <option value="3">three</option>

</select>

<!-- Or change a checkbox color using text color utilities: -->
<input v-model="search_input" type="text" class=" form-input rounded text-pink-500" />
<button @click="search()" class="p-3 rounded bg-sky-500 hover:bg-sky-700 ...">
  search 
</button>
</div>
</template>


<script>
export default {
  emits: ["search", "filter"],
  data() {
    return {
        category:null,
        search_input:null,
    };
  },

  props: {},
  components: {
   
  },
  methods:{
    search(){
        this.$emit('search' , this.search_input)
    } ,
     filter(){
       
        this.$emit('filter' , this.category)
    }
  }
};
</script>

<style>
</style>