<template>
	<div class="messages">
		<live-comment v-for="message in messages" :key="message.id" :message="message"></live-comment>
	</div>
</template>

<script>
	import Bus from '../../bus.js';
	export default {
		props: ['match'],
		data() {
			return {
				messages: [],
			}
		},

		mounted() {
			axios.get(`/match/${this.match.id}/comments`).then(response => {
				this.messages = response.data;
			}).catch(error => { console.log(error) });

			Bus.$on('message.added', (message) => {
				this.messages.unshift(message);
			});
		}
	}
</script>

<style>
	.messages {
		height: 600px;
		overflow-y: scroll;
	}
</style>