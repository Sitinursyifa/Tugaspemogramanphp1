<?php
    include 'koneksi.php';
    $query = "SELECT
    m.nama_member AS Member,
    m.level AS Level,
    CONCAT(
        CASE
            WHEN m.level = 'Platinum' THEN '15%'
            WHEN m.level = 'Gold' THEN '10%'
            WHEN m.level = 'Silver' THEN '5%'
            ELSE '0%'
        END
    ) AS 'Diskon Member',
    CASE
        WHEN SUM(t.total) > 100000 THEN '10%'
        ELSE '0%'
    END AS 'Diskon Barang',
    SUM(t.total) AS 'Total Pembelian',
    (
        CASE
            WHEN m.level = 'Platinum' THEN SUM(t.total) * 0.15
            WHEN m.level = 'Gold' THEN SUM(t.total) * 0.10
            WHEN m.level = 'Silver' THEN SUM(t.total) * 0.05
            ELSE 0
        END
    ) +
    (
        CASE
            WHEN SUM(t.total) > 100000 THEN SUM(t.total) * 0.10
            ELSE 0
        END
    ) AS 'Total Diskon',
    SUM(t.total) - 
    (
        CASE
            WHEN m.level = 'Platinum' THEN SUM(t.total) * 0.15
            WHEN m.level = 'Gold' THEN SUM(t.total) * 0.10
            WHEN m.level = 'Silver' THEN SUM(t.total) * 0.05
            ELSE 0
        END
    ) -
    (
        CASE
            WHEN SUM(t.total) > 100000 THEN SUM(t.total) * 0.10
            ELSE 0
        END
    ) AS 'Total Transaksi'
FROM
    member m
JOIN
    Penjualan j ON m.nama_member = j.Nama_member
JOIN
    transaksi t ON j.ID_Penjualan = t.penjualan_id
GROUP BY
    m.nama_member, m.level";

$result = $koneksi->query($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hasil Transaksi</title>
</head>
<body>
    <h1>Hasil Transaksi</h1>
    <table border="1">
        <tr>
            <th>Member</th>
            <th>Level</th>
            <th>Diskon Member</th>
            <th>Diskon Barang</th>
            <th>Total Pembelian</th>
            <th>Total Diskon</th>
            <th>Total Transaksi</th>
        </tr>
        <?php
        if ($result !== false) 
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Member'] . "</td>";
                echo "<td>" . $row['Level'] . "</td>";
                echo "<td>" . $row['Diskon Member'] . "</td>";
                echo "<td>" . $row['Diskon Barang'] . "</td>";
                echo "<td>" . $row['Total Pembelian'] . "</td>";
                echo "<td>" . $row['Total Diskon'] . "</td>";
                echo "<td>" . $row['Total Transaksi'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "Tidak ada data transaksi.";
        }
        $koneksi->close();
        ?>
    </table>
</body>
</html>