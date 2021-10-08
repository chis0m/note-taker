<template>
    <div class="shadow text-white mb-1">
        <input v-model="title" @input="setTitle" class="w-full rounded p-2 bg-gray-side text-white focus:outline-none" type="text" placeholder="Title...">
    </div>
    <div class="shadow text-white mb-1">
        <input v-model="tags" @input="setTags" class="w-full rounded text-xs pl-2 bg-gray-side text-white focus:outline-none" type="text" placeholder="Tags comma separated e.g ubuntu,containers">
    </div>
    <Editor @updatedModelValue="getEditorContent" :modalValue="editNote.description"/>
</template>

<script>
import {generateReference} from "../../Helper";
import Editor from '../Editor/Index';
export default {
    name: "NewNote",
    components: {
        Editor
    },
    data() {
        return {
            newNote: {},
            title: '',
            tags: '',
            description: '',
            reference: '',
        }
    },
    computed: {
        editNote() {
            return this.$store.state.editNote;
        }
    },
    watch: {
        title() {
            this.setData();
        },
        tags() {
            this.setData();
        }
    },
    methods: {
        postDate() {
          const date = new Date();
          const month = date.toLocaleString('default', { month: 'long' });
          const day = date.getDate();
          const year = date.getFullYear();
          return `${month} ${day}, ${year}`;
        },
        slug(){
          return this.title.toLowerCase().replace(/\.|,|_/g, '').replace(/\s/g, '-');
        },
        getEditorContent(html) {
            this.description = html;
            this.setData();
        },
        setData() {
          const words = this.description + this.title + this.tags;
          const wc =  words?.match(/\w+/g)?.length ?? 0;
           this.note = {
            title: this.title,
            slug: this.slug(),
            description: this.description,
            tags: this.tags,
            read_minute: this.calculateReadTime(wc),
            reference: this.reference,
            created_at: this.postDate(),
            updated_at: this.postDate()
          };
          this.$store.commit('setData', this.note);
        }
    },
    mounted() {
        this.reference = generateReference();
        if(Object.entries(this.$store.state.editNote).length !== 0){
            this.note = this.$store.state.editNote;
            this.reference = this.$store.state.editNote.reference;
            this.title = this.$store.state.editNote.title;
            this.tags = this.$store.state.editNote.tags;
            this.description = this.$store.state.editNote.description;
        }
    }
}
</script>

<style scoped>

</style>
