<?php

	if(!empty($_POST))
	{
		$msg="";
		if(empty($_POST['cat']))
		{
			$msg.="<li>Please full fill all requirement";
		}
		
		if($msg!="")
		{
			header("location:category.php?error=".$msg);
		}
		else
		{
		
			$link=mysql_connect("localhost","root","")or die("Can't Connect...");
			
			mysql_select_db($link,"shop") or die("Can't Connect to Database...");
		
			$cat=$_POST['cat'];
			
			$query="insert into category(cat_nm) values('$cat')";
			
			mysql_query($link,$query) or die("can't Execute...");
			
			mysql_close($link);
			header("location:category.php");
		}
	}
	else
	{
		header("location:index.php");
	}
?>
	
	