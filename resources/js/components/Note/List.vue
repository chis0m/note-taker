<template>
    <div class="h-full w-full">
        <div class="text-2xl text-white font-bold py-2">Notes</div>
        <TheSearch/>
        <div class="grid grid-col-1 sm:grid sm:grid-cols-2 lg:grid lg:grid-cols-3 gap-4  my-4 h-full">
            <Card v-for="note in notes" :key="note.id" :note="note" styles="max-w-sm h-64"/>
        </div>
    </div>
</template>

<script>
import TheSearch from "../General/TheSearch";
import Card from "./Card";
export default {
    name: "List",
    components: {
        TheSearch,
        Card
    },
    computed: {
        notes() {
            return this.$store.state.filteredNotes;
        }
    },
    mounted() {
        this.$store.commit('setAllNoteIcons', false);
        this.$store.commit('setAddNoteIcon', true);
    }

}
</script>

<style scoped>

</style>
