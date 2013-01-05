<?php
session_start();
			$connect=mysql_connect("localhost","alphasci_user","!@#$%");
			mysql_select_db("alphasci_gtu",$connect);				

  if(isset($_POST['username']) && isset($_POST['password']))
{
          $uname=$_POST['username'];
		  
		
          $pwd=md5($_POST['password']);
		  
					
                   $query="SELECT * FROM member_info where m_uname=\"".mysql_real_escape_string($uname)."\" and m_pwd=\"".mysql_real_escape_string($pwd)."\"";
				   if($test=mysql_query($query,$connect))
				   {
				   
					if(mysql_num_rows($test))
					{
						$_SESSION['username']=$uname;
						
						$vflag="SELECT * from member_info where m_uname=\"".mysql_real_escape_string($uname)."\"";
						$test1=mysql_query($vflag,$connect);
						if($test1)
						{
						
						
						
						
						$row = mysql_fetch_array($test1);
											
						
						
						if($row['vflag']==1)
						{
							$_SESSION['login']=1;
							header('location: login.php');
							
						}
						else 
						{
							

							header('location: verify.php');
						}
						}
						
					}
					else
					{
					$_SESSION['loginfail']=1;
					header('location: index.php');
					die();
					}
}
}
					
mysql_close($connect);
?>