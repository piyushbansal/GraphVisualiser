<?php

/* 
   **Short Description of file:

   	The script is called into action when the user
	wishes to delete a particular link.
	It also checks if the link to be deleted
	exists, throws an error message otherwise.

	@Category: Backend,!mportant
	@Since: Svn Revision-7
	@Inspected on: 13 October

	*/

	function deleteLink($index)
	{
		$var=file_get_contents("../filename");
		$var=substr_replace($var,"",-1);
		$var="../database/".$var;
		$var=$var.".json";
		$file=file_get_contents($var);
		$obj=json_decode($file,true);
	
		//unsetting from JSON file

		unset($obj["links"][$index]);
		$obj["links"]=array_values($obj["links"]);
		
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
$var=file_get_contents("../filename");
$var=substr_replace($var,"",-1);
$var="../database/".$var;
$var=$var.".json";
$file=file_get_contents($var);
$obj=json_decode($file,true);
$count_links=count($obj["links"]);

/**************************************************************/
// Checking Done here:

for($i=0;$i<$count_links;$i++)
{
	if($obj["links"][$i]["name"]==$link)
	{
		$index=$i;
		break;
	}
}
$f=1;
if($i==$count_links)
{
	echo "<script>
	alert('Link with given name does not exists');
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
	deleteLink($index);
else
	echo "<meta http-equiv=Refresh content=0;url=../ontology.php>";
?>

