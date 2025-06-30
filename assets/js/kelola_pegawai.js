// Fungsinya utk buka modal edit sma ngisi data pegawai yang bakal diedit
function bukaEditModal(data) {
    // ngisi input ID pegawai dengan ID yang diterima dari parameter data
    document.getElementById('editIdPegawai').value = data.id;
    document.getElementById('editNamaPegawai').value = data.nama;
    document.getElementById('editDivisiPegawai').value = data.divisi;

    // buat instance modal Bootstrap utk modal edit
    const editModal = new bootstrap.Modal(document.getElementById('editDataModal'));
    editModal.show(); //nampilkan modal edit
}