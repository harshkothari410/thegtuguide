<?php
session_start();
?>
<?php
	$connect=mysql_connect("localhost","alphasci_user","!@#$%");
	mysql_select_db("alphasci_gtu",$connect);			 

if(isset($_POST['oldpass']) && isset($_POST['newpass']) && isset($_POST['newpass1']))
{
	unset($_SESSION['wronginput']);
	unset($_SESSION['correct']);
	unset($_SESSION['pns']);
	$uname=$_SESSION['username'];
	$oldpass=$_POST['oldpass'];
	$pwd=md5($oldpass);
	$newpass=$_POST['newpass'];
	$newpass1=$_POST['newpass1'];
	
	if(!empty($uname) && !empty($oldpass) && !empty($newpass) && !empty($newpass1))
	{
		if($newpass==$newpass1)
		{
		$pwd1=md5($newpass);
		$query="SELECT * FROM member_info where m_uname=\"".mysql_real_escape_string($uname)."\" and m_pwd=\"".mysql_real_escape_string($pwd)."\"";
				   if($test=mysql_query($query,$connect))
				   {
				   		if(mysql_num_rows($test))
						{
							$query1="SELECT * from member_info where m_uname=\"".mysql_real_escape_string($uname)."\"";
							$test1=mysql_query($query1,$connect);
							if($test1)
							{
								$row = mysql_fetch_array($test1);
								
								$upd="UPDATE member_info set m_pwd=\"".mysql_real_escape_string($pwd1)."\" where m_uname=\"".mysql_real_escape_string($uname)."\"";
								if($update=mysql_query($upd,$connect))
								{
								$_SESSION['correct']=1;
								header('location: changepassword.php');
								die();
								}
							}
						}
						else
						{
							$_SESSION['wronginput']=1;
							header('location: changepassword.php');
							die();
						}
					}
		}
		else
		{
			$_SESSION['pns']=1;
			header('location: changepassword.php');
			die();
		}
	}		
}				
											
require_once("lib/lib_head.php"); 
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
{require_once("lib/lib_menu1.php");} ?>
	<div id="site_content">
      <div id="sidebar_container">
      <?php require_once("lib/lib_container1_logout_search_counter1.php"); ?>
<?php require_once("lib/lib_container4_likebox.php"); ?>
<?php require_once("lib/lib_container5_useful_links.php"); ?>

      </div>
      <div id="content">
      <center><h1> <b> Change Account Password </b> </h1></center>
	  <br /> <hr /> <br />
	  <?php
if(isset($_SESSION['wronginput']))
{
	?><center><font color="red">Enter Correct Password</font></center><?php
	unset($_SESSION['wronginput']);
}
if(isset($_SESSION['correct']))
{
	?><center><font color="red">Password Changed</font></center><?php
	unset($_SESSION['correct']);
}
if(isset($_SESSION['pns']))
{
	?><center><font color="red">Passwords Do not match</font></center><?php
	unset($_SESSION['pns']);
}
?>

<form id="contact" name="changepassowrd" action="changepassword.php" method="post">
          <div class="form_settings">
           
            <p><span><b>Old Password :</b></span><input class="contact" type="password" name="oldpass" value="" /></p><br />
            <p><span><b>New Password :</b></span><input class="contact" type="password" name="newpass" value="" /></p><br />
            <p><span><b>Retype New Password :</b></span><input class="contact" type="password" name="newpass1" value="" /></p><br />
            
            

            <br />
            <p style="padding-top: 10px"><span>&nbsp;</span>
            <input class="submit" type="submit"  value="Send" />
            <a href="manage.php"><input class="submit" type="button"  value="Go back" onclick="manage.php"/></a>
            </p>
          </div>
        </form>
     
	</div>
 </div>
<?php require_once("lib/lib_scroll_to_top.php"); ?>

    <?php require_once("lib/lib_footer.php"); ?>

  </div>

  <?php require_once("lib/lib_last_javascript.php"); ?>

</body>
</html>



