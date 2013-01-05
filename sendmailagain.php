<?php 
session_start();
			$connect=mysql_connect("localhost","alphasci_user","!@#$%");
			mysql_select_db("alphasci_gtu",$connect);
			
			$uname=$_SESSION['username'];
			
			$vflag="SELECT * from member_info where m_uname=\"".mysql_real_escape_string($uname)."\"";
			$test1=mysql_query($vflag,$connect);
			if($test1)
			{
				$row = mysql_fetch_array($test1);

				$email=$row['m_eid'];
				$code=$row['randnum'];
				
				$to=$email;
				$subject="Verify your Mail Account";
				$body="Your verification code is $code.";
				$headers=" From : alphasci_gtu.com";
				if($mail=mail($to,$subject,$body,$headers))
				{
					$_SESSION['sendmailagain']=1;
					header('location: verify.php');
					die();
				}

			}
?>