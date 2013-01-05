<?php
session_start();
if(isset($_GET['rslt']))
{
$_SESSION['rslt']=$_GET['rslt'];
}
if(isset($_SESSION['rslt']))
{


if(isset($_POST['sbranch']) && isset($_POST['ssemester']))
{
if($_POST['sbranch']!="branch" && $_POST['ssemester']!="semester")
{

	
	$connect=mysql_connect("localhost","alphasci_user","!@#$%");
	mysql_select_db("alphasci_gtu",$connect);	
	$branch=$_POST['sbranch'];
	$semester=$_POST['ssemester'];
	if(isset($_SESSION['rslt']))
	{
		if($_SESSION['rslt']=="syl")
		{
		if($semester=="1" || $semester=="2")
		{
			$branch="any";
		}
		if($semester=="3")
		{
			$query="SELECT d_ticket from syllabus_info where stream=\"dip\" and semester=\"".mysql_real_escape_string($semester)."\" and (branch=\"".mysql_real_escape_string($branch)."\" or branch=\"hrm\")";
		}
		else if($semester=="4")
		{
			$query="SELECT d_ticket from syllabus_info where stream=\"dip\" and semester=\"".mysql_real_escape_string($semester)."\" and (branch=\"".mysql_real_escape_string($branch)."\" or branch=\"enter\")";
		}
		else
		{
		$query="SELECT d_ticket from syllabus_info where stream=\"dip\" and semester=\"".mysql_real_escape_string($semester)."\" and branch=\"".mysql_real_escape_string($branch)."\"";
		}
		$result=mysql_query($query,$connect);
		if($result)
		{
			$i=0;
			$_SESSION['de']=1;
			$_SESSION['semester']=$semester;
			$_SESSION['branch']=$branch;
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
			header('location: de.php');
			die();
		
		
		}
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
        <form id="contact" action="de.php" name="deform" method="post">
          <div class="form_settings">
            <p><span><b>Branch :</b></span>
             <select name="sbranch">
			  <option value="branch">Select Branch</option>
               <option value="auto">Automobile</option>
               <option value="biomed">Biomedical</option>
               <option value="chem">Chemical</option>
               <option value="civil">Civil</option>
               <option value="comp">Computer</option>
               <option value="electrical">Electrical</option>
               <option value="electronics & commn">Electronics & Communication</option>
               <option value="environmental">Environmental</option>
               <option value="it">Information Technology</option>
               <option value="ic">Instrumentation & Control</option>
               <option value="mechanical">Mechanical</option>
               <option value="mechatronics">Mechatronics</option>
               <option value="metallurgy">Metallurgy</option>
               <option value="mining">Mining</option>
               <option value="plastic">Plastic</option>
               <option value="power">Power</option>
               <option value="textile_proc">Textile Processing</option>
               <option value="textile_manu">Textile Manufacturing</option>
               <option value="arch_asst">Arch. Asst.</option>
               <option value="cddm">CDDM</option>
               <option value="ceramic">Ceramic</option>
               <option value="comm_art">Comm. Art</option>
               <option value="comm_prac">Comm. Practice</option>
               <option value="fabri_tech">Fabrication Technology</option>
               <option value="home">Home Science</option>
               <option value="print">Printing tech.</option>
               <option value="text_design">Textile Design</option>
               <option value="trans">Transportation Engg.</option>
               <option value="fire">Fire Technology</option>
        </select>

            </p>
<br />
            <p><span><b>Semester :</b></span>
             <select name="ssemester">
			   <option value="semester">Select semester</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>
               <option value="6">6</option>
               <option value="7">7</option>
               <option value="8">8</option>
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

if(isset($_SESSION['de']))
{	
	if(!isset($_SESSION['login']))
	{
	?><center><b> PLease <a href="index.php#login_form">Login </a> to continue.</b></center>
	<center><b> If you are a new user <a href="signup.php">register</a> to continue</b></center>
	<?php
unset($_SESSION['de']);	}
	else
	{
	$_SESSION['ticket']=1;
	if($_SESSION['rslt']=="syl")
	{
		unset($_SESSION['de']);
		unset($_SESSION['rslt']);
		?><meta http-equiv="refresh" content="0;url=download.php"><?php
	}
	else if($_SESSION['rslt']=="pap")
	{
		unset($_SESSION['de']);
	    unset($_SESSION['rslt']);
		?><meta http-equiv="refresh" content="0;url=download1.php"><?php
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
