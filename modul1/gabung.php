<?php
  $names = ["Dami Jin", "Dita", "Harold", "Loui", "Ringo"];

    function vokal ($kalimat){
        $a = substr_count(strtolower($kalimat), 'a');
        $i = substr_count(strtolower($kalimat), 'i');
        $u = substr_count(strtolower($kalimat), 'u');
        $e = substr_count(strtolower($kalimat), 'e');
        $o = substr_count(strtolower($kalimat), 'o');
        $jum_vokal = ( $a + $i + $u + $e + $o );
        return $jum_vokal;
    }

    function konsonan($kalimat) {
        $jumlah = strlen($kalimat);
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
  <title>Nomor 1</title>
</head>
<body>
  <table border = "1" cellpadding = "7" align = "center">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Jumlah Kata</th>
        <th>Jumlah Huruf</th>
        <th>Kebalikan Nama</th>
        <th>Jumlah Konsonan</th>
        <th>Jumlah Vokal</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach($names as $name): ?>
      <tr>
        <td>
          <?= $name ?>
        </td>
        <td>
          <?= str_word_count($name) ?>
        </td>
        <td>
          <?= strlen($name)?>
        </td>
        <td>
          <?= strrev($name) ?>
        </td>
        <td>
          <?= konsonan($name)?>
        </td>
        <td>
          <?= vokal($name) ?>
        </td>
      </tr>
      <?php endforeach ; ?>

    </tbody>

  </table>
 
</body>
</html>