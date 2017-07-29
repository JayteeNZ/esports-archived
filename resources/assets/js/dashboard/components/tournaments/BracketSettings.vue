<template>
	<div class="card">
	<div class="card__header">
		<h2>Bracket Settings</h2>
	</div>
	<div class="card__body">
		<div class="form-group">
			<label>Tournament Format</label>
			<select class="form-control" name="format" v-model="format">
				<option value="single elimination">Single Elimination</option>
				<option value="double elimination">Double Elimination</option>
				<option value="round robin">Round Robin</option>
			</select>
		</div>
		<div class="form-group">
			<label>Number of Rounds</label>
			<select class="form-control" name="rounds" v-model="rounds">
				<option value="3">3 Rounds (16 Teams)</option>
				<option value="4">4 Rounds (32 Teams)</option>
				<option value="5">5 Rounds (64 Teams)</option>
			</select>
		</div>
	</div>
</div>
</template>

<script>
	export default {
		data() {
			return {
				format: '',
				rounds: '',
			}
		}
	}
</script>