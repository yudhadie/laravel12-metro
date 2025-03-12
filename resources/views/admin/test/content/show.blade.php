@extends('admin.templates.default')

@section('content')

    <x-admin.card.default>
        <div class="mt-5 mb-5">
            <h2>{{$data->name}}</h2>
            {!! $data->desc !!}
        </div>

        @foreach ($data->gallery as $gallery)
            <img class="mw-100 mh-300px card-rounded mb-2" src="{{ asset($gallery->path) }}"/>
        @endforeach

        <x-admin.card.footer>
            <x-admin.button.back href="{{route('test-content.index')}}"/>
        </x-admin.card.footer>
    </x-admin.card.default>

    <x-admin.form.delete />

@endsection

@section('head_button')

    <x-admin.content.header-button>
        <a href="{{route('test-content.edit',$data)}}" class="btn btn-sm fw-bold btn-warning">Edit</a>
        <button href="{{route('test-content.destroy',$data)}}" class="btn btn-sm fw-bold btn-danger" type="delete" id="btn-delete">Hapus</button>
    </x-admin.content.header-button>

@endsection

@section('styles')
@endsection

@push('scripts')

    <x-admin.menu.show menu="menu-test"/>
    <x-admin.menu.active menu="menu-test-content"/>
    <x-admin.alert.delete/>

@endpush
