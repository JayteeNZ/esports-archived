<template>
<div class="card">
	<div class="card__header">
		<h2>Tournament Settings</h2>
	</div>
	<div class="card__body">
		<div class="form-group">
			<label>Platform</label>
			<select class="form-control" name="platform_id">
				<option v-for="platform in platforms" :value="platform.id">{{ platform.name }}</option>
			</select>
		</div>
		<div class="form-group">
			<label>Game</label>
			<select class="form-control" name="game_id">
				<option v-for="game in games" :value="game.id">{{ game.name }}</option>
			</select>
		</div>
		<div class="form-group">
			<label>Ruleset</label>
			<select class="form-control" name="ruleset_id">
				<option v-for="ruleset in rulesets" :value="ruleset.id">{{ ruleset.name }}</option>
			</select>
		</div>
	</div>
</div>
</template>

<script>
	export default {
		props: ['platforms', 'games', 'rulesets'],
	}
</script>