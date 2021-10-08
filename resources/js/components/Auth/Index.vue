<template>
    <div class="w-full flex flex-col md:flex-row">
        <div class="w-full md:w-1/2 md:border-r md:border-yellow-100 md:pr-10" data-aos="fade-down" data-aos-duration="900">
            <Login/>
            <div class="text-6xl font-lobster flex justify-center items-center xl:mt-10">
                <span class="text-yellow-200">Welcome Back!</span>
            </div>
       </div>
        <div class="w-full md:w-1/2 md:pl-10" data-aos="fade-up" data-aos-duration="900">
            <Register/>
        </div>
    </div>
</template>

<script>
import Login from "./Login";
import Register from "./Register";
export default {
    name: "Index",
    components: {
        Login,
        Register
    },
}
</script>

<style scoped>

</style>
