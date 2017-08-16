<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "tests94@inbox.lv";
    $email_subject = "Your email subject line";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['email']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
    $email_from = $_POST['email']; // required
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if(!preg_match($email_exp,$email_from)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
    if(strlen($comments) < 2) {
        $error_message .= 'The Comments you entered do not appear to be valid.<br />';
    }
 
    if(strlen($error_message) > 0) {
        died($error_message);
    }
 
  
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= clean_string($comments)."\n";
 
    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
<!-- Thank you for contacting us. We will be in touch with you very soon. -->
 
<?php
    }
?>

<!-- HTML  -->
<form name="contactform" method="post" action="contactus.php">
    <table width="450px">

        <tr>
            <td valign="top">
                <label for="email">Email Address *</label>
            </td>

            <td valign="top">
                <input  type="text" name="email" maxlength="80" size="30">
            </td>
        </tr>


        <tr>
            <td valign="top">
                <label for="comments">Comments *</label>
            </td>

            <td valign="top">
                <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
            </td>
        </tr>


        <tr>
            <td colspan="2" style="text-align:center">
                <input type="submit" value="Submit">
            </td>
        </tr>
        
        
    </table>
</form>


