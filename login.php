<?php
session_start();
if(!isset($_SESSION['login']))
{
	header('location:index.php');
}

require_once("lib/lib_head.php"); ?>
  <title>GTUGuide | Home</title>
</head>

<body>
  <div id="main">

<?php require_once("lib/lib_menu1.php"); ?>

    <div id="site_content">
       <div id="sidebar_container">

         <?php require_once("lib/lib_container1_logout_search_counter1.php"); ?>

         <?php /* require_once("lib/lib_container2_login_form.php");*/ ?> 
       
         <?php require_once("lib/lib_container3_fb_twitter.php"); ?>

       </div>

      <div id="content">
        <h1>Welcome to <b>GTUGuide</b></h1>
        <p>We provide effective solutions to the students learning in the GTU. We provide <b>papers, syllabi and ebooks</b> to GTU students.</b></p>
	<p>Unlike GTU website, you <b>do not need to mess up with subject codes</b> to download papers or syllabus. <b>We provide all the papers till now of the selected branch and semester with a single click only.</b></p>
        <p>We have tried our best to get e-books of <b>almost all known departments</b>. Enjoy your journey to our web-site. We are pleased to be helpful to you.</p>
       	<p>Get regular updates through newsletters: <a href="subscribe.php" target="_blank"><b>Subscribe us Here</b></a></p>

        <br />
        <hr />
          <center> <h2>News Feed: </h2></center>
           <marquee behavior="scroll" direction="up" scrollamount="4" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 3, 0);">
             <img src="images/optimized/new-blinking.gif" height=20px width=30px > </img><a href="" ><b>Computer Engg. E-books</b></a><br /><br />
             <img src="images/optimized/new-blinking.gif" height=20px width=30px > </img><a href="" ><b>B.E. papers May-June2012</b></a><br /><br />
             <img src="images/optimized/new-blinking.gif" height=20px width=30px > </img><a href="" ><b>B.E. syllabus</b></a><br /><br />
             <img src="images/optimized/new-blinking.gif" height=20px width=30px > </img><a href="" ><b>MCA syllabus</b></a>
           </marquee>
        <br />
        <br />
        <br />
        <hr />
        <center> <h2>Advertises: </h2></center>
        <br />
        <center>
           <a href="http://www.thevoidmain.com" target="_blank"><img src="images/Optimized/void.jpg" height=180px width=260px></a>
               <a href="contact.php" class="mover"><img src="images/optimized/gray.jpg" height=180px width=260px></a>
        </center>
      </div>
    </div>

    <?php require_once("lib/lib_scroll_to_top.php"); ?>

    <?php require_once("lib/lib_footer.php"); ?>

  </div>

  <?php require_once("lib/lib_last_javascript.php"); ?>

</body>
</html>
