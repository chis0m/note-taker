<template>
    <div class="bg-blue-background py-10 rounded-md">
<!--      <p class="text-yellow-400 text-xs text-center italic py-2" v-if="errorMessage">{{errorMessage}}</p>-->
       <div>
         <input @input="validateSingly($event, 'email')" :value="data.email" class="w-full block bg-transparent rounded-lg border border-4 text-gray-300 px-4 py-3 mb-3 focus:outline-none placeholder-gray-500"  type="text" placeholder="Email">
         <div v-if="errors" class="pb-2">
            <p v-for="error in errors['email']" :key="error" class="text-xs text-yellow-500 italic">{{error}}</p>
          </div>
       </div>
       <div>
          <input @input="validateSingly($event, 'password')" :value="data.password" class="w-full block bg-transparent rounded-lg border border-4 text-gray-300 px-4 py-3 mb-3 focus:outline-none placeholder-gray-500"  type="password" placeholder="Password">
           <div v-if="errors" class="pb-2">
              <p v-for="error in errors['password']" :key="error" class="text-xs text-yellow-500 italic">{{error}}</p>
            </div>
       </div>
        <div class="w-full">
          <SubmitButton title="Login" processBtnClass="bg-yellow-100 py-2 text-gray-700 text-xl rounded-lg" btnClass="bg-gray-200 rounded-lg text-gray-900 font-bungee text-xl hover:bg-yellow-200 hover:text-gray-800 rounded-bl-xs rounded-br-xs font-bold py-2 focus:outline-none focus:shadow-outline" :processing="processing" @send="submit"/>
        </div>
    </div>
</template>

<script>
import SubmitButton from "../General/TheSubmitButton";
export default {
    name: "Login",
    components: {
        SubmitButton,
    },
    data() {
        return {
          processing: false,
          errors: null,
          errorMessage: null,
          data: {
            email: '',
            password: '',
          }
        }
  },
  methods: {
    validateSingly(event, attribute) {
      this.errors = null;
      const value = event.target.value;
      switch (attribute) {
        case 'email':
           this.data.email = value;
           this.errors = this.validateEmail(value);
          break;
        case 'password':
          this.data.password = value;
          this.errors = this.validatePassword(value);
          break;
      }
    },
     async submit() {
      this.errors = this.validateInput(this.data)
      if(this.errors) return;

      this.processing = true;
      try {
        const response = await this.post(this.http.auth.login, this.data);
        const token = response.data.data.token;
        const user = response.data.data.user;
        this.$store.commit('authenticate', token);
        this.$store.commit('setUser', user);
        await this.$router.push({path: '/note'});
          this.$notify({group: "success", title: "Success", text: response.data.message}, 2000)
      } catch (error) {
        this.errors = error.response.data.errors;
        this.errorMessage = error.response.data.message;
        this.$notify({group: "error", title: "Error", text: error.response.data.message}, 2000)
      }
      this.processing = false;
    }
  }
}
</script>

<style scoped>

</style>
