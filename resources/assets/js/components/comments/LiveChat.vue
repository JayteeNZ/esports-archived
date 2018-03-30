<template>
	<div class="messages-container">
		<div class="text-box" style="margin-left: 90px">
			<textarea class="transparent-input" @keydown="handleMessage" v-model="body" placeholder="Write something.." style="min-height: auto; font-size: 18px" rows="5"></textarea>
		</div>
		<live-comments :match="this.match"></live-comments>
	</div>
</template>

<script>
	import Bus from '../../bus.js';
	export default {
		props: ['match'],
		data() {
			return {
				body: ''
			}
		},

		methods: {
			handleMessage(e) {
				if (e.keyCode === 13 && !e.shiftKey) {
					e.preventDefault();
					this.sendMessage();
				}
			},

			message() {
				let tempId = Date.now();
				return {
					id: tempId,
					body: this.body,
					owns_message: true,
					user: {
						username: Parallel.user.username,
						user_id: Parallel.user.id
					}
				}
			},

			sendMessage() {
				if (!this.body || this.body.trim() === '') {
					return;
				}

				let message = this.message();

				Bus.$emit('message.added', message);

				axios.post(`/match/${this.match.id}/comments`, {
					body: this.body.trim()
				}).catch(error => {
					this.alertUser(this.body);
				});

				this.body = '';
			},

			alertUser(body) {
				swal({
					title: 'Something went wrong!',
					text: 'An error occurred when sending your latest message.',
					type: 'error',
					showConfirmButton: true,
					confirmButtonText: 'Okay',
				});
			}
		},
	}
</script>