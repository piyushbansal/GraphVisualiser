<?php

/* 	
 	** Short Description of file:
	The script is called into action when user wishes to
	add a node, takes color and name as parameters, 
	checks if node already doesn't exist, 
	raise an error otherwise.

	@Category : Backend, !mportant
	@Since : Svn-Revision-7.
	@Inspected on : 13 October.
*/

	function addNode($name,$group_no)
	{
		$var=file_get_contents("../filename");
		$var=substr_replace($var,"",-1);
		$var="../database/".$var;
		$var=$var.".json";
		$file=file_get_contents($var);
		$obj=json_decode($file,true);
		$count_nodes=count($obj["nodes"]);
		$obj["nodes"][$count_nodes]["name"]=$name;
		$obj["nodes"][$count_nodes]["group"]=$group_no;
		$obj2=json_encode($obj);
		$fp=fopen($var,"w");
		fwrite($fp,$obj2);
		$fp=fopen("../database/.default.json","w");
		fwrite($fp,$obj2);
		$page='../ontology.php';
		header('Location: '.$page);
	}

// global variables go here

$name=$_POST["addnodename"];
$var=file_get_contents("../filename");
$var=substr_replace($var,"",-1);
$var="../database/".$var;
$var=$var.".json";
$file=file_get_contents($var);
$obj=json_decode($file,true);
$count_nodes=count($obj["nodes"]);
$f=1;

// Checking done here.

for($i=0;$i<$count_nodes;$i++)
{
	if($obj["nodes"][$i]["name"]==$name)
	{
		$f=0;
		echo "<script>
		alert('Node with given name already exists');
		</script>";
		break;
	}
}
if($f==1)
	addNode($name,intval($_POST["color"]));
else
	echo "<meta http-equiv=Refresh content=0;url=../ontology.php>";
?>

