<?php 

// session start
session_start();

// hilangkan session yang sudah ada
// unset($_SESSION['id_user']);
unset($_SESSION['username']);
unset($_SESSION['password']);

session_destroy();

echo "<script> alert ('Anda Telah Berhasil Logout..'); 
document.location = 'index.php';
</script>";

?>