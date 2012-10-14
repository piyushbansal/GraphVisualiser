<?php
$name=$_POST["newgraphname"];
$fp=fopen("filename","w");
fwrite($fp,$name."\n");
$var=$name;
$var="database/".$var;
$var=$var.".json";
$fname=file_get_contents("database/.new.json");
$fp=fopen($var,"w");
chmod($var,0777);
$fp=fopen($var,"w");
fwrite($fp,$fname);
fclose($fp);
$fp=fopen("database/.default.json","w");
fwrite($fp,$fname);
$page='ontology.php';
header('Location: '.$page);
?>
