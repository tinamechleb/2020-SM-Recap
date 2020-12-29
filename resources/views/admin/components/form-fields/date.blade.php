@php
	$input_name = $name;
	if ($locale) {
		$input_name = $locale . '[' . $name . ']';
	}
@endphp
<div class="form-group">
	@include('admin/components/form-fields/label')
	<input type="date" class="form-control" placeholder="yyyy-mm-dd" name="{{ $input_name }}" value="{{ $value }}">
</div>