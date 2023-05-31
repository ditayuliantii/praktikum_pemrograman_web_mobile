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
		$nama = htmlspecialchars($data["nama"]);
		$email = htmlspecialchars($data["email"]);
		$no_telp = htmlspecialchars($data["no_telp"]);
		$umur = htmlspecialchars($data["umur"]);
		$id_department = htmlspecialchars($data["id_dep"]);

		$query = "INSERT INTO employee
					VALUES ('', '$nama', '$email', '$no_telp', $umur, '$id_department')";
		// query insert data
		mysqli_query($db, $query);

		return mysqli_affected_rows($db);
   }

   function ubah($data){
		global $db;
		
		$id = $data["id_employee"];

		// ambil data dari tiap elemen dalam form
		$nama = htmlspecialchars($data["nama"]);
		$email = htmlspecialchars($data["email"]);
		$no_telp = htmlspecialchars($data["no_telp"]);
		$umur = htmlspecialchars($data["umur"]);
		$id_department = htmlspecialchars($data["id_dep"]);
		$query = "UPDATE employee SET 
					nama = '$nama',
					email = '$email',
					no_telp = '$no_telp',
					umur = $umur,
					id_dep ='$id_department'
					WHERE id_employee = $id";
		// query insert data
		mysqli_query($db, $query);

		return mysqli_affected_rows($db);
	}

    function hapus($id){
        global $db;
        mysqli_query($db, "DELETE FROM employee WHERE id_employee = $id");
        return mysqli_affected_rows($db);
    }

?>