<?php
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['nm']) || empty($_POST['email']) || empty($_POST['query']))
		{
			$msg.="<li>Please full fill all requirement";
		}
		
				
		if(is_numeric($_POST['fnm']))
		{
			$msg.="<li>Name must be in String Format...";
		}
		
		if(is_numeric($_POST['email']))	
		{
			$msg.="<li>Name must be in appropriate Format...";
		}
		
		
		if($msg!="")
		{
			header("location:contact.php?error=".$msg);
		}
		else
		{
			$nm=$_POST['nm'];
			$email=$_POST['email'];
			$question=$_POST['query'];
			
			$link=mysql_connect("localhost","root","")or die("Can't Connect...");
			
			mysql_select_db($link,"shop") or die("Can't Connect to Database...");
			
			$query="insert into contact(con_nm,con_email,con_query)
			values('$nm','$email','$question')";
			
			mysql_query($link,$query) or die("Can't Execute Query...");
			header("location:contact.php?ok=1");
			//header("location:contact.php");
		}
	}
	else
	{
		header("location:index.php");
	}
?>