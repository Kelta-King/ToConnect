<?php

session_start();

if(isset($_SESSION['login_user_connect']) && isset($_REQUEST['name']) && isset($_REQUEST['msg'])){

    $name = isset($_REQUEST['name']);
    $msg = isset($_REQUEST['msg']);
    $date = date("Y-m-d");
    require_once("../../../Database/dbconnect_connect.php");
    
    $query = "INSERT INTO feedbacks(f_sender, f_msg, f_date) VALUES('$name', '$msg', '$date')";
    
    if($conn->query($query)){
        
        $subject = "ToConnect: Feedback";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
        // Creating email headers
        $headers .= 'X-Mailer: PHP/' . phpversion();
                
        $message = '<html><body>';
        $message .= '<h1 style="color:black;">Hi '.$name.'!</h1>';
        $message .= '<p style="color:green;font-size:19px;">Thanks for giving feedback '.$name.'<br></p>';
        $message .= '<p style="color:black;font-size:16px;">ToConnect\'s improvement team has received your feedback and will start working on.<br></p>';
        $message .= '<p style="color:black;font-size:16px;">This is a software generated email, so do not reply to this email</p>';
        $message .= '<p style="color:black;font-size:16px;">Thank you<br><br>Regards,<br>Team ToConnect</p>';
                
        $message .= '</body></html>';
                
        mail($email,$subject,$message,$headers);
        
    }
    else{
        echo "Something went wrong";
    }
    
}
else{
    header("Location:../logout"); 
}

?>
