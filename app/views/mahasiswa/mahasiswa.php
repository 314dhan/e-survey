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
$navName = "MAHASISWA";
require "../navbar.php";
?>
<div class="container">

    <h1 class="nama-user" style="text-align: center;">Selamat datang, <br><?= $nama; ?>!</h4>
    </h1>

    <h3 class="pertanyaan">Pertanyaan Survei</h3>
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
                <tr>
                    <td>1</td>
                    <td><p>Seberapa puas Anda dengan fasilitas kampus?</p></td>
                    <td><input type="radio" name="jawaban1" value="1"></td>
                    <td><input type="radio" name="jawaban1" value="2"></td>
                    <td><input type="radio" name="jawaban1" value="3"></td>
                    <td><input type="radio" name="jawaban1" value="4"></td>
                    <td><input type="radio" name="jawaban1" value="5"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><p>Bagaimana penilaian Anda terhadap kualitas pengajaran yang diberikan oleh dosen di kampus ini?</p></td>
                    <td><input type="radio" name="jawaban2" value="1"></td>
                    <td><input type="radio" name="jawaban2" value="2"></td>
                    <td><input type="radio" name="jawaban2" value="3"></td>
                    <td><input type="radio" name="jawaban2" value="4"></td>
                    <td><input type="radio" name="jawaban2" value="5"></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><p>Sejauh mana kampus ini menyediakan fasilitas yang memadai untuk mendukung kegiatan belajar-mengajar?</p></td>
                    <td><input type="radio" name="jawaban3" value="1"></td>
                    <td><input type="radio" name="jawaban3" value="2"></td>
                    <td><input type="radio" name="jawaban3" value="3"></td>
                    <td><input type="radio" name="jawaban3" value="4"></td>
                    <td><input type="radio" name="jawaban3" value="5"></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><p>Bagaimana tingkat kepuasan Anda terhadap layanan administrasi dan pelayanan mahasiswa di kampus ini?</p></td>
                    <td><input type="radio" name="jawaban4" value="1"></td>
                    <td><input type="radio" name="jawaban4" value="2"></td>
                    <td><input type="radio" name="jawaban4" value="3"></td>
                    <td><input type="radio" name="jawaban4" value="4"></td>
                    <td><input type="radio" name="jawaban4" value="5"></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><p>Seberapa efektif sistem penilaian dan evaluasi di kampus ini dalam mengukur kemajuan dan pencapaian mahasiswa?</p></td>
                    <td><input type="radio" name="jawaban5" value="1"></td>
                    <td><input type="radio" name="jawaban5" value="2"></td>
                    <td><input type="radio" name="jawaban5" value="3"></td>
                    <td><input type="radio" name="jawaban5" value="4"></td>
                    <td><input type="radio" name="jawaban5" value="5"></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td><p>Seberapa baik kampus ini memberikan kesempatan bagi mahasiswa untuk mengembangkan potensi dan minat di luar kegiatan akademik?</p></td>
                    <td><input type="radio" name="jawaban6" value="1"></td>
                    <td><input type="radio" name="jawaban6" value="2"></td>
                    <td><input type="radio" name="jawaban6" value="3"></td>
                    <td><input type="radio" name="jawaban6" value="4"></td>
                    <td><input type="radio" name="jawaban6" value="5"></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td><p>Bagaimana penilaian Anda terhadap kualitas fasilitas perpustakaan yang tersedia di kampus ini?</p></td>
                    <td><input type="radio" name="jawaban7" value="1"></td>
                    <td><input type="radio" name="jawaban7" value="2"></td>
                    <td><input type="radio" name="jawaban7" value="3"></td>
                    <td><input type="radio" name="jawaban7" value="4"></td>
                    <td><input type="radio" name="jawaban7" value="5"></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td><p>Seberapa efektif kampus ini dalam memberikan dukungan dan bimbingan karier bagi mahasiswa?</p></td>
                    <td><input type="radio" name="jawaban8" value="1"></td>
                    <td><input type="radio" name="jawaban8" value="2"></td>
                    <td><input type="radio" name="jawaban8" value="3"></td>
                    <td><input type="radio" name="jawaban8" value="4"></td>
                    <td><input type="radio" name="jawaban8" value="5"></td>
                </tr>
                <!-- <tr>
                    <td>9</td>
                    <td><p>Seberapa baik kampus ini mendorong dan mendukung partisipasi mahasiswa dalam kegiatan sosial dan kemahasiswaan?</p></td>
                    <td><input type="radio" name="jawaban9" value="Sangat Buruk"></td>
                    <td><input type="radio" name="jawaban9" value="Buruk"></td>
                    <td><input type="radio" name="jawaban9" value="Cukup"></td>
                    <td><input type="radio" name="jawaban9" value="Baik"></td>
                    <td><input type="radio" name="jawaban9" value="Sangat Baik"></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td><p>Bagaimana tingkat kepuasan Anda terhadap suasana akademik dan lingkungan belajar di kampus ini?</p></td>
                    <td><input type="radio" name="jawaban10" value="Sangat Buruk"></td>
                    <td><input type="radio" name="jawaban10" value="Buruk"></td>
                    <td><input type="radio" name="jawaban10" value="Cukup"></td>
                    <td><input type="radio" name="jawaban10" value="Baik"></td>
                    <td><input type="radio" name="jawaban10" value="Sangat Baik"></td>
                </tr> -->
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
<?php
require "../footer.php";
