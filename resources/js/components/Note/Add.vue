<template>
    <div class="w-full h-full flex justify-center items-center">
        <div class="add flex flex-col justify-center items-center cursor-pointer" @click="loadAddNotePage">
            <img :src="addNote" class="w-10 md:w-16" alt="add new note" />
            <div class="text-white"><span class="text hover:text-yellow-200">Add Your First Note</span></div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Add",
    data() {
    return {
      addNote: '/svg/addNote.svg',
    }
  },
  methods: {
      loadAddNotePage(){
          this.$store.commit('loadANote', {});
          this.$store.commit('setEditNote', {});
          this.$store.commit('setAllNoteIcons', false);
          this.$store.commit('setAllNotePages', false);
          this.$store.commit('setSaveNoteIcon', true);
          this.$store.commit('setAddNewNotePage', true);
      },
  },
  mounted() {
    this.setIcons('all', false);
    this.setIcons('addNote', true);
  }
}
</script>

<style lang="scss" scoped>
    .add {
        &:hover {
            .text {
                @apply text-yellow-200;
            }
        }
    }
</style>
