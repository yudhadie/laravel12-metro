@extends('admin.templates.default')

@section('content')

    <x-admin.card.default>
        <x-admin.form.edit action="{{ route('test-standart.update',$data) }}" >
            <x-admin.form.input class="col-12 mb-5" label="Nama" name="name" type="text" value="{{$data->name}}" disabled />
            <x-admin.form.input class="col-6 mb-5" label="Number" name="number" type="number" value="{{$data->number}}" disabled />
            <x-admin.form.select-manual class="col-6 mb-5" label="Select" name="select" value="" collection='' disabled>
                <option value=""></option>
                <option value="yes" {{ $data->select == 'yes' ? 'selected' : '' }}>yes</option>
                <option value="no" {{ $data->select == 'no' ? 'selected' : '' }}>no</option>
            </x-admin.form.select-manual>
            <x-admin.card.footer>
                <x-admin.button.back href="{{route('test-standart.index')}}"/>
            </x-admin.card.footer>
        </x-admin.form.edit>
    </x-admin.card.default>

@endsection

@section('head_button')

    <x-admin.content.header-button>
        <a href="{{route('test-standart.edit',$data)}}" class="btn btn-sm fw-bold btn-warning">Edit</a>
    </x-admin.content.header-button>

@endsection

@section('styles')
@endsection

@push('scripts')

    <x-admin.menu.show menu="menu-test"/>
    <x-admin.menu.active menu="menu-test-standart"/>

@endpush
