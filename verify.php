<?php session_start();
?>
<html>
 <title>alphasci_gtu | Verify</title>

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
      <center><h1> <b> Verify Your E-mail Account </b> </h1></center>
	  <br /> <hr /> <br />
	  <?php
require_once("lib/lib_head.php"); ?>
<form id="contact" name="verify" action="verifyprocess.php" method="post">
          <div class="form_settings">
		        welcome <b><?php echo $_SESSION['username']; ?></b><br /><br />
		  <?php
		  if(isset($_SESSION['sendmailagain']))
		  {
			echo "Mail sent. ";
			unset($_SESSION['sendmailagain']);
		}
		  if(isset($_SESSION['wrong']))
{
	echo('Wrong code. Try again.');
	unset($_SESSION['wrong']);
}
else
{
?>		   Please enter verification code you received in your E-mail account. <?php } ?>
            <p style="padding-top: 10px"><span><b>Enter Verification Code :</b></span><input class="contact" type="text" name="code" value="" />
    
            <br />
			
			<br />
			
                        <span>&nbsp;</span>
            <input class="submit" type="submit" value="Submit" />
			<a href="sendmailagain.php"><input class="submit" type="button" value="Get Code Again" style="width:150px;height:34px"></a>
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

