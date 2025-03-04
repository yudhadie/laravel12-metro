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

    <x-admin.modal.create :title="$title" action="{{ route('test-tag.store') }}">
        <x-admin.form.input class="col-12 mb-5" label="Nama" name="name" type="text" value="" required />
    </x-admin.modal.create>

    <x-admin.modal.default :title="'Detail Data'" id="modal_show">
        @csrf
        @method('PUT')
        <form id="update_form" action="{{ route('test-tag.update', ':id') }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <x-admin.form.input class="col-12 mb-5" label="Nama" name="name" type="text" value="" id="modal_name" required />
            <x-admin.button.modal-update />
        </form>
    </x-admin.modal.default>

@endsection

@section('head_button')

    <x-admin.content.header-button>
        <x-admin.button.modal-create />
    </x-admin.content.header-button>

@endsection

@section('styles')

@endsection

@push('scripts')

    <x-admin.menu.show menu="menu-test"/>
    <x-admin.menu.active menu="menu-test-tag"/>
    <x-admin.script.table>
        ajax: '{{ route('tag.data') }}',
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
                render: (data, type, row) => `
                    <button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3 btn-show-details"
                            data-id="${row.id}" title="Show details">
                        <i class="bi bi-eye"></i>
                    </button>
                    <button class="btn btn-icon btn-active-light-danger w-30px h-30px me-3 btn-delete"
                            data-id="${row.id}" data-token="{{ csrf_token() }}" title="Delete">
                        <i class="bi bi-trash"></i>
                    </button>
                `
            }
        ],
    </x-admin.script.table>
    <script>
        // Aksi Add
        $(document).on('click', '#modal_form_submit', function (e) {
            e.preventDefault();
            const form = $('#modal_form_form');
            const url = form.attr('action');
            const data = form.serialize();

            $('#modal_form_submit').attr('data-kt-indicator', 'on').prop('disabled', true);
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function (response) {
                    $('#modal_form_submit').attr('data-kt-indicator', 'off').prop('disabled', false);
                    $('#modal_add').modal('hide');
                    $('.table').DataTable().ajax.reload(null, false);
                    toastr.success('Data berhasil ditambah!', 'Berhasil', {
                        closeButton: true,
                        progressBar: true,
                    });
                    // Reset form
                    form.trigger('reset');
                },
                error: function (xhr) {
                    $('#modal_form_submit').attr('data-kt-indicator', 'off').prop('disabled', false);

                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        // Tampilkan pesan error validasi
                        Object.keys(errors).forEach(function (key) {
                            toastr.error(errors[key][0], 'Validasi Gagal', {
                                closeButton: true,
                                progressBar: true,
                            });
                        });
                    } else {
                        alert('Terjadi kesalahan saat menyimpan data!');
                    }
                }
            });
        });
    </script>
    <script>
        //Aksi Show
        $(document).on('click', '.btn-show-details', function() {
            const id = $(this).data('id');
            const url = `{{ route('test-tag.index') }}/${id}`;

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // Isi modal dengan data yang diterima
                    $('#modal_name').val(response.name);
                    // Perbarui action form dengan ID
                    const updateUrl = `{{ route('test-tag.update', ':id') }}`.replace(':id', response.id);
                    $('#update_form').attr('action', updateUrl);
                    $('#modal_show').modal('show');
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat mengambil data!');
                }
            });
        });
    </script>
    <script>
        //Aksi Update
        $(document).on('submit', '#update_form', function (e) {
            e.preventDefault(); // Mencegah form dari pengiriman normal
            const form = $(this);
            const url = form.attr('action');
            const data = form.serialize();

            $('#update_button').attr('data-kt-indicator', 'on').prop('disabled', true);
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function (response) {
                    $('#update_button').attr('data-kt-indicator', 'off').prop('disabled', false);
                    $('#modal_show').modal('hide');
                    $('.table').DataTable().ajax.reload(null, false);
                    toastr.success('Data berhasil diperbarui!', 'Berhasil', {
                        closeButton: true,
                        progressBar: true,
                    });
                },
                error: function (xhr) {
                    $('#update_button').attr('data-kt-indicator', 'off').prop('disabled', false);
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        // Tampilkan pesan error validasi
                        Object.keys(errors).forEach(function (key) {
                            toastr.error(errors[key][0], 'Validasi Gagal', {
                                closeButton: true,
                                progressBar: true,
                            });
                        });
                    } else {
                        alert('Terjadi kesalahan saat memperbarui data!');
                    }
                }
            });
        });
    </script>
    <script>
        //Aksi Delete
        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault(); // Mencegah aksi default tombol

            const id = $(this).data('id'); // Ambil ID dari atribut data-id
            const url = `{{ route('test-tag.destroy', ':id') }}`.replace(':id', id);
            var token = $(this).data('token');

            Swal.fire({
                title: 'Apakah kamu yakin hapus data ini?',
                text: "Data yang sudah di hapus tidak bisa di Kembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus saja!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {_method: 'delete', _token :token},
                        success: function (response) {
                            // Reload DataTable
                            $('.table').DataTable().ajax.reload(null, false);
                            // Tampilkan notifikasi sukses
                            Swal.fire(
                                'Terhapus!!',
                                'Data kamu berhasil di hapus',
                                'success'
                            )
                        },
                        error: function (xhr) {
                            if (xhr.status === 403) {
                                toastr.error(xhr.responseJSON.message, 'Gagal', {
                                    closeButton: true,
                                    progressBar: true,
                                });
                            } else {
                                toastr.error('Terjadi kesalahan saat menghapus data!', 'Gagal', {
                                    closeButton: true,
                                    progressBar: true,
                                });
                            }
                        }
                    });
                }
            })
        });
    </script>

@endpush
