<?php
echo'
<html>
<head>
<title>Add A Node</title>
</head>
<body>
<form id ="myForm" method="post" action="add_node.php">
Node Name<br/><input type="text" size="30" maxlength="30" name="name" ><br />
Group Number<br/><input type="text" size="12" maxlength="20" name="group_no"><br/>
<input type="button" value="Submit" onclick="validateForm()"><br/>
</form>
</body>
<script type="text/javascript">
function validateForm()
{
	var x=document.forms["myForm"]["name"].value;
	var y=document.forms["myForm"]["group_no"].value;
	if (x==null || x=="" ||y==null||y=="")
	{
		alert("Node name/Group no. cannot be left blank");
		return false;
	}
	else
	{
		document.forms.myForm.submit()
	}
}
</script>
</html>'
?>
