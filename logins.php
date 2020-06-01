<?php

session_start();

if(isset($_SESSION['signup_r']) && isset($_SESSION['signup_login'])){

    unset($_SESSION['signup_login']);
    unset($_SESSION['signup_r']);
    
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Pass1'];

    require_once("../../Database/dbconnect_connect.php");
    
    $query = "SELECT `u_id`, `u_password`, `u_name` FROM `users` WHERE email = '$email'";
    
    if($data = $conn->query($query)){
        
        if($data->num_rows <= 0){
            echo "Incorrect email";
        }
        else if($data->num_rows == 1){
            
            $result = $data->fetch_assoc();
            $dbpass = $result['u_password'];
            
            if(password_verify($password, $dbpass)){
                
                $id = $result['u_id'];
                $name = $result['u_name'];
                $url = base64_encode($id."&".$name);
                
                $url1 = base64_encode($id."&".$email."&".$name);
                $_SESSION['login_user_connect'] = $url1;
                header("Location:Users/profile?name=".$url);
               
            }
            else{
                echo "Incorrect password";
            }
            
        }
        else{
            echo "Incorrect details";
        }
        
    }
    else{
        echo "Something went wrong";
        
    }
    
    $conn->close();
}
else{
    echo "<script>alert('Login first')</script>";
    header("Location:logout");
}

?>
