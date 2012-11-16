<?php
/*
   ** Short Description of file:

   This file is called into action when a user 
   wishes to modify a particular node, checks if
   that node exists, can change its name/color.

   @Category: Backend,!mportant
   @Since: Svn Revision-11.
   @Inspected on: 15 October.
   */

/* 
 ** Additional Comments:

   *Issue-1:

   --> Check if the new node name entered already exists, not sure if works.
   			--Piyush.

   --> Checked,it works.(look at lines 70-71)
   			-- Chandan.
   */
	function modifyNode($index,$name,$color)
	{
		$var=file_get_contents("../filename");
		$var=substr_replace($var,"",-1);
		$var="../database/".$var;
		$var=$var.".json";
		$file=file_get_contents($var);
		$obj=json_decode($file,true);
		$obj["nodes"][$index]["name"]=$name;
		$obj["nodes"][$index]["group"]=$color;
		$obj2=json_encode($obj);
		echo $obj2;
		$fp=fopen($var,"w");
		fwrite($fp,$obj2);
		$fp=fopen("../database/.default.json","w");
		fwrite($fp,$obj2);
		$page='../ontology.php';
		header('Location: '.$page);
	}

extract($_GET);
echo $node1."<br>";
echo $name."<br>";
echo $color."<br>";
$var=file_get_contents("../filename");
$var=substr_replace($var,"",-1);
$var="../database/".$var;
$var=$var.".json";
$file=file_get_contents($var,"w");
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
for($i=0;$i<$count_nodes;$i++)
{
	if($i!=$index)
	{
		if($obj["nodes"][$i]["name"]==$name)
		{
			echo "<script>
				alert('Node with given name already exists');
		</script>";
		$f=0;
		break;
	}
	}
}
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
	modifyNode($index,$name,$color);
else
	echo "<meta http-equiv=Refresh content=0;url=../ontology.php>";
?>
