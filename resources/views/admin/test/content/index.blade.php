@extends('admin.templates.default')

@section('content')

    <x-admin.card.default>
        <x-admin.content.table-api>
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th>No</th>
                    <th class="min-w-125px">Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </x-admin.content.table-api>
    </x-admin.default>

@endsection

@section('head_button')

    <x-admin.content.header-button>
        <a href="{{route('test-content.create')}}" class="btn btn-sm fw-bold btn-primary">Create</a>
    </x-admin.content.header-button>

@endsection

@section('styles')
@endsection

@push('scripts')

    <x-admin.menu.show menu="menu-test"/>
    <x-admin.menu.active menu="menu-test-content"/>

    <x-admin.alert.delete/>
    <x-admin.script.table>
        ajax: '{{ route('test.data') }}',
        columns: [
            {data:'DT_RowIndex', orderable: false, searchable: false},
            {data:'name'},
            {data:'id', responsivePriority: -1},
        ],
        columnDefs: [
            {
                targets: 0,
                className: 'dt-center',
                width: '40px',
            },
            {
                targets: -1,
                className: 'dt-center',
                render: function(data, type, row) {
                    return `
                        <a href="{{route('test-content.index')}}/${data}" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" title="Show details">
                            <i class="bi bi-eye"></i>
                        </a>`;
                }
            },
        ],
    </x-admin.script.table>

@endpush
