<template>
    <li class="contact" @click="pickThis">
        <div class="wrap">
            <img class="rounded-circle foto-contact pull-left" :src="friendsFoto" width="40px;" height="40px;">
            <div class="nama-contact"> {{ nama }}</div>
            <div class="nama-contact"> </div>
        </div>
    </li>
</template>

<script>
    export default {
    	props : [ 'id','nama','photo' ],
    	computed : {
            friendsFoto : function () {
                return "http://e-learning.test/storage/profil/"+this.photo
            }
    	},
        methods : {
            pickThis: function () {
                this.$emit('picked', { id: this.id, nama : this.nama, photo : this.friendsFoto })
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
