<template>
    <div class="rounded overflow-hidden shadow-lg bg-gray-side px-2 cursor-pointer hover:bg-gray-700" :class="styles" @click="loadANote">
<!--      <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains">-->
        <p class="text-xs text-yellow-200 py-2 text-center">Updated: {{note.updated_at}} - {{note.read_minute}} MIN READ</p>
        <div class="flex space-x-2 text-sm justify-center">
            <button class="transition ease-in duration-300 inline-flex items-center text-xs
                px-2 py-1 hover:shadow-lg tracking-wider rounded-full text-gray-500 hover:text-white" v-for="tag in compileTags" :key="tag">
                <span>#{{tag}}</span>
            </button>
        </div>
      <div class="py-2">
        <div class="text-white text-lg mb-2 line-clamp-2 py-1 text-center font-montserrat">{{note.title}}</div>
        <p class="text-white text-sm text-base line-clamp-3 text-center">{{note.description}}</p>
      </div>
    </div>
</template>

<script>
export default {
    name: "Card",
    props: {
        note: {
          type: Object,
          required: true
        },
        styles: {
            type: String,
            required: false,
            default: 'max-w-sm'
        }
  },
  methods: {
     loadANote() {
         this.$store.commit('loadANote', this.note);
        this.$emit('loadNote', this.note);
     }
  }
}
</script>

<style scoped>

</style>
