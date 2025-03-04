@extends('admin.templates.default')

@section('content')

    <x-admin.card.default>
        <x-admin.form.edit action="{{ route('user.update',$data) }}" enctype="multipart/form-data">
            <x-admin.form.input-right label="Username" name="username" type="text" value="{{ $data->username }}" disabled />
            <x-admin.form.input-right label="Nama" name="name" type="text" value="{{ $data->name }}" required />
            <x-admin.form.input-right label="Email" name="email" type="email" value="{{ $data->email }}" required />
            <x-admin.form.select-right label="Role" name="role" value="{{$data->role}}" collection='' required>
                <option value="admin" @selected($data->role == 'admin')>admin</option>
                <option value="user" @selected($data->role == 'user')>user</option>
            </x-admin.form.select-right>
            <x-admin.form.select-right label="Status" name="active" value="{{$data->active}}" collection='' required>
                <option value="1" @selected($data->active == 1)>Active</option>
                <option value="2" @selected($data->active == 2)>Non Active</option>
            </x-admin.form.select-right>
            <x-admin.form.input-right label="Reset Password" name="password" type="password" value=""/>
            <x-admin.form.input-right label="Photo Profile" name="photo" type="file" value="{{ $data->photo }}" accept=".jpeg,.jpg,.png">
                @if (!empty($data->photo))
                    <img class="mw-100 mh-300px card-rounded mb-2" src="{{ asset($data->photo) }}"/>
                    <div class="mt-1">
                        <button class="btn btn-danger btn-sm mb-2" href="{{ route('delete-photo-user',$data->id) }}" id="delete" >
                            Delete
                        </button>
                    </div>
                @endif
            </x-admin.form.input-right>

            <x-admin.card.footer>
                <x-admin.button.back href="{{route('user.index')}}"/>
                <x-admin.button.save />
            </x-admin.card.footer>
        </x-admin.form.edit>
    </x-admin.card.default>

    <x-admin.form.delete-photo :item='$data->id'/>

@endsection


@section('styles')

@endsection

@push('scripts')

    <x-admin.menu.show menu="menu-setting"/>
    <x-admin.menu.active menu="menu-setting-user"/>
    <x-admin.alert.delete-photo/>
    <x-admin.script.validation>
        fields: {
            'name': {validators: {notEmpty: {message: 'Silahkan isi nama!'}}},
            'email': {validators: {
                notEmpty: {message: 'Silahkan isi dengan format email!'},
                emailAddress: {message: 'Silahkan masukkan format email yang benar!'}
            }},
            'current_team_id': {validators: {notEmpty: {message: 'Silahkan pilih Role!'}}},
            'active': {validators: {notEmpty: {message: 'Silahkan pilih status!'}}},
        },
    </x-admin.script.validation>

@endpush
