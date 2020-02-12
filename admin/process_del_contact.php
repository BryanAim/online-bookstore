<?php

	$link=mysqli_connect("localhost","root","")or die("Can't Connect...");
			
			mysqli_select_db($link,"shop") or die("Can't Connect to Database...");
		
			
			
			$query="delete from contact where con_id =".$_GET['sid'];
		
			mysqli_query($link,$query) or die("can't Execute...");
			
			
			header("location:contact.php");

?>