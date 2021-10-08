<template>
    <div class="w-full h-full text-white flex flex-col items-center justify-center">
        <div class="flex flex-col justify-center items-center" v-if="!auth">
            <div class="font-bold text-xl md:text-2xl" data-aos="fade-zoom-in" data-aos-duration="900">Take your notes with <span>😉</span></div>
            <div class="capitalize text-7xl md:text-9xl font-rhodium font-bold" data-aos="fade-up" data-aos-delay="200" data-aos-duration="900">NOTE</div>
            <div class="capitalize text-7xl md:text-9xl font-rhodium font-bold" data-aos="fade-up" data-aos-delay="400" data-aos-duration="900">TAKER</div>
            <div class="flex" data-aos="flip-left" data-aos-delay="600" data-aos-duration="900">
                <TheButton title="Start Here" styles="bg-gray-200 hover:bg-yellow-200 text-3xl py-2 px-28 text-black-main font-bold font-rampart rounded-xl cursor-pointer" @click="auth=true"/>
            </div>
        </div>
        <div class="w-full flex flex-row justify-center items-center px-16 md:px-40" v-else>
            <AuthIndex/>
        </div>
    </div>
</template>

<script>
import TheButton from "./General/TheButton";
import AuthIndex from "./Auth/Index";
export default {
    name: "Homer",
    components: {
        TheButton,
        AuthIndex
    },
    props: {
        authPage: {
            type: String,
            required: false,
            default: null
        }
    },
    data(){
        return {
            auth: false
        }
    },
    mounted() {
        if(this.authPage) {
            (this.authPage === 'login') ? this.auth = true : this.$router.push({name: '404'});
        }
    }
}
</script>

<style scoped>

</style>
