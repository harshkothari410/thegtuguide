<?php
session_start();
if(isset($_POST['sbranch']) && isset($_POST['ssemester']))
{
if($_POST['sbranch']!="branch" && $_POST['ssemester']!="semester")
{
	
	$connect=mysql_connect("localhost","alphasci_user","!@#$%");
	mysql_select_db("alphasci_gtu",$connect);	
	$branch=$_POST['sbranch'];
	$semester=$_POST['ssemester'];
	
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
		$row=mysql_fetch_assoc($result);
		if($row)
		{
		
			$_SESSION['dl']=$row['d_ticket'];
			$_SESSION['be']=1;
			$_SESSION['semester']=$semester;
			$_SESSION['branch']=$branch;

			header('location: be.php');
			die($dl);
		
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

  <?php require_once("lib/lib_menu.php"); ?>

    <div id="site_content">
      <div id="sidebar_container">

      <?php require_once("lib/lib_container1_logout_search_counter.php"); ?>

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
if(isset($_SESSION['be']))
{	
	?><center><a href="<?php echo $_SESSION['dl']; ?>"><img src="images\dl5.png" /></a></center>
	<br />
	<center><?php
	echo "Semester : ".$_SESSION['semester']; 
	echo " Branch : ".$_SESSION['branch'];
	?></center>
	<br />
	<hr />
	<?php
	unset($_SESSION['be']);
}?>

   </div>
   </div>
    <?php require_once("lib/lib_scroll_to_top.php"); ?>

    <?php require_once("lib/lib_footer.php"); ?>

  </div>

  <?php require_once("lib/lib_last_javascript.php"); ?>

</body>
</html>
