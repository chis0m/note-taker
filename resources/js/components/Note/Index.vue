<template>
<!--    <p class="w-full text-yellow-400 text-xs text-center italic py-2 absolute" v-if="errorMessage">{{errorMessage}}</p>-->
    <div class="note w-full mx-4 md:w-8/12 bg-black-side flex rounded-xl box-border">
        <div class="w-1/12">
            <Side dimension="w-12 md:w-14 rounded-tl-xl rounded-bl-xl"/>
        </div>
        <div class="w-11/12 h-full">
            <div class="w-full flex">
                <div class="w-1/2 flex justify-start text-white px-8 sm:px-2 py-2 text-sm sm:text-md font-bold">
                    <span>Welcome,&nbsp;</span> <span>{{user.first_name}}</span>
                </div>
                <div class="w-1/2 flex justify-end px-2 py-1 md:py-2">
                    <TheButton title="Logout" styles="bg-gray-200 hover:bg-yellow-200 text-xs px-1 text-black-main rounded-sm cursor-pointer" @click="logout"/>
                </div>
            </div>
            <div class="w-full h-full pt-2 pl-4 sm:pl-2 md:pl-2 pr-6 sm:pr-10 pb-16">
                <template v-if="!preloading">
                    <template v-if="notViewNote">
                        <NewNote v-if="addNewNotePage" />
                        <NoteList v-else-if="notes.length > 0" />
                        <Add v-else />
                    </template>
                    <Note v-else />
                </template>
                <IntroShadow v-else />
            </div>
        </div>
    </div>
</template>

<script>
import TheButton from "../General/TheButton";
import IntroShadow from "../preloaders/note/Intro";
import NewNote from "./NewNote";
import Note from "./Note";
import NoteList from "./List";
import Add from "./Add";
import Side from "./Side";
export default {
    name: "Index",
    components: {
        Note,
        NoteList,
        Add,
        Side,
        IntroShadow,
        TheButton,
        NewNote
    },
    data(){
      return {
          notes: [],
          errorMessage: '',
          preloading: true
      }
    },
    computed: {
      user() {
          return this.$store.state.user;
      },
      addNewNotePage() {
        return this.$store.state.addNewNotePage;
      },
      notViewNote(){
          return Object.entries(this.$store.state.note).length === 0
      }
    },
    methods: {
        logout() {
            this.$store.commit('deny');
            this.$router.push({path: '/login'});
        }
    },
    async mounted() {
        try {
        const response = await this.get(this.http.note.resource);
        this.notes = response.data.data;
        this.$store.commit('loadNotes', response.data.data);
        this.preloading = false;
      } catch (error) {
        this.errorMessage = error.response.data.message;
        this.$notify({group: "error", title: "Error", text: error.response.data.message}, 4000)
        if(error.response.status === 401) {
            await this.$router.push({path: '/login'});
        }
      }
    }
}
</script>

<style lang="scss" scoped>

.note {
    height: 800px;
}

@media screen and (min-device-width: 100px) and (max-width: 1200px) {
  .note {
    height: 600px;
  }
}

</style>
