@extends('admin.templates.default')

@section('content')
    <x-admin.card.default>
        <x-admin.content.table-api>
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th>No</th>
                    <th class="min-w-125px">Name</th>
                    <th>Number</th>
                    <th>Select</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </x-admin.content.table-api>
    </x-admin.card.default>
    <x-admin.modal.create :title="$title" action="{{ route('test-standart.store') }}">
        <x-admin.form.input class="col-12 mb-5" label="Nama" name="name" type="text" value="" required />
        <x-admin.form.input class="col-6 mb-5" label="Number" name="number" type="number" value="" required />
        <x-admin.form.select-manual class="col-6 mb-5" label="Select" name="select" value="" collection=''
            data-dropdown-parent="#modal_add">
            <option value=""></option>
            <option value="yes">yes</option>
            <option value="no">no</option>
        </x-admin.form.select-manual>
    </x-admin.modal.create>

    <x-admin.form.delete />
@endsection

@section('head_button')
    <x-admin.content.header-button>
        <x-admin.button.modal-create />
    </x-admin.content.header-button>
@endsection

@section('styles')
@endsection

@push('scripts')
    <x-admin.menu.show menu="menu-test" />
    <x-admin.menu.active menu="menu-test-standart" />

    <x-admin.alert.delete />
    <!-- prettier-ignore-start -->
    <x-admin.script.table>
        ajax: '{{ route('test.data') }}',
        columns: [
            {data:'DT_RowIndex', orderable: false, searchable: false},
            {data:'name'},
            {data:'number'},
            {data:'select'},
            {data:'id', responsivePriority: -1},
        ],
        columnDefs: [
            {
                targets: 0,
                className: 'dt-center',
                width: '40px',
            },
            {
                targets: 2,
                className: 'dt-center',
            },
            {
                targets: -2,
                className: 'dt-center',
                render: function(data, type, row) {
                    if (data == 'yes') {
                        return `<span class="text-success">${data}</span>`;
                    } else {
                        return `<span class="text-danger">${data}</span>`;
                    }
                }
            },
            {
                targets: -1,
                className: 'dt-center',
                render: function(data, type, row) {
                    return `
                        <x-admin.button.icon href="{{route('test-standart.index')}}/${data}" type="show" />
                        <x-admin.button.icon href="{{route('test-standart.index')}}/${data}" type="delete" id="btn-delete" data-id="${row.id}" />`;
                }
            },
        ],
    </x-admin.script.table>
    <x-admin.script.validation>
        fields: {
            'name': {validators: {notEmpty: {message: 'Silahkan isi nama!'}}},
            'number': {validators: {notEmpty: {message: 'Silahkan isi number!'}}},
        },
    </x-admin.script.validation>
    <!-- prettier-ignore-end -->
@endpush
