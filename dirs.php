<?php
header('Content-Type: application/json');

function getDirectories($dir){
    $result = array();
    $cdir = array_diff(scandir($dir), array('..', '.'));

    foreach ($cdir as $key => $value){
        if(is_dir($dir . '/' . $value)){
            $result[$value] = getDirectories($dir . '/' . $value);
        } else {
            $result[] = $value;
        }
    }

    return $result;
}

echo json_encode(getDirectories(__DIR__.'/public'), JSON_FORCE_OBJECT);
?>