<!DOCTYPE html>
<html>
<head>
    <title>MENGHITUNG NILAI</title>
</head>
<body>
    <center>
    <h1>Form Input Nilai</h1>
    <form method="post" action="#">
        <label for="nis">Nama:</label>
        <input type="text" name="nama" id="nama" required><br><br>

        <label for="nilai1">Nilai 1:</label>
        <input type="number" name="nilai1" id="nilai1" required><br><br>
         
        <label for="nilai2">Nilai 2:</label>
        <input type="number" name="nilai2" id="nilai2" required><br><br>
        
        <label for="nilai3">Nilai 3:</label>
        <input type="number" name="nilai3" id="nilai3" required><br><br>
        
        <label for="nilai4">Nilai 4:</label>
        <input type="number" name="nilai4" id="nilai4" required><br><br>
        
        <label for="nilai5">Nilai 5:</label>
        <input type="number" name="nilai5" id="nilai5" required><br><br>
        
        <label for="nilai6">Nilai 6:</label>
        <input type="number" name="nilai6" id="nilai6" required><br><br>
        
        <input type="submit" value="Submit">
    </form>


<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai form
    $nama = $_POST['nama'];
    $nilai1 = $_POST['nilai1'];
    $nilai2 = $_POST['nilai2'];
    $nilai3 = $_POST['nilai3'];
    $nilai4 = $_POST['nilai4'];
    $nilai5 = $_POST['nilai5'];
    $nilai6 = $_POST['nilai6'];

    $sql = "INSERT INTO `nilai`(`nama`, `nilai1`, `nilai2`, `nilai3`, `nilai4`, `nilai5`, `nilai6`) VALUES ('$nama','$nilai1','$nilai2','$nilai3','$nilai4','$nilai5','$nilai6')";
    $hasil = mysqli_query($conn, $sql);

    if ($hasil) {
        echo "Berhasil";
    } else {
        echo "Gagal";
    }

    // Jumlah total
    $total = $nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5 + $nilai6;

    // Menghitung rata-rata
    $rata = $total / 6;

    // Nilai maksimal dan minimal
    $nilai_max = max($nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6);
    $nilai_min = min($nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6);

    // Grade penilaian
    if ($rata > 90) {
        $grade = "A";
    } elseif ($rata > 80) {
        $grade = 'B';
    } elseif ($rata > 70) {
        $grade = 'C';
    } elseif ($rata > 0) {
        $grade = 'D';
    }

    // Menampilkan Hasil
    echo "<br><br>";
    echo "Nama: " . $nama;
    echo "<br>";
    echo "Total: " . $total;
    echo "<br>";
    echo "Rata-Rata: " . $rata;
    echo "<br>";
    echo "Nilai Max: " . $nilai_max;
    echo "<br>";
    echo "Nilai Min: " . $nilai_min;
    echo "<br>";
    echo "Grade Penilaian: " . $grade;

    echo "<br><br>";
    echo "<a href='tampil.php'>Lihat Daftar Nilai</a>";
    echo "<br>";
    echo "<a href='hapus.php?nis=$nama'>Hapus Nilai</a>";
}
?>
</center>
</body>
</html>