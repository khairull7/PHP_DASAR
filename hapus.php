<?php
    $data = $_GET['id'];
    $server = mysqli_connect("localhost","root","","tugas");
    echo $data; 
 
    $sql = "DELETE FROM nilai WHERE id = '$data'";

    $query = mysqli_query($server, $sql);
     if ($query) {
        echo "Data berhasil dihapus!";
        echo "<a href='tampil.php'> Tampilkan Data</a>";
    } else {
        echo "Penghapusan gagal sebab : <br>".mysqli_error($server);
    }

  ?>  