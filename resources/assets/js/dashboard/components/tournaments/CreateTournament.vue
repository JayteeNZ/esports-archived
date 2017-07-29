<template>
	<div class="row">
		<div class="col-md-8">
			<basic-information></basic-information>
			<team-settings></team-settings>
			<tournament-settings></tournament-settings>
		</div>
		<div class="col-md-4">
			<schedule></schedule>
			<bracket-settings></bracket-settings>
			<publication></publication>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				tournament: {
					name: '',
					url: '',
				}
			}
		},
		mounted() {
			//
		}
	}
</script>