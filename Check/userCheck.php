<?php

session_start();

if(isset($_SESSION['signup_login'])){
    
    $name = $_REQUEST['Name'];
    $email = $_REQUEST['Email'];
    $password = $_REQUEST['Pass'];
    $gender = $_REQUEST['Gender'];
    
    require_once("../../../Database/dbconnect_connect.php");
    
    $query = "SELECT u_name FROM users WHERE email = '$email'";
    
    if($data = $conn->query($query)){
        
        if($data->num_rows > 0){
            
            echo "This email address is already registered";
            
        }
        else if($data->num_rows == 0){
            
            //unique email address
            //color theme by default
            $opt = [
              'cost' => 12,  
            ];
            
            $password = password_hash($password, PASSWORD_BCRYPT, $opt);
            $theme = "blue";
            
            $vkey = md5(time().$name);
            
            $yes = true;
            $i=1;
            
            $u_name = $name.$i;
            
            while($yes){
                
                $u_name = $name.$i;
                
                $qry = "SELECT u_name FROM users WHERE u_name = '$u_name'";
                if($d = $conn->query($qry)){
                    if($d->num_rows <= 0){
                        $yes = false;
                    }
                    else{
                        $yes = true;
                    }
                }
                else{
                    $u_name = $name;
                    $yes = false;
                }
                
                $i++;
                
            }
            
            $query1 = "INSERT INTO users (u_name, real_name, email, u_password, vkey, verified, gender, theme) VALUES( '$u_name','$name', '$email', '$password', '$vkey', '0','$gender', '$theme')";
            
            if($conn->query($query1)){
                $_SESSION['signup_r'] = "yes";
                
                $subject = "ToConnect: Verify your Email Address";
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
                // Creating email headers
                $headers .= 'X-Mailer: PHP/' . phpversion();
                
                $message = '<html><body>';
                $message .= '<h1 style="color:black;">Hi '.$name.'!</h1>';
                $message .= '<p style="color:green;font-size:19px;">Thanks for registration '.$name.'<br></p>';
                $message .= '<p style="color:black;font-size:16px;">ToConnect has sent you a link to verify your email address.<br></p>';
                $message .= '<a style=\"font-size:16px;\" href="https://keltagoodlife.co/ToConnect/verify?vkey='.$vkey.'" >Click this link to verify your email</a>';
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
            echo "This email address is already registered";
        }
        
    }
    else{
        echo "Something went wrong";
    }
    
    $conn->close();

}
else{
    echo "Signup first";
}

?>
