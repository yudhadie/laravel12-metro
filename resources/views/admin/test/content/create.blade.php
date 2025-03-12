@extends('admin.templates.default')

@section('content')

    <x-admin.card.default>
        <form id="modal_form_form" action="{{ route('test-content.store') }}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="d-flex flex-column fv-row mt-5">
                <div class="row">
                    <x-admin.form.input class="col-6 mb-5" label="Nama" name="name" type="text" value="" required />
                    <x-admin.form.input class="col-7 mb-5" label="Gallery" name="gallery[]" type="file" value="" accept=".jpg,.jpeg,.png" multiple />
                    <x-admin.form.label class="col-12 mb-5" label="Deskripsi">
                        <textarea name="desc" id="editor" class="tox-target"></textarea>
                    </x-admin.form.label>
                    <x-admin.card.footer>
                        <x-admin.button.back href="{{route('test-content.index')}}"/>
                        <x-admin.button.save />
                    </x-admin.card.footer>
                </div>
            </div>
        </form>
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
