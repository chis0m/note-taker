<template>
    <div class="shadow flex">
        <input v-model="searchTerm" @input="setSearchTerm" class="w-full rounded p-2 bg-gray-side text-white focus:outline-none" type="text" placeholder="Search...">
        <button class="bg-gray-side w-auto flex justify-end items-center p-2 hover:bg-yellow-400" @click="setSearchTermBySearch">
            <img :src="search" alt="search" />
        </button>
    </div>
</template>

<script>
export default {
    name: "TheSearch",
    data() {
    return {
      search: '/svg/search.svg',
      searchTerm: '',
      searchByInput: true
    }
  },
  methods: {
      setSearchTermBySearch(){
         this.$store.commit('setSearchTerm', this.searchTerm);
      },
     setSearchTerm(event) {
          if(!this.searchByInput) return;
         this.$store.commit('setSearchTerm', event.target.value);
     }
  }
}
</script>

<style scoped>

</style>
