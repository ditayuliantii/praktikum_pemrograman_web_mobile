<?php 
    //  session_start();

    //Koneksi
    $koneksi = mysqli_connect("localhost", "root", "", "tb_scrap_univ");

    //input
    if(isset($_POST['tambah'])){
        $rank = $_POST['rank'];
        $world = $_POST['world'];
        $univ = $_POST['univ'];
        $impact = $_POST['impact'];
        $openn = $_POST['openn'];
        $excellence = $_POST['excellence'];

        $query = "INSERT INTO data (rank, world_r, univ, impact_r, opennes_r, excellence_r) 
                    VALUES ($rank, $world, '$univ', $impact, $openn, $excellence) ";
    
        $insert = mysqli_query($koneksi, $query);

        if($insert){
            echo"
                <script>
                    alert('Data Berhasil Ditambahkan!');    
                </script>
            ";
        }
    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];

        $rank = $_POST['rank'];
        $world = $_POST['world'];
        $univ = $_POST['univ'];
        $impact = $_POST['impact'];
        $openn = $_POST['openn'];
        $excellence = $_POST['excellence'];

        $query = "UPDATE data SET 
                    rank = $rank,
                    world_r = $world,
                    univ = '$univ',
                    impact_r = $impact,
                    opennes_r = $openn,
                    excellence_r = $excellence
                    WHERE id = $id";

        $edit = mysqli_query($koneksi, $query);

        if($edit){
            echo"
                <script>
                    alert('Data Berhasil Diubah!');    
                </script>
            ";
        }
    }

    //hapus 
    if(isset($_POST['hapus'])){
        $id = $_POST['id'];
        $query = "DELETE FROM data WHERE id = $id";

        $delete = mysqli_query($koneksi, $query);

        if($delete){
            echo"
                <script>
                    alert('Data Berhasil Dihapus!');    
                </script> ";
        } else {
            echo"
            <script>
                alert('Data GAGAL Dihapus!');    
            </script> ";
        }
    }




?>