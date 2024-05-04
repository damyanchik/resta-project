<template>
    <Logo />
    <Background />
    <router-view />
</template>

<script>
    import Logo from './components/logo.vue';
    import Background from './components/background.vue';

    export default {
        components: {
            Background,
            Logo,
        },
    };
</script>

<style>
    @import 'assets/main.css';
</style>
