<?php


$db_web = [
    'host' => 'cp1.improveinternational.pt',
    'dbname' => 'improve_test_1',
    'username' => 'improve_test_user',
    'password' => 'cyXiJ9?pL47&'
];



function connectDB($db) {
    try {
        $sqldb = new PDO(
                'mysql:host=' . $db['host'] . '; ' .
                'dbname=' . $db['dbname'] . ';',
                $db['username'], $db['password']);
    } catch (PDOException $e) {
        die('Erro ao ligar ao servidor ' . $e->getMessage());
    }
    return $sqldb;
}

/**
 * Array containing the application modules 
 */
$modules = Array(
    'home' => Array('enabled' => true, 'text' => 'Home', 'link' => '?m=home&a=text'),
    'tarefa_1' => Array('enabled' => true, 'text' => 'Tarefa_1', 'link' => '?m=tarefa_1&a=create_tableDB'),
    'tarefa_2' => Array('enabled' => true, 'text' => 'Tarefa_2', 'link' => '?m=tarefa_2&a=read_tableDB'),
    'tarefa_3' => Array('enabled' => true, 'text' => 'Tarefa_3', 'link' => '?m=tarefa_3&a=download_table')
);

/**
 * Função para carregar os items do menu
 * @param $module string com o módulo ativo
 * @param $modules array com os módulos
 * @return string String com HTML do menu
 */
function loadMenu($module = '',$modules = Array()) {
    $html = '';
    foreach ($modules as $m => $item) {
        if ($item['enabled']) {
            $html .= '<li class="nav-item">
        <a class="nav-link ' . ( ($m == $module) ? 'active' : '' ) . '" href="' . $item['link'] . '">' . $item['text'] . '</a></li>';
        }
    }
    return $html;
}

/**
 * Função para validar um módulo
 * @param $module string com o módulo a validar
 * @param $modules array com os módulos
 * @return Boolean Devolve <b>TRUE</b> caso o módulo exista, <b>FALSE</b> caso contrário
 */
function validateModule($module, $modules) {
    $result = false;
    foreach ($modules as $m => $item) {
        $result = $result || $m == $module;
    }
    return $result;
}
