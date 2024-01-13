<?php


if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$email_from = $visitor_email;//<== update the email address
$email_subject = $subject;
$email_body = "You have received a new message from the user $name.\n".
    "Here is the message:\n $message".
    
$to = "wendyrandolph44@gmail.com";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
$mail = new PHPMailer\PHPMailer();
 
try {
            //Server settings
            $mail->SMTPDebug = 0; // Enable verbose debug output
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'giowm1086.siteground.biz'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'admin@ldswidowsandwidowers.com'; // SMTP username
            $mail->Password = 'o2kp@w@QT72X'; // SMTP password
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
            $mail->Port = 465;
            $mail->IsHTML(true); // TCP port to connect to

            //Recipients
            $mail->setFrom($visitor_email, $name);
            $mail->addAddress($to); // Add a recipient
            $mail->addReplyTo($visitor_email, $name);
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/home/cpanelusername/attachment.txt'); // Add attachments
            //$mail->addAttachment('/home/cpanelusername/image.jpg', 'new.jpg'); // Optional name

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $email_body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
                    //done. redirect to thank-you page.
$_SESSION['success'] = "Thank you for your submission.";
header('Location: /conferences/arizona-regional/');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

   




// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 