<?php

/* 	
 	** Short Description of file:
	The script is called into action when user wishes to
	add a link, takes name as parameter, 
	checks if edge already doesn't exist, 
	raise an error otherwise.

	@Category : Backend, !mportant
	@Since : Svn-Revision-7.
	@Inspected on : 13 October.
*/

	function addLink($name,$group_no)
	{
		$var=file_get_contents("../filename");
		$var=substr_replace($var,"",-1);
		$var="../database/".$var;
		$var=$var.".json";
		$file=file_get_contents($var);
		$obj=json_decode($file,true);
		$count_links=count($obj["links"]);
		$obj["links"][$count_links]["name"]=$name;
		$obj2=json_encode($obj);
		$fp=fopen($var,"w");
		fwrite($fp,$obj2);
		$fp=fopen("../database/.default.json","w");
		fwrite($fp,$obj2);
		$page='../ontology.php';
		header('Location: '.$page);
	}

// global variables go here

$name=$_POST["addlinkname"];
$var=file_get_contents("../filename");
$var=substr_replace($var,"",-1);
$var="../database/".$var;
$var=$var.".json";
$file=file_get_contents($var);
$obj=json_decode($file,true);
$count_links=count($obj["links"]);
$f=1;

// Checking done here.

for($i=0;$i<$count_links;$i++)
{
	if($obj["links"][$i]["name"]==$name)
	{
		$f=0;
		echo "<script>
		alert('Link with given name already exists');
		</script>";
		break;
	}
}
if($f==1)
	addLink($name);
else
	echo "<meta http-equiv=Refresh content=0;url=../ontology.php>";
?>

