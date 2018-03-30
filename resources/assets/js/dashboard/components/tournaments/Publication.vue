<template>
	<div class="card">
		<div class="card__header">
			<h2>Publication</h2>
		</div>
		<div class="card__body">
			<div class="form-group">
				<label>Visibility</label>
				<select class="form-control" name="visibility">
					<option value="2">Public</option>
					<option value="1">Visible to Staff</option>
					<option value="0">Private</option>
				</select>
			</div>
			<button class="btn btn--light" type="submit">Publish Tournament</button>
		</div>
	</div>
</template>

<script>
	export default {
		
	}
</script>