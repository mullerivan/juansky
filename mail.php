<?php 
    define('TO_EMAIL','juanbergada@hotmail.com');	
    define('MSG_INVALID_EMAIL','Please enter valid e-mail.');;
	define('MSG_SEND_ERROR', 'Error on message send');

    // Sender Info
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    $err = "";
	
    // Check Info
    $pattern = "^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$^";
    if(!preg_match_all($pattern, $email, $out)) {
        $err = MSG_INVALID_EMAIL;
    }
    
    $headers = "From: ".$name." <".$email.">\r\nReply-To: ".$email."";

    if (!$err){
	$sent = mail(TO_EMAIL,$subject,$message,$headers); 
        if ($sent){
            echo "Message sended."; 
        }else{
            echo MSG_SEND_ERROR; 
        }
    }else{
        echo $err;
    }
?>