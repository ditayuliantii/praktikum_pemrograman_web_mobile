<?php
   require 'functiondepart.php';
   $departs = query("SELECT * FROM department");

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

    <title>Data Department</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <h4>Dita Yulianti (213010503010)</h4>
                <a href="department_tambah.php">
                    <div class="div btn btn-primary mb-4">
                        Tambah Data
                    </div>
                </a>


                <a href="employe.php">
                    <div class="div btn btn-primary mb-4">
                        Kembali Ke Halaman Employe
                    </div>
                </a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        <?php foreach($departs as $depart) : ?>
                        <td><?=$i; ?></td>
                        <td><?= $depart["nama_depart"]; ?></td>
                        <td>
                            <a href="department_delete.php?id=<?= $depart["id_dep"]; ?>"
                                onclick="return confirm('yakin?');">hapus</a>
                        </td>
                        </tr>
                    </tbody>
                    <?php $i++; ?>
                    <?php endforeach; ?>

                </table>
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