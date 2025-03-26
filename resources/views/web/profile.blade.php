@extends('web.templates.default')

@section('content')
    @auth
        <div class="container">
            <ul>
                <li>Username: {{ $data->username }}</li>
                <li>Name: {{ $data->name }}</li>
                <li>Email: {{ $data->email }}</li>
            </ul>
        </div>
    @else
        <div class="text-center">Anda Belum Login</div>
    @endauth
@endsection

@push('scripts')
    <x-admin.menu.active menu="menu-profile" />
@endpush
