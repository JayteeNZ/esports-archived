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
			<select class="form-control" name="teams_per_bracket" v-model="rounds">
				<option value="16">4 Rounds (16 Teams)</option>
				<option value="32">5 Rounds (32 Teams)</option>
				<option value="64">6 Rounds (64 Teams)</option>
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