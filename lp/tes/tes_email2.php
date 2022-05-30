<?php
// PREPARE THE BODY OF THE MESSAGE

			$message = '<html><body>';
			$message .= '<img src="http://css-tricks.com/examples/WebsiteChangeRequestForm/images/wcrf-header.png" alt="Website Change Request" />';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>monjer areang</td></tr>";
			$message .= "<tr><td><strong>Email:</strong> </td><td>monjerareang@gmail.com</td></tr>";
			$message .= "<tr><td><strong>Type of Change:</strong> </td><td>xxx</td></tr>";
			$message .= "<tr><td><strong>Urgency:</strong> </td><td>URGENT</td></tr>";
			$message .= "<tr><td><strong>URL To Change (main):</strong> </td><td>URL</td></tr>";
			
			$message .= "<tr><td><strong>NEW Content:</strong> </td><td>sss</td></tr>";
			$message .= "</table>";
			$message .= "</body></html>";
			
			
			
			
			//  MAKE SURE THE "FROM" EMAIL ADDRESS DOESN'T HAVE ANY NASTY STUFF IN IT
			/*
			$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i"; 
            if (preg_match($pattern, trim(strip_tags($_POST['req-email'])))) { 
                $cleanedFrom = trim(strip_tags($_POST['req-email'])); 
            } else { 
                return "The email address you entered was invalid. Please try again!"; 
            } */
			
			
            
            
            //   CHANGE THE BELOW VARIABLES TO YOUR NEEDS
             
			$to = 'herybarkan@gmail.com';
			
			$subject = 'tes html email';
			$from = 'demo@jvmediastudio.com';
			
			$headers = "From: demo@jvmediastudio.com \r\n";
			$headers .= "Reply-To: ". $from . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            if (mail($to, $subject, $message, $headers)) {
              echo 'Your message has been sent.';
            } else {
              echo 'There was a problem sending the email.';
            }
            
            // DON'T BOTHER CONTINUING TO THE HTML...
            die();
        
?>