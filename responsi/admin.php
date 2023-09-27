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

    <!-- <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />


    <title>Universitas Terbaik Indonesia</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="#">Data Universitas di Indonesia</a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <i class="fa fa-home"></i> Home
                        <span class="sr-only">(current)
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"> <i class="fa fa-sign-out"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container">
        <div class="row">
            <div class="col mt-5">

                <button type="button" class="btn btn-info btn-sm btn-rounded" data-toggle="modal"
                    data-target="#myModal">
                    <i class="fa fa-plus-circle"></i> Tambah Data
                </button>


                <table class="table table-striped table-sm">
                    <caption style="caption-side: top; text-align: center;">Daftar Peringkat Universitas di Indonesia
                    </caption>
                    <thead>
                        <tr>
                            <th scope="col">Ranking</th>
                            <th scope="col">World Rank</th>
                            <th scope="col">University</th>
                            <th scope="col">Impact Rank</th>
                            <th scope="col">Opennes Rank</th>
                            <th scope="col">Excellence Rank</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $listdata = mysqli_query($koneksi, "select * from data");
                            while($data = mysqli_fetch_array($listdata)) {
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
                            <td>
                                <div class="btn-group" role="group" aria-label="Action Buttons">
                                    <button type="button" class="btn btn-outline-warning mr-2" data-toggle="modal"
                                        data-target="#edit<?=$id;?>">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#delete<?=$id;?>">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </div>
                            </td>

                        </tr>

                        <!-- Edit -->
                        <div class="modal fade" id="edit<?=$id;?>">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Ubah Data</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <form method="post">
                                        <div class="modal-body">
                                            <label for="rank">Ranking:</label>
                                            <input type="number" name="rank" id="rank" value="<?=$rank;?>" class="form-control"
                                                required>
                                            <br>
                                            <label for="world">World Rank:</label>
                                            <input type="number" name="world" id="world" value="<?=$world;?>" class="form-control"
                                                required>
                                            <br>
                                            <label for="univ">University:</label>
                                            <input type="text" name="univ" id="univ" value="<?=$univ;?>" class="form-control"
                                                required>
                                            <br>
                                            <label for="impact">Impact Rank:</label>
                                            <input type="number" name="impact" id="impact" value="<?=$impact;?>" class="form-control"
                                                required>
                                            <br>
                                            <label for="open">Opennes Rank:</label>
                                            <input type="number" name="openn" id = "open" value="<?=$openn;?>" class="form-control"
                                                required>
                                            <br>
                                            <label for="excell">Excellence Rank:</label>
                                            <input type="number" name="excellence" id="excell" value="<?=$excellence;?>"
                                                class="form-control" required>
                                            <br>

                                            <input type="hidden" name="id" value="<?=$id;?>">
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="update"> <i
                                                        class="fa fa-save"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- hapus -->
                        <div class="modal fade" id="delete<?=$id;?>">
                            <div class="modal-dialog modal-sm">
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
                                                <button type="submit" class="btn btn-danger" name="hapus">Ya</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <?php }; ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <!-- tambah -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form method="post">
                    <div class="modal-body">
                        <input type="number" name="rank" placeholder="Ranking" class="form-control" required>
                        <br>
                        <input type="number" name="world" placeholder="World Rank" class="form-control" required>
                        <br>
                        <input type="text" name="univ" placeholder="University" class="form-control" required>
                        <br>
                        <input type="number" name="impact" placeholder="Impact Rank" class="form-control" required>
                        <br>
                        <input type="number" name="openn" placeholder="Opennes Rank" class="form-control" required>
                        <br>
                        <input type="number" name="excellence" placeholder="Excellence Rank" class="form-control"
                            required>
                        <br>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>


</html>