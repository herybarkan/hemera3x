 <?php
$myfile = fopen("new_index.php", "w") or die("Unable to open file!");
$txt = "<?php
${kdds}=\"DSPKQLEC200921102718\";
?>";
fwrite($myfile, $txt);
//chmod($myfile, 0777);
fwrite($myfile, $txt);
fclose($myfile);

/*$file="new_file.php";
$content="<?php echo \"file ini di create dari php\"; ?>";

$fp = fopen($file, 'w');
fwrite($fp, $content);
fclose($fp);
chmod($file, 0777); 
*/
?>
