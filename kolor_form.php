<head>
<script language="javascript">
function checkEmail() {
var email = document.getElementById('email');
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if (!filter.test(email.value)) {
alert('Please provide a valid email address');
email.value="";
return false;
}
}
</script>
<script language="javascript">
function checkpass() {

var pass1=document.signup.password.value;
var pass2=document.signup.repassword.value;

if(pass1!=pass2)
{
alert('Passwords do not match');
document.signup.repassword.value="";
}
}

</script>
</head>
<div id="main">

  <?php require_once("lib/lib_menu.php"); ?>

    <div id="site_content">
      <div id="sidebar_container">

      <?php require_once("lib/lib_container1_logout_search_counter.php"); ?>

      <?php require_once("lib/lib_container4_likebox.php"); ?>

      <?php require_once("lib/lib_container5_useful_links.php"); ?>

      </div>
      <div id="content">
      <center><h1> <b> Sign up for alphasci_gtu </b> </h1></center>
      <hr />
      <br />
      <br />
      <center>

  <div id="stylized" class="myform">
       <form id="form" name="signup" method="post" action="signup.php" >
       <H1><b>Sign-up form</b></H1>
       
     <fieldset>
       <legend align="center"> Fill Account Details:</legend>

       <br />
       <label>UserName *
            <span class="small">Choose your username</span>
       </label>
       <input type="text" name="username" id="username"/> 
        <h6 id="message_uname"></h6>

       <label>Email *
           <span class="small">Add a valid address</span>
       </label>
       <input type="text" name="email" id="email" onblur="checkEmail()"/>

       <br />
       <label>Password *
            <span class="small">Min. size 6 chars</span>
       </label>
       <input type="password" name="password" id="password" />

       <br />
       <label>Confirm Password *
            <span class="small">Min. size 6 chars</span>
       </label>
       <input type="password" name="repassword" id="repassword" onblur="checkpass()" />

    </fieldset>
        <h5 id="message_pass"></h5>
    
    <br />
    <fieldset>
        <legend align="center">Fill Personal Details:</legend>

        <br />
        <label>First Name *
             <span class="small">Add your first name</span>
        </label>
        <input type="text" name="fname" id="fname" />

        <br />
        <label>Last Name *
             <span class="small">Add your last name</span>
        </label>
        <input type="text" name="lname" id="lname" />

        <br />
        <label>Stream
             <span class="small">Add your stream</span>
        </label>
        <select name="stream">
             <option value="be">B.E.</option>
             <option value="me">M.E.</option>
             <option value="pddc">P.D.D.C.</option>
             <option value="bph">B.Ph.</option>
             <option value="mca">MCA</option>
             <option value="mba">MBA</option>
         </select>

         <br />
         <br />
         <label>Branch
              <span class="small">Add your branch</span>
         </label>
         <select name="branch">
               <option value="aeronautical">Aeronautical</option>
               <option value="automobile">Automobile</option>
               <option value="biomedical">Biomedical</option>
               <option value="biotechnology">Biotechnology</option>
               <option value="chemical">Chemical</option>
               <option value="civil">Civil</option>
               <option value="computer">Computer</option>
               <option value="electrical_electronics">Electrical & Electronics</option>
               <option value="electrical">Electrical</option>
               <option value="electronics">Electronics</option>
               <option value="electronics_communication">Electronics & Communication</option>
               <option value="electronics_telecommunication">Electronics & Telecommunication</option>
               <option value="environmental">Environmental</option>
               <option value="food_processing">Food Processing</option>
               <option value="industrial">Industrial</option>
               <option value="information_technology">Information Technology</option>
               <option value="instrumentaiton_control">Instrumentation & Control</option>
               <option value="marine">Marine</option>
               <option value="mechanical">Mechanical</option>
               <option value="mechatronics">Mechatronics</option>
               <option value="metallurgy">Metallurgy</option>
               <option value="mining">Mining</option>
               <option value="plastic">Plastic</option>
               <option value="power">Power</option>
               <option value="production">Production</option>
               <option value="rubber">Rubber</option>
               <option value="textile_processing">Textile Processing</option>
               <option value="textile_technology">Textile Technology</option>
               <option value="computer_science">Computer Science</option>
               <option value="information_communication">Information & Communication Technology</option>
               <option value="manufacturing">Manufacturing</option>
        </select>

       <br />
       <br />

    </fieldset>
    <br />

    <fieldset>
        <br />
        <legend align="center" valign="top">Final step:</legend>
        <center>
            <?php require_once("captcha.php"); ?>
        </center>
         <br />
         <center><button type="submit">Sign-up</button> <button type="reset">Reset</button>
         </center>
         <br />
         <br />
         <div class="spacer"></div>
     </fieldset>

  </form>
 </div>
    </div>
</center>
<label1><b>*</b> indicates necessary fields.</label1>
  </div>
 <?php require_once("lib/lib_scroll_to_top.php"); ?>

    <?php require_once("lib/lib_footer.php"); ?>

  </div>

  <?php require_once("lib/lib_last_javascript.php"); ?>

