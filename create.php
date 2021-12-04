<?php

$value = (int) $_GET['isfolder'];
if($value == 1){
  $url = __DIR__."/public".$_POST['uri'];
  $created = mkdir($url);
  http_response_code(200);
} else {
  $url = __DIR__."/public".$_POST['uri'];
  $created = file_put_contents($url, '');
  http_response_code(200);
}

?>
