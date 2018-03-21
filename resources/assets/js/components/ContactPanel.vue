<template>
    <li class="contact" :class="activeClass" @click="pickThis">
        <div class="wrap">
            <img class="rounded-circle foto-contact pull-left" :src="friendsFoto" width="40px;" height="40px;">
            <div class="nama-contact"> {{ nama }}</div>
            <div class="role-contact"> {{ jabatan }}</div>
            <transition name="fade" :duration="300">
                <span v-if="inboxCount" class="badge badge-chat">{{ inbox }}</span>
            </transition>
        </div>
    </li>
</template>

<script>
    export default {
    	props : [ 'id','nama','photo','jabatan','liclass','inbox',"index" ],
    	computed : {
            friendsFoto () {
                if (this.photo == '')
                    return "http://"+window.location.hostname+"/storage/profil/default-user-image.png";
                else
                    return "http://"+window.location.hostname+"/storage/profil/"+this.photo;
            },
            activeClass () {
                if (this.id == this.liclass )
                    return "active"
                else
                    return ""
            },
            inboxCount () {
                if (this.inbox > 0 )
                    return true
                else
                    return false
            }
    	},
        methods : {
            pickThis: function () {
                this.$emit('picked', { id : this.id, index : this.index, nama : this.nama, jabatan : this.jabatan, photo : this.friendsFoto })
            }
        },
        mounted() {
        }
    }
</script>
