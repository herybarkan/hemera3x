<?php
$myFile = "tes_file.php";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = "<?php echo \"<h2>INI DITULIS DENGAN GENERATE PHP</h2>\" ; ?>";
fwrite($fh, $stringData);
$stringData = "<?php echo \"berhasil menulis file\"; ?>";
fwrite($fh, $stringData);
fclose($fh);
?>