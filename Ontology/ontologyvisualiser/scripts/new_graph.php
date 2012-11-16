<?php

/*
   ** Short File Description : 
   This file is employed in to use whenever the user 
   selects "New Graph" option from the main menu.

   ** Should work on all PHP version <=5

   ** @Since: Svn Revision-11.
   ** @Category: Backend,!mportant
   ** @Module: /src/

   ** LICENCE : Copyleft, No Rights Reserved.
*/

$name=$_POST["newgraphname"];

// filename is the file which stores the name of the file which stores the name of current file which is being edited.

$fp=fopen("../filename","w");
fwrite($fp,$name."\n");
$fp=fopen("../filelist","a");
fwrite($fp,$name."\n");
$var=$name;
$var="../database/".$var;
$var=$var.".json";
$fname=file_get_contents("../database/.new.json");
$fp=fopen($var,"w");
chmod($var,0777);
$fp=fopen($var,"w");

//Some check condition must be here that checks if the file already exists. Not implemented Yet.

fwrite($fp,$fname);
fclose($fp);
$fp=fopen("../database/.default.json","w");
fwrite($fp,$fname);
$fp=fopen("../database/.default.2.json","w");
fwrite($fp,$fname);
$page='../ontology.php';
header('Location: '.$page);
?>
