<template>
  <div class="w-full flex justify-center" >
    <div class="w-5/12 lg:w-4/12 grid place-items-center my-20" data-aos="fade-down" data-aos-duration="600">
      <img :src="imageUlr" alt="not found" />
      <button class="bg-blue-100 hover:bg-gray-200 text-blue-cardBg font-bold font-bungee my-10 py-3 px-6 rounded inline-flex items-center cursor-pointer" @click="goHome()">
        <span>Go Home</span>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "NotFound",
  data() {
    return {
      imageUlr: '/svg/notFound.svg',
    }
  },
  methods: {
    goHome() {
      this.$router.push({path: '/'});
    }
  }
}
</script>

<style scoped>

</style>
