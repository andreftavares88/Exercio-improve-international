<?php
  if (count(get_included_files())==1){
    exit("Direct access not permitted.");
  }

  // Carregar a class
  require_once './objects/Tarefa_3.php';
  // Criar objecto de classe
  $tarefa_3 = new Tarefa_3($pdo);

  
  $html .= '<br><table class="table table-striped">';
  $html .= '<thead><tr><th>ID</th><th>Name</th><th>Email</th>'
        . '<th>Prefix</th><th>Phone Number</th><th>Newsletter</th><th>date</th><th>time</th></tr></thead><tbody>';

  // Obter número de registos
  $stmt = $tarefa_3->read();
  $num = $stmt->rowCount();

  if ($num > 0) {
    // Mostrar o conteúdo
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
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
  }else{
    $html .= '<tr><td colspan="6">Sem registos</td></tr>';
  }
  $html .= '</tbody></table>';
  $html .= '<a href="tarefa_3/excel_file.php"><button class="btn btn-success" type="button">Download Excel</button></a>';

  echo $html;
  