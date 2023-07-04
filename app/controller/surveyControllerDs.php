<?php
// Tambahkan kode untuk koneksi ke database atau file lain yang diperlukan

require "../config/Connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data dari formulir
    $nama = $_POST['nama'];
    $jawaban1 = $_POST['jawaban1'];
    $jawaban2 = $_POST['jawaban2'];
    $jawaban3 = $_POST['jawaban3'];
    $jawaban4 = $_POST['jawaban4'];
    $jawaban5 = $_POST['jawaban5'];
    $jawaban6 = $_POST['jawaban6'];
    $jawaban7 = $_POST['jawaban7'];
    $jawaban8 = $_POST['jawaban8'];

    // Lakukan validasi data jika diperlukan

    // Simpan data ke database atau lakukan operasi lain yang diperlukan
    // Ganti kode berikut dengan operasi penyimpanan sesuai kebutuhan Anda
    $query = "INSERT INTO survey_ds (nama, jawaban1, jawaban2, jawaban3, jawaban4, jawaban5, jawaban6, jawaban7, jawaban8) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sssssssss', $nama, $jawaban1, $jawaban2, $jawaban3, $jawaban4, $jawaban5, $jawaban6, $jawaban7, $jawaban8);

    if (mysqli_stmt_execute($stmt)) {
        // Jika penyimpanan sukses, kirimkan respons JSON
        $response = array('status' => 'success');
        // header("Location: ../views/dosen/dosen.php");
        echo json_encode($response);
    } else {
        // Jika terjadi kesalahan saat menyimpan, kirimkan respons JSON dengan pesan error
        $response = array('status' => 'error', 'message' => mysqli_stmt_error($stmt));
        echo json_encode($response);
    }

    // Tutup koneksi atau lakukan operasi lain yang diperlukan
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    // Jika metode HTTP bukan POST, kirimkan respons JSON dengan pesan error
    $response = array('status' => 'error', 'message' => 'Metode HTTP tidak valid');
    echo json_encode($response);
}
