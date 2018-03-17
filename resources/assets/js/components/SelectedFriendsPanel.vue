<template>
    <div class="wrap">
        <img :src="friendPhoto" class="foto-head pull-left rounded-circle" height="40px" width="40px">
        <div class="nama-contact">{{ friendName }}</div>
        <div class="nama-contact">{{ typing }}</div>
    </div>
</template>

<script>
    export default {
    	props : ['typing','friendName','friendPhoto'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
