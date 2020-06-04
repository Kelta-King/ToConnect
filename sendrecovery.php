<?php

session_start();

if(isset($_REQUEST['email'])){

    $email = $_REQUEST['email'];
    require_once("../../Database/dbconnect_connect.php");
    
    $query = "SELECT email FROM users WHERE email = '$email'";
    
    if($data = $conn->query($query)){
        
        if($data->num_rows <= 0){
            die("Please enter your registered email");
        }
        
    }
    else{
        die("Something went wrong");
    }
    
    $subject = "ToConnect: Account recovery";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
    // Creating email headers
    $headers .= 'X-Mailer: PHP/' . phpversion();
    $data = base64_encode("This is data&".$email);
    $message = '<html><body>';
    $message .= '<h1 style="color:black;">Hello user!!</h1>';
    $message .= '<p style="color:green;font-size:19px;">Don\'t worry for your account<br></p>';
    $message .= '<p style="color:black;font-size:16px;">Here is the recovery link of your account. Don\'t share this email to anyone<br></p>';
    $message .= '<a href="https://keltagoodlife.co/ToConnect/backupemail?data='.$data.'" style="color:black;font-size:16px;">Click here for account recovery<br></a>';
    $message .= '<p style="color:black;font-size:16px;">This is a software generated email, so do not reply to this email</p>';
    $message .= '<p style="color:black;font-size:16px;">Thank you<br><br>Regards,<br>Team ToConnect</p>';
        
    $message .= '</body></html>';
        
    if(!mail($email,$subject,$message,$headers)){
        die("Something went wrong");
    }
    
}
else{
    header("Location:../logout"); 
}

?>
