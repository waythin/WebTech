<?php include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/menu.php';

$fullMenu = Menu::getFullMenu();
$menu = array();
foreach($fullMenu as $item) {
    //var_dump($item);
    if(!array_key_exists($item['type'], $menu)) { $menu[$item['type']] = array(); }    
    array_push($menu[$item['type']], $item);
}

header('Content-Type: application/json');
die(json_encode($menu));
