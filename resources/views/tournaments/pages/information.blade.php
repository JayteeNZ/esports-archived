<div class="row">
	<div class="col-md-8">
		<section class="content-block">
			<h3>Schedule</h3>
			<table class="table">
				@for ($i = 1; $i <= $tournament->rounds; $i++)
				<tr>
					<th>Round {{ $i }}</th>
					<td>{{ $tournament->starts_at->addHours($i - 1)->format('h:i A') }}</td>
				</tr>
				@endfor
			</table>
		</section>
	</div>
</div>
