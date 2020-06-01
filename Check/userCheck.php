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
            
    
}
else{
    echo "Signup first";
}

?>
