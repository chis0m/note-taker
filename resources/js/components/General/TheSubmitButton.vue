<template>
  <div class="w-full">
    <button v-if="!processing"
      class="w-full" :class="btnClass" @click="submit()">
        {{ title }}
    </button>
    <button v-else type="button"
            class="w-full inline-flex items-center border border-transparent justify-center transition ease-in-out duration-150 cursor-not-allowed" :class="processBtnClass" :disabled="true">
      <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
      </svg>
      Processing
    </button>
  </div>
</template>

<script>
export default {
name: "SubmitButton",
  props: {
    errors: {
      default: null,
    },
    btnClass: {
      type: String,
      default: 'bg-gray-600 uppercase text-sm font-bold tracking-wide text-gray-100 p-3 rounded-xs focus:outline-none focus:shadow-outline',
    },
    processBtnClass: {
      type: String,
      default: 'justify-center px-4 py-2 text-base leading-6 font-medium'
    },
    processing: {
      type: Boolean,
      default: false
    },
  title: {
      type: String,
      default: 'Send'
  },

  },
  methods: {
    submit() {
      this.$emit('send');
    }
  }
}
</script>

<style lang="scss" scoped>

</style>
