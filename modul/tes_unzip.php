<?php
 

$zip = new ZipArchive;
if ($zip->open('../../hemeralinks.com/mweb.zip') === TRUE) {
    $zip->extractTo('../../hemeralinks.com/');
    $zip->close();
    echo 'ok';
} else {
    echo 'failed';
}

  
?>