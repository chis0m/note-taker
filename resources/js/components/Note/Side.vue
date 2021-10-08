<template>
    <div class="h-full bg-gray-side flex flex-col justify-items-center items-center space-y-4 pt-8" :class="dimension">
        <div class="hover:bg-yellow-300 rounded-md cursor-pointer py-1 px-1" @click="listNotePage">
            <img :src="listNote" class="w-6 md:w-8" alt="add new note" />
        </div>
        <div class="hover:bg-yellow-300 rounded-md cursor-pointer py-1 px-1" v-if="shouldAddNote" @click="loadAddNotePage">
            <img :src="addNote" class="w-6 md:w-8" alt="add new note" />
        </div>
        <div class="hover:bg-yellow-300 rounded-md cursor-pointer py-1 px-1" v-if="shouldEditNote" @click="loadEditNotePage">
            <img :src="editNote" class="w-6 md:w-8" alt="edit note" />
        </div>
        <div class="hover:bg-yellow-300 rounded-md cursor-pointer py-1 px-1" v-if="shouldDeleteNote" @click="deleteANote">
            <img :src="deleteNote" class="w-6 md:w-8" alt="delete note" />
        </div>
    </div>
</template>

<script>
export default {
    name: "Side",
    props: {
        dimension: {
            type: String,
            default: 'w-5/12'
        }
    },
    data() {
    return {
      addNote: '/svg/addNote.svg',
      editNote: '/svg/editNote.svg',
      deleteNote: '/svg/deleteNote.svg',
      listNote: '/svg/listNote.svg',
    }
  },
  computed: {
     shouldAddNote()
     {
         return this.$store.state.addNoteIcon;
     },
     shouldEditNote()
     {
         return this.$store.state.editNoteIcon;
     },
     shouldDeleteNote()
     {
         return this.$store.state.deleteNoteIcon;
     }
  },
  methods: {
      listNotePage(){
        this.$store.commit('loadANote', {});
      },
      loadAddNotePage(){
          this.$store.commit('setAllNotePages', false);
          this.$store.commit('setAddNotePage', true);
      },
      async deleteANote(){
          const notes = JSON.parse(JSON.stringify(this.$store.state.notes));
          const note = this.$store.state.note;
          try {
              this.$store.commit('deleteANote', note);
              const response = await this.delete(`${this.http.note.resource}/${note.id}`);
              this.$notify({group: "success", title: "Success", text: response.data.message}, 2000)
              this.$store.commit('loadANote', {});
          } catch (error) {
            this.$store.commit('loadNotes', notes);
            this.errors = error.response.data.errors;
            this.errorMessage = error.response.data.message;
            this.$notify({group: "error", title: "Error", text: error.response.data.message}, 2000)
          }
      }
      // loadEditNotePage() {
      //     this.$store.commit('setAllNotePages', false);
      //     this.$store.commit('setEditNotePage', true);
      // },
      // loadDeletePage() {
      //   this.$store.commit('setAllNotePages', false);
      //   this.$store.commit('setDeleteNotePage', true);
      // }
  }
}
</script>

<style scoped>

</style>
