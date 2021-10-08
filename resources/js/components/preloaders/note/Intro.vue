<template>
  <div class="rounded-md w-full h-full">
    <div class="animate-pulse space-x-12 w-full h-full ">
      <div class="w-full rounded-sm bg-gray-side h-full "></div>
    </div>
  </div>
</template>

<script>
export default {
name: "List"
}
</script>

<style lang="scss" scoped>
.animate-pulse {
  animation: pulse 1s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
@keyframes pulse {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: .5;
  }
}
</style>
