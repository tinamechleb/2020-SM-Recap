@extends('admin/layouts/main')

@section('dashboard-content')

<div class="card py-4 px-4 mx-2 w-100">
	<form method="post" class="w-100" action="{{ url('admin' . '/admins') }}" enctype="multipart/form-data" ajax>
		<p class="font-weight-bold text-uppercase mb-4">Add admin</p>

		@if ($errors->any())
			<div class="alert alert-danger">
				@foreach ($errors->all() as $error)
					<p class="m-0">{{ $error }}</p>
				@endforeach
			</div>
		@endif

		@csrf

		@include('admin/components/form-fields/input', ['label' => 'Name', 'name' => 'name', 'type' => 'text', 'value' => '', 'locale' => null ])
		@include('admin/components/form-fields/image', ['label' => 'Image', 'name' => 'image', 'locale' => null ])
		@include('admin/components/form-fields/input', ['label' => 'Email', 'name' => 'email', 'type' => 'text', 'value' => '', 'locale' => null ])
		@include('admin/components/form-fields/password-with-confirmation', ['label' => 'Password', 'name' => 'password', 'locale' => null ])
		@include('admin/components/form-fields/select', ['label' => 'Admin Role', 'name' => 'admin_role_id', 'options' => $admin_roles, 'store_column' => 'id', 'display_column' => 'title', 'value' => '', 'locale' => null ])

		<div class="text-right">
			<button type="submit" class="btn btn-sm btn-primary py-2 px-4">Submit</button>
		</div>


	</form>
</div>

@endsection