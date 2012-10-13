<?php
	function addLink($source,$target)
	{
		$file=file_get_contents("database/default.json");
		$obj=json_decode($file,true);
		$count_links=count($obj["links"]);
		$obj["links"][$count_links]["source"]=$source;
		$obj["links"][$count_links]["target"]=$target;
		$obj["links"][$count_links]["value"]=1;
		$obj2=json_encode($obj);
		echo $obj2;
		$fp=fopen("database/default.json","w");
		fwrite($fp,$obj2);
	}
	addLink($_POST["addedgename1"],$_POST["addedgename2"]);
?>

