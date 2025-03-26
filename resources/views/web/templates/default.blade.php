<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('web.templates.partials.head')

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
    class="app-default">
    @include('web.templates.partials.theme')
    @include('web.templates.partials.header')

    @yield('content')

    @include('web.templates.partials.footer')
    @include('web.templates.partials.scrolltop')
    @include('web.templates.partials.script')
</body>

</html>
