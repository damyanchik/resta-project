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
    <div class="mt-16 overflow-y-auto p-2 h-[60vh] border border-regal-gold">
        <ProductCard v-for="product in products" :product="product" :key="product.order_nr" />
    </div>
</template>

<style scoped>

</style>
