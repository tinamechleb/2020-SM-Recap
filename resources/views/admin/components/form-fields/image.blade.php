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
	<input type="file" class="dropify" name="{{ $input_name }}" />
</div>
