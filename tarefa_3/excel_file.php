<?php

  // Carregar a class
  include_once '../config.php';
  // Create Class Object
 // $tarefa_3 = new Tarefa_3($pdo);
 
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Documento ficheiro excel</title>
</head>
<body>
  <?php
    // defenir nome do arquivo que será exportado
  $arquivo = 'info_tarefa_3.xls';

  // criar tabela HTML com formato do ficheiro excel
  $html = '';
  $html .= '<table border="1">
            <tr><td colspan="8">Informação de dados da Tabela 3</td></tr>';
  $html .= '
          <tr>
            <td><b>ID</b></td>
            <td><b>Name</b></td>
            <td><b>Email</b></td>
            <td><b>Prefix</b></td>
            <td><b>Phone Number</b></td>
            <td><b>Newsletter</b></td>
            <td><b>Date</b></td>
            <td><b>Time</b></td>
          </tr>';
  $pdo = connectDB($db_web);
  $sql = "SELECT * From Tarefa_3";
  $num = $pdo->prepare($sql);
  $num->execute();
      // Apresentar conteúdos
      while ($row = $num->fetch(PDO::FETCH_ASSOC)) {
          $html .= '<tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['name'] . '</td>
            <td>' . $row['email'] . '</td>
            <td>' . $row['prefix'] . '</td>
            <td>' . $row['phoneNumber'] . '</td>
            <td>' . $row['newsletter'] . '</td>
            <td>' . $row['date'] . '</td>
            <td>' . $row['time'] . '</td>				
            </tr>';
      }

// configuraçoes header para forçar download do ficheiro
header("Access-Control-Allow-Origin: *");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
header("Content-Description: PHP Generated Data");

// header("Content-type: application/vnd.ms-excel");
//     header("Content-type: application/force-download");
//     header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
//     header("Pragma: no-cache");

echo $html;
  ?>
</body>
</html>