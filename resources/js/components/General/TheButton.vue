<template>
    <button class="grid place-items-center" :class="styles">
      {{title}}
    </button>
</template>

<script>
export default {
  name: "TheButton",
  props: {
    styles: {
      type: String,
      required: false,
      default: 'px-5 text-white py-3'
    },
    title: {
      type: String,
      required: false,
      default: 'See More'
    }
  }
}
</script>

<style scoped>

</style>
