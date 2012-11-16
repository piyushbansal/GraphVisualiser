<?php
extract($_GET);

$var=file_get_contents("../filename");
$var=substr_replace($var,"",-1);
$var="../database/".$var;
$var=$var.".2.json";
chmod($var,0777);
$fp=fopen($var,"w");
fwrite($fp,$nodes);
fclose($fp);
$fp=fopen("../database/.default.2.json","w");
fwrite($fp,$nodes);
fclose($fp);
$page='../ontology.php';
header('Location: '.$page);
?>
