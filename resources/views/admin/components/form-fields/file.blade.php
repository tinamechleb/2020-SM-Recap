@php
	$input_name = $name;
	$remove_input_name = 'remove_file_' . $name;
	if ($locale) {
		$input_name = $locale . '[' . $name . ']';
		$remove_input_name = $locale . '[' . 'remove_file_' . $name . ']';
	}
@endphp
<div class="form-group">
	@include('admin/components/form-fields/label')
	@if (isset($value) && $value)
		<div class="row">
		</div>
	@endif
	<div class="dropdown float-right">
		<a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
			<i class="mdi mdi-dots-vertical"></i>
		</a>
		<div class="dropdown-menu dropdown-menu-right">
			<!-- item-->
			<a href="{{ asset($value) }}" target="_blank"><i class="fa fa-file" aria-hidden="true"></i><span class="btn-sm">View File</span></a>
		</div>
	</div>
	<h4 class="header-title mt-0 mb-3">Upload file</h4>

	<input type="file" class="dropify" name="{{ $input_name }}" />
</div>
