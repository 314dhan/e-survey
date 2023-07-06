<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../../config/connection.php";

// Verifikasi cookie
if (isset($_COOKIE['user_role'])) {
    $user_role = $_COOKIE['user_role'];

    if ($user_role === 'mahasiswa') {
        header("Location: ../views/mahasiswa/mahasiswa.php");
        exit;
    } elseif ($user_role === 'dosen') {
        header("Location: ../views/dosen/dosen.php");
        exit;
    }
}
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Ambil data nama dosen dari session
$role = $_SESSION['role'];
$nama = $_SESSION['nama'];

$sql = "SELECT * FROM pertanyaan_mhs";
$result = mysqli_query($conn, $sql);

$pageTitle = "Survey Mahasiswa";
require "../navbar.php";
?>
<div class="container">

    <h1 style="text-align: center;">Selamat datang, <?= $nama; ?>!</h4>
    </h1>

    <h3>Pertanyaan Survei</h3>
    <form action="../../controller/surveyControllerMhs.php" method="post">
        <div class="container" style="text-align: center;">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Sangat Kurang</th>
                        <th>Cukup</th>
                        <th>Sangat Baik</th>
                    </tr>
                </thead>
                <tr>
                    <input type="hidden" name="nama" value="<?= $nama ?>">
                </tr>
                <?php
                $no = 1;
                if (mysqli_num_rows($result) > 0) {
                    // Looping untuk menampilkan data dalam bentuk HTML
                    while ($row = mysqli_fetch_assoc($result)) {
                        $pertanyaan = $row['pertanyaan'];

                        echo '<tr>';
                        echo '<td>' . $no . '</td>';
                        echo '<td>';
                        echo '<p>' . $pertanyaan . '</p>';
                        echo '</td>';
                        echo '<td><input type="radio" name="jawaban' . $no . '" value="1"></td>';
                        echo '<td><input type="radio" name="jawaban' . $no . '" value="2"></td>';
                        echo '<td><input type="radio" name="jawaban' . $no . '" value="3"></td>';
                        echo '</tr>';
                        $no++;
                    }
                } else {
                    echo 'Tidak ada data yang ditemukan.';
                }
                ?>
            </table>
        </div>
        <input class="btn btn-success" type="submit" name="submit" value="Kirim Survei">
    </form>
</div>
<script>
    $(document).ready(function() {
        $('form').submit(function(event) {
            event.preventDefault(); // Mencegah pengiriman form

            // Dapatkan data form
            var formData = $(this).serialize();

            // Kirim permintaan AJAX
            $.ajax({
                url: '../../controller/surveyControllerMhs.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Tampilkan pesan keberhasilan menggunakan SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Survey Berhasil Terkirim, Terima Kasih!',
                        })
                        // .then(function() {
                        //     // Redirect ke halaman dosen.php setelah menekan tombol OK pada SweetAlert
                        //     window.location.href = '../dosen/dosen.php';
                        // });
                    } else {
                        // Tampilkan pesan kesalahan jika terjadi error
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                        });
                    }
                },
                error: function() {
                    // Tampilkan pesan kesalahan jika permintaan gagal
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan!',
                    });
                }
            });
        });
    });
</script>
<?php
require "../footer.php";
