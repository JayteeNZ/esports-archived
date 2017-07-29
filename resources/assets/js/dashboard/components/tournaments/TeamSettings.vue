<template>
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card__header">
				<h2>Team Settings</h2>
			</div>
			<div class="card__body">
				<div class="form-group">
					<label>How many teams are required for the tournament to start?</label>
					<input type="number" min="2" class="form-control" value="2" name="min_teams">
				</div>
				<div class="form-group">
					<label>How many teams are allowed to register?</label>
					<input type="number" value="0" class="form-control" name="max_teams">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card__header">
				<h2>Team Settings Continued</h2>
			</div>
			<div class="card__body">
				<div class="form-group">
					<label>Team Size</label>
					<input type="text" class="form-control" name="players">
				</div>
				<div class="form-group">
					<label>Substitutes</label>
					<input type="text" class="form-control" name="subs">
				</div>
			</div>
		</div>
	</div>
</div>
</template>

<script>
	export default {
		props: ['team'],
		data() {
			return {
				minTeams: '',
				maxTeams: '',
				players: '',
				subs: '',
			}
		},
		watch: {
			minTeams: function () {
				this.$emit('input[0]', this.minTeams);
			},
			maxTeams: function () {
				this.$emit('input.max_teams', this.maxTeams);
			}
		}
	}
</script>