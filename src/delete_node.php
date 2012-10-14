<?php
	function deleteNode($index)
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
			if($obj["links"][$i]["source"]==$index)
				unset($obj["links"][$i]);
			else if($obj["links"][$i]["target"]==$index)
					unset($obj["links"][$i]);
		}

		unset($obj["nodes"][$index]);
		$obj["nodes"]=array_values($obj["nodes"]);
		$obj["links"]=array_values($obj["links"]);
		
		$count_links=count($obj["links"]);
		for($i=0;$i<$count_links;$i++)		
		{
			if($obj["links"][$i]["source"]>$index)
				$obj["links"][$i]["source"]=$obj["links"][$i]["source"]-1;
			if($obj["links"][$i]["target"]>$index)
				$obj["links"][$i]["target"]=$obj["links"][$i]["target"]-1;
		}

		$obj2=json_encode($obj);
		$fp=fopen($var,"w");
		fwrite($fp,$obj2);
		$fp=fopen("database/.default.json","w");
		fwrite($fp,$obj2);
		$page='ontology.php';
		header('Location: '.$page);
	}
$node1=$_POST["deletenodename"];
$var=file_get_contents("filename");
$var=substr_replace($var,"",-1);
$var="database/".$var;
$var=$var.".json";
$file=file_get_contents($var);
$obj=json_decode($file,true);
$count_nodes=count($obj["nodes"]);
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
if($f==1)
	deleteNode($index);
else
	echo "<meta http-equiv=Refresh content=0;url=ontology.php>";
?>

