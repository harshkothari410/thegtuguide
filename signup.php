<?php
session_start();

			$connect=mysql_connect("localhost","alphasci_user","!@#$%");
			mysql_select_db("alphasci_gtu",$connect);				

  if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repassword']) && isset($_POST['fname']) && isset($_POST['lname']))
{
	unset($_SESSION['uat']);
	unset($_SESSION['ear']);
	unset($_SESSION['env']);
	unset($_SESSION['pdnm']);
	unset($_SESSION['success']);
	unset($_SESSION['cpte']);
	unset($_SESSION['emptyfields']);
	if(!isset($_POST['txtInput']) || empty($_POST['txtInput']))
	{
		$_SESSION['cpte']=1;
		header('location: signup.php');
		die("Captcha empty");
	}
	if($_POST['txtInput']!=$_POST['txtCaptcha'])
	{
		$_SESSION['cpte']=1;
		header('location: signup.php');
		die("Wrong captcha");
	}
	
	
	
	
          $uname=$_POST['username'];
          $pwd=$_POST['password'];
          $repwd=$_POST['repassword'];
		  $fname=$_POST['fname'];
          $lname=$_POST['lname'];
		  if($pwd!=$repwd)
		  {
			$_SESSION['pdnm']=1;
			header('location: signup.php');
			die("die");
		  }
			
          $email=$_POST['email'];
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

		
          if(!empty($uname) && !empty($pwd) && !empty($repwd) && !empty($email) && !empty($fname) && !empty($lname))
          {	    
				$test=check_email_address($email);
								if(!$test)
								{
									$_SESSION['env']=1;
									header('location: signup.php');
									die("Email not valid");
								
								}
          	
                   $query="SELECT m_uname FROM member_info ";
					if($query_run=mysql_query($query,$connect))
					{
					
						while($row=mysql_fetch_assoc($query_run))
						{
							if($uname==$row["m_uname"])
							{
								
								$_SESSION['uat']=1;		
								
								
								header('location: signup.php');
								die("die");
							
							}
						}
					}
							
								$query="SELECT m_eid FROM member_info ";
								if($query_run=mysql_query($query,$connect))
								{
					
									while($row=mysql_fetch_assoc($query_run))
									{
										if($email==$row["m_eid"])
										{
										$_SESSION['ear']=1;						
										header('location: signup.php');
									
										die("Email already registered");
						
										}
									}
								}
			
									$rnum=rand(1000,500000);							
									$pwd1=md5($pwd);
									$query="insert into member_info VALUES (\"\",\"$uname\",\"$pwd1\",\"$fname\",\"$lname\",\"$email\",\"$_POST[stream]\",\"$_POST[branch]\",0,$rnum)";
									if(mysql_query($query,$connect))
									{
										$to=$email;
										$subject="Verify your Mail Account";
										$body="Your verification code is $rnum.";
										$headers=" From : alphasci_gtu.com";
									/*	$_SESSION['success']=1;
				
											header('location: signup.php');
											
											die("die"); */  /* remove comment for localhost - as email wont execute */
										if($mail=mail($to,$subject,$body,$headers))
										{
											$_SESSION['success']=1;
											
											header('location: signup.php');
											
											
											die("die");
								
										}
									}
									else
									{
										echo "query error";
									}
								
							
		}
		else
		{
			$_SESSION['emptyfields']=1;
			header('location: signup.php');
			die();
		}
	}


mysql_close($connect);
require_once("lib/lib_head.php"); ?>
  <title>alphasci_gtu | Register</title>

</head>

<body>
  <div id="main">

<?php if(!isset($_SESSION['login']))
{
require_once("lib/lib_menu.php");
}
else
{require_once("lib/lib_menu1.php");} ?>

    <div id="site_content">
      <div id="sidebar_container">

      <?php require_once("lib/lib_container1_logout_search_counter1.php"); ?>

      <?php require_once("lib/lib_container4_likebox.php"); ?>

      <?php require_once("lib/lib_container5_useful_links.php"); ?>

      </div>
      <div id="content">
      <center><h1> <b> Sign up for GTU Guide </b> </h1></center>
      <hr />
      <br />
      <br />
	  <?php
	  if(isset($_SESSION['login']))
	  {
		?><center><font color="red"><b> "E Kolorrrr" </b></font></center> <?php
	  }
	  else
	  {
	if(isset($_SESSION['emptyfields']))
	{
		?><center><font color="red">You have left empty fields</font></center><?php
		unset($_SESSION['emptyfields']);
	}
	if(isset($_SESSION['uat']))
	  {
	    ?> <center><font color="red">User name already taken</font></center><?php
			unset($_SESSION['uat']);
	}
	if(isset($_SESSION['env']))
	  {
	    ?> <center><font color="red">Email Not Valid</font></center><?php
		unset($_SESSION['env']);
	}
	if(isset($_SESSION['ear']))
	  {
		  ?> <center><font color="red">Email Already Registered</font></center><?php
				unset($_SESSION['ear']);
		}
	if(isset($_SESSION['pdnm']))
	  {
	  ?> <center><font color="red">Passwords Do Not Match</font></center><?php
	  	  	unset($_SESSION['pdnm']);
	
		}
	if(isset($_SESSION['cpte']))
	{
		?> <center><font color="red">Enter Correct Captcha</font></center></center><?php
		
	unset($_SESSION['cpte']);
	}
	?>
		
      <center>
         <?php 
			if(isset($_SESSION['success']))
			{
					echo "You have successfully registered. Kindly check your mail and enter verification code in sign in process to complete your registration. Thank You.";
					?><hr/>
					<br/>
					<br/>
					<br/>
					<hr/>
					<?php
					require_once("lib/lib_container2_login_form.php"); 
					unset($_SESSION['success']);
			}
			else
			{
			require("kolor__form.php");
			}
			}?> 
      </center>

      </div>
    </div>
 
<?php require_once("lib/lib_scroll_to_top.php"); ?>

    <?php require_once("lib/lib_footer.php"); ?>

  </div>

  <?php require_once("lib/lib_last_javascript.php"); ?>

</body>
</html>
