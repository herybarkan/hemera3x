<?php

/*$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
chmod($myfile, 0777); 
*/
    $outFile = "examples-output.txt";
    $out = fopen($outFile, 'w') or die("can't open write file");

	var_dump(is_file($outfile));


?>