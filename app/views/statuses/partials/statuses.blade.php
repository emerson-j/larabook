@if($statuses->count())

	@foreach($statuses as $status)
	    @include('statuses.partials.status')
	@endforeach

@else
	<p>No Statuses</p>
@endif