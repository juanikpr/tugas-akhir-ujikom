// untuk memvalidasi form login
function validateFormLogin() {
    // ngambil nilai username dari input dgn nama 'username' dan ngapus spasi di awal/akhir
    const username = document.querySelector('[name="username"]').value.trim();
    const password = document.querySelector('[name="password"]').value.trim();
    
    // meriksa apkah username atw password kosong
    if (username === "" || password === "") {
        //jika kosong maka bakal tampil alert
        alert("Username dan password harus diisi!");
        return false; //ngembalikan salah utk nunjukkan bahwa validasi gagal
    }
    return true;
}

