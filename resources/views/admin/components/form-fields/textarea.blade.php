@php
	$input_name = $name;
	if ($locale) {
		$input_name = $locale . '[' . $name . ']';
	}
@endphp
<div class="form-group">
	@include('admin/components/form-fields/label')
	<textarea class="form-control" rows="5" id="example-textarea" name="{{ $input_name }}">{{ $value }}</textarea>
</div>
