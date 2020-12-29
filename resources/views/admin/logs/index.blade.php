@extends('admin/layouts/main')

@section('dashboard-content')

	<div class="card py-4 px-4 mx-2 w-100">
		<div class="datatable-wrapper w-100">
			<table class="datatable w-100">
				<thead>
					<tr>
						<th>#</th>
						<th>Admin</th>
						<th>CMS Page</th>
						<th>Record #</th>
						<th>Action</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					@foreach($rows as $row)
						<tr>
							<td>{{ $row->id }}</td>
							<td>{{ $row->admin->email }}</td>
							<td>{{ $row->page->route }}</td>
							<td>{{ $row->record_id }}</td>
							<td>{{ $row->action }}</td>
							<td>{{ $row->created_at }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection