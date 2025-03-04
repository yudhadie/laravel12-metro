@extends('admin.templates.default')

@section('content')

    <x-admin.card.default>
        <x-admin.form.edit action="{{ route('user.update',$data->id) }}" enctype="multipart/form-data">
            <x-admin.form.input-right label="Nama" name="name" type="text" value="{{ $data->name }}" required />
            <x-admin.form.input-right label="Email" name="email" type="email" value="{{ $data->email }}" required />
            <x-admin.form.input-right label="Reset Password" name="password" type="password" value=""/>
            <x-admin.form.input-right label="Photo Profile" name="photo" type="file" value="{{ $data->photo }}" accept=".jpeg,.jpg,.png">
                @if ($data->photo != null)
                    <img class="mw-100 mh-300px card-rounded mb-2" src="{{ asset($data->photo) }}"/>
                    @isset($data->photo)
                        <div class="mt-1">
                            <button class="btn btn-danger btn-sm mb-2" href="{{ route('delete-photo-user',$data->id) }}" id="delete" >
                                Delete
                            </button>
                        </div>
                    @endisset
                @endif
            </x-admin.form.input-right>
            <x-admin.card.footer>
                <x-admin.button.back href="{{route('dashboard')}}"/>
                <x-admin.button.save />
            </x-admin.card.footer>
        </x-admin.form.edit>
    </x-admin.card.default>

    {{-- <x-admin.form.delete-photo :item='$data->id'/> --}}

@endsection


@section('styles')

@endsection

@push('scripts')

    <x-admin.menu.active menu="menu-dashboard"/>
    <x-admin.alert.delete-photo/>
    <x-admin.script.validation>
        fields: {
            'name': {
                validators: {
                    notEmpty: {
                        message: 'Silahkan isi nama!'
                    }
                }
            },
            'email': {
                validators: {
                    notEmpty: {
                        message: 'Silahkan isi dengan format email!'
                    }
                }
            },
            'current_team_id': {
                validators: {
                    notEmpty: {
                        message: 'Silahkan pilih Role!'
                    }
                }
            },
            'active': {
                validators: {
                    notEmpty: {
                        message: 'Silahkan pilih status!'
                    }
                }
            },
        },
    </x-admin.script.validation>

@endpush
