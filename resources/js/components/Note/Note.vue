<template>
    <div class="text-white text-2xl font-bold text-justify font-montserrat py-2">{{note.title}}</div>
    <div class="flex space-x-2 text-sm text-justify" v-if="tagsLength > 0">
        <button class="transition ease-in duration-300 inline-flex items-center text-xs
            px-2 py-1 hover:shadow-lg tracking-wider rounded-full text-gray-500 hover:text-white" v-for="tag in compileTags" :key="tag">
            <span>#{{tag}}</span>
        </button>
    </div>
    <p class="text-xs text-yellow-200 py-2 text-justify">Updated: {{note.updated_at}} - {{note.read_minute}} MIN READ</p>
    <p class="text-white text-sm text-base text-justify py-2" v-html="note.description"></p>
</template>

<script>
export default {
    name: "Note",
    computed: {
        note() {
            return this.$store.state.note;
        },
        tagsLength(){
            return this.$store.state.note?.tags?.length || 0;
        }
    },
    mounted() {
        this.$store.commit('setAllNoteIcons', false);
        this.$store.commit('setEditNoteIcon', true);
        this.$store.commit('setDeleteNoteIcon', true);
    }
}
</script>

<style scoped>

</style>
