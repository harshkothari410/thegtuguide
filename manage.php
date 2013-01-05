<?php
session_start();
require_once("lib/lib_head.php"); ?>
  <title>alphasci_gtu | Manage</title>

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
      <center><h1> <b> Manage Account </b> </h1></center>
	<?php
	if(!isset($_SESSION['login']))
	{
		?><center><b>Please <a href="index.php">login</a> to continue</b></center><?php
	}
	else
	{
	?>
	  
      <br />
      <br />
	    Want to change your password ? Click here : <a href="changepassword.php">Change Password</a>
	  
      <br />
      <br />
	    Want to change your E-mail ? Click here : <a href="changeemail.php">Change E-mail Account</a>
		<?php } ?>
      </div>
    </div>						
     
	</div>
 
<?php require_once("lib/lib_scroll_to_top.php"); ?>

    <?php require_once("lib/lib_footer.php"); ?>

  </div>

  <?php require_once("lib/lib_last_javascript.php"); ?>

</body>
</html>




