<?php
	function addNode($name,$group_no)
	{
		$file=file_get_contents("database/default.json");
		$obj=json_decode($file,true);
		$count_nodes=count($obj["nodes"]);
		$obj["nodes"][$count_nodes]["name"]=$name;
		$obj["nodes"][$count_nodes]["group"]=intval($group_no);
		$obj2=json_encode($obj);
		echo $obj2;
		$fp=fopen("database/default.json","w");
		fwrite($fp,$obj2);
	}
addNode($_POST["addnodename"],$_POST["addnodecolor"])
?>

