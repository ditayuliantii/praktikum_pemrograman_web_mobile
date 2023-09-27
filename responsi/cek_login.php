<?php 

session_start();

require "function.php";

// password: name yang di form
@$username = mysqli_escape_string($koneksi, $_POST['username']);
@$password = mysqli_escape_string($koneksi, $_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' 
and password = '$password'");

$data = mysqli_fetch_array($login);

// jika username dan password ada
 if ($data){
    // yang awal nama session, lalu nama kolom
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['nama_pengguna'] = $data['nama_pengguna'];

    // arahkan ke halaman admin
    header('location: admin.php');

 } else{
    echo "<script> alert ('Username/Password Tidak Ditemukan..!'); 
    document.location = 'index.php';
    </script>";
 }


?>