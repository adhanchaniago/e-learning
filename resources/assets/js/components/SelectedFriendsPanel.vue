<template>
    <div class="wrap">
        <img :src="avatar" class="foto-head pull-left rounded-circle" height="40px" width="40px">
        <div class="nama-contact">{{ nama }}</div>
        <div class="role-contact">{{ role }}</div>

            <div v-if="ketik" class="nama-contact chat-ket">{{ typing }}</div>

    </div>
</template>

<script>
    export default {
    	props : ['typing','friendName','jabatan','friendPhoto'],
        computed : {
            avatar () {
                if (this.friendPhoto == '') {
                    return "http://"+window.location.hostname+"/storage/profil/default-user-image.png";
                } else {
                    return this.friendPhoto
                }
            },
            nama () {
                if (this.friendPhoto == '') {
                    return "Pilih kontak untuk memulai chat";
                } else {
                    return this.friendName
                }
            },
            role () {
                if (this.friendPhoto == '') {
                    return "";
                } else {
                    return this.jabatan;
                }
            },
            ketik () {
                if (this.typing == "mengetik")
                    return true
                else
                    return false
            }
        },
        mounted() {
        }
    }
</script>
