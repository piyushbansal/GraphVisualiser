<?php
	function deleteNode($index)
	{
		$file=file_get_contents("database/default.json");
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
		echo $obj2;
		$fp=fopen("database/default.json","w");
		fwrite($fp,$obj2);
	}
	deleteNode($_POST["deletenodename"]);
?>

