<template>
    <li :class="liclass">
        <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
        <slot></slot>
    </li>
</template>

<script>
    export default {
    	props : ['liclass'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
