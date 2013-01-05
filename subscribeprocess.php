<?php
session_start();
$connect=mysql_connect("localhost","alphasci_user","!@#$%");
mysql_select_db("alphasci_gtu",$connect);
		
		  function check_email_address($email) {
  // First, we check that there's one @ symbol, 
  // and that the lengths are right.
  if (!@ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
    // Email invalid because wrong number of characters 
    // in one section or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
    if
(!@ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
?'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
$local_array[$i])) {
      return false;
    }
  }
  // Check if domain is IP. If not, 
  // it should be valid domain name
  if (!@ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if
(!@ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
?([A-Za-z0-9]+))$",
$domain_array[$i])) {
        return false;
      }
    }
  }
  return true;
}

		
if(isset($_POST['your_name']) && isset($_POST['your_email']) && isset($_POST['txtInput']))
{
			
	$name=$_POST['your_name'];
	$mail=$_POST['your_email'];
	$cptv=$_POST['txtInput'];
	if(!empty($name) && !empty($mail) && !empty($cptv))
	{
											
		if($_POST['txtInput']!=$_POST['txtCaptcha'])
		{
			$_SESSION['cpe']=1;
			header('location: subscribe.php');			
		}

		else if(!check_email_address($mail))
		{
			$_SESSION['emnv']=1;
			header('location: subscribe.php');
		}

		else
		{

			$query="SELECT mail_id FROM subscribe";
			if($query_run1=mysql_query($query,$connect))								
			{
							
				while($row=mysql_fetch_assoc($query_run1))
				{
					if($mail==$row["mail_id"])
					{
						$_SESSION['ar']=1;
						header('location: subscribe.php');
						die();
					}
				}
			}
			$query2="insert into subscribe values(\"".mysql_real_escape_string($name)."\",\"".mysql_real_escape_string($mail)."\")";
			mysql_query($query2,$connect);
			$to=$mail;
			$subject="Subscription regestered";
			$body="You have successfully subscribed";
			$headers=" From : alphasci_gtu.com";
			mail($to,$subject,$body,$headers);
			$_SESSION['sub']=1;
			header('location: subscribe.php');
		}
 	}
	else	
	{
		$_SESSION['emp']=1;
		header('location: subscribe.php');
	}
}

mysql_close($connect);
?>
