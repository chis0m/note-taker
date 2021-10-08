<template>
    <div class="min-h-screen w-full flex justify-center items-center">
        <router-view></router-view>
        <Notify/>
    </div>
</template>

<script>
import Notify from "./notification/Groups";
export default {
    components: {
        Notify
    }
}
</script>
