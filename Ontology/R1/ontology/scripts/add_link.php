<?php

/* Short description of File:

   The Script is called into action when the user 
   wishes to add a particlular link between any 
   two nodes. It checks, if the nodes with gives name
   exist, throws an error otherwise.

   @Category: Backend,!mportant
   @Since: Svn Revison 8
   @Inspected on: 14 October

   */

	function addLink($source,$target)
	{
		$var=file_get_contents("../filename");
		$var=substr_replace($var,"",-1);
		$var="../database/".$var;
		$var=$var.".json";
		$file=file_get_contents("$var");
		$obj=json_decode($file,true);
		$count_links=count($obj["links"]);
		$obj["links"][$count_links]["source"]=$source;
		$obj["links"][$count_links]["target"]=$target;
		$obj["links"][$count_links]["value"]=1;
		$obj2=json_encode($obj);
		$fp=fopen($var,"w");
		fwrite($fp,$obj2);
		$fp=fopen("../database/.default.json","w");
		fwrite($fp,$obj2);
		$page='../ontology.php';
		header('Location: '.$page);
	}

// Global Variables go here

$node1=$_POST["addedgename1"];
$node2=$_POST["addedgename2"];
$var=file_get_contents("../filename");
$var=substr_replace($var,"",-1);
$var="../database/".$var;
$var=$var.".json";
$file=file_get_contents("$var");
$obj=json_decode($file,true);
$count_nodes=count($obj["nodes"]);

/******************************************************/
// Checking done here

$f=1;
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
echo $source."\n".$target;
if($i==$count_nodes)
	$f=0;

if($source==$target)
	$f=-1;

if($f==1)
	addLink($source,$target);

/***************************************************************/

else
{
	if($f==0)
	{
	echo "<script>
		alert('Node(s) with given name do(es) not exist(s)');
		</script>";
	}
	if(f==-1)
	{
	echo "<script>
		alert('Both nodes cannot be same');
		</script>";
	}
	echo "<meta http-equiv=Refresh content=0;url=../ontology.php>";
}
?>
