<?php

$value = (int) $_GET['isfolder'];
if($value == 1){
  $url = __DIR__."/public".$_POST['uri'];
  deleteDir($url);
} else {
  $url = __DIR__."/public".$_POST['uri'];
  unlink($url);
}

function deleteDir($url){
  $files = glob($url . '*', GLOB_MARK);
  foreach ($files as $file) {
      if(is_dir($file)) {
          deleteDir($file);
      } else {
          unlink($file);
      }
  }
  rmdir($url);
}

?>
