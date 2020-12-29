@extends('admin/layouts/main')

@section('dashboard-content')

<div class="card py-4 px-4 mx-2 w-100">
	<form method="post" enctype="multipart/form-data" action="{{ isset($row) ? url('admin' . '/' . $page['route'] . '/' . $row['id']) : url('admin' . '/' . $page['route'] . '') }}" ajax>

			<p class="font-weight-bold text-uppercase mb-4">{{ isset($row) ? 'Edit ' . $page['display_name'] . ' #' . $row['id'] : 'Add ' . $page['display_name'] }}</p>

			@if (isset($row))
				@method('put')
			@endif

			@if ($errors->any())
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
						<p class="m-0">{{ $error }}</p>
					@endforeach
				</div>
			@endif

			@foreach($page_fields as $field)
				@include('admin/cms-page/form-fields', ['locale' => null])
			@endforeach

			@if (count($page_translatable_fields))
				@foreach (config('translatable.locales') as $locale)
					@if (is_array($locale)) @continue @endif
					<div class="form-group">
						<label>{{ ucfirst($locale) }}</label>
						<div class="pl-3">
							@foreach($page_translatable_fields as $field)
								@include('admin/cms-page/form-fields', compact('locale'))
							@endforeach
						</div>
					</div>
				@endforeach
			@endif

			<div class="text-right">
				@csrf
				<button type="submit" class="btn btn-sm btn-primary">Submit</button>
			</div>
	</form>
</div>


@endsection
@section('scripts')
	<!-- Plugins js -->
	<script src="assets/libs/katex/katex.min.js"></script>
	<script src="assets/libs/quill/quill.min.js"></script>
	<!-- Main Quill library -->
	<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
	<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
	<!-- Core build with no theme, formatting, non-essential modules -->
	<script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>
@endsection