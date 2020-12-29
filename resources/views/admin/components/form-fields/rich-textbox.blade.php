@php
	$input_name = $name;
	if ($locale) {
		$input_name = $locale . '[' . $name . ']';
	}
@endphp
<div class="form-group">
	@include('admin/components/form-fields/label')
	<textarea name="{{ $input_name }}" class="quill">{{ $value }}</textarea>
	<!-- <textarea class="quilljs-textarea" placeholder="Please enter text">
      <p>Hello World!</p>
    </textarea> -->

	<!-- <div id="snow-editor" style="height: 300px;">
		<h3><span class="ql-size-large">Hello World!</span></h3>
		<p><br></p>
		<h3>This is an simple editable area.</h3>
		<p><br></p>
		<ul>
			<li>
				Select a text to reveal the toolbar.
			</li>
			<li>
				Edit rich document on-the-fly, so elastic!
			</li>
		</ul>
		<p><br></p>
		<p>
			End of simple area
		</p>
	</div>  -->
</div>
