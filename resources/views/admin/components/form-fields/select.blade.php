<div class="form-group">
	@include('admin/components/form-fields/label')
	<select class="form-control" name="{{ $name }}">
		<option></option>
		@foreach($options as $option)
			<option value="{{ $option[$store_column] }}" {{ $value == $option[$store_column] ? 'selected' : '' }}>{{ strip_tags($option[$display_column]) }}</option>
		@endforeach
	</select>
</div>