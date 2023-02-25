<?php
  $names = ["Dami Jin", "Dita", "Harold", "Loui", "Ringo"];
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
      </tr>
    </thead>
    <tbody>
      <?php foreach($names as $name):?>
      <tr>
        <td>
          <?= $name ?>
        </td>
      </tr>
      <?php endforeach ; ?>

    </tbody>

  </table>
 
</body>
</html>