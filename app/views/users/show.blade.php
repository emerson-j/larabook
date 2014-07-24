@extends('layouts.default')

@section('content')
	
	<div class="row">
		<div class="col-md-3">
			<h1>{{ $user->username }}</h1>
			@include('layouts.partials.gravatar', ['size' => 70])			
		</div>

		<div class="col-md-6">
			@if($user->is($currentUser))
				@include('statuses.partials.new')
			@endif
			
			@include('statuses.partials.statuses', ['statuses' => $user->statuses])
		</div>
	</div>


@stop