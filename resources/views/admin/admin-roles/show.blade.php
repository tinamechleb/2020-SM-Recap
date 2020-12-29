@extends('admin/layouts/main')

@section('dashboard-content')

	<div class="card py-4 px-4 mx-2 w-100">

		<div class="row">
			<div class="col-lg-6">
				<p class="font-weight-bold text-uppercase mb-4">Show admin role #{{ $row['id'] }}</p>
			</div>
			<div class="col-lg-6 text-right">
				<div class="actions p-0">
					@if (request()->get('admin')['cms_pages']['admin-roles']['permissions']['edit'])
						<a href="{{ url('admin' . '/admin-roles/' . $row['id'] . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
					@endif
					@if (request()->get('admin')['cms_pages']['admin-roles']['permissions']['delete'])
						<form class="d-inline" onsubmit="return confirm('Are you sure?')" method="post" action="{{ url('admin' . '/admin-roles/' . $row['id']) }}">
							@csrf
							<input type="hidden" name="_method" value="DELETE">
							<button class="btn btn-danger btn-sm">Delete</button>
						</form>
					@endif
				</div>
			</div>
		</div>

		<div>
			<p><span class="font-weight-bold">Title:</span> {{ $row->title }}</p>
		</div>
		<table class="w-100">
			<thead>
				<tr>
					<th class="text-center">Page</th>
					<th class="text-center">Can Browse</th>
					<th class="text-center">Can Read</th>
					<th class="text-center">Can Edit</th>
					<th class="text-center">Can Add</th>
					<th class="text-center">Can Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($admin_role_permissions as $permission)
					<tr>
						<td class="text-center">{{ $permission->page->display_name }}</td>
						<td class="text-center"><i class="fa fa-{{ $permission->browse ? 'check' : 'times' }}" aria-hidden="true"></i></td>
						<td class="text-center"><i class="fa fa-{{ $permission->read ? 'check' : 'times' }}" aria-hidden="true"></i></td>
						<td class="text-center"><i class="fa fa-{{ $permission->edit ? 'check' : 'times' }}" aria-hidden="true"></i></td>
						<td class="text-center"><i class="fa fa-{{ $permission->add ? 'check' : 'times' }}" aria-hidden="true"></i></td>
						<td class="text-center"><i class="fa fa-{{ $permission->delete ? 'check' : 'times' }}" aria-hidden="true"></i></td>
					</tr>
				@endforeach
			</tbody>
		</table>

	</div>

@endsection