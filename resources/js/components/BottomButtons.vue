<script>
export default {
    name: "BottomButtons",
    props: {
        btnStart: {
            type: Object,
            required: true,
        },
        btnEnd: {
            type: Object,
            required: true,
        },
    },
}
</script>

<template>
    <div class="fixed bottom-10 w-full text-center flex justify-around">
        <RouterLink :to="{ path: btnStart.link }">
            <button class="gold-button block">{{ btnStart.name }}</button>
        </RouterLink>
        <RouterLink :to="{ path: btnEnd.link }">
            <button class="gold-button block">{{ btnEnd.name }}</button>
        </RouterLink>
    </div>
</template>

<style scoped>

</style>
