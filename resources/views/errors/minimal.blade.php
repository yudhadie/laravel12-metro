<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('admin.templates.partials.head')
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
        @include('admin.templates.partials.theme')
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<style>
                body { background-image: url({{ asset('assets/media/bg/bg1.jpg') }}); } [data-bs-theme="dark"]
                body { background-image: url({{ asset('assets/media/bg/bg1-dark.jpg') }}); }
            </style>
			<div class="d-flex flex-column flex-center flex-column-fluid">
				<div class="d-flex flex-column flex-center text-center p-10">
					<div class="card card-flush w-lg-650px py-5">
						<div class="card-body py-15 py-lg-20">
							<h1 class="fw-bolder fs-2hx text-gray-900 mb-4">@yield('code')</h1>
							<div class="fw-semibold fs-6 text-gray-500 mb-7">@yield('message')</div>

							<div class="mb-3">
								<img src="{{ asset('assets/media/graphics/error-dark.png') }}" class="mw-100 mh-300px theme-light-show" alt="" />
								<img src="{{ asset('assets/media/graphics/error.png') }}" class="mw-100 mh-300px theme-dark-show" alt="" />
							</div>
							<div class="mb-0">
								<a href="/" class="btn btn-sm btn-primary">Return Home</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>>
		</div>

        @include('admin.templates.partials.scrolltop')
        @include('admin.templates.partials.script')
	</body>
</html>



