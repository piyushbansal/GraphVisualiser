<?php

/* 
   **Short Description of file:

   	The script is called into action when the user
	wishes to delete a particular node.
	It also checks if the node to be deleted
	exists, throws an error message otherwise.

	@Category: Backend,!mportant
	@Since: Svn Revision-7
	@Inspected on: 13 October

	*/

	function deleteNode($index)
	{
		$var=file_get_contents("../filename");
		$var=substr_replace($var,"",-1);
		$var="../database/".$var;
		$var=$var.".json";
		$file=file_get_contents($var);
		$obj=json_decode($file,true);
	
		//unsetting from JSON file

		unset($obj["nodes"][$index]);
		$obj["nodes"]=array_values($obj["nodes"]);
		
		$obj2=json_encode($obj);
		$fp=fopen($var,"w");
		fwrite($fp,$obj2);
		$fp=fopen("../database/.default.json","w");
		fwrite($fp,$obj2);
		$page='../ontology.php';
		header('Location: '.$page);
	}

// Global Variables go here

extract($_GET);
echo $node1;
$var=file_get_contents("../filename");
$var=substr_replace($var,"",-1);
$var="../database/".$var;
$var=$var.".json";
$file=file_get_contents($var);
$obj=json_decode($file,true);
$count_nodes=count($obj["nodes"]);

/**************************************************************/
// Checking Done here:

for($i=0;$i<$count_nodes;$i++)
{
	if($obj["nodes"][$i]["name"]==$node1)
	{
		$index=$i;
		break;
	}
}
$f=1;
if($i==$count_nodes)
{
	echo "<script>
	alert('Node with given name does not exists');
	</script>";
	$f=0;
}

/**************************************************************/
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


if($f==1)
	deleteNode($index);
else
	echo "<meta http-equiv=Refresh content=0;url=../ontology.php>";
?>

