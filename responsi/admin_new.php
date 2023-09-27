<?php
require 'function.php';

session_start();
// jika session masih kosong
if (empty($_SESSION['username']) or empty($_SESSION['password'])) {
    echo "<script> alert ('Mohon Login Terlebih Dahulu..!'); 
        document.location = 'index.php';
        </script>";
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Universitas Terbaik Indonesia</title>
</head>

<body>
    <!-- OLD -->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Data Universitas di Indonesia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
                </li>

            </ul>
        </div>
    </nav> -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Data Universitas di Indonesia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>


    <h3 class="text-center">Halaman Kelola Admin</h3>

    <div class="container">
        <div class="row">
            <div class="col mt-5">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Tambah Data
                </button>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Ranking</th>
                            <th scope="col">World Rank</th>
                            <th scope="col">University</th>
                            <th scope="col">Impact Rank</th>
                            <th scope="col">Opennes Rank</th>
                            <th scope="col">Excellence Rank</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            // // menentukan jumlah data per halaman
                            // $limit = 25;
                            // // menentukan halaman saat ini
                            // $page = isset($_GET['page']) ? $_GET['page'] : 1;
                           
                            // // menentukan offset
                            // $offset = ($page - 1) * $limit;
                            // // menampilkan data dengan batasan limit dan offset
                            // $listdata = mysqli_query($koneksi, "SELECT * FROM data LIMIT $offset, $limit");
                            $listdata = mysqli_query($koneksi, "select * from data");
                            while ($data = mysqli_fetch_array($listdata)) {
                                    $id = $data['id'];
                                    $rank = $data['rank'];
                                    $world = $data['world_r'];
                                    $univ = $data['univ'];
                                    $impact = $data['impact_r'];
                                    $openn = $data['opennes_r'];
                                    $excellence = $data['excellence_r'];
                        ?>
                        <tr>
                            <td><?=$rank;?></td>
                            <td><?=$world;?></td>
                            <td><?=$univ;?></td>
                            <td><?=$impact;?></td>
                            <td><?=$openn;?></td>
                            <td><?=$excellence;?></td>
                            <!-- <td>
                                <div class="btn-group" role="group" aria-label="Action Buttons">
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#edit<?=$id;?>">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete<?=$id;?>">
                                        Delete
                                    </button>                         
                                </div>
                            </td> -->

                            <!-- OLD -->
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#edit<?=$id;?>">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#delete<?=$id;?>">
                                    Delete
                                </button>
                            </td>
                        </tr>

                        <?php }; ?>
                    </tbody>

                </table>



                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Data</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <form method="post">
                                <div class="modal-body">
                                    <input type="text" name="rank" placeholder="Ranking" class="form-control" required>
                                    <br>
                                    <input type="text" name="world" placeholder="World Rank" class="form-control"
                                        required>
                                    <br>
                                    <input type="text" name="univ" placeholder="University" class="form-control"
                                        required>
                                    <br>
                                    <input type="text" name="impact" placeholder="Impact Rank" class="form-control"
                                        required>
                                    <br>
                                    <input type="text" name="openn" placeholder="Opennes Rank" class="form-control"
                                        required>
                                    <br>
                                    <input type="text" name="excellence" placeholder="Excellence Rank"
                                        class="form-control" required>
                                    <br>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="tambah">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Edit -->
                <div class="modal fade" id="edit<?=$id;?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Data</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <form method="post">
                                <div class="modal-body">
                                    <input type="text" name="rank" value="<?=$rank;?>" class="form-control" required>
                                    <br>
                                    <input type="text" name="world" value="<?=$world;?>" class="form-control" required>
                                    <br>
                                    <input type="text" name="univ" value="<?=$univ;?>" class="form-control" required>
                                    <br>
                                    <input type="text" name="impact" value="<?=$impact;?>" class="form-control"
                                        required>
                                    <br>
                                    <input type="text" name="openn" value="<?=$openn;?>" class="form-control" required>
                                    <br>
                                    <input type="text" name="excellence" value="<?=$excellence;?>" class="form-control"
                                        required>
                                    <br>

                                    <input type="hidden" name="id" value="<?=$id;?>">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="update">Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- hapus -->
                <div class="modal fade" id="delete<?=$id;?>">
                <!-- <div class="modal fade" id="delete<?=$id;?>_page<?=$page;?>"> -->
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Hapus Data</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <form method="post">
                                <div class="modal-body">
                                    Yakin Ingin Menghapus data <?=$id?>?
                                    <br> <br>
                                    <input type="hidden" name="id" value="<?=$id;?>">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <!-- <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php
                            // menentukan jumlah halaman
                            $count = mysqli_query($koneksi, "SELECT COUNT(*) AS count FROM data");
                            $pages = ceil(mysqli_fetch_assoc($count)['count'] / $limit);
                            // tombol "First"
                            if ($page > 1) {
                                echo '<li class="page-item"><a class="page-link" href="?page=1">First</a></li>';
                            }
                            // tombol "Prev"
                            if ($page > 1) {
                                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Prev</a></li>';
                            }
                            // menampilkan nomor halaman
                            for ($i = 1; $i <= $pages; $i++) {
                                echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                            }
                            // tombol "Next"
                            if ($page < $pages) {
                                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
                            }
                            // tombol "Last"
                            if ($page < $pages) {
                                echo '<li class="page-item"><a class="page-link" href="?page=' . $pages . '">Last</a></li>';
                            }
                        ?>
                    </ul>
                </nav> -->


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