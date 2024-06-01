<script>
import BottomButtons from '../components/BottomButtons.vue';

export default {
    name: 'SummaryView',
    components: {BottomButtons},
}
</script>

<template>
    <table class="text-left table-fixed text-white border-regal-gold border bg-regal-blue">
        <thead>
        <tr class="border-regal-gold border text-regal-gold">
            <th class="p-2">Product</th>
            <th class="p-2">Quantity</th>
            <th class="p-2">Price</th>
            <th class="p-2">Sum</th>
        </tr>
        </thead>
        <tbody>
        <tr class="text-gray-400">
            <td class="p-1">The Sliding Mr. Bones (Next Stop, Pottersville)</td>
            <td class="p-1">43</td>
            <td class="p-1">1975</td>
            <td class="p-1">1</td>
        </tr>
        <tr class="text-gray-400">
            <td class="p-1">The Sliding Mr. Bones</td>
            <td class="p-1">22</td>
            <td class="p-1">3</td>
            <td class="p-1">3</td>
        </tr>
        <tr class="border-t border-t-regal-gold">
            <td class="p-1 text-regal-gold" colspan="3">Delivery</td>
            <td class="p-1 text-gray-400">3</td>
        </tr>
        <tr>
            <td class="p-1 text-regal-gold" colspan="3">Total sum</td>
            <td class="p-1 text-gray-400">1000</td>
        </tr>
        </tbody>
    </table>
    <div>
        <div class="bg-regal-blue text-regal-gold">Reservation / Delivery</div>
    </div>
    <div>
        <div class="bg-regal-blue text-regal-gold">Dane</div>
    </div>
    <div>
        <div class="bg-regal-blue text-regal-gold">Payment</div>
    </div>

    <BottomButtons :btn-start="{name: 'Back', link: 'receive'}" :btn-end="{name: 'Order', link: 'finish'}"/>
</template>

<style scoped>

</style>
