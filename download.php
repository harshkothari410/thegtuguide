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
	if($_SESSION['counter']==0)
	{
		echo "No such record found. If you believe that this should be availabe please ";?> <a href=contact.php>Inform</a> <?php echo "us about the problem.";
		unset($_SESSION['counter']);
	}
	else
	{
	$i=0;
	?><br /><hr /><br />If you get more than one download links, All Downloads are according to your Search (not alternative liniks). <br />Your slection may lead you to mutliple download items because of some common subject in all branches.<br /><br /><hr /><br />
	<?php if(isset($_SESSION['resultstring']))
	{
	$array_again = explode(",", $_SESSION['resultstring']);

if(isset($_SESSION['mcad']))
{
		unset($_SESSION['mcad']);
while($_SESSION['counter']>0)
{
if($i==0) { $txt="1/2";}
if($i==1) { $txt="3/4";}
if($i==2) {	$txt="5"; }
if($i==3) {	$txt="6"; }
?>   
	<?php echo "Download item ".($i+1)." ";?><font style="font-size:17px; "><pre>Semester : <?php echo $txt;?>  <?php if(isset($_SESSION['branch'])) { ?> Branch : <?php echo $_SESSION['branch']; ?> </font> <?php } ?>          <a href="<?php echo $array_again[$i]; ?>"><img src="images\optimized\dl5.png" alt="Click to download" height=30 width=100 valign="middle"/></a></pre>
	<br />
	<hr />
	<?php
	$i=$i+1;
	$_SESSION['counter']=$_SESSION['counter']-1;
}
	unset($_SESSION['ticket']);
	unset($_SESSION['branch']);
	unset($_SESSION['semester']);
}
	
	
else
{	
$i=0;

while($_SESSION['counter']>0)
{

?>   
	<?php echo "Download item ".($i+1)." ";?><font style="font-size:17px; "><pre><?php if(isset($_SESSION['dpht'])){ ?> Year : <?php } else { ?> Semester : <?php } ?><?php if(isset($_SESSION['semester'])) { echo $_SESSION['semester']; } else { echo ($i+1);} ?>  <?php if(isset($_SESSION['branch'])) { ?> Branch : <?php echo $_SESSION['branch']; ?> </font> <?php } ?>          <a href="<?php echo $array_again[$i]; ?>"><img src="images\optimized\dl5.png" alt="Click to download" height=30 width=100 valign="middle"/></a></pre>
	<br />
	<hr />
	<?php
	$i=$i+1;
	$_SESSION['counter']=$_SESSION['counter']-1;
}
	unset($_SESSION['dpht']);
	unset($_SESSION['ticket']);
		unset($_SESSION['branch']);
	unset($_SESSION['semester']);
}
}}
}
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
