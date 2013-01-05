<?php
session_start();
?>	
<?php require_once("lib/lib_head.php"); ?>
  <title>GTUGuide | Download</title>
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

<?php if(isset($_SESSION['ticket']))
{
	if($_SESSION['bookcounter']==0)
	{
		echo "No such record found. If you believe that this should be availabe please ";?> <a href=contact.php>Inform</a> <?php echo "us about the problem.";
		unset($_SESSION['bookcounter']);
	}
	else
	{
	$booki=0;

	if(isset($_SESSION['titlearray'])&& isset($_SESSION['authorarray'])&& isset($_SESSION['link1array'])&&isset($_SESSION['link2array']) &&isset($_SESSION['semester'])&&isset($_SESSION['branch']))
	{
	$titlearray_again = explode(",", $_SESSION['titlearray']);
	$authorarray_again = explode(",", $_SESSION['authorarray']);
	$link1array_again = explode(",", $_SESSION['link1array']);
	$link2array_again = explode(",", $_SESSION['link2array']);
?><font style="font-size:17px; "> Semester : <?php echo $_SESSION['semester'];
?> Branch : <?php echo $_SESSION['branch'];?></font><br /><hr /><br /><?php
while($_SESSION['bookcounter']>0)
{

?>   
	<pre><font style="font-size:14px; ">Title  : <?php echo $titlearray_again[$booki]; ?> <br />Author : <?php echo $authorarray_again[$booki]; ?> <br/>Download link    : <a href="<?php echo $link1array_again[$booki]; ?>" target="_blank"><img src="images\optimized\dl5.png" alt="Click to download" height=30 width=100 valign="middle"/></a><br />Alternative link : <a href="<?php echo $link2array_again[$booki]; ?>" target="_blank"><img src="images\optimized\dl5.png" alt="Click to download" height=30 width=100 valign="middle"/></a>		<br />	<hr />	<br /></pre>
	<?php
	$booki=$booki+1;
	$_SESSION['bookcounter']=$_SESSION['bookcounter']-1;
}
	
	unset($_SESSION['ticket']);
		unset($_SESSION['branch']);
	unset($_SESSION['semester']);
}
}}

else
{
	echo "This is not a right way to do it!!!";
}?>
	

   </div>
   </div>
    <?php require_once("lib/lib_scroll_to_top.php"); ?>

    <?php require_once("lib/lib_footer.php"); ?>

  </div>

  <?php require_once("lib/lib_last_javascript.php"); ?>

</body>
</html>
