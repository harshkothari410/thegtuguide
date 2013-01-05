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
			$branch="any";
		}
		if($semester=="3" || $semester=="4")
		{
			$semester="3/4";
		}
		
		unset($_SESSION['be']);
		$query="SELECT d_ticket from syllabus_info where stream=\"be\" and semester=\"$semester\" and branch=\"$branch\"";
		$result=mysql_query($query,$connect);
		if($result)
		{
		$_SESSION['counter']=0;
		$i=0;
		$_SESSION['be']=1;
			$_SESSION['semester']=$semester;
			$_SESSION['branch']=$branch;

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
			header('location: be.php');
			die();
		
		
		}
	}
	if($_SESSION['rslt']=="pap")
	{
	unset($_SESSION['be']);
	if($semester=="1" || $semester=="2")
	{
		$semester="1-2";
		$branch="any";
	}
		$papquery="SELECT * from papers where stream=\"be\" and branch=\"$branch\" and semester=\"$semester\"";
		$papresult=mysql_query($papquery,$connect);
		if($papresult)
		{
			$_SESSION['papcounter']=0;
			$papi=0;
			$_SESSION['be']=1;
			$_SESSION['branch']=$branch;
			$_SESSION['semester']=$semester;
			
		
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
		}
		header('location: be.php');
		die();
		
		
	}
	 
	
	if($_SESSION['rslt']=="buk")
	{
		unset($_SESSION['be']);
		$bookquery="SELECT * from books where (branch=\"$branch\" or branch=\"any\") and semester=\"$semester\"";
		$bookresult=mysql_query($bookquery,$connect);
		if($bookresult)
		{
			$_SESSION['bookcounter']=0;
			$booki=0;
			$_SESSION['be']=1;
			$_SESSION['branch']=$branch;
			$_SESSION['semester']=$semester;
			
		}
		while($bookrow=mysql_fetch_assoc($bookresult))
		{
			$_SESSION['bookcounter']++;
			$titlearray[$booki]=$bookrow['Title'];
			$authorarray[$booki]=$bookrow['Author'];
			$link1array[$booki]=$bookrow['boxlink1'];
			$link2array[$booki]=$bookrow['mediafirelink2'];
			$booki++;
			
			
		}
		if(sizeof($titlearray!=1))
		{
		
			$comma_separated = @implode(",", $titlearray);
			$_SESSION['titlearray']=$comma_separated;
		}
		else
		{
			
			$_SESSION['titlearray']=$titlearray[$booki-1];
		}
		if(sizeof($authorarray!=1))
		{
		
			$comma_separated = @implode(",", $authorarray);
			$_SESSION['authorarray']=$comma_separated;
		}
		else
		{
			
			$_SESSION['authorarray']=$authorarray[$booki-1];
		}
		if(sizeof($link1array!=1))
		{
		
			$comma_separated = @implode(",", $link1array);
			$_SESSION['link1array']=$comma_separated;
		}
		else
		{
			
			$_SESSION['link1array']=$link1array[$booki-1];
		}
		if(sizeof($link2array!=1))
		{
		
			$comma_separated = @implode(",", $link2array);
			$_SESSION['link2array']=$comma_separated;
		}
		else
		{
			
			$_SESSION['link2array']=$link2array[$booki-1];
		}
		header('location: be.php');
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
        <form id="contact" action="be.php" name="beform" method="post">
          <div class="form_settings">
            <p><span><b>Branch :</b></span>
             <select name="sbranch">
			   <option value="branch">Select Branch</option>
               <option value="aero">Aeronautical</option>
               <option value="auto">Automobile</option>
               <option value="biomed">Biomedical</option>
               <option value="biotech">Biotechnology</option>
               <option value="chem">Chemical</option>
               <option value="civil">Civil</option>
               <option value="comp">Computer</option>
               <option value="eleccrical & electronics">Electrical & Electronics</option>
               <option value="electrical">Electrical</option>
               <option value="electronics">Electronics</option>
               <option value="electronics & comm">Electronics & Communication</option>
               <option value="electronics & telecomm">Electronics & Telecommunication</option>
               <option value="environmental">Environmental</option>
               <option value="food">Food Processing</option>
               <option value="industrial">Industrial</option>
               <option value="it">Information Technology</option>
               <option value="ic">Instrumentation & Control</option>
               <option value="marine">Marine</option>
               <option value="mechanical">Mechanical</option>
               <option value="mechatronics">Mechatronics</option>
               <option value="metallurgy">Metallurgy</option>
               <option value="mining">Mining</option>
               <option value="plastic">Plastic</option>
               <option value="power">Power</option>
               <option value="production">Production</option>
               <option value="rubber">Rubber</option>
               <option value="textile_prod">Textile Processing</option>
               <option value="textile_tech">Textile Technology</option>
               <option value="cse">Computer Science</option>
               <option value="ict">Information & Communication Technology</option>
               <option value="manufacturing">Manufacturing</option>
        </select></p>

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

if(isset($_SESSION['be']))
{	
	if(!isset($_SESSION['login']))
	{
	?><center><b> PLease <a href="index.php#login_form">Login </a> to continue.</b></center>
	<center><b> If you are a new user <a href="signup.php">register</a> to continue</b></center>
	<?php 
	unset($_SESSION['be']);}
	else
	{
	$_SESSION['ticket']=1;
	if($_SESSION['rslt']=="syl")
	{
		unset($_SESSION['be']);
		unset($_SESSION['rslt']);
		
		?><meta http-equiv="refresh" content="0;url=download.php"><?php
	}
	else if($_SESSION['rslt']=="pap")
	{
		unset($_SESSION['be']);
	    unset($_SESSION['rslt']);
		?><meta http-equiv="refresh" content="0;url=download1.php"><?php
	}
	else if($_SESSION['rslt']=="buk")
	{
		unset($_SESSION['be']);
		/*unset($_SESSION['rslt']);*/
		?><meta http-equiv="refresh" content="0;url=bebooks.php"><?php
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
