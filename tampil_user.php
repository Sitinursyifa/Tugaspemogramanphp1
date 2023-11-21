
<?php 
session_start();
if(!isset($_SESSION['session_username'])){
    header("location:index.php");
    exit();
}

include 'koneksi.php';

$loggedInUserLevel = isset($_SESSION['level']) ? $_SESSION['level'] : null; // Ambil level user yang sedang login

$no = 1;
$data = mysqli_query($koneksi, "SELECT * FROM user");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>pemograman3.com</title>
</head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2, h3 {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #0066cc;
        }

        a:hover {
            color: #004080;
        }

        table {
            width: 50%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

<body>
    <h2>pemograman 3 2023</h2>
    <br/>
    <a href="tambah_user.php">+ TAMBAH USER</a>
    <br/>
    <table border="1">
        <tr>
            <th>id</th>
            <th>nama</th>
            <th>Password</th>
            <th>level</th>
            <th>status</th>
            <th>OPSI</th>
</tr>
<?php
include 'koneksi.php';
$no = 1;
$data = mysqli_query($koneksi,"select * from user");
while($d = mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['password']; ?></td>
        <td><?php echo $d['level']; ?></td>
        <td><?php echo $d['status']; ?></td>
        <td>
           <?php
// Tampilkan opsi Edit dan Hapus berdasarkan level user yang sedang login
if ($loggedInUserLevel == 1) {
    // Level 0 dapat mengedit dan menghapus semua level
    echo '<a href="edit_user.php?id=' . $d['id_user'] . '">EDIT</a>';
    echo '<a href="hapus_user.php?id=' . $d['id_user'] . '">HAPUS</a>';
} elseif ($loggedInUserLevel == 1) {
    // Level 1 dapat mengedit dan menghapus semua level
    echo '<a href="edit_user.php?id=' . $d['id_user'] . '">EDIT</a>';
    echo '<a href="hapus_user.php?id=' . $d['id_user'] . '">HAPUS</a>';
} elseif ($loggedInUserLevel == 2) {
    // Level 2 tidak dapat mengedit dan menghapus
    echo 'Tidak bisa edit & hapus';
}
?>

<?php
}
?>
</table>
        <br>  
        <a href="index.php">Kembali</a>
        <br>
</body>
</html>