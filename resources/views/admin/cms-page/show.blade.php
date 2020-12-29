@extends('admin/layouts/main')

@section('dashboard-content')

	<div class="card py-4 px-4 mx-2 w-100">

		<div class="row">
			<div class="col-lg-6">
				<p class="font-weight-bold text-uppercase mb-4">Show {{ $page['display_name'] }} #{{ $row['id'] }}</p>
			</div>
			<div class="col-lg-6 text-right">
				<div class="actions p-0">
					@if ($page['edit'])
						@if (request()->get('admin')['cms_pages'][$page['route']]['permissions']['edit'])
							<a href="{{ url('admin' . '/' . $page['route'] . '/' . $row['id'] . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
						@endif
					@endif
					@if ($page['delete'])
						@if (request()->get('admin')['cms_pages'][$page['route']]['permissions']['delete'])
							<form class="d-inline" onsubmit="return confirm('Are you sure?')" method="post" action="{{ url('admin' . '/' . $page['route'] . '/' . $row['id']) }}">
								@csrf
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-danger btn-sm">Delete</button>
							</form>
						@endif
					@endif
				</div>
			</div>
		</div>

		@foreach ($page_fields as $field)
			@if ($field['form_field'] == 'password' || $field['form_field'] == 'password with confirmation') @continue

			@elseif ($field['form_field'] == 'image')
				@include('admin/components/show-fields/image', ['label' => ucwords(str_replace('_', ' ', $field['name'])), 'image' => $row[$field['name']] ])
			@elseif ($field['form_field'] == 'file')
				@include('admin/components/show-fields/file', ['label' => ucwords(str_replace('_', ' ', $field['name'])), 'file' => $row[$field['name']] ])
			@elseif ($field['form_field'] == 'files')
				@include('admin/components/show-fields/files', ['label' => ucwords(str_replace('_', ' ', $field['name'])), 'files' => $row[$field['name']] ])
            @elseif ($field['form_field'] == 'select')
                @if ($row[str_replace('_id', '', $field['name'])])
                    @include('admin/components/show-fields/text', ['label' => ucwords(str_replace(['_id', '_'], ['', ' '], $field['name'])), 'text' => $row[str_replace('_id', '', $field['name'])][$field['form_field_additionals_2']] ])
                @endif
			@elseif ($field['form_field'] == 'select multiple')
				@include('admin/components/show-fields/text-multiple', ['label' => ucwords(str_replace(['_id', '_'], ['', ' '], $field['name'])), 'texts' => $row[$field['name']], 'display_column' => $field['form_field_additionals_2'] ])
			@elseif ($field['form_field'] == 'checkbox')
				@include('admin/components/show-fields/boolean', ['label' => ucwords(str_replace('_', ' ', $field['name'])), 'value' => $row[$field['name']] ])
			@elseif ($field['form_field'] == 'map coordinates')
				@include('admin/components/show-fields/map', ['label' => ucwords(str_replace('_', ' ', $field['name'])), 'name' => $field['name'], 'value' => $row[$field['name']] ])
			@elseif ($field['form_field'] == 'icon')
				@include('admin/components/show-fields/icon', ['label' => ucwords(str_replace('_', ' ', $field['name'])), 'name' => $field['name'], 'value' => $row[$field['name']] ])
			@elseif ($field['form_field'] == 'color')
				@include('admin/components/show-fields/color', ['label' => ucwords(str_replace('_', ' ', $field['name'])), 'name' => $field['name'], 'value' => $row[$field['name']] ])
			@else
				@include('admin/components/show-fields/text', ['label' => ucwords(str_replace('_', ' ', $field['name'])), 'text' => $row[$field['name']] ])
			@endif
		@endforeach

		@foreach ($translatable_fields as $field)

		@endforeach

	</div>

@endsection