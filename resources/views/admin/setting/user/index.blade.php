@extends('admin.templates.default')

@section('content')

    <x-admin.card.default>
        <x-admin.content.table-api>
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th>No</th>
                    <th class="min-w-125px">Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </x-admin.content.table-api>
    </x-admin.default>

    <x-admin.modal.create :title="$title" action="{{ route('user.store') }}" enctype="multipart/form-data">
        <x-admin.form.input class="col-12 mb-5" label="Username" name="username" type="text" value="" required />
        <x-admin.form.input class="col-12 mb-5" label="Nama" name="name" type="text" value="" required />
        <x-admin.form.input class="col-6 mb-5" label="Email" name="email" type="text" value="" required />
        <x-admin.form.input class="col-6 mb-5" label="Password" name="password" type="password" value="" required />
        <x-admin.form.select-manual class="col-6 mb-5" label="Role" name="role" value="" collection='' data-dropdown-parent="#modal_add" required>
            <option value=""></option>
            <option value="admin">admin</option>
            <option value="user">user</option>
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

    <x-admin.menu.show menu="menu-setting"/>
    <x-admin.menu.active menu="menu-setting-user"/>
    <x-admin.alert.delete/>
    <x-admin.script.table>
        ajax: '{{ route('user.data') }}',
        columns: [
            {data:'DT_RowIndex', orderable: false, searchable: false},
            {data:'name'},
            {data:'email'},
            {data:'role'},
            {data:'active'},
            {data:'id', responsivePriority: -1},
        ],
        columnDefs: [
            {
                targets: 0,
                className: 'dt-center',
                width: '40px',
            },
            {
                targets: [3],
                className: 'dt-center',
            },
            {
                targets: -2,
                className: 'dt-center',
                render: function(data, type, row) {
                    return data == 1
                        ? `<span class="text-success">Active</span>`
                        : `<span class="text-danger">Disabled</span>`;
                }
            },
            {
                targets: -1,
                className: 'dt-center',
                render: function(data, type, row) {
                    return `
                        <x-admin.button.icon type="edit" href="{{ route('user.index') }}/${data}/edit" />
                        <x-admin.button.icon type="delete" href="{{ route('user.index') }}/${data}" id="btn-delete" data-id="${row.id}" />
                    `;
                }
            },
        ],
    </x-admin.script.table>
    <x-admin.script.validation>
        fields: {
            'username': {validators: {notEmpty: {message: 'Silahkan isi username!'}}},
            'name': {validators: {notEmpty: {message: 'Silahkan isi nama!'}}},
            'email': {validators: {
                notEmpty: {message: 'Silahkan isi dengan format email!'},
                emailAddress: {message: 'Silahkan masukkan format email yang benar!'}
            }},
            'password': {validators: {notEmpty: {message: 'Silahkan isi password!'}}},
            'role': {validators: {notEmpty: {message: 'Silahkan pilih satu!'}}},
        },
    </x-admin.script.validation>

@endpush
