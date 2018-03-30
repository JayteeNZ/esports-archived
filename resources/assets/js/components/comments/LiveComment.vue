<template>
	<div class="media mb-5">
	  	<img class="mr-4 d-flex align-self-start rounded-circle" src="/images/default-avatar.png" height="70" alt="Generic placeholder image">
	  	<div class="media-body align-self-center">
	    	<h5 class="mt-0 mb-2"><a :href="`/account/${this.message.user.username}`">{{ this.message.user.username }}</a></h5>
	    	<p class="m-0" v-html="this.format"></p>
	  	</div>
	</div>
</template>

<script>
	export default {
		props: ['message'],

		computed: {
			format() {
				return this.message.body.replace(/(\r\n|\n)/g, "<br/>");
			}
		}
	}
</script>