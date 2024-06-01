<script>
export default {
    name: "ProductCard",
    props: {
        product: Object,
    }
}
</script>

<template>
    <div class="card border border-regal-gold my-2 grid grid-cols-4 gap-1.5 bg-regal-blue">
        <div class="bg-white">
            img
        </div>
        <div class="col-span-2 text-regal-gold">
            <h4>{{ product.name }}</h4>
            <small>{{ product.description }}</small>
        </div>
        <div class="text-regal-gold grid grid-rows-2 gap-1 text-center items-center">
            <span>{{ product.price.value }}</span>
            <div>
                <button class="text-red-700 p-1">
                    <i class="fa-solid fa-minus"></i>
                </button>
                <span class="
                inline-block
                text-center
                items-center
                justify-center w-4 h-4 mx-2
                text-xs font-semibold text-regal-blue bg-dark-golden rounded-full">
                    2
                </span>
                <button class="text-green-700 p-1">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
