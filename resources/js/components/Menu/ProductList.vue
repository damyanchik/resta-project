<script>
import ProductCard from './ProductCard.vue';

export default {
    name: 'ProductList',
    components: { ProductCard },
    props: {
        products: Object,
    },
}
</script>

<template>
    <div class="fixed top-30 w-full">
        <select class="
        bg-regal-blue text-regal-gold
        mx-auto block px-4
        text-lg rounded
        border border-regal-gold
        appearance-none
        text-center"
                v-model="currentCategory"
        >
            <option value="none">Category</option>
            <option value="dish">Dish</option>
            <option value="drink">Drink</option>
        </select>
    </div>
    <div class="mt-16 overflow-y-auto p-2 h-[60vh] border border-regal-gold">
        <ProductCard v-for="product in products.items" :product="product" :key="product.order_nr" />
    </div>
</template>

<style scoped>

</style>
