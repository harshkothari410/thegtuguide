<div class="sidebar">

              <!-- login form -->  
              <div id="login-box">
					<?php
if(isset($_SESSION['loginfail']))
{
	?><br /><center><font color="white"><B>Wrong username/password</B></font></center><?php
	
	unset($_SESSION['loginfail']);
}?>
              <H1><img src="images/optimized/login_icon1.png" width=25px/>Sign in</H1>
              <br />
              <hr />
              <br />
                 <form name="login" action="process.php" method="POST" >
                  <div id="login-box-name" ><b>Username: </b></div>
                  <div id="login-box-field" style=""><input name="username" class="form-login" size=15 title="Username" value="" maxlength="25" /></div>
                  <br/>
                  <br />
                 <div id="login-box-name" style="padding: 5px -200px 0 0;"><b>Password: </b></div>
                 <div id="login-box-field"><input name="password" type="password" size=15 class="form-login" title="Password" value=""  maxlength="32" /></div>
                 <br />
                 <br />
                 
                       <a href="forget.php" style="margin-left:3px;"><b><b>Forget Password?</b></b></font></a>
                 </span>
                 <br />
                 <br />
			<center><input type="image" src="images/optimized/login-btn-black.png" /></center>
                 </form>
                 <hr />
                 <div class="login-box-options">
                    <a href="signup.php" style="font-size: 13px;"><b><font valign="top">Register new user</font></b></a>

                 </div>
              </div>
        </div>
