<?php
session_start();
require_once("lib/lib_head.php"); ?>
  <title>GTUGuide | About Us</title>
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
        <h1>About Us</h1>
        <p><b>GTUGuide</b> is the result of our aim to provide necessary study materials to GTU students. Students can easily grab the material they want just by logging in to this site. We will try our best to provide the <b>best quality materials</b> to you.</p>
        <p>We provide download links that are checked by ourselves. <b>All the e-books that we provide are suggested by the students of respective departments.</b> </p>
	<p><b> The papers provided here are all uploaded by us only.</b></p>
        <p>You people are the most important part of our web-site. Feel free to <b>report bugs and errors</b> you get while surfing this site. You can also <b>help other students</b> by referring the book to us. We will be grateful to accept your suggestion.</p>
         <p>We are very much thankful to our <b>friends</b> to help us to make this site.</p>

         <br />
         <hr />
         <br />
         <br />
         <br />

          <center>
            <a href="https://www.facebook.com/pages/GTU-Guide/458150974195254" target="_blank"><img src="images/optimized/btn_facebook.png" title="facebook" alt="Facebook" border="0"/></a>
            <a href="https://twitter.com/GTUGuide4U" target="_blank"><img src="images/optimized/btn_twitter.png" title="twitter" alt="Twitter" border="0"/></a>
          </center>


      </div>
    </div>

    <?php require_once("lib/lib_scroll_to_top.php"); ?>

    <?php require_once("lib/lib_footer.php"); ?>

  </div>

  <?php require_once("lib/lib_last_javascript.php"); ?>

</body>
</html>
