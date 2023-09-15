var dataObat = [];

// Fungsi untuk menambahkan data obat ke dalam array
function tambahDataObat(nama, harga, jumlah, kadaluarsa) {
    var obat = {
        nama: nama,
        harga: harga,
        jumlah: jumlah,
        kadaluarsa: kadaluarsa
    };
    dataObat.push(obat);
}