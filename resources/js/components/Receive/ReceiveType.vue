<script>
export default {
    name: "ReceiveType",
    props: {
        receive: Object,
    }
}
</script>

<template>
    <li>
        <input type="radio" :id="receive.name" name="receive" :value="receive.name" class="hidden peer" required />
        <label :for="receive.name" class="receive-radio">
            <div class="block">
                <div class="w-full text-lg font-semibold">
                    <slot />
                    {{ receive.title }}
                </div>
                <div class="w-full">{{ receive.description }}</div>
            </div>
        </label>
    </li>
</template>

<style scoped>

</style>
