<div class="card card-transparent">
	<div class="card-header">
		Match Information
		<small class="d-block text-dark-muted">This match is a Best of 3. Teams have one hour to complete. Failure to complete the match on time may result in both teams being disqualified.</small>
	</div>
	<div class="card-block">
		<table class="table">
			<tr>
				<th class="pl-0" >Match ID</th>
				<td>#44697</td>
			</tr>
			<tr>
				<th class="pl-0" >Status</th>
				<td>{{ $match->getStatus() }}</td>
			</tr>
			<tr>
				<th class="pl-0" style="width:20%">Started</th>
				<td>5:00pm</td>
			</tr>
		</table>
	</div>
	<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#reportScores">Report scores</a>
</div>
<hr>
@foreach($match->teams as $team)
<div class="card card-transparent">
	<div class="card-header">{{ $team->name }}</div>
	<div class="card-block">
		<div class="row">
			@foreach($team->users as $user)
			<div class="col-md-4">
				<div class="media mb-5">
				  	<img class="mr-4 d-flex align-self-center rounded-circsle" src="/images/default-avatar.png" height="70" alt="Generic placeholder image">
				  	<div class="media-body align-self-center">
				    	<h5 class="mt-0 mb-0">{{ $user->profile->account_playstation }}</h5>
				    	<a href="{{ route('profile', $user) }}" class="m-0">{{ $user->username }}</a>
				  	</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endforeach