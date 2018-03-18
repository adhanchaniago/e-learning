<template>
    <li :class="liclass">
        <img :src="userphoto" alt="" height="25" width="25" />
        <slot></slot>
    </li>
</template>

<script>
    export default {
    	props : ['liclass','friendPhoto','yourPhoto'],
        computed : {
            userphoto : function () {
                if (this.liclass == 'sent')
                    return  this.yourPhoto
                else
                    return  this.friendPhoto
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
