@extends('admin/layouts/main')

@section('dashboard-content')

	<div class="card py-4 px-4 mx-2 w-100">
		<div class="actions">
			@if ($page['add'])
				@if (request()->get('admin')['cms_pages'][$page['route']]['permissions']['add'])
					<a href="{{ url('admin' . '/' . $page['route'] . '/create') }}" class="btn btn-primary btn-sm col-12 col-md-1">Add</a>
				@endif
			@endif
			@if ($page['order_display'])
				<a href="{{ url('admin' . '/' . $page['route'] . '/order') }}" class="btn btn-secondary btn-sm col-12 col-md-1">Order</a>
			@endif
			@if ($page['delete'])
				@if (request()->get('admin')['cms_pages'][$page['route']]['permissions']['delete'])
					<form method="post" action="{{ url('admin' . '/' . $page['route'] . '/') }}" class="d-block d-md-inline-block bulk-delete" onsubmit="return confirm('Are you sure?')">
						@csrf
						<input type="hidden" name="_method" value="DELETE">
						<button type="submit" class="btn btn-danger btn-sm w-100">Bulk Delete</button>
					</form>
				@endif
			@endif
		</div>
		<div class="datatable-wrapper w-100 pt-3">
			<table class="{{ $page['server_side_pagination'] ? 'table' : 'datatable' }} {{ $page['with_export'] ? '' : 'no-export' }} w-100">
				<thead>
					<tr>
						<th></th>
						<th>#</th>
						@foreach($page_fields as $field)
							@if ($field['form_field'] == 'password' || $field['form_field'] == 'password with confirmation') @continue
							@else
								<th>{{ str_replace(['_id', '_'], ['', ' '], $field['name']) }}</th>
							@endif
						@endforeach
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($rows as $row)
						<tr>
							<td>
								<label class="checkbox-wrapper delete-checkbox">
									<input type="checkbox" value="{{ $row['id'] }}">
									<div></div>
								</label>
							</td>
							<td>
								{{ $row['id'] }}
							</td>
							@foreach($page_fields as $field)
								@if ($field['form_field'] == 'password' || $field['form_field'] == 'password with confirmation') @continue

								@elseif ($field['form_field'] == 'image')
									<td>
										@if ($row[$field['name']])
											<img src="{{ asset($row[$field['name']]) }}" class="img-thumbnail-css">
										@endif
									</td>
								@elseif ($field['form_field'] == 'multiple images')
									<td>
                                        @if ($row[$field['name']])
                                            @php
                                                $files = json_decode($row[$field['name']]);
                                            @endphp
                                            @foreach ($files as $file)
											    <img src="{{ asset($file) }}" class="img-thumbnail-css multiple-image">
                                            @endforeach
										@endif
									</td>
								@elseif ($field['form_field'] == 'file')
									<td>
										@if ($row[$field['name']])
											<a href="{{ asset($row[$field['name']]) }}" target="_blank"><i class="fa fa-file" aria-hidden="true"></i></a>
										@endif
									</td>
								@elseif ($field['form_field'] == 'icon')
									<td>
										<i class="text-center mr-2 fa {{ $row[$field['name']] }}" aria-hidden="true"></i>
									</td>
								@elseif ($field['form_field'] == 'color')
									<td>
										<div style="width: 55px;height: 20px;background-color: {{ $row[$field['name']] }};"></div>
									</td>
								@elseif ($field['form_field'] == 'textarea')
									<td>
										<div class="max-lines">{{ $row[$field['name']] }}</div>
									</td>
								@elseif ($field['form_field'] == 'rich-textbox')
									<td>
										<div class="max-lines">{{ strip_tags($row[$field['name']]) }}</div>
									</td>
								@elseif ($field['form_field'] == 'select')
									<td>
										@if ($row[str_replace('_id', '', $field['name'])])
											{{ strip_tags($row[str_replace('_id', '', $field['name'])][$field['form_field_additionals_2']]) }}
										@endif
									</td>
								@elseif ($field['form_field'] == 'select multiple')
									<td>
										@foreach($row[str_replace('_id', '', $field['name'])] as $i => $pivot)
											{{ $i ? ', ' : '' }}
											{{ $pivot[$field['form_field_additionals_2']] }}
										@endforeach
									</td>
								@elseif ($field['form_field'] == 'checkbox')
									<td>
										@if ($row[$field['name']])
											<i class="fa fa-check" aria-hidden="true"></i>
										@else
											<i class="fa fa-times" aria-hidden="true"></i>
										@endif
									</td>
								@elseif ($field['form_field'] == 'time')
									<td>
										{{ date('h:i A', strtotime($row[$field['name']])) }}
									</td>
								@elseif ($field['form_field'] == 'map coordinates')
									<td>
										<a target="_blank" href="https://www.google.com/maps/search/?api=1&query={{ $row[$field['name']] }}"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
									</td>
								@else
									<td>{{ $row[$field['name']] }}</td>
								@endif
							@endforeach
							<td class="actions-wrapper text-right">
								@if ($page['show'])
									@if (request()->get('admin')['cms_pages'][$page['route']]['permissions']['read'])
										<a href="{{ url('admin' . '/' . $page['route'] . '/' . $row['id']) }}" class="mb-2 btn btn-secondary btn-sm">View</a>
									@endif
								@endif
								@if ($page['edit'])
									@if (request()->get('admin')['cms_pages'][$page['route']]['permissions']['edit'])
										<a href="{{ url('admin' . '/' . $page['route'] . '/' . $row['id'] . '/edit') }}" class="mb-2 btn btn-primary btn-sm">Edit</a>
									@endif
								@endif
								@if ($page['delete'])
									@if (request()->get('admin')['cms_pages'][$page['route']]['permissions']['delete'])
										<form class="row-delete d-inline-block" method="post" action="{{ url('admin' . '/' . $page['route'] .  '/' . $row['id']) }}" onsubmit="return confirm('Are you sure?')">
											@csrf
											<input type="hidden" name="_method" value="DELETE">
											<button class="mb-2 btn btn-danger btn-sm">Delete</button>
										</form>
									@endif
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			{{ $page['server_side_pagination'] ? $rows->links() : '' }}

		</div>
	</div>

@endsection
