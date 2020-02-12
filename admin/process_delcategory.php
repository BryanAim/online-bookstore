<?php

	if(!empty($_POST))
	{
		$msg=array();
		if(empty($_POST['del']))
		{
			$msg[]="Please full fill all requirement";
		}
		
		if(!empty($msg))
		{
			echo '<b>Error:-</b><br>';
			
			foreach($msg as $k)
			{
				echo '<li>'.$k;
			}
		}
		else
		{
		
			$link=mysqli_connect("localhost","root","")or die("Can't Connect...");
			
			mysqli_select_db($link,"shop") or die("Can't Connect to Database...");
		
			$delcat=$_POST['del'];
			
			$query="delete from category where cat_nm ='$delcat' ";
		
			mysqli_query($link,$query) or die("can't Execute...");
			
			mysqli_close($link);
			header("location:category.php");
		}
	}
	else
	{
		header("location:index.php");
	}
?>
	
	