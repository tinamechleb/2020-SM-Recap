@php
	$input_name = $name;
	if ($locale) {
		$input_name = $locale . '[' . $name . ']';
	}
@endphp
<div class="form-group">
	@if (!isset($inline_label))
        @include('admin/components/form-fields/label')
	@endif
	<label class="checkbox-wrapper checkbox-primary" style="flex-direction: row;display: flex;">
        <input type="checkbox" data-plugin="switchery" data-color="#00b19d" data-size="small" name="{{ $input_name }}" {!! $checked ? 'checked=""' : '' !!}/>
		<div></div>
		@if (isset($inline_label))
			<span class="d-inline-block align-middle mb-0 ml-1">{{ $label }}</span>
		@endif
	</label>
</div>