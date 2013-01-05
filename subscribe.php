<?php session_start();
     require_once("lib/lib_head.php");  ?>

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
		
        document.subscribe.txtCaptcha.value = code
    }
</script>
  <title>GTUGuide | Subscribe Us</title>
</head>

<body>
  <div id="main">


<?php if(!isset($_SESSION['login']))
{
require_once("lib/lib_menu.php");
}
else
{require_once("lib/lib_menu1.php");} ?>

    <div id="site_content">
      <div id="sidebar_container">

         <?php require_once("lib/lib_container1_logout_search_counter1.php"); ?>
         <?php require_once("lib/lib_container4_likebox.php"); ?>
         <?php require_once("lib/lib_container5_useful_links.php"); ?>

      </div>
      <div id="content">

       <center><h1>Subscribe Us</h1></center>
        <p><b>By subscribing us, you can get all new updates to our web-site into your mail-id.</b></p>
	<center><b><font color=red>
	<?php
		if(isset($_SESSION['sub']))
		{
			if($_SESSION['sub']==1)
			{
				echo "You have successfully registered to our news-letters!!!";
				unset($_SESSION['sub']);
			}
		}

		if(isset($_SESSION['cer']))
		{
			if($_SESSION['cer']==1)
			{
				echo "Sorry. Something went wrong. Try again later.";
				unset($_SESSION['cer']);
			}
		}

		if(isset($_SESSION['emp']))
		{
			if($_SESSION['emp']==1)
			{
				echo "Please fill all the details.";
				unset($_SESSION['emp']);
			}
		}

		if(isset($_SESSION['cpe']))
		{
			if($_SESSION['cpe']==1)
			{
				echo "Captcha not valid.";
				unset($_SESSION['cpe']);
			}
		}

		if(isset($_SESSION['emnv']))
		{
			if($_SESSION['emnv']==1)
			{
				echo "Email-id not valid.";
				unset($_SESSION['emnv']);
			}
		}

		if(isset($_SESSION['ar']))
		{
			if($_SESSION['ar']==1)
			{
				echo "Email-id already registered.";
				unset($_SESSION['ar']);
			}
		}
	?>

	</font></b></center>

	<br /> <hr /> <br />

        <form name="subscribe" id="contact" action="subscribeprocess.php" method="POST">
          <div class="form_settings">
            <p><span><b>Name :</b></span><input class="contact" type="text" name="your_name" value="" /></p><br />
            <p><span><b>Email Address :</b></span><input class="contact" type="text" name="your_email" value="" /></p><br />

	    <input class="submit2" type="button" value="Click to Load Captcha" onclick="DrawCaptcha();" style="width:150px; height:47px"  />		
	    <input type="text" name="txtCaptcha" readonly="yes" onblur="DrawCaptcha();" style="background-image:url(images/optimized/1.jpg); text-align:center; border:none; font-family:'mistral'; height:40px; font-size:40px;" />
		<br />
		<br />
            <p><span><b>Enter Captcha :</b></span><input class="contact" type="text" name="txtInput" value="" /></p>

            <br />
            <p style="padding-top: 20px margin-left:100px"><span>&nbsp;</span>
			<input class="submit" type="submit" name="subscribe">

            </p>
          </div>
        </form>
        <br />
        <hr />
        <br />

      </div>
    </div>

    <?php require_once("lib/lib_scroll_to_top.php"); ?>

    <?php require_once("lib/lib_footer.php"); ?>

  </div>

  <?php require_once("lib/lib_last_javascript.php"); ?>

</body>
</html>
