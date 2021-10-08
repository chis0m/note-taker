<template>
    <div class="h-full bg-gray-side flex flex-col justify-items-center items-center space-y-4 pt-8" :class="dimension">
        <div class="hover:bg-yellow-300 rounded-md cursor-pointer py-1 px-1" @click="listNotePage">
            <img :src="listNote" class="w-6 md:w-8" alt="add new note" />
            <div class="text-center"><span class="text-white text-xs">List</span></div>
        </div>
        <div class="hover:bg-yellow-300 rounded-md cursor-pointer py-1 px-1" v-if="shouldAddNewNote" @click="addNewNote">
            <img :src="addNote" class="w-6 md:w-8" alt="add new note" />
            <div class="text-center"><span class="text-white text-xs">New</span></div>
        </div>
        <div class="hover:bg-yellow-300 rounded-md cursor-pointer py-1 px-1" v-if="shouldEditNote" @click="editExistingNote">
            <img :src="editNote" class="w-6 md:w-8" alt="edit note" />
            <div class="text-center"><span class="text-white text-xs">Edit</span></div>
        </div>
        <div class="hover:bg-yellow-300 rounded-md cursor-pointer py-1 px-1" v-if="shouldDeleteNote" @click="deleteANote">
            <img :src="deleteNote" class="w-6 md:w-8" alt="delete note" />
            <div class="text-center"><span class="text-white text-xs">Trash</span></div>
        </div>
        <div class="hover:bg-yellow-300 rounded-md cursor-pointer py-1 px-1" v-if="shouldSaveNote" @click="saveANote">
            <img :src="saveNote" class="w-6 md:w-8" alt="delete note" />
            <div class="text-center"><span class="text-white text-xs">Save</span></div>
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
      saveNote: '/svg/saveNote.svg'
    }
  },
  computed: {
     shouldAddNewNote()
     {
         return this.$store.state.addNewNoteIcon;
     },
     shouldEditNote()
     {
         return this.$store.state.editNoteIcon;
     },
     shouldDeleteNote()
     {
         return this.$store.state.deleteNoteIcon;
     },
      shouldSaveNote() {
         return this.$store.state.saveNoteIcon;
      }
  },
  methods: {

      listNotePage(){
        this.$store.commit('loadANote', {});
        this.$store.commit('setAllNotePages', false);
      },
      addNewNote(){
          this.$store.commit('loadANote', {});
          this.$store.commit('setEditNote', {});
          this.$store.commit('setAllNoteIcons', false);
          this.$store.commit('setAllNotePages', false);
          this.$store.commit('setSaveNoteIcon', true);
          this.$store.commit('setAddNewNotePage', true);
      },
      editExistingNote() {
          this.$store.commit('setEditNote', JSON.parse(JSON.stringify(this.$store.state.note)));
          this.$store.commit('loadANote', {});
          this.$store.commit('setAllNoteIcons', false);
          this.$store.commit('setAllNotePages', false);
          this.$store.commit('setSaveNoteIcon', true);
          this.$store.commit('setAddNewNotePage', true)
      },
      async saveANote() {
          this.$store.commit('loadANote', {});
          this.$store.commit('setAllNoteIcons', false);
          this.$store.commit('setSaveNoteIcon', true);
          try {
            const note = this.$store.state.data;
            this.$store.commit('saveNote', note);
            const response = await this.post(this.http.note.resource, note);
            this.$notify({group: "success", title: "Success", text: response.data.message}, 4000)
            const notes = await this.get(this.http.note.resource);
            this.notes = notes.data.data;
            this.$store.commit('loadNotes', notes.data.data);
          } catch (error) {
            this.$notify({group: "error", title: "Error", text: error.response.data.message}, 4000)
            this.$store.commit('deleteANote', note);
          }
      },
      async deleteANote(){
          const notes = JSON.parse(JSON.stringify(this.$store.state.notes));
          const note = this.$store.state.note;
          try {
              this.$store.commit('deleteANote', note);
              const response = await this.delete(`${this.http.note.resource}/${note.id}`);
              this.$notify({group: "success", title: "Success", text: response.data.message}, 4000)
              this.$store.commit('loadANote', {});
          } catch (error) {
            this.$store.commit('loadNotes', notes);
            this.errors = error.response.data.errors;
            this.errorMessage = error.response.data.message;
            this.$notify({group: "error", title: "Error", text: error.response.data.message}, 4000)
          }
      }
  }
}
</script>

<style scoped>

</style>
