<?php
/*
	** Short Description of file:
	Called into action when user selects the option
	of Loading an already exisiting graph,checks if
	that particular graph exists, raise an error 
	otherwise.

	@Category: Backend,!mportant
	@Since: Svn revision-11.
	@Inspected on: 14 October
*/



$name=$_POST["loadgraphname"];
$var=$name;
$var="database/".$var;
$var=$var.".json";

// Checking being done here..

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
