<?php session_start();

	 require_once("lib/lib_head.php"); ?>
  <title>GTUGuide | Contact Us</title>


<script type="text/javascript">
   //Created / Generates the captcha function    
   function DrawCaptcha()
    {
        var a = Math.ceil(Math.random() * 10);
        var b = Math.ceil(Math.random() * 10);       
        var c = Math.ceil(Math.random() * 10);  
        var d = Math.ceil(Math.random() * 10);  
        var e = Math.ceil(Math.random() * 10);  
        var f = Math.ceil(Math.random() * 10);  
        var g = Math.ceil(Math.random() * 10);  
        var code = a + '' + b + '' + '' + c + '' + d + '' + e + ''+ f + '' + g;
		
        document.contact.txtCaptcha.value = code
    }
</script>
</head>
<body>
  <div id="main">

 
<?php if(!isset($_SESSION['login']))
{

require_once("lib/lib_menu.php");
$first="";
$last="";
$mailid="";

}
else
{require_once("lib/lib_menu1.php"); 

	$connect=mysql_connect("localhost","alphasci_user","!@#$%");
	mysql_select_db("alphasci_gtu",$connect);				
    $un=$_SESSION['username'];
            $query="SELECT * FROM member_info WHERE m_uname='$un' ";
			if($query_run=mysql_query($query,$connect))
			{
				
				while($row=mysql_fetch_assoc($query_run))
				{
					$first=$row["m_fname"];
					$last=$row["m_lname"];
					$mailid=$row["m_eid"];
				}
			}
}
?>

    <div id="site_content">
      <div id="sidebar_container">

         <?php require_once("lib/lib_container1_logout_search_counter1.php"); ?>

         <?php require_once("lib/lib_container5_useful_links.php"); ?>

      </div>
      <div id="content">
        <center><h1>Contact Us</h1></center>
<br />
<hr />
<br />

<?php
				function check_email_address($mail) {
  // First, we check that there's one @ symbol, 
  // and that the lengths are right.
  if (!@ereg("^[^@]{1,64}@[^@]{1,255}$", $mail)) {
    // Email invalid because wrong number of characters 
    // in one section or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $mail);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
    if
(!@ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
?'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
$local_array[$i])) {
      return false;
    }
  }
  // Check if domain is IP. If not, 
  // it should be valid domain name
  if (!@ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if
(!@ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
?([A-Za-z0-9]+))$",
$domain_array[$i])) {
        return false;
      }
    }
  }
  return true;
}
if (isset($_POST['your_name']) && isset($_POST['your_email']) && isset($_POST['your_message']) && isset($_POST['txtCaptcha']) && isset($_POST['txtInput']))
{
        $name=$_POST['your_name'];
        $mail=$_POST['your_email'];
        $msg=$_POST['your_message'];
        $txtCaptcha=$_POST['txtCaptcha'];
        $txtInput=$_POST['txtInput'];

        if(!empty($name) && !empty($mail) && !empty($msg) && !empty($txtInput) && !empty($txtInput))
        {
                $to='admin@gtuguide.co.cc';
                $subject='Contact form submitted';
                $body= $name.$msg;
                $headers='From: '.$mail;

		$test=check_email_address($mail);
		if(!$test)
		{
									
			?> <div id="red" style="color:red;"><center>Email not valid</center></div> <?php
							
		}


		else if($txtCaptcha!=$txtInput)
		{
			?> <div id="red" style="color:red;"><center>Captcha code not valid</center></div> <?php
		}

                else if(mail($to, $subject, $body, $headers))
                {
			?> <center><b>Thank you for contacting us. We will come 2 you soon.</b></center> <?php
                }

        }
        else{ ?> <div id="red" style="color:red;"><center>Fill all the details.</center></div> <?php }
}
?>
<html>

        <form id="contact" name="contact" action="contact.php" method="post">
          <div class="form_settings">
            <p><span><b>Name :</b></span><input class="contact" type="text" name="your_name" value='<?php echo $first.' '.$last; ?>' /></p>
            <p><span><b>Email Address :</b></span><input class="contact" type="text" name="your_email" value='<?php echo "$mailid"; ?>' /></p>
            <p><span><b>Message :</b></span><textarea class="contact textarea" rows="5" cols="50" name="your_message"></textarea></p>

	    <input class="submit2" type="button" value="Click to Load Captcha" onclick="DrawCaptcha();" style="width:150px; height:47px"  />		
	    <input type="text" name="txtCaptcha" readonly="yes" onblur="DrawCaptcha();" style="background-image:url(images/optimized/1.jpg); text-align:center; border:none; font-family:'mistral'; height:40px; font-size:40px" />
		<br />
		<br />
            <p><span><b>Enter Captcha :</b></span><input class="contact" type="text" name="txtInput" value="" /></p>
            <br />
            <p style="padding-top: 10px"><span>&nbsp;</span>
            <input class="submit" type="submit" name="contact_submitted" value="Send" />
            <input class="submit" type="reset" name="contact_submitted" value="Reset" />
            </p>
          </div>
        </form>
        <br />
        <hr />
        <br />

      <?php require_once("lib/lib_likebox_big.php"); ?>

      </div>
    </div>

    <?php require_once("lib/lib_scroll_to_top.php"); ?>

    <?php require_once("lib/lib_footer.php"); ?>

  </div>

  <?php require_once("lib/lib_last_javascript.php"); ?>

</body>
</html>
