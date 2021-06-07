<?php
  if(count(get_included_files()) ==1){
    exit("Direct access not permitted."); 
  }

  //Load Class
  require_once './objects/Tarefa_1.php';

  // Create object from Class
  $tarefa_1 = new Tarefa_1($pdo);

  $submit = filter_input(INPUT_POST, 'submit');
  if ($submit) {
    
    // Verify form data
    $name = filter_input(INPUT_POST, 'NAME', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'EMAIL', FILTER_SANITIZE_EMAIL);
    $prefix = filter_input(INPUT_POST, 'PREFIX',FILTER_SANITIZE_STRING);
    $phoneNumber = filter_input(INPUT_POST, 'PHONENUMBER', FILTER_SANITIZE_NUMBER_INT);
    $newsletter = filter_input(INPUT_POST, 'NEWSLETTER', FILTER_SANITIZE_NUMBER_INT);
    
    $errors = false;
    if ($name == '') {
        $html .= '<div class="alert-danger">Tem que definir o nome.</div>';
        $errors = true;
    }
    if ($email == '') {
        $html .= '<div class="alert-danger">Tem que definir um email.</div>';
        $errors = true;
    }
    if ($prefix == '') {
        $html .= '<div class="alert-danger">Tem que definir um Prefixo do Contacto.</div>';
        $errors = true;
    }
    if ($phoneNumber == '') {
        $html .= '<div class="alert-danger">Tem que definir um Numero de Contacto.</div>';
        $errors = true;
    }
    if ($newsletter == '') {
      //$html .= '';
      $newsletter = 0;
      $errors = false;
    }

    // auto increment of the table id
    $sqlID = 'SELECT id FROM tarefa_1 WHERE id LIMIT 1';
    $stmt = $pdo->prepare($sqlID);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $id = $stmt->rowCount() + 1;
      $errors = false;
    }else{
      $id = 1;
      $errors = false;
    }

    // Verify existing email
    $sqlEMAIL = "SELECT id FROM tarefa_1 WHERE email = :EMAIL LIMIT 1";
    $stmt = $pdo->prepare($sqlEMAIL);
    $stmt->bindValue(":EMAIL", $email, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $html .= '<div class="alert-danger">O email indicado já se encontra registado.</div>';
        $errors = true;
    }

    if (!$errors) {
      // Instanciar propriedades do objeto com valores do formulário
      $tarefa_1->id = $id;
      $tarefa_1->name = $name;
      $tarefa_1->email = $email;
      $tarefa_1->prefix = $prefix;
      $tarefa_1->phoneNumber = $phoneNumber;
      $tarefa_1->newsletter = $newsletter;
      $tarefa_1->date = date('Y-m-d');
      $tarefa_1->time = date('H:i:s');

      // Criar produto
      if ($tarefa_1->create()) {
          $html .= 'Registo Criado';
      }else {
          $html .= 'Não foi possível criar o registo';
      }
    }
} else {
    $html .= '                
      <form method="POST" action="?m=' . $module . '&a='.$action.'">
          <input class="form-control" type="text" placeholder="Nome" name="NAME"><br>
          <input class="form-control" type="email" placeholder="Email" name="EMAIL"><br>
          <input class="form-control" type="text" placeholder="Prefixo" name="PREFIX"><br>
          <input class="form-control" type="text" placeholder="contacto" name="PHONENUMBER"><br>
          <input type="checkbox" id="newsletter" name="NEWSLETTER" value="1">
          <label for="newsletter">Selecione para consentir o armanezamento dos dados</label><br>
          <input type="submit" class="btn btn-primary" name="submit" value="Adicionar">
          <input type="reset" class="btn btn-secondary" value="Limpar">
      </form>';
}
echo $html;
