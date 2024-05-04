<template>
    <div class="background__block" :class="{'background__block--grey': isBackgroundGrey}"></div>
    <div class="start__block">
        <button
            class="start__button"
            @click="redirectTo('/menu')"
            @mouseover="isBackgroundGrey = true"
            @mouseleave="isBackgroundGrey = false"
        >Make an order</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isBackgroundGrey: false
        };
    },
    methods: {
        redirectTo(route) {
            this.$router.push(route);
        },
    },
};
</script>
