@extends('layouts.app')

@section('content')
	@include('partials._home-cover')

	<div class="container pt-5">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<section class="alert alert-info">
					<strong>Update:</strong>
					<p>Parallel suffered some major errors just before release. These errors caused the release to be delayed by 5 days as it uncovered a chain of events throughout the system. We expected this to happen during the release, however we did not intend for it to happen beforehand.</p>
					<p>Because of this, some systems have been removed and will be added back over the next few days.</p>
					<h5>Removed Features</h5>
					<ul>
						<li>All image uploading</li>
						<li>Forum</li>
					</ul>
					<strong><em>On some pages, you will see a notice informing that the page is not complete. Expect these to be updated within 3 weeks</em></strong>
					<p class="mt-3">We apologise for the 5 day delay, from hereonin, the website will be updated daily so please keep a lookout for new features and improvements. For any update we release, we'll create a release log. You may find Parallel to be slow at times, we are aware of this and will fix this within the next few days.</p>

					<p>Starting from tomorrow (Thursday, 3rd August), Tournaments will begin.</p>
					<p>Good luck in your first Tournament! <em>- Parallel Team</em></p>
				</section>
				<section class="pt-5 antialiased">
					<h2 class="mb-4">Straight down to business</h2>
					<p style="font-size: 20px">
						It's been 44 days since we announced the release of Parallel. 44 days sounds like a lot
						but in reality, it's flown over for us.
					</p>
					<p style="font-size: 20px">
						But we're finally here! But what does that mean now? Well, we're releasing the website
						as a BETA and for the next 8 weeks, we'll continuously roll out updates.
					</p>
					<p style="font-size: 20px">
						As of right now, the website is pretty much blank. There's only a handful of actions
						you can do.

						You will however, have the ability to create a basic profile and start participating in Tournaments.
					</p>
				</section>

				<section class="pt-5 antialiased">
					<h2 class="mb-4">"The 8 week phase"</h2>
					<p style="font-size: 20px">
						The 8 week phase is where Parallel will truly come to life. It starts now and ends in..... well 8 weeks.
						These 8 weeks will see a large number of improvements, in fact, it'll be like a brand new website you've never
						seen before.
					</p>

					<p style="font-size: 20px">
						Here's a few features you'll see soon:
						<ul>
							<li>An improved Tournament system</li>
							<li>Introducing Leagues</li>
							<li>A full-fledged Forum</li>
							<li>Ladders</li>
							<li>A few secret features we haven't discussed</li>
						</ul>

						That isn't all. The list is too long to mention.
					</p>

					<p style="font-size: 20px">
						These 8 weeks allows us to monitor our website and ensure that it's where it should be. It also allows us to
						expand our growth, so that when these new systems do come into place, they'll be stable and packed full
						of players.
					</p>
				</section>

				<section class="pt-5 antialiased">
					<h2 class="mb-4">Day One</h2>
					<p style="font-size: 20px">
						Hopefully, our systems work smoothly for day one. We are in BETA, so these things are expected. Thank you for support Parallel and best of luck from hereonin.
						<br><br>
						Last but not least - A big thanks to <a href="http://twitter.com/RageESC">Rage</a>, our Partner, for supporting us through the development stage. 
					</p>
				</section>

				<section class="pt-5 antialiased">
					<h2 class="mb-4">P.S:</h2>
					<p style="font-size: 20px">
						As Parallel is new, we are expecting things to go wrong. If you do see an error or bug that looks like it shouldn't belong, please contact us via these support emails: <em>support@playparallel.com</em> or <em>enquiries@playparallel.com</em>
					</p>
				</section>
			</div>
		</div>
	</div>
@stop