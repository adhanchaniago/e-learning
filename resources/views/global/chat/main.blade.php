@extends('template.default')

@section('title', 'Live Chat')

@section('content')

	<div class="card">
		<div class="card-body top-card-green">
			<p class="category">Live Chat</p>
			<div id="chat" class="container">
				<div class="row">

					<div class="col-sm-4 chat-left no-padding">
						<div class="chat-search">
							<form action="" method="post" id="formCariContact">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-search"></i></span>
									<input type="text" v-model="search" class="form-control search-input" placeholder="Cari User">
								</div>
							</form>
						</div>

						<div class="contact-list">
							<ul class="contacts">
								<transition-group
									name="staggered"
									tag="ul"
									v-bind:css="false"
									v-on:before-enter="contactBeforeEnter"
									v-on:enter="contactEnter"
									v-on:leave="contactLeave">
								<contact-panel 
									@picked="selectedFriends" 
									v-for="(contact,index) in searchList" 
									:key="index"
									:index="index"
									:inbox="contact.inbox"
									:id="contact.user_profil.id" 
									:nama="contact.user_profil.nama" 
									:photo="contact.user_profil.photo" 
									:liclass="chat.contactClass" 
									:jabatan="contact.jabatan">
								</contact-panel>
								</transition-group>
							</ul>
						</div>
					</div>


					<div class="col-sm-8 chat-right no-padding">
						<div class="chat-head">
							<transition name="fade" mode="out-in" :duration="250">
								<selected-friends-panel
									:key="channel.friendID"
									:typing="channel.typing"
									:friend-name="channel.friendName" 
									:jabatan="channel.jabatan" 
									:friend-photo="channel.friendPhoto">
								</selected-friends-panel>
							</transition>
								<div class="loader-state">
									<ball-scale-loader 
										v-if="!chat.chatReadyState" 
										color="#237A57" 
										size="20px">
									</ball-scale-loader>
								</div>

							
						</div>
						<div class="chat-body" v-if="chat.appReadyState" style="overflow: hidden;">
							<transition name="fade">
							<ul v-chat-scroll style="height: 370px; overflow-x: auto;">
									<chat-panel 
										v-for="(pesan, index) in selectedFriend.messages" 
										:key="index" 
										:liclass='chat.liclass[index]'
										:your-photo="channel.yourPhoto"
										:friend-photo="channel.friendPhoto">
										<p>@{{ pesan }}</p>
									</chat-panel>
							</ul>
							</transition>
						</div>
						<div class="chat-foot">
							<div id="formSendChat" >
								<input type="text" v-model='chat.textMessage' @keyup.enter='sendMessage' :disabled="!textMessageState" placeholder="Tulis pesan anda disini.">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@push('style')
<link rel="stylesheet" href="{{ asset('css/chat.css') }}" />
@endpush

