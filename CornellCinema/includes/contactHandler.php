
<div class = "contact-style">
	<h1>Contact Us</h1>
	<form name="contact" method="post" action="contact.php">
	<input type="text" name="Name" placeholder = "Your Name"><br>
	<input type="text" name="Email" placeholder = "Your Email"><br> 
	<input type="text" name="Subject" placeholder= "Subject"><br><br>
	Reason: 
	 <select name="Reason">
	   <option value="1">General Feedback</option>
	   <option value="2">Advertising</option>
	   <option value="3">Suggestions</option>
	 </select><br>
	<br> 
	 <textarea name="Message" cols="30" rows="8" placeholder = "Type Message Here."></textarea><br>
	 <input type="submit" name="submitForm" value="Send Message"> 
	</form>
</div>

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
	        echo 'Your message has been sent!';
	    } else {
	        echo 'There was an internal error whilst sending your email.<br>';
	        echo 'Please try again later.';    
	    }
	}
}
?>
