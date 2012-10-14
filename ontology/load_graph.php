<?php
$name=$_POST["loadgraphname"];
$var=$name;
$var="database/".$var;
$var=$var.".json";
if(file_exists($var)==1)
{
	$fp=fopen("filename","w");
	fwrite($fp,$name);
	$fname=file_get_contents($var);
	$fp=fopen("database/.default.json","w");
	fwrite($fp,$fname);
	$page='ontology.php';
	header('Location: '.$page);
}
else
{
	echo "<script>
		alert('Graph with given name does not exists');
		</script>";
	echo "<meta http-equiv=Refresh content=0;url=ontology.php>";
}
?>
