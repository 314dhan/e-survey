<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../../config/connection.php";

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
$dosen = $_SESSION['nama'];

$sql = "SELECT * FROM pertanyaan_ds";
$result = mysqli_query($conn, $sql);

$pageTitle = "Survey Dosen";
$navName = "DOSEN";
require "../navbar.php";
?>
<div class="container">
    <h2 class="nama-user" style="text-align: center;">Selamat datang, <br><?= $dosen; ?>!</h2>

    <h3 class="pertanyaan">Pertanyaan Survei</h3>
    <form action="../../controller/surveyControllerDs.php" method="post">
        <div class="container" style="text-align: center;">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>no</th>
                        <th>soal</th>
                        <th>Sangat Kurang</th>
                        <th>Cukup</th>
                        <th>Sangat Baik</th>
                    </tr>
                </thead>
                <tr>
                    <input type="hidden" name="nama" value="<?= $dosen ?>">
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
        <div class="container" style="text-align: center;">
            <input class="btn btn-success tombol-pad" type="submit" name="submit" value="Kirim Survei">
        </div>
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
                url: '../../controller/surveyControllerDs.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Tampilkan pesan keberhasilan menggunakan SweetAlert
                        Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Survey Berhasil Terkirim, Terima Kasih! Tekan Ok untuk keluar',
                            })
                            .then(function() {
                                // Redirect ke halaman dosen.php setelah menekan tombol OK pada SweetAlert
                                window.location.href = '../../controller/logoutController.php';
                            });
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
                        text: 'Terjadi kesalahan! Harap isi survei dengan benar',
                    });
                }
            });
        });
    });
</script>
<?php require "../footer.php";
