<?php
	function deleteLink($source,$target)
	{
		$file=file_get_contents("database/default.json");
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
		}

		$obj2=json_encode($obj);
		$fp=fopen("database/default.json","w");
		fwrite($fp,$obj2);
	}
deleteLink($_POST["deleteedgename1"],$_POST["deleteedgename2"])
?>

