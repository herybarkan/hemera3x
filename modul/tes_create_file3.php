 <?php
$text = "DSPKQLEC200921102718";
$kdds = var_export($text, true);
$var = "<?php\n\n\$kdds = $kdds;\n\n?>";
file_put_contents('../file_kdds.php', $var);

?>
