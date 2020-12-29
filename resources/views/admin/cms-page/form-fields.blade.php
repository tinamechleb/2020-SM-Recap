@php
$value = '';
if (isset($row)) {
    if ($locale) {
        if ($row->translate($locale)) {
            $value = $row->translate($locale)[$field['name']];
        }
    } else {
        $value = $row[$field['name']];
    }
}
@endphp

@if ($field['form_field'] == 'textarea')
	@include('admin/components/form-fields/textarea', [
		'label' => ucwords(str_replace('_', ' ', $field['name'])),
		'name' => $field['name'],
        'value' => $value,
        'required' => $field['nullable'] ? false : true,
        'description' => isset($field['description']) ? $field['description'] : '',
		'locale' => $locale,
	])
@elseif ($field['form_field'] == 'rich-textbox')
	@include('admin/components/form-fields/rich-textbox', [
		'label' => ucwords(str_replace('_', ' ', $field['name'])),
		'name' => $field['name'],
        'value' => $value,
        'required' => $field['nullable'] ? false : true,
        'description' => isset($field['description']) ? $field['description'] : '',
		'locale' => $locale,
	])
@elseif ($field['form_field'] == 'icon')
	@include('admin/components/form-fields/input', [
		'label' => ucwords(str_replace('_', ' ', $field['name'])),
		'name' => $field['name'],
        'value' => $value,
		'type' => 'text',
        'required' => $field['nullable'] ? false : true,
        'description' => isset($field['description']) ? $field['description'] : '',
		'locale' => $locale,
	])
@elseif ($field['form_field'] == 'color')
	@include('admin/components/form-fields/color-picker', [
		'label' => ucwords(str_replace('_', ' ', $field['name'])),
		'name' => $field['name'],
        'value' => $value,
        'required' => $field['nullable'] ? false : true,
        'description' => isset($field['description']) ? $field['description'] : '',
		'locale' => $locale,
	])
@elseif ($field['form_field'] == 'select')
	@include('admin/components/form-fields/select', [
		'label' => ucwords(str_replace(['_id', '_'], ['', ' '], $field['name'])),
		'name' => $field['name'],
		'options' => $extra_variables[$field['form_field_additionals_1']],
		'store_column' => 'id',
		'display_column' => $field['form_field_additionals_2'],
        'value' => $value,
        'required' => $field['nullable'] ? false : true,
        'description' => isset($field['description']) ? $field['description'] : '',
		'locale' => $locale,
	])
@elseif ($field['form_field'] == 'select multiple')
	@include('admin/components/form-fields/select-multiple', [
		'label' => ucwords(str_replace(['_id', '_'], ['', ' '], $field['name'])),
		'name' => $field['name'],
		'options' => $extra_variables[$field['form_field_additionals_1']],
		'store_column' => 'id',
		'display_column' => $field['form_field_additionals_2'],
        'value' => isset($row) ? ($locale ? $row->translate($locale)[str_replace(['_id'], [''], $field['name'])] : $row[str_replace(['_id'], [''], $field['name'])]) : '',
        'required' => $field['nullable'] ? false : true,
        'description' => isset($field['description']) ? $field['description'] : '',
		'locale' => $locale,
	])
@elseif ($field['form_field'] == 'file')
	@include('admin/components/form-fields/file', [
		'label' => ucwords(str_replace('_', ' ', $field['name'])),
		'name' => $field['name'],
        'value' => $value,
        'required' => $field['nullable'] ? false : true,
        'description' => isset($field['description']) ? $field['description'] : '',
		'locale' => $locale,
	])
@elseif ($field['form_field'] == 'image')
	@include('admin/components/form-fields/image', [
		'label' => ucwords(str_replace('_', ' ', $field['name'])),
		'name' => $field['name'],
        'value' => $value,
        'required' => $field['nullable'] ? false : true,
        'description' => isset($field['description']) ? $field['description'] : '',
		'locale' => $locale,
	])
@elseif ($field['form_field'] == 'multiple images')
	@include('admin/components/form-fields/images', [
		'label' => ucwords(str_replace('_', ' ', $field['name'])),
		'name' => $field['name'],
        'value' => $value,
        'required' => $field['nullable'] ? false : true,
        'description' => isset($field['description']) ? $field['description'] : '',
		'locale' => $locale,
	])
@elseif ($field['form_field'] == 'slug')
    @if (!isset($row) || (isset($row) && $field['form_field_additionals_2']))
    	@include('admin/components/form-fields/input', [
    		'label' => ucwords(str_replace('_', ' ', $field['name'])),
    		'name' => $field['name'],
    		'slug_origin' => $field['form_field_additionals_1'],
    		'type' => 'text',
            'value' => $value,
            'required' => $field['nullable'] ? false : true,
            'description' => isset($field['description']) ? $field['description'] : '',
    		'locale' => $locale,
    	])
	@endif
@elseif ($field['form_field'] == 'date')
	@include('admin/components/form-fields/date', [
		'label' => ucwords(str_replace('_', ' ', $field['name'])),
		'name' => $field['name'],
        'value' => $value,
        'required' => $field['nullable'] ? false : true,
        'description' => isset($field['description']) ? $field['description'] : '',
		'locale' => $locale,
	])
@elseif ($field['form_field'] == 'time')
	@include('admin/components/form-fields/time', [
		'label' => ucwords(str_replace('_', ' ', $field['name'])),
		'name' => $field['name'],
        'value' => $value,
        'required' => $field['nullable'] ? false : true,
        'description' => isset($field['description']) ? $field['description'] : '',
		'locale' => $locale,
	])
@elseif ($field['form_field'] == 'password')
	@include('admin/components/form-fields/input', [
		'label' => ucwords(str_replace('_', ' ', $field['name'])),
		'name' => $field['name'],
		'type' => 'password',
        'value' => '',
        'required' => $field['nullable'] ? false : true,
        'description' => isset($field['description']) ? $field['description'] : '',
		'locale' => $locale,
	])
@elseif ($field['form_field'] == 'password with confirmation')
	@include('admin/components/form-fields/password-with-confirmation', [
		'label' => ucwords(str_replace('_', ' ', $field['name'])),
		'name' => $field['name'],
        'value' => '',
        'required' => $field['nullable'] ? false : true,
        'description' => isset($field['description']) ? $field['description'] : '',
		'locale' => $locale,
	])
@elseif ($field['form_field'] == 'checkbox')
	@include('admin/components/form-fields/checkbox', [
		'label' => ucwords(str_replace('_', ' ', $field['name'])),
		'name' => $field['name'],
        'checked' => $value,
        'required' => $field['nullable'] ? false : true,
        'description' => isset($field['description']) ? $field['description'] : '',
		'locale' => $locale,
	])
@elseif ($field['form_field'] == 'map coordinates')
	@include('admin/components/form-fields/map', [
		'label' => ucwords(str_replace('_', ' ', $field['name'])),
		'name' => $field['name'],
        'value' => $value,
        'required' => $field['nullable'] ? false : true,
        'description' => isset($field['description']) ? $field['description'] : '',
		'locale' => $locale,
	])
@else
	@include('admin/components/form-fields/input', [
		'label' => ucwords(str_replace('_', ' ', $field['name'])),
		'name' => $field['name'],
		'type' => 'text',
        'value' => $value,
        'required' => $field['nullable'] ? false : true,
        'description' => isset($field['description']) ? $field['description'] : '',
		'locale' => $locale,
	])
@endif