@push('script')
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js"></script>
	<script >
		const chat = new Vue({
			el : '#chat',
			data : {
				search : '',
				users : {
					you :'',
					friends :[]
				},
				channel : {
					yourID : '',
					yourPhoto : '',
					friendID : '',
					friendName : '',
					jabatan : '',
					friendPhoto : '',
					typing : '',
				},
				chat : {
					chatReadyState : false,
					appReadyState : false,
					textMessage : '',
					contactClass : '',
					liclass : []
				}
			},
			computed : {
				searchList: function () {
					var vm = this

					return this.users.friends.filter(function (friend) {
						return friend.user_profil.nama.toLowerCase().indexOf(vm.search.toLowerCase()) !== -1
					})
				},
				selectedFriend () {
					if (this.channel.friendID == '')
						return this.users.friends;
					else 
						return this.users.friends[this.findIndex(this.users.friends,'id',this.channel.friendID)];
				},
				textMessageState (){
					if (this.chat.appReadyState){
						if (this.chat.chatReadyState) {
							return true;
						}
					}

					return false;
				}
			},
			methods : {
				getUserChat() {
					axios.get('/livechat/getuser')
					.then((response) => {
						console.log(response)

						this.users.you = response.data.user
						this.channel.yourID = response.data.user.id
						if (response.data.user.user_profil.photo == '')
							this.channel.yourPhoto = 'http://'+window.location.hostname+'/storage/profil/default-user-image.png';
						else
							this.channel.yourPhoto = 'http://'+window.location.hostname+'/storage/profil/'+response.data.user.user_profil.photo
						

						for (var i = 0; i < response.data.friends.length; i++) {
							Vue.set(this.users.friends, i, {'inbox':0})
							for (var j = 0; j < Object.keys(response.data.friends[i]).length; j++) {
								Vue.set(this.users.friends[i], 'id', response.data.friends[i].id)
								Vue.set(this.users.friends[i], 'username', response.data.friends[i].username)
								Vue.set(this.users.friends[i], 'messages', response.data.friends[i].messages)
								Vue.set(this.users.friends[i], 'user_profil', response.data.friends[i].user_profil)
								Vue.set(this.users.friends[i], 'jabatan', response.data.friends[i].hak_akses.nama)
							}
						}

						this.chat.appReadyState = true;
					})
					.catch(error => { console.log(error) });
				},

				getDataChat() {
					axios.get('/livechat/getdata',{
						params: {
							sender: this.channel.yourID,
							receiver: this.channel.friendID,
						}
					})
					.then((response) => {
						if (response.status == 200) {
							this.chat.chatReadyState = true;
							this.chat.liclass = [];

							for (var i = 0; i < response.data.messages.length; i++) {
								Vue.set(this.users.friends[this.findIndex(this.users.friends,'id',this.channel.friendID)].messages, i, response.data.messages[i].message)
								if (this.channel.yourID == response.data.messages[i].sender)
									this.chat.liclass.push('sent');
								else
									this.chat.liclass.push('replies');
							}

						}
						
					})
					.catch(error => { console.log(error) });					
				},

				sendMessage() {
					if (this.chat.textMessage.length != 0 ) {
						this.selectedFriend.messages.push(this.chat.textMessage);
						this.chat.liclass.push('sent');

						axios.post('/livechat/sendchat', { 
							message:this.chat.textMessage,
							sender:this.channel.yourID,
							receiver:this.channel.friendID
						})
						.then((response) => { })
						.catch(error => { console.log(error) });

						this.chat.textMessage = '' 
					}
				},

				selectedFriends(e) {
					this.users.friends[e.index].inbox = 0;
					this.channel.friendID = e.id;
					this.channel.friendName = e.nama;
					this.channel.friendPhoto = e.photo;
					this.channel.jabatan = e.jabatan;
					this.chat.contactClass = e.id;
					this.chat.textMessage = '';
					this.channel.typing = '';
					this.getDataChat();
				},

				findIndex(array, attr, value) {
					for(var arrayIndex = 0; arrayIndex < array.length; arrayIndex += 1) {
						if(array[arrayIndex][attr] === value) {
							return arrayIndex;
						}
					}
					return -1;
				},
				contactBeforeEnter: function (el) {
					el.style.opacity = 0
					el.style.height = '45px';
				},
				contactEnter: function (el, done) {
					var delay = el.dataset.index * 50
					setTimeout(function () {
						Velocity( el, { opacity: 1, height: '60px' }, { complete: done })
					}, delay)
				},
				contactLeave: function (el, done) {
					var delay = el.dataset.index * 500
					setTimeout(function () {
						Velocity( el, { opacity: 0, height: '2em' }, { complete: done })
					}, delay)
				}
			},
			watch : {
				'chat.textMessage': function () {

					Echo.private('chat')
					.whisper('typing', {
						action: this.chat.textMessage,
						sender: this.channel.yourID,
						receiver: this.channel.friendID
					});
				},
			},
			mounted() {
				this.getUserChat();

				Echo.private('chat')
				.listen('ChatEvent', (e) => {
					if (e.receiver.id == this.channel.yourID) {
						if (e.sender.id !== this.channel.friendID)
						this.users.friends[this.findIndex(this.users.friends, 'id', e.sender.id)].inbox += 1;

						this.users.friends[this.findIndex(this.users.friends, 'id', e.sender.id)].messages.push(e.message);
						this.chat.liclass.push('replies');
					}
				})
				.listenForWhisper('typing', (e) => {
					this.channel.typing = '';
					if (e.receiver == this.channel.yourID && e.sender == this.channel.friendID)
						if (e.action != '')
							this.channel.typing = 'mengetik';
					else
						this.channel.typing = '';
				});
			}
		});


	</script>
@endpush