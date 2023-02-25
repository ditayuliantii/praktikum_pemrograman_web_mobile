<?php 
  $names = ["Dami Jin", "Dita", "Harold", "Loui", "Ringo"];

  function vokal($kalimat){
    // menghitung berapa kali sub-string muncul dalam kalimat
    // strtolower : membuat semua huruf menjadi huruf kecil
    $a = substr_count(strtolower($kalimat), 'a');
    $i = substr_count(strtolower($kalimat), 'i');
    $u = substr_count(strtolower($kalimat), 'u');
    $e = substr_count(strtolower($kalimat), 'e');
    $o = substr_count(strtolower($kalimat), 'o');

    $jum_vokal = ($a + $i + $u + $e + $o);
    return $jum_vokal;
  }

  function konsonan($kalimat){
    $jumlah = strlen($kalimat);
    // $a = substr_count($kalimat, 'a');
    // $i = substr_count($kalimat, 'i');
    // $u = substr_count($kalimat, 'u');
    // $e = substr_count($kalimat, 'e');
    // $o = substr_count($kalimat, 'o');
    // konsonan = jumlah huruf - jumlah vokal
    $jum_konsonan = $jumlah - vokal($kalimat);
    return $jum_konsonan;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nomor 4</title>
</head>
<body>

  <table border = "1" cellpadding = "7" align = "center">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Jumlah Huruf Vokal</th>
        <th>Jumlah Huruf Konsonan</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach($names as $name) : ?>
      <tr>
        <td> <?= $name ?> </td>
        <td> <?= vokal($name) ?> </td>
        <td> <?= konsonan ($name) ?> </td>

      </tr>
      <?php endforeach ; ?>
    </tbody>

  </table>
  
</body>
</html>