<script>
import BottomButtons from "../components/BottomButtons.vue";

export default {
    name: "HomeView",
    components: {BottomButtons}
}
</script>

<template>
    <BottomButtons :btnStart="{name: 'Contact', link: 'contact'}" :btnEnd="{name: 'Make Order', link: 'menu'}"/>
</template>

<style>
</style>
