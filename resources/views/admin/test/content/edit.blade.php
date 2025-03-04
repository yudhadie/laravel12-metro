@extends('admin.templates.default')

@section('content')

    <x-admin.card.default>
        <x-admin.form.edit action="{{ route('test-content.update',$data) }}" >
            <x-admin.form.input class="col-6 mb-5" label="Nama" name="name" type="text" value="{{$data->name}}" required />
            <x-admin.form.label class="col-12 mb-5" label="Deskripsi">
                <textarea name="desc" id="editor" class="tox-target">{{$data->desc}}</textarea>
            </x-admin.form.label>
            <x-admin.card.footer>
                <x-admin.button.back href="{{route('test-content.show',$data)}}"/>
                <x-admin.button.save />
            </x-admin.card.footer>
        </x-admin.form.edit>
    </x-admin.card.default>

@endsection

@section('styles')
    <script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
@endsection

@push('scripts')

    <x-admin.menu.show menu="menu-test"/>
    <x-admin.menu.active menu="menu-test-content"/>
    <x-admin.script.validation>
        fields: {
            'name': {
                validators: {
                    notEmpty: {
                        message: 'Silahkan isi nama!'
                    }
                }
            },
        },
    </x-admin.script.validation>
    <script>
        var options = {selector: "#editor", height : "480"};
        tinymce.init(options);
    </script>

@endpush
