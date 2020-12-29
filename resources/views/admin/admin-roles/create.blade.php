@extends('admin/layouts/main')

@section('dashboard-content')

<div class="card py-4 px-4 mx-2 w-100">
	<form method="post" action="{{ url('admin' . '/admin-roles') }}" enctype="multipart/form-data" ajax>
			<p class="font-weight-bold text-uppercase mb-4">Add admin role</p>

			@if ($errors->any())
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
						<p class="m-0">{{ $error }}</p>
					@endforeach
				</div>
			@endif

			@csrf

			@include('admin/components/form-fields/input', ['label' => 'Title', 'name' => 'title', 'type' => 'text', 'value' => '', 'locale' => null ])

			@include('admin/components/form-fields/checkbox', [ 'label' => 'Select All', 'inline_label' => true, 'name' => 'select_all', 'checked' => false, 'locale' => null ])

			@foreach($cms_pages as $cms_page)
				@if ($cms_page['route'] == 'cms-pages') @continue @endif

				<div class="form-group mb-4">
					<label class="admin-role-main-label text-primary">{{ $cms_page['display_name_plural'] }}</label><br>
					<div class="permission-checkbox-wrapper">
						@include('admin/components/form-fields/checkbox', [ 'label' => 'Browse', 'inline_label' => true, 'name' => 'browse_' . $cms_page['id'], 'checked' => false, 'locale' => null ])
					</div>
					<div class="permission-checkbox-wrapper">
						@include('admin/components/form-fields/checkbox', [ 'label' => 'Read', 'inline_label' => true, 'name' => 'read_' . $cms_page['id'], 'checked' => false, 'locale' => null ])
					</div>
					<div class="permission-checkbox-wrapper">
						@include('admin/components/form-fields/checkbox', [ 'label' => 'Edit', 'inline_label' => true, 'name' => 'edit_' . $cms_page['id'], 'checked' => false, 'locale' => null ])
					</div>
					<div class="permission-checkbox-wrapper">
						@include('admin/components/form-fields/checkbox', [ 'label' => 'Add', 'inline_label' => true, 'name' => 'add_' . $cms_page['id'], 'checked' => false, 'locale' => null ])
					</div>
					<div class="permission-checkbox-wrapper">
						@include('admin/components/form-fields/checkbox', [ 'label' => 'Delete', 'inline_label' => true, 'name' => 'delete_' . $cms_page['id'], 'checked' => false, 'locale' => null ])
					</div>
				</div>

			@endforeach

			<div class="text-right">
				<button type="submit" class="btn btn-sm btn-primary py-2 px-4">Submit</button>
			</div>
	</form>
</div>

@endsection

@section('scripts')

<script>
	$('[name="select_all"]').on('change', function() {
		if ($(this).is(':checked')) {
			$('.permission-checkbox-wrapper input').prop('checked', true);
		} else {
			$('.permission-checkbox-wrapper input').prop('checked', false);
		}
	});
</script>

@endsection