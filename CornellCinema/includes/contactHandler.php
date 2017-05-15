<h3>Contact Us</h3>

<br><br>

<form name="contact" method="post" action="contact.php">
Your Name: <input type="text" name="Name"><br>
Your Email: <input type="text" name="Email"><br> 
Subject: <input type="text" name="Subject"><br><br>
Reason: 
 <select name="Reason">
   <option value="1">General Feedback</option>
   <option value="2">Advertising</option>
   <option value="3">Suggestions</option>
 </select><br>
Message:<br> 
 <textarea name="Message" cols="30" rows="8"></textarea><br>
 <input type="submit" name="submitForm" value="Contact Us"> 
</form>

<?php
	
if(isset($_POST['submitForm'])){
	$emailSubject = $_POST['Subject'];
	$emailMessage = $_POST['Message'];
	$emailFrom = $_POST['Email'];
	$emailFromName = $_POST['Name'];

	if (!preg_match('/^([A-Z0-9\.\-_]+)@([A-Z0-9\.\-_]+)?([\.]{1})([A-Z]{2,6})$/i', $emailFrom) || empty($emailFrom)) {
    echo 'The email address entered is invalid.';
	} 
	else if (empty($emailSubject)) {
    echo 'You must enter a valid subject.';
	} elseif (empty($emailMessage)) {
	    echo 'You must enter a message to send to Cornell Cinema.';
	} elseif (($_POST['Reason'] < 1) || ($_POST['Reason'] > 3)) {
	    echo 'You must select a valid reason.';
	} else {

		$emailTo = 'yuji1078@gmail.com';
    
	    if (!empty($emailFrom)) {
	        $emailHeaders = 'From: "' . $emailFromName . '" <' . $emailFrom . '>';
	    } else {
	        $emailHeaders = 'From: "John Doe" <webmaster@example.com>';
	    }
	    
	    /* Send Email */
	    if (mail($emailTo, $emailSubject, $emailMessage, $emailHeaders)) {
	        echo 'You message has been sent!';
	    } else {
	        echo 'There was an internal error whilst sending your email.<br>';
	        echo 'Please try again later.';    
	    }
	}
}
?>
