<?php
  if (count(get_included_files())==1){
    exit("Direct access not permitted.");
  }

  // Load Class
  require_once './objects/Tarefa_2.php';

  // Create Class Object
  $tarefa_2 = new Tarefa_2($pdo);

  $html .= '<table class="table table-striped">';
  $html .= '<thead><tr><th>ID</th><th>Module Name</th><th>Date</th>'
        . '<th>Location</th><th>Content</th><th>Speaker</th><th>Speaker_qual</th></tr></thead><tbody>';

  // Get Products and number of records
  $stmt = $tarefa_2->read();
  $num = $stmt->rowCount();

  if ($num > 0) {
    // Display Contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $html .= '<tr>
					<td>' . $row['id'] . '</td>
					<td>' . $row['module_name'] . '</td>
					<td>' . $row['date'] . '</td>
					<td>' . $row['location'] . '</td>
					<td>' . $row['content'] . '</td>
					<td>' . $row['speaker'] . '</td>
          <td>' . $row['speaker_qual'] . '</td>
          
          </tr>';
    }
  }else{
    $html .= '<tr><td colspan="6">Sem registos</td></tr>';
  }
  $html .= '</tbody></table>';

  echo $html;
  