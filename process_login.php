<?php session_start();
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['usernm']))
		{
			$msg.="<li>No such User";
			
		}
		
		if(empty($_POST['pwd']))
		{
			$msg.="<li>Password Incorrect........";
			
		}
		if($msg!="")
		{
			header("location:search.inc.php?error=".$msg);
		}
		else
		{
			
			
		
			$link=mysqli_connect("localhost","root","")or die("Can't Connect...");
			
			mysqli_select_db($link,"shop") or die("Can't Connect to Database...");
			
			$unm=$_POST['usernm'];
			$pwd =$_POST['pwd'];
			
			$q="select * from user where u_unm='$unm'";
			
			$res=mysqli_query($link,$q) or die("wrong query");
			
			$row=mysqli_fetch_assoc($res);
			
			if(!empty($row))
			{    
				if($_POST['pwd']==$row['u_pwd'])
				{   
					$_SESSION=array();
					//$_SESSION['Userid']=$row['u_id'];
					$_SESSION['unm']=$row['u_unm'];
					$_SESSION['uid']=$row['u_pwd'];
					
					$_SESSION['status']=true;
					
					if($_SESSION['unm']!="admin")
					{   $_SESSION['unm'] = $userName;
					     
					
						header("location:index.php");
					}
					else
					{
						header("location:admin/index.php");
					}
				}
				
				else
				{
					echo 'Incorrect Password....';
				}
			}
			else
			{
				echo 'Invalid User';
			}
		}
	
	}
	else
	{
		header("location:index.php");
	}
			
?>