<?php
session_start();
?>
<?php
if(isset($_POST['mail']))
{
	unset($_SESSION['mailchange']);
	unset($_SESSION['mailfound']);
	$email=$_POST['mail'];
	$connect=mysql_connect("localhost","alphasci_user","!@#$%");
	mysql_select_db("alphasci_gtu",$connect);
			
			$result="SELECT * from member_info where m_eid=\"".mysql_real_escape_string($email)."\"";
			$test1=mysql_query($result,$connect);
			if($test1)
			{
				$row = mysql_fetch_array($test1);
				$uname=$row['m_uname'];
				if(!empty($uname))
				{
				$rand=rand(10000,5000000);
				$pwd=md5($rand);
				$upd="UPDATE member_info set vflag=1,m_pwd=\"$pwd\" where m_eid=\"".mysql_real_escape_string($email)."\"";
				$update=mysql_query($upd,$connect);
				
				$to=$email;
				$subject="Reset Password";
				$body="Your Username : $uname and your new Password is $rand.";
				$headers=" From : alphasci_gtu.com";
				if($mail=mail($to,$subject,$body,$headers))
				{
					$_SESSION['mailchange']=1;
					header('location: forget.php');
					die();
					
				}
				}
				else
			{
				$_SESSION['mailfound']=1;
				header('location: forget.php');
				die();
			}
			}
			
}
?>
<html>
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
      <center><h1> <b> Forget Username/Password </b> </h1></center>
	  <br /> <hr /> <br />
	  <?php
	$connect=mysql_connect("localhost","alphasci_user","!@#$%");
	mysql_select_db("alphasci_gtu",$connect);			 
?>
<?php
require_once("lib/lib_head.php"); 
if(isset($_SESSION['login']))
{
	?><center><font color="red">You are Logged in!!!</font></center><?php
}
else
{
if(isset($_SESSION['mailfound']))
{
	?><center><font color="red">Enter Correct E-mail</font></center><?php
	unset($_SESSION['mailfound']);
}
if(isset($_SESSION['mailchange']))
{
	?><center><font color="red">Username and (changed) Password are sent to E-mail entered</font></center><?php
	?><br /><br /><center><a href="index.php">Click here to Sign in</a></center><?php
	unset($_SESSION['mailchange']);
}
else
{
?>
<form id="contact" name="forget" action="forget.php" method="post">
          <div class="form_settings">
            <p style="padding-top: 10px"><span><b>Enter your E-mail :</b></span><input class="contact" type="text" name="mail" value="" />
            
            <br />
			
			<br />
			
                        <span>&nbsp;</span>
            <input class="submit" type="submit" value="Submit" />
			<a href="manage.php"><input class="submit" type="button" value="Go back" /></a>
            </p>
          </div>
        </form>
<?php
		}} ?>
		
		  </div>
    </div>
        <?php require_once("lib/lib_scroll_to_top.php"); ?>

    <?php require_once("lib/lib_footer.php"); ?>

  </div>

  <?php require_once("lib/lib_last_javascript.php"); ?>

</body>
</html>