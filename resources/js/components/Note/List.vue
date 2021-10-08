<template>
    <div class="h-full w-full">
        <div class="text-2xl text-white font-bold py-2">Notes</div>
        <TheSearch/>
        <div class="list grid grid-col-1 sm:grid sm:grid-cols-2 lg:grid lg:grid-cols-3 gap-4  my-4 h-full">
            <Card v-for="(note, i) in notes" :key="i" :note="note" styles="max-w-sm h-64"/>
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
        this.$store.commit('setAddNewNoteIcon', true);
    }

}
</script>

<style lang="scss" scoped>
.list {
    height: 630px;
    @apply overflow-scroll
}

@media screen and (min-device-width: 301px) and (max-width: 1200px) {
    .list {
        height: 420px;
    }
}
@media screen and (min-device-width: 301px) and (max-width: 301px) {
    .list {
        height: 320px;
    }
}
@media screen and (min-device-width: 1px) and (max-width: 300px) {
    .list {
        height: 360px;
    }
}
</style>
