<?php
session_start();
	$connect=mysql_connect("localhost","alphasci_user","!@#$%");
	mysql_select_db("alphasci_gtu",$connect);			 
?>
<?php
	 

if(isset($_POST['password']) && isset($_POST['newemail']))
{
	unset($_SESSION['cear']);
	unset($_SESSION['wupc']);
	unset($_SESSION['cenv']);
	unset($_SESSION['ec']);
	$uname=$_SESSION['username'];
	$password=$_POST['password'];
	$pwd=md5($password);

	$newemail=$_POST['newemail'];
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
$testmail=check_email_address($newemail);
								if(!$testmail)
								{
									$_SESSION['cenv']=1;
									header('location: changeemail.php');
									die("Email not valid");
								
								}	
	if(!empty($uname) && !empty($password) && !empty($newemail))
	{
		$query="SELECT * FROM member_info where m_uname=\"".mysql_real_escape_string($uname)."\" and m_pwd=\"".mysql_real_escape_string($pwd)."\"";
				   if($test=mysql_query($query,$connect))
				   {
				   		if(mysql_num_rows($test))
						{
							$query1="SELECT * from member_info where m_uname=\"".mysql_real_escape_string($uname)."\"";
							$test1=mysql_query($query1,$connect);
							if($test1)
							{
								
								$row1= mysql_fetch_array($test1);
								$query2="SELECT m_eid FROM member_info ";
								if($query_run=mysql_query($query2,$connect))
								{
					
									while($row2=mysql_fetch_assoc($query_run))
									{
										if($newemail==$row2["m_eid"])
										{
										$_SESSION['cear']=1;
										header('location: changeemail.php');
										die("Email already registered");
						
										}
									}
								}
								$upd="UPDATE member_info set m_eid=\"".mysql_real_escape_string($newemail)."\",vflag=0 where m_uname=\"".mysql_real_escape_string($uname)."\"";
								if($update=mysql_query($upd,$connect))
								{
								
								$rand=rand(10000,5000000);
								
								$changequery="SELECT * from member_info where m_uname=\"".mysql_real_escape_string($uname)."\"";
								$change=mysql_query($changequery,$connect);
								if($change)
								{
									$changeupdatequery="UPDATE member_info set randnum=$rand where m_uname=\"".mysql_real_escape_string($uname)."\"";
									$changeupdate=mysql_query($changeupdatequery,$connect);
									$to=$newemail;
									$subject="Verify your Mail Account";
									$body="Your verification code is $rand.";
									$headers=" From : alphasci_gtu.com";
									if($mail=mail($to,$subject,$body,$headers))
									{
										$_SESSION['ce']=1;
										unset($_SESSION['login']);
										header('location: changeemail.php');
										die();
										
									}
								
								}
								}
							}
						}
						else
						{
							$_SESSION['wupc']=1;
							header('location: changeemail.php');
							die();
						}
					}
		
	}		
}				
											
 require_once("lib/lib_head.php"); ?>


  <title>alphasci_gtu | Change Password</title>

</head>
<body >
  <div id="main">


<?php if(!isset($_SESSION['login']))
{
require_once("lib/lib_menu.php");
}
else
{require_once("lib/lib_menu1.php"); }?>

    <div id="site_content">
      <div id="sidebar_container">

      <?php require_once("lib/lib_container1_logout_search_counter1.php"); ?>

      <?php require_once("lib/lib_container4_likebox.php"); ?>

      <?php require_once("lib/lib_container5_useful_links.php"); ?>

      </div>
      <div id="content">
      <center><h1> <b> Change E-mail Account	 </b> </h1></center>
 <?php
if(isset($_SESSION['cenv']))
{
	?><center><font color="red">E-mail Not Valid</font></center><?php
	unset($_SESSION['cenv']);
}
if(isset($_SESSION['wupc']))
{
	?><center><font color="red">Enter Correct Password</font></center><?php
	unset($_SESSION['wupc']);
}

if(isset($_SESSION['cear']))
{
	?><center><font color="red">E-mail you have entered is already registered</font></center><?php
	unset($_SESSION['cear']);
}
if(isset($_SESSION['ce']))
{
	?><center><font color="red">E-mail changed. Verification code is sent.</font></center><?php
	?><br /><br /><center><a href="verify.php">Click to verify your new E-mail Account</a></center><?php
	unset($_SESSION['ce']);
	
}
else
{
?>
<form id="contact" name="changeemail" action="changeemail.php" method="post">
          <div class="form_settings">
            
            <p><span><b>Password :</b></span><input class="contact" type="password" name="password" value="" /></p><br />
            <p><span><b>New E-mail :</b></span><input class="contact" type="text" name="newemail" value="" /></p><br />
            <br />
            <p style="padding-top: 10px"><span>&nbsp;</span>
            <input class="submit" type="submit"  value="Send" />
            <a href="manage.php"><input class="submit" type="button"  value="Go back" onclick="manage.php"/></a>
            </p>
          </div>
        </form>
<?php } ?>
		  </div>
    </div>
</div>
  <?php require_once("lib/lib_scroll_to_top.php"); ?>
    <?php require_once("lib/lib_footer.php"); ?>

  </div>

  <?php require_once("lib/lib_last_javascript.php"); ?>

</body>


