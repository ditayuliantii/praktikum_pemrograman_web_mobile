<?php 

require 'functionemploye.php';

$departs = query("SELECT * FROM department");

// cek tombol submit sdh ditekan atau belum
if(isset($_POST["submit"])) {
	// cek apakah data berhasil di tambahkan atau tidak
	if (tambah($_POST)>0){
		echo "
			<script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'employe_tambah.php';
			</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'employe_tambah.php';
		</script>
		";
	}
}	
	
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>tambah employee</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class = "mb-4">Tambah Data Employee</h1>
                <a href="employe.php">
                    <div class="div btn btn-primary mb-4">
                        kembali
                    </div>
                </a>

                <form action="" method="post">
                    <ul>
                        <li class="mb-2">
                            <label for="nama">Nama Karyawan : </label>
                            <input type="text" name="nama" id="nama" required>
                        </li>
                        <li class="mb-2">
                            <label for="email">Email : </label>
                            <input type="text" name="email" id="email" required>
                        </li>
                        <li class="mb-2">
                            <label for="no_telp">Nomor Telepon: </label>
                            <input type="text" name="no_telp" id="no_telp" required>
                        </li>
                        <li class="mb-2">
                            <label for="umur">Umur : </label>
                            <input type="text" name="umur" id="umur" required>
                        </li>
                        
                        <li class="mb-2">
                            <div class="form-group">
                                <label for="id_department ">Nama Department</label>
                                <select name="id_dep" class="form-control-sm" id="id_department ">
                                    <option selected>Choose One</option>
                                    <?php foreach($departs as $depart) : ?>

                                    <option value="<?= $depart["id_dep"] ?>">
                                        <?= $depart["nama_depart"] ?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </li>
                        <li class="mt-2">
                            <button class = "btn-outline-primary" type="submit" name="submit">Tambah Data!</button>
                        </li>

                    </ul>
                </form>

            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>