<?php

$value = (int) $_GET['isfolder'];
if($value == 1){
  $url = __DIR__."/public"."/".$_POST['uri'];
  $oldUrl = __DIR__."/public"."/".$_POST['olduri'];
  rename($oldUrl, $url);
  http_response_code(200);
} else {
}

?>
