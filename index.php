<?php
// Sesuaikan dengan setting MySQL kamu
$servername = "localhost";
$username   = "root";
$password   = ""; // Kosongkan jika pakai XAMPP bawaan
$dbname     = "kecamatan"; // Sesuai nama database kamu

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

echo "<a href='input/index.html'>Input Data Baru</a><br><br>";

if ($result->num_rows > 0) {
    echo "<table border='1px'>
            <tr>
                <th>ID</th>
                <th>Kecamatan</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Luas</th>
                <th>Jumlah Penduduk</th>
            </tr>";
            
    // Tampilkan data per baris
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["kecamatan"]."</td>
                <td>".$row["longitude"]."</td>
                <td>".$row["latitude"]."</td>
                <td>".$row["luas"]."</td>
                <td align='right'>".$row["jumlah_penduduk"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>