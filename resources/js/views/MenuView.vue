<script>
import BottomButtons from "../components/BottomButtons.vue";
import ProductList from "../components/Menu/ProductList.vue";

export default {
    name: 'MenuView',
    components: {ProductList, BottomButtons},
    data() {
        return {
            products: [],
            currentCategory: 'none',
        };
    },
    created() {
        fetch('http://localhost:3001/products')
            .then(response => response.json())
            .then(products => (
                this.products = products
            ));
    },
    computed: {
        filteredProducts() {
            if (this.currentCategory === 'none') {
                return this.products;
            }

            return this.products.filter(a => a.category === this.currentCategory);
        }
    }
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

    <ProductList :products="filteredProducts"/>

    <div class="mt-2">
        <button
        class="
        bg-regal-blue text-regal-gold
        mx-auto block px-4
        text-lg rounded
        border border-regal-gold
        text-center active"
        >Your order</button>
    </div>

    <BottomButtons :btnStart="{name: 'Cancel', link: '/'}" :btnEnd="{name: 'Continue', link: 'receive'}"/>
</template>

<style scoped>
</style>
