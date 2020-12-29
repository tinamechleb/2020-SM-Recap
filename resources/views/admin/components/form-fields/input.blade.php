@php
	$input_name = $name;
	if ($locale) {
		$input_name = $locale . '[' . $name . ']';
	}
@endphp
<div class="form-group">
	@include('admin/components/form-fields/label')
	@if($name=='icon')
		<a target="_blank" href="/admin/cms-pages/icons">Click to see icons</a>
	@endif
	<input type="{{ $type }}" id="simpleinput" class="form-control" name="{{ $input_name }}" value="{{ $value }}" {!! isset($slug_origin) ? 'data-slug-origin="' . $slug_origin . '"' : '' !!}>
</div>