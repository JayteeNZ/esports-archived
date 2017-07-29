<template>
	<div class="card">
		<div class="card__header">
			<h2>Schedule</h2>
		</div>
		<div class="card__body">
			<div class="form-group">
				<label>Commences at</label>
				<input type="text" name="starts_at" class="form-control date-time-picker">
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				startsAt: ''
			}
		}
	}
</script>