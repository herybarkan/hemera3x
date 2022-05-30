<?php
$estructure = '../../hemeralinks.com';

if(!mkdir($estructure, 0755, true)){
    echo "<br/><br/>ERROR: Fail to create the folder...<br/><br/>"; 
}  else echo "<br/><br/>!! Folder Created...<br/><br/>";

chmod($estructure, 0755);

?>
