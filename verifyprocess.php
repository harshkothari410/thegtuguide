<?php
session_start();

			$connect=mysql_connect("localhost","alphasci_user","!@#$%");
			mysql_select_db("alphasci_gtu",$connect);	
			if(isset($_POST['code']))
			{
			$code=$_POST['code'];
			$uname=$_SESSION['username'];
         
                   $query="SELECT randnum FROM member_info where m_uname=\"".mysql_real_escape_string($uname)."\"";
				   $test=mysql_query($query,$connect);
				   if($test)
					{
							$row=mysql_fetch_assoc($test);
							if($row['randnum']==$code)
							{
								$upd="UPDATE member_info set vflag=1 where m_uname=\"".mysql_real_escape_string($uname)."\"";
								$update=mysql_query($upd,$connect);
								if($update);
								$_SESSION['login']=1;
								header('location: login.php');
							}
							else
							{
								$_SESSION['wrong']=1;
								header('location: verify.php');
							}					
					}
			}
			mysql_close($connect);
?>			