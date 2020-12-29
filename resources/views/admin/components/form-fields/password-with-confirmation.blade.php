@php
	$input_name = $name;
	$input_confirmation_name = $name . '_confirmation';
	if ($locale) {
		$input_name = $locale . '[' . $name . ']';
		$input_confirmation_name = $locale . '[' . $name . '_confirmation]';
	}
@endphp
<div class="form-group">
	@include('admin/components/form-fields/label')
	<input type="password" id="example-password" class="form-control"  name="{{ $input_name }}">
</div>
<div class="form-group">
    @include('admin/components/form-fields/label', ['label' => 'Confirm ' . $label])
	<input type="password" id="example-password" class="form-control" name="{{ $input_confirmation_name }}">
</div>