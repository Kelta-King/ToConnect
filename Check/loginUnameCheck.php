<?php 

if(isset($_SESSION['signup_login'])){

    require_once("../../../Database/dbconnect_connect.php");
    $ u_name = $_REQUEST['Uname'];
    $pass = $_REQUEST['Pass'];
    
    $query = "SELECT `u_id`, `u_password`, `email`, `u_name` FROM `users` WHERE u_name = '$u_name'";
    
    if($data = $conn->query($query)){
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
