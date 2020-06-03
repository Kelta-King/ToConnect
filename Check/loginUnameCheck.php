<?php 

session_start();

if(isset($_SESSION['signup_login'])){

    $u_name = $_REQUEST['Uname'];
    $pass = $_REQUEST['Pass'];
    
    require_once("../../../Database/dbconnect_connect.php");
    
    $query = "SELECT `u_id`, `u_password`, `email`, `u_name` FROM `users` WHERE u_name = '$u_name'";
    
    if($data = $conn->query($query)){
        
        if($data->num_rows <= 0){
            echo "Incorrect username";
        }
        else if($data->num_rows == 1){
            
            $result = $data->fetch_assoc();
            $dbpass = $result['u_password'];
            
            if(password_verify($pass, $dbpass)){
                
                $opt = [
                    'cost' => 12,  
                ];
                
                $id = $result['u_id'];
                $name = $result['u_name'];
                $email = $result['email'];
                $url1 = base64_encode($id."&".$email."&".$name);
                $_SESSION['login_user_connect'] = $url1;
                
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
        echo $query;
    }
    
    $conn->close();

}
else{
    echo "<script>alert('Login first')</script>";
    header("Location:logout");
}

?>
