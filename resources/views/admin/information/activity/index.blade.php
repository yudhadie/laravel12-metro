@extends('admin.templates.default')

@section('content')

    <x-admin.card.default>
        <x-admin.content.table-api>
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th>No</th>
                    <th class="min-w-125px">User</th>
                    <th>Data</th>
                    <th>ID</th>
                    <th>Activity</th>
                    <th>Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </x-admin.content.table-api>
    </x-admin.default>

@endsection

@section('head_button')

@endsection

@section('styles')

@endsection

@push('scripts')

    <x-admin.menu.show menu="menu-info"/>
    <x-admin.menu.active menu="menu-info-activity"/>

    <x-admin.script.table>
        ajax: '{{ route('activity.data') }}',
        columns: [
            {data:'DT_RowIndex', orderable: false, searchable: false},
            {data:'user', name:'user.name',orderable: false},
            {data:'log_name'},
            {data:'subject_id'},
            {data:'event'},
            {data:'time'},
            {data:'id', responsivePriority: -1},
        ],
        columnDefs: [
            {
                targets: 0,
                className: 'dt-center',
                width: '40px',
            },
            {
                targets: [2,3,5],
                className: "dt-center",
            },
            {
                targets: 4,
                className: 'dt-center',
                render: function (data, type, row, meta) {
                    if (data == 'created') {
                        return '<span class="badge badge-light-success fs-8 fw-bolder">'+data+'</span>';
                    } else if (data == 'updated') {
                        return '<span class="badge badge-light-warning fs-8 fw-bolder">'+data+'</span>';
                    } else {
                        return '<span class="badge badge-light-danger fs-8 fw-bolder">'+data+'</span>';
                    }

                }
            },
            {
                targets: 6,
                className: 'dt-center',
                render: function (data, type, row, meta) {
                    return `<x-admin.button.icon type="show" href="{{route('log-activity.index')}}/${data}" />`;
                }
            },
        ],
        order: [[6, 'desc']],
    </x-admin.script.table>

@endpush
