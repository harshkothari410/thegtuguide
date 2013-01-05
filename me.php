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
			$semester="1/2";
			$query="SELECT d_ticket from syllabus_info where stream=\"me\" and semester=\"$semester\" and (branch=\"$branch\" or branch=\"any\")" ;
		}
		if($semester=="3")
		{
			$query="SELECT d_ticket from syllabus_info where stream=\"me\" and semester=\"$semester\" and (branch=\"$branch\" or branch=\"any\")" ;
		}
		else if($semester=="4")
		{
			$query="SELECT d_ticket from syllabus_info where stream=\"me\" and semester=\"$semester\" and branch=\"$branch\"" ;
		}
		$result=mysql_query($query,$connect);
		if($result)
		{
			$i=0;
			$_SESSION['me']=1;
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
			header('location: me.php');
			die();
		
		
		}
	}
		if($_SESSION['rslt']=="pap")
	{
	unset($_SESSION['me']);

		$papquery="SELECT * from papers where stream=\"me\" and branch=\"$branch\" and semester=\"$semester\"";
		$papresult=mysql_query($papquery,$connect);
		if($papresult)
		{
			$_SESSION['papcounter']=0;
			$papi=0;
			$_SESSION['me']=1;
			$_SESSION['branch']=$branch;
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
		header('location: me.php');
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
        <form id="contact" action="me.php" name="deform" method="post">
          <div class="form_settings">
            <p><span><b>Branch :</b></span>
             <select name="sbranch">
	       <option value="branch">Select Branch</option>
               <option value="cse/cst">Computer Science & Engineering / Computer Science & Technology</option>
               <option value="computer">Computer Engineering</option>
               <option value="ic-applied">Instrumentation and Control (Applied Instrumentation)</option>
               <option value="electronics & comm">Electronics and Communication Engineering</option>
               <option value="comm_sys">Communication Systems Engineering</option>
               <option value="comm">Communication Engineering</option>
               <option value="electrical/automation/power">Electrical Engineering / Automation & Control / Power System</option>
               <option value="mechanical-cad">Mechanical (CAD/CAM)</option>
               <option value="mechanical-machine">Mechanical (Machine Design)</option>
               <option value="mechanical-cryogenic">Mechanical (CRYOGENIC ENGG.)</option>
               <option value="mechanical-ic/auto">Mechanical (I.C.Engine & Automobile) / Automobile Engg.</option>
               <option value="civil-wrm">Civil ( Water Resources Management) / Water Resourses Eng. & Management</option>
               <option value="civil-trans">Civil (Transportation Engineering)</option>
               <option value="construction">Construction Engineering & Management</option>
               <option value="civil-casad">Civil (CASAD) / Computer Aided Structural Analysis</option>
               <option value="chemical-capd">Chemical Engineering (Computer Aided Process Design)</option>
               <option value="environmental">Environmental Engineering</option>
               <option value="trans">Environmental  Management</option>
               <option value="civil-structured">Civil (Structural Engineering)</option>
               <option value="mechanical-thermal">Mechanical (Thermal Engg.) / Thermal Science</option>
               <option value="digital_comm">Digital Communications</option>
               <option value="it">Information Technology</option>
               <option value="plastic">Plastic EngineerBio-Medical Engineering</option>
               <option value="textile">Textile Engineering</option>
               <option value="ec-signal-vlsi">Signal Processing and VLSI Technology (EC)</option>
               <option value="ec-wireless_net">Wireless Communication Systems and Networks (EC)</option>
               <option value="mechanical-production">Mechanical (Production Engineering)</option>
               <option value="power">Power Electronics</option>
               <option value="chemical">Chemical Engineering</option>
               <option value="biomed">Bio-Medical Engineering</option>
               <option value="energy">Energy Engineering</option>
               <option value="rubber">Rubber Engineering</option>
               <option value="signal & comm">Signal Processing & Communication</option>
               <option value="vlsi">VLSI System Design</option>
               <option value="civil-geotech">Civil (Geotechnical Engineering)</option>
               <option value="ec-wireless_comm">Wireless Communication Technology (EC)</option>
               <option value="power electronics & electrical">Power Electronics & Electrical Drives</option>
               <option value="IT Systems and Network Security">IT Systems and Network Security</option>
               <option value="VLSI & Embedded Systems Design">VLSI & Embedded Systems Design</option>
               <option value="Wireless Mobile Computing">Wireless Mobile Computing</option>
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

if(isset($_SESSION['me']))
{	
	if(!isset($_SESSION['login']))
	{
	?><center><b> PLease <a href="index.php#login_form">Login </a> to continue.</b></center>
	<center><b> If you are a new user <a href="signup.php">register</a> to continue</b></center>
	<?php
unset($_SESSION['me']);	}
	else
	{
	$_SESSION['ticket']=1;
	if($_SESSION['rslt']=="syl")
	{
		unset($_SESSION['me']);
		unset($_SESSION['rslt']);
		?><meta http-equiv="refresh" content="0;url=download.php"><?php
	}
	else if($_SESSION['rslt']=="pap")
	{
		unset($_SESSION['me']);
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
