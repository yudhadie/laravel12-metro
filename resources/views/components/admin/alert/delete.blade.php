<script>
    $('body').on('click', '#btn-delete', function () {
        // let data_id = $(this).data('id');
        var href = $(this).attr('href');
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
                    document.getElementById('deleteForm').action = href;
                    document.getElementById('deleteForm').submit();
                    Swal.fire(
                    'Terhapus!!',
                    'Data kamu berhasil di hapus',
                    'success'
                )
            }
        })
    });
</script>
