<?php
	$connect=mysql_connect("localhost","alphasci_user","!@#$%");
	mysql_select_db("alphasci_gtu",$connect);
	
	$query="SELECT mail_id from subscribe";
	$result=mysql_query($query,$connect);
	
	if($result)
	{
		$to="mitsuthar@gmail.com, rashah91@gmail.com";
		while($row=mysql_fetch_assoc($result))
		{
			$to .=", ";
			$to .=$row['mail_id'];
		}
		$subject="Subscription mail";
		$body="Subscription mail. welcome";
		$headers=" From : alphasci_gtu.com";
		if($mail=mail($to,$subject,$body,$headers))
		{
			echo "mails sent";
		}
	}
	mysql_close($connect);
?>
			
			
		