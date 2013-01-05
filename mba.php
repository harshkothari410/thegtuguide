<?php
session_start();

if(isset($_GET['rslt']))
{
$_SESSION['rslt']=$_GET['rslt'];
}
if(isset($_SESSION['rslt']))
{

	$connect=mysql_connect("localhost","alphasci_user","!@#$%");
	mysql_select_db("alphasci_gtu",$connect);	
	if($_SESSION['rslt']=="syl")
	{		$query="SELECT d_ticket from syllabus_info where stream=\"mba\"";
			$result=mysql_query($query,$connect);
		if($result)
		{
			$i=0;
			$_SESSION['mba']=1;
	
			$_SESSION['counter']=0;
			while($row=mysql_fetch_assoc($result))
			{
			$_SESSION['counter']=$_SESSION['counter']+1;
			$resultarray[$i]=$row['d_ticket'];
			$i=$i+1;
			}
		
			if(sizeof($resultarray!=1))
			{
		
			$comma_separated = @implode(",", $resultarray);
			$_SESSION['resultstring']=$comma_separated;
			}
			else
			{
			
			$_SESSION['resultstring']=$resultarray[$i-1];
			}
			
			
		
		
		}
	}

	

?>	
<?php require_once("lib/lib_head.php"); ?>
  <title>GTUGuide | QueryResult</title>
</head>

<body>
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

        
<?php

if(isset($_SESSION['mba']))
{	
	if(!isset($_SESSION['login']))
	{
	?><center><b> PLease <a href="index.php#login_form">Login </a> to continue.</b></center>
	<center><b> If you are a new user <a href="signup.php">register</a> to continue</b></center>
	<?php
unset($_SESSION['rslt']);	}
	else
	{
	$_SESSION['ticket']=1;
	if($_SESSION['rslt']=="syl")
	{
		unset($_SESSION['mba']);
		unset($_SESSION['rslt']);
		
		?><meta http-equiv="refresh" content="0;url=download.php"><?php
	}
	else if($_SESSION['rslt']=="pap")
	{
		unset($_SESSION['mba']);
	    unset($_SESSION['rslt']);
		?><meta http-equiv="refresh" content="0;url=download1.php"><?php
	}
	
}
}
}
else
{
	
	require_once("lib/lib_head.php");?>
    <title>GTUGuide | QueryResult</title>
</head>
<body>
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
	   <?php echo "This is not a valid way to do this buddy.";
}?>
   </div>
   </div>
    <?php require_once("lib/lib_scroll_to_top.php"); ?>

    <?php require_once("lib/lib_footer.php"); ?>

  </div>

  <?php require_once("lib/lib_last_javascript.php"); ?>

</body>
</html>
