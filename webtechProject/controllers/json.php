<?php 
function getJSONData()
{
    $str_data = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/webtechProject/info.json');
    $data = json_decode($str_data, true);
    return $data;
}