@extends('admin/layouts/main')

@section('dashboard-content')

<div class="card py-4 px-4 mx-2 w-100">
					<form class="col-12" method="post" action="{{ isset($cms_page) ? url('admin' . '/cms-pages/custom/' . $cms_page['id']) : url('admin' . '/cms-pages/custom') }}">
							<p class="font-weight-bold text-uppercase mb-4">{{ isset($cms_page) ? 'Edit Custom CMS page #' . $cms_page['id'] : 'Add Custom CMS page' }}</p>

							@if (isset($cms_page))
								@method('put')
							@endif

							@if ($errors->any())
								<div class="alert alert-danger">
									@foreach ($errors->all() as $error)
										<p class="m-0">{{ $error }}</p>
									@endforeach
								</div>
							@endif

							@include('admin/components/form-fields/input', [
								'label' => 'Display name plural',
								'name' => 'display_name_plural',
								'type' => 'text',
								'value' => isset($cms_page) ? $cms_page['display_name_plural'] : '',
								'locale' => null
							])
							@include('admin/components/form-fields/input', [
								'label' => 'Route',
								'name' => 'route',
								'type' => 'text',
								'slug_origin' => 'display_name_plural',
								'value' => isset($cms_page) ? $cms_page['route'] : '',
								'locale' => null
							])
							@include('admin/components/form-fields/input', [
								'label' => 'Icon',
								'name' => 'icon',
								'type' => 'text',
								'value' => isset($cms_page) ? $cms_page['icon'] : '',
								'locale' => null
							])

							<div class="text-right">
								@csrf
								<button type="submit" class="btn btn-sm btn-primary">Submit</button>
							</div>
					</form>
						</div>
@endsection