@extends('admin/layouts/main')

@section('dashboard-content')

	<form method="post" action="{{ url('admin' . '/admins/' . $row['id']) }}" enctype="multipart/form-data">

		<div class="card p-4 mx-2 mx-sm-5">

			<p class="font-weight-bold text-uppercase mb-4">Edit admin #{{ $row['id'] }}</p>

			@if ($errors->any())
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
						<p class="m-0">{{ $error }}</p>
					@endforeach
				</div>
			@endif

			@csrf

			@method('PUT')

			@include('admin/components/form-fields/input', ['label' => 'Name', 'name' => 'name', 'type' => 'text', 'value' => $row->name, 'locale' => null ])
			@include('admin/components/form-fields/file', ['label' => 'Image', 'name' => 'image', 'value' => $row->image, 'locale' => null ])
			@include('admin/components/form-fields/input', ['label' => 'Email', 'name' => 'email', 'type' => 'text', 'value' => $row->email, 'locale' => null ])
			@include('admin/components/form-fields/password-with-confirmation', ['label' => 'Password', 'name' => 'password', 'locale' => null ])
			@include('admin/components/form-fields/select', ['label' => 'Role', 'name' => 'admin_role_id', 'options' => $admin_roles, 'store_column' => 'id', 'display_column' => 'title', 'value' => $row->admin_role_id, 'locale' => null ])

			<div class="text-right">
				<button type="submit" class="btn btn-sm btn-primary py-2 px-4">Submit</button>
			</div>

		</div>

	</form>

@endsection