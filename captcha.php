                 <?php
                       require_once('recaptchalib.php');
                       $publickey = "6LdL5dISAAAAAOxQQCuQnCjoHCRzwbCJjNEjvpS-"; // you got this from the signup page
                       echo recaptcha_get_html($publickey);
                 ?>