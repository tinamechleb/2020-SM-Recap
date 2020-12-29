@php
	$input_name = $name;
	if ($locale) {
		$input_name = $locale . '[' . $name . ']';
	}
@endphp
<div class="form-group">
	@include('admin/components/form-fields/label')
	<input type="color" class="form-control" placeholder="color" name="{{ $input_name }}" value="{{ $value }}">
</div>