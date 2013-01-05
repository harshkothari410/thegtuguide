      <div class="sidebar">
          <center>
		  <?php	 
		  if(isset($_SESSION['login']))
		  { ?> <h4 style="color:#3794B1;"><b> <?php echo "Logged in as :  ";
			echo $_SESSION['username'];
			
			?></b></h4></center>
			<form name="logout" action="index.php" method="POST">
			<input type="hidden" name="var" value="1" />
			
			<center><input type="image" src="images/optimized/logout_button.png" value="Logout"/></center>
			</form>
			<?php 
		  } 
		else
		{
			?>
			<h4 style="color:red;"><b>Not logged in</b></h4></center>
			<h6><center>Please sign in to download any content.</center></h6>
			<?php 
		} ?>
			
       
          <br />
          <hr />
		  <form name="search" method="POST" action="result.php">
          <h4><b>Search Book (BE Only):</b></h4><br /> <input type='text' name='searchbox' size=20></input>
          <input type="submit" value="submit"/>
		  </form>
          <br />
          <br />
          <br />
          <hr />
          <h4><b>Unique Hit Count:</b></h4>
          <!-- counter logic -->
          <center>
             <h5> From 19-Jun-2012 To <?php $time=time(); echo date('d-M-Y',$time); ?>
             <br />
             <br />
             <!-- Counter Code START -->
                <img src="http://www.e-zeeinternet.com/count.php?page=825928&style=embwhite&nbdigits=8" alt="Free Hit Counter" border="0" ></a>
                <br />
             <!-- Counter Code END -->
          </center>
         <br />
         <br />
      </div>
