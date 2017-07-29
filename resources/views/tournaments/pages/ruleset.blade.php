
<section class="content-block">
	@foreach($tournament->ruleset->sections as $section)
		<section id="section-{{ $section->id }}">
			<h3>{{ $section->title }}</h3>
			{!! $section->content !!}
		</section>
	@endforeach
</section>