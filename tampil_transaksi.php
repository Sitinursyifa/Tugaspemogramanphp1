<?php 
session_start();
if(!isset($_SESSION['session_username'])){
    header("location:login.php");
    exit();
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
</head>
<body>
    <h2>Pemograman 1 2023</h2>
    <br>
    <a href="tambah_transaksi.php">+ Tambah Transaksi</a>
    <br>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Tanggal Transaksi</th>
            <th>No Transaksi</th>
            <th>Jenis Transaksi</th>
            <th>Id Barang</th>
            <th>Jumlah Transaksi</th>
            <th>Id User</th>
            <th>opsi</th>

        </tr>
        <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi,"Select * From transaksi");
            while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['tgl_transaksi'];?></td>
            <td><?php echo $d['no_transaksi'];?></td>
            <td><?php echo $d['jenis_transaksi'];?></td>
            <td><?php echo $d['barang_id'];?></td>
            <td><?php echo $d['jumlah_transaksi'];?></td>
            <td><?php echo $d['id_member'];?></td>
            <td>
            <?php
                // Tampilkan opsi Edit dan Hapus berdasarkan level user yang sedang login
                if ($_SESSION['level'] == 0) {
                    // Level 0 dapat mengedit dan menghapus
                    echo '<a href="edit_transaksi.php?id=' . $d['id_transaksi'] . '">Edit</a>';
                    echo '<a href="hapus_transaksi.php?id=' . $d['id_transaksi'] . '">Hapus</a>';
                } elseif ($_SESSION['level'] == 2) {
                    // Level 2 tidak dapat mengedit dan menghapus
                    echo 'Tidak diizinkan';
                }elseif ($_SESSION['level'] == 3) {
                // Level 1 dapat mengedit dan menghapus
                echo '<a href="edit_barang.php?id=' . $d['id_transaksi'] . '">Edit</a>';
                echo '<a href="hapus_barang.php?id=' . $d['id_transaksi'] . '">Hapus</a>';
            }elseif ($_SESSION['level'] == 4) {
                // Level 1 dapat mengedit dan menghapus
                echo '<a href="edit_barang.php?id=' . $d['id_transaksi'] . '">Edit</a>';
                echo '<a href="hapus_barang.php?id=' . $d['id_transaksi'] . '">Hapus</a>';
            }
                ?>
            </td>
        </tr>
        <?php
            }
            ?>
    </table>
</body>
</html>