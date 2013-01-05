<?php
session_start();
if(isset($_GET['rslt']))
{
$_SESSION['rslt']=$_GET['rslt'];
}
if(isset($_SESSION['rslt']))
{
if(isset($_POST['ssemester']))
{
if($_POST['ssemester']!="semester")
{

	
	$connect=mysql_connect("localhost","alphasci_user","!@#$%");
	mysql_select_db("alphasci_gtu",$connect);	
	$semester=$_POST['ssemester'];
	if(isset($_SESSION['rslt']))
	{
	if($_SESSION['rslt']=="pap")
	{
	unset($_SESSION['mca']);
		$papquery="SELECT * from papers where stream=\"mca\" and semester=\"$semester\"";
		$papresult=mysql_query($papquery,$connect);
		if($papresult)
		{
			$_SESSION['papcounter']=0;
			$papi=0;
			$_SESSION['mca']=1;
			$_SESSION['semester']=$semester;
		}
		while($paprow=mysql_fetch_assoc($papresult))
		{
			$_SESSION['papcounter']++;
			$timearray[$papi]=$paprow['time'];
			
			$link1array[$papi]=$paprow['mediafirelink'];
			$link2array[$papi]=$paprow['boxlink'];
			$papi++;
		}
		if(sizeof($timearray!=1))
		{
		
			$comma_separated = @implode(",", $timearray);
			$_SESSION['timearray']=$comma_separated;
		}
		else
		{
			
			$_SESSION['timearray']=$timerray[$papi-1];
		}
		
		if(sizeof($link1array!=1))
		{
		
			$comma_separated = @implode(",", $link1array);
			$_SESSION['link1array']=$comma_separated;
		}
		else
		{
			
			$_SESSION['link1array']=$link1array[$papi-1];
		}
		if(sizeof($link2array!=1))
		{
		
			$comma_separated = @implode(",", $link2array);
			$_SESSION['link2array']=$comma_separated;
		}
		else
		{
			
			$_SESSION['link2array']=$link2array[$papi-1];
		}
		header('location: mcapap.php');
		die();
	}

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

         <h1> Select your preferred choice: </h1>
           <br />
           <hr />
            <br />
        <form id="contact" action="mcapap.php" name="mcaform" method="post">
          <div class="form_settings">
          
           <br />
            <p><span><b>Semester :</b></span>
             <select name="ssemester">
			   <option value="semester">Select semester</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
			   <option value="4">4</option>
			    <option value="5">5</option>
              
             </select>

            </p>
            
            <br />
            <p style="padding-top: 10px"><span>&nbsp;</span>
            <input class="submit" type="submit" name="contact_submitted" value="Search" />
            </p>
          </div>
        </form>
		<br />
		<hr />
		<br />
		
<?php

if(isset($_SESSION['mca']))
{	
	if(!isset($_SESSION['login']))
	{
	?><center><b> PLease <a href="index.php#login_form">Login </a> to continue.</b></center>
	<center><b> If you are a new user <a href="signup.php">register</a> to continue</b></center>
	<?php 
	unset($_SESSION['mca']);}
	else
	{
	$_SESSION['ticket']=1;
	if($_SESSION['rslt']=="pap")
	{
		unset($_SESSION['mca']);
		unset($_SESSION['rslt']);
		$_SESSION['stream']="MCA";
		?><meta http-equiv="refresh" content="0;url=download2.php"><?php
	}
	
}
}}
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
