<?php		 echo $uname=$_POST['username'];
         echo $pwd=$_POST['password'];
        echo  $repwd=$_POST['repassword'];
          $email=$_POST['email'];
          $fname=$_POST['fname'];
          $lname=$_POST['lname'];
		  
		  
		   
					$connect=mysql_connect("localhost","root","");
					mysql_select_db("gtuguide",$connect);
					 $query="insert into test VALUES(1)";
					    mysql_query($query,$connect);
						mysql_close($connect);
						
		   ?>