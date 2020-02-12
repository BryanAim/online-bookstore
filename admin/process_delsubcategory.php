<?php

	if(empty($_POST['subcatnm']))
		{
			echo "No Selected Category";
			
		}
		else
		{
	
			$link=mysqli_connect("localhost","root","") or die("Wrong connection");
			
			mysqli_select_db($link,"shop");
			
			$cid=$_POST['subcatnm'];
			
			$q="delete from subcat where subcat_id = $cid";
			
			mysqli_query($link,$q) or die("Can't Execute DELETE SUB CATEGORY....");	
			
			$q = "delete from book where b_subcat = ".$cid;
			mysqli_query($link,$q);
			
			header("location:category.php");
		}
?>
	
	