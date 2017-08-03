<?php
$path = dirname(__FILE__);
$files = glob($path.'wp-content/updraft/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}
?>