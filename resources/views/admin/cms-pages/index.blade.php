@extends('admin/layouts/main')

@section('dashboard-content')
					<div class="card py-4 px-4 mx-2 w-100">
						<div class="actions">
							<a href="{{ url('admin' . '/cms-pages/create') }}" class="btn btn-primary btn-sm col-12 col-md-2 col-lg-1">Add</a>
							<a href="{{ url('admin' . '/cms-pages/order') }}" class="btn btn-secondary btn-sm col-12 col-md-2 col-lg-1">Order</a>
							<form method="post" action="{{ url('admin' . '/cms-pages/') }}" class="d-block d-md-inline-block bulk-delete" onsubmit="return confirm('Are you sure?')">
								@csrf
								<input type="hidden" name="_method" value="DELETE">
								<button type="submit" class="btn btn-danger btn-sm col-12">Bulk Delete</button>
							</form>
							<a href="{{ url('admin' . '/cms-pages/create/custom') }}" class="btn btn-primary btn-sm float-right mr-0 px-3 col-12 col-md-3">Add Custom Page</a>
						</div>
						<div class="datatable-wrapper pt-3">
							<table class="datatable no-export w-100">
								<thead>
									<tr>
										<th></th>
										<th>Name</th>
										<th>Name Plural</th>
										<th>Database</th>
										<th>Route</th>
										<th>Model</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach($rows as $row)
										<tr>
											<td>
												@if ($row['deletable'])
													<label class="checkbox-wrapper delete-checkbox">
														<input type="checkbox" value="{{ $row['id'] }}">
														<div></div>
													</label>
												@endif
											</td>
											<td>{{ $row['display_name'] }}</td>
											<td>{{ $row['display_name_plural'] }}</td>
											<td>{{ $row['database_table'] }}</td>
											<td>{{ $row['route'] }}</td>
											<td>{{ $row['model_name'] }}</td>
											<td class="actions-wrapper text-right">
												<a href="{{ url('admin' . '/cms-pages/' . ($row['custom_page'] ? 'custom/' : '') . $row['id'] . '/edit') }}" class="mb-2 btn btn-primary waves-effect width-xs waves-light">Edit</a>
												@if (!in_array($row['id'], [1,2,3,4]))
													<form class="d-inline" onsubmit="return confirm('Are you sure?')" action="{{ url('admin' . '/cms-pages/' . $row['id']) }}" method="POST">
														@csrf
														@method('DELETE')
														<button type="submit" class="mb-2 btn btn-danger waves-effect width-xs waves-light">Delete</button>
													</form>
												@endif
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>

@endsection