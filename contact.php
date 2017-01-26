<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Contact</title>
    <link href="css/stylesheet.css"  type="text/css" rel="stylesheet" />
  </head>
    
  <body>
   <div class="contact">
    <?php include 'header.html';
      ?>
       <div class="dev">
        <br />   
       <h2 class='contact_me'><em>Reach out and say hello</em></h2>
       <h1>LET'S BUILD SOMETHING TOGETHER</h1></div>
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
   </div>
    
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $problem = FALSE; //No problems yet
            
            //check each value
            $fname = $_POST["first_name"];
            if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
                $problem = TRUE;
                print '<p class="error">Please enter a proper first name. Only letters and white space allowed.</p>'; 
            }
            
            $lname = $_POST["last_name"];
            if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
                $problem = TRUE;
                print '<p class="error">Please enter a proper last name. Only letters and white space allowed.</p>'; 
            }
            $email = $_POST["email"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $problem = TRUE;
                print '<p class="error">Invalid email format.</p>';
                }
            $message = (trim(strip_tags($_POST['message'])));
            if (empty($_POST['message']))
            {
                $problem = TRUE;
                print '<p class="error">Please enter a message</p>';
            }
            if (!$problem)
            {
                //print message
                print '<h3 class="success">Thanking you for contacting me. I will respond to your message as soon as possible. I look forward to speaking with you. Have a great day!</h3>';
                //send email
                $body = "You have received a message from your site!\r\n
                From: " . $fname .  ' ' . $lname . ".\r\n
                Email: " . $email  . 
                    "\r\n\r\n message: " . $message;
                $to = 'chris.s.lambert@gmail.com';
                $subject = 'Contact message from your site!';
                $headers = "From: admin@clambert.com";
                $headers2 = "Content-type: text/html; charset=\"UTF-8\";";
                mail($to, $subject, $body, $headers, $headers2);
                
                //clear the POST array
                $_POST = array();
                
            } else {
                print '<p class="error">Please try again</p>';
            }
        } //end of handle form IF
        //creating the form
        ?>
        <div class='contact_form'>
        <form action="contact.php" method="post">
        
            <table>
            <tr><td><h2>Contact me today</h2></td><td></td></tr>
            
            <tr><td><input class="name_in" type="text" name="first_name" size="20" value="<?php if (isset($_POST['first_name'])) { print htmlspecialchars($_POST['first_name']); } ?>" /></td></tr>
            
            <tr><td><h3 class='name'>First Name: </h3></td></tr>    
                
            <tr><td><input class="name_in" type="text" name="last_name" size="20" value="<?php if (isset($_POST['last_name'])) { print htmlspecialchars($_POST['last_name']); } ?>" /></td></tr>
            
            <tr><td><h3 class='name'>Last Name: </h3></td></tr>
            
            <tr><td><input type="text" name="email" size="20" value="<?php if (isset($_POST['email'])) { print htmlspecialchars($_POST['email']); } ?>" /></td></tr>    
                
            <tr><td><h3 class="name">Email: </h3></td></tr>
            <tr><td></td></tr>    
            
            <tr><td><h3 class='message'>Message: </h3></td></tr>
                
            <tr><td><textarea name="message" rows='5' cols="34"><?php if (isset($_POST['message'])) {print htmlspecialchars($_POST['message']); } ?></textarea></td></tr>
            <tr><td><p class="sub"><input type="submit" name="submit" value="Send!" /></p></td></tr>
            </table>
        </form>
        
      </div>
      <div class='r_col'>
      <h3>Please feel free to reach out to me with any questions or comments. Also, you could just say hello.</h3>
      <h3><u>Email me at:</u></h3>
      <h4><a href="mailto:chris.s.lambert@gmail.com">chris.s.lambert@gmail.com</a><br /></h4>
          </div>
</body>
</html>