@extends('admin.templates.default')

@section('content')

    <x-admin.card.default>
        <x-admin.form.edit action="{{ route('test-content.update',$data) }}" enctype="multipart/form-data" >
            <x-admin.form.input class="col-6 mb-5" label="Nama" name="name" type="text" value="{{$data->name}}" required />
            <x-admin.form.input class="col-7 mb-5" label="Gallery" name="gallery[]" type="file" value="" accept=".jpg,.jpeg,.png" multiple />
            <x-admin.form.label class="col-12 mb-5" label="Deskripsi">
                <textarea name="desc" id="editor" class="tox-target">{{$data->desc}}</textarea>
            </x-admin.form.label>

            <div class="row">
                @foreach ($data->gallery as $gallery)
                    <div class="col text-center">
                        <img class="mw-100 mh-300px card-rounded mb-2" src="{{ asset($gallery->path) }}"/>
                        <br>
                        <button class="btn btn-danger btn-sm mb-2" href="{{ route('media.destroy',$gallery->id) }}" id="delete" >
                            Delete
                        </button>
                    </div>
                @endforeach
            </div>

            <x-admin.card.footer>
                <x-admin.button.back href="{{route('test-content.show',$data)}}"/>
                <x-admin.button.save />
            </x-admin.card.footer>
        </x-admin.form.edit>
    </x-admin.card.default>

    <x-admin.form.delete-media/>

@endsection

@section('styles')
    <script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
@endsection

@push('scripts')

    <x-admin.menu.show menu="menu-test"/>
    <x-admin.menu.active menu="menu-test-content"/>
    <x-admin.alert.delete-media/>
    <x-admin.script.validation>
        fields: {
            'name': {validators: {notEmpty: {message: 'Silahkan isi nama!'}}
            },
        },
    </x-admin.script.validation>
    <script>
        var options = {selector: "#editor", height : "480"};
        tinymce.init(options);
    </script>

@endpush
