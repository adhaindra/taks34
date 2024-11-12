<?php
// Konfigurasi koneksi database
$servername = "localhost";
$username = "root";       // Ganti dengan username database Anda
$password = "";           // Ganti dengan password database Anda
$dbname = "contact_db";   // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// SQL untuk memasukkan data ke tabel
$sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    // Redirect ke halaman sukses jika berhasil
    header("Location: success.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>