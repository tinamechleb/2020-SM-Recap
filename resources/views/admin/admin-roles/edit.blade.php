@extends('admin/layouts/main')

@section('dashboard-content')

<div class="card py-4 px-4 mx-2 w-100">
	<form method="post" action="{{ url('admin' . '/admin-roles/' . $row['id']) }}" enctype="multipart/form-data" ajax>

		<p class="font-weight-bold text-uppercase mb-4">Edit admin role #{{ $row['id'] }}</p>

		@csrf

		@method('PUT')

		@include('admin/components/form-fields/input', ['label' => 'Title', 'name' => 'title', 'type' => 'text', 'value' => $row->title, 'locale' => null ])

		@include('admin/components/form-fields/checkbox', [ 'label' => 'Select All', 'inline_label' => true, 'name' => 'select_all', 'checked' => false, 'locale' => null ])

		@foreach($cms_pages_permissions as $cms_page)
			@if ($cms_page['route'] == 'cms-pages') @continue @endif

			<div class="form-group">
				<label class="admin-role-main-label">{{ $cms_page['display_name_plural'] }}</label><br>
				<div class="permission-checkbox-wrapper">
					@include('admin/components/form-fields/checkbox', [ 'label' => 'Browse', 'inline_label' => true, 'name' => 'browse_' . $cms_page['id'], 'checked' => $cms_page['permissions']['browse'], 'locale' => null ])
				</div>
				<div class="permission-checkbox-wrapper">
					@include('admin/components/form-fields/checkbox', [ 'label' => 'Read', 'inline_label' => true, 'name' => 'read_' . $cms_page['id'], 'checked' => $cms_page['permissions']['read'], 'locale' => null ])
				</div>
				<div class="permission-checkbox-wrapper">
					@include('admin/components/form-fields/checkbox', [ 'label' => 'Edit', 'inline_label' => true, 'name' => 'edit_' . $cms_page['id'], 'checked' => $cms_page['permissions']['edit'], 'locale' => null ])
				</div>
				<div class="permission-checkbox-wrapper">
					@include('admin/components/form-fields/checkbox', [ 'label' => 'Add', 'inline_label' => true, 'name' => 'add_' . $cms_page['id'], 'checked' => $cms_page['permissions']['add'], 'locale' => null ])
				</div>
				<div class="permission-checkbox-wrapper">
					@include('admin/components/form-fields/checkbox', [ 'label' => 'Delete', 'inline_label' => true, 'name' => 'delete_' . $cms_page['id'], 'checked' => $cms_page['permissions']['delete'], 'locale' => null ])
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