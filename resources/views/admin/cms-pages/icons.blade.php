@extends('admin/layouts/main')

@section('dashboard-content')

	<div class="card py-4 px-3 mx-1">
		<div class="row">
			@foreach($icons as $icon)
				<div class="col-2 text-center mb-3">
					<i class="fa {{ $icon }}" aria-hidden="true"></i>
					<p>{{ $icon }}</p>
				</div>
			@endforeach
		</div>
	</div>

@endsection