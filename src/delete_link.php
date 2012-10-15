<?php

/* Short description of the file:
   	The script is called into action when te user
	wishes to delete some edge between two already existing nodes,
	It checks if the nodes already exist
	throws an error otehrwise.

	@Category: Backend,!mportant
	@Since: Svn Revision-9
	@Inspected on: October 13

	*/

// Notice that filename is the temporary working file ( Current Database).

	function deleteLink($source,$target)
	{
		$var=file_get_contents("filename");
		$var=substr_replace($var,"",-1);
		$var="database/".$var;
		$var=$var.".json";
		$file=file_get_contents($var);
		$obj=json_decode($file,true);
		$count_links=count($obj["links"]);
		for($i=0;$i<$count_links;$i++)		
		{
			if($obj["links"][$i]["source"]==$source)			
			{
				if($obj["links"][$i]["target"]==$target)			
				{
						unset($obj["links"][$i]);
						break;
				}
			}
			else if($obj["links"][$i]["source"]==$target)			
			{
				if($obj["links"][$i]["target"]==$source)			
				{
						unset($obj["links"][$i]);
						break;
				}

			}
		}

		$obj["links"]=array_values($obj["links"]);
		$obj2=json_encode($obj);
		echo $obj2;
		$fp=fopen($var,"w");
		fwrite($fp,$obj2);
		$fp=fopen("database/.default.json","w");
		fwrite($fp,$obj2);
		$page='ontology.php';
		header('Location: '.$page);
	}

// Global Variables go here

$node1=intval($_POST["deleteedgename1"]);
$node2=intval($_POST["deleteedgename2"]);
$var=file_get_contents("filename");
$var=substr_replace($var,"",-1);
$var="database/".$var;
$var=$var.".json";
$file=file_get_contents("$var");
$obj=json_decode($file,true);
$count_nodes=count($obj["nodes"]);
$f=1;

/******************************************************/
//Checking Done here

for($i=0;$i<$count_nodes;$i++)
{
	if($obj["nodes"][$i]["name"]==$node1)
	{
		$source=$i;
		break;
	}
}
if($i==$count_nodes)
	$f=0;
for($i=0;$i<$count_nodes;$i++)
{
	if($obj["nodes"][$i]["name"]==$node2)
	{
		$target=$i;
		break;
	}
}
if($i==$count_nodes)
	$f=0;
if($f==1)
	deleteLink($source,$target);

/*********************************************************/
// 		Throw an error otherwise

else
{
	$f=1;
	echo "<script>
		alert('Node(s) with given name does not exist(s)');
		</script>";
	echo "<meta http-equiv=Refresh content=0;url=ontology.php>";
}
?>
