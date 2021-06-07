<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once './config.php';
$pdo = connectDB($db_web);

// Carregar módulo ativo
$module = filter_input(INPUT_GET, "m",FILTER_SANITIZE_STRING);

// Validar módulo ativo
$module = validateModule($module, $modules)?$module:'home';

// Carregar ação
$action= filter_input(INPUT_GET, 'a',FILTER_SANITIZE_STRING);

// Testar se existe ficheiro a carregar. caso contrário carregar HOME
if (!file_exists("./$module/$action.php")){
   $module = 'home';
   $action = 'text';
}


// Carregar menu
$main_menu = loadMenu($modulo, $modules);



?>
<!DOCTYPE html>
<html>
    <head>
        
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
      <nav class="navbar navbar-expand navbar-light bg-light">
        <ul class="nav nav-pills">
          <?= $main_menu ?>
        </ul>
      </nav>

      <div class="container">
        <div></div>
        <div><?php @require_once "$module/$action.php"; ?></div>
      </div>
    </body>
</html>