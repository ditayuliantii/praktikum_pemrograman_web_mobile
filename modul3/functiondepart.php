<?php
   $db = mysqli_connect("localhost", "root", "", "modul3");

    function query($query){
        global $db;
        $result = mysqli_query($db, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }


    function tambah($data){
        global $db;
        // ambil data dari tiap elemen dalam form
        $nama_depart = htmlspecialchars($data["nama_depart"]);

        $query = "INSERT INTO department
                    VALUES ('', '$nama_depart')";
        // query insert data
        mysqli_query($db, $query);

        return mysqli_affected_rows($db);
    }

    function hapus($id){
        global $db;
        mysqli_query($db, "DELETE FROM department WHERE id_dep = $id");
        return mysqli_affected_rows($db);
    }

?>