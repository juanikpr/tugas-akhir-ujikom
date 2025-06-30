// untuk ngambil data pegawai ti server
function ajaxGetDataPegawai() {
    // ngelakuin permintaan ajax ke server
    $.ajax({
        url: '../controller/get_data_pegawai.php', //untuk ngambil data pegawai
        method: 'GET', // Metode nu di angge jang permintaan
        dataType: 'json', // Tipe data ti  server,server nateh json
        success: function(data) { // fungsi nu dijalankeun mun permintaan berhasil
            var tableBody = $('#data-pegawai'); //nyandak elemen tabel body ku id data-pegawai nu aya di html
            tableBody.empty(); // Kosongin tabel sblum nambah data

            // Iterasi melalui setiap item dalam data pegawai yang diterima
            $.each(data, function(index, item) {
                // buat baris tabel utk setiap pegawai
                var row = '<tr>' +
                    '<td>' + (index + 1) + '</td>' + // nampilken no urut
                    '<td>' + item.name + '</td>' +
                    '<td>' + item.divisi + '</td>' +
                    '<td>' + // Kolom jang tombol aksi
                        '<a href="../view/detail_pegawai.php?id=' + item.id + '" class="btn btn-primary btn-sm me-1">Detail</a>' + //lihat detail pegawai
                        '<button class="btn btn-warning btn-sm me-1 btn-edit" ' + // tombol edit
                            'data-id="' + item.id + '" ' + // nyimpen id pegawai dlm atribut data
                            'data-name="' + item.name + '" ' +
                            'data-divisi="' + item.divisi + '">' +
                            'Edit</button>' +
                        '<button class="btn btn-danger btn-sm btn-delete" data-id="' + item.id + '">Hapus</button>' + //tombol hapus
                    '</td>' +
                    '</tr>';
                tableBody.append(row); // Menambahkan baris yang telah dibuat ke dalam tabe
            });
        },
        error: function(xhr, status, error) {
            console.error('Terjadi kesalahan:', status, error);
        }
    });
}

// Panggil fungsi untuk ambil data saat pertama kali halaman diload
ajaxGetDataPegawai();

// tombol edit 
$(document).on('click', '.btn-edit', function () {
    var id = $(this).data('id'); //ngambil ID
    var name = $(this).data('name');
    var divisi = $(this).data('divisi');

    // ngisi input nama di modal edit 
    $('#editDataModal input[name="name"]').val(name);
    $('#editDataModal select[name="divisi"]').val(divisi);

    // meriksa apakah input ID ada di dalam modal
    if ($('#editDataModal input[name="id"]').length === 0) {
        // Jika input ID belum ada, tambahkan input tersembunyi untuk ID pegawai
        $('#formEditPegawai').append('<input type="hidden" name="id" value="' + id + '">');
    } else {
        //  jika ada,akan mengisi ID pegawai yang dipilih
        $('#editDataModal input[name="id"]').val(id);
    }

    // nampilkan modal edit
    $('#editDataModal').modal('show');
});


// Event listener tombol hapus
$(document).on('click', '.btn-delete', function () {
    var id = $(this).data('id');

    if (confirm('Apakah kamu yakin ingin menghapus data ini?')) {
        $.ajax({
            url: '../controller/delete.php',
            method: 'POST',
            data: { id: id },
            success: function(response) {
                alert('Data berhasil dihapus!');
                ajaxGetDataPegawai(); // akan nge refreh table yang ada
            },
            error: function(xhr, status, error) {
                console.error('Gagal menghapus:', status, error);
            }
        });
    }
});


