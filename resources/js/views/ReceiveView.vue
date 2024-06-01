<script>
import BottomButtons from '../components/BottomButtons.vue';
import ReceiveType from '../components/Receive/ReceiveType.vue';

export default {
    name: 'ReceiveView',
    components: {ReceiveType, BottomButtons }
}
</script>

<template>
    <ul class="grid w-full gap-4 md:grid-cols-2">
        <ReceiveType :receive="{
            name: 'reservation',
            title: 'Reservation',
            description: 'Make a reservation and try our dishes in the local.',
        }">
            <i class="fa-solid fa-utensils"></i>
        </ReceiveType>
        <ReceiveType :receive="{
            name: 'delivery',
            title: 'Delivery',
            description: 'Bring your favorite food to home!',
        }">
            <i class="fa-solid fa-car-rear"></i>
        </ReceiveType>
        <ReceiveType :receive="{
            name: 'takeaway',
            title: 'Take-away',
            description: 'Order early and then pick up the food by yourself.',
        }">
            <i class="fa-solid fa-bag-shopping"></i>
        </ReceiveType>
    </ul>
    <BottomButtons :btnStart="{name: 'Back', link: '/menu'}" :btnEnd="{name: 'Confirm', link: 'summary'}"/>
</template>

<style scoped>

</style>
