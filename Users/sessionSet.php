<?php

session_start();

if(isset($_SESSION['login_user_connect']) && isset($_POST['number']) && isset($_POST['dr'])){

    $dts = explode("&",base64_decode($_SESSION['login_user_connect']));
    $id = $dts[0];
    $email = $dts[1];
    $name = $dts[2];
    
    $date = date("Y-m-d");
    $doctor = $_POST['dr'];
    
    require_once("../../../Database/dbconnect_connect.php");
    $query = "INSERT INTO sessions (s_date, u_id, doctor) VALUES ('$date', $id, '$doctor')";
    
    if($conn->query($query)){
        echo "Success";
        $last_id = $conn->insert_id;
        $_SESSION['session_begin'] = base64_encode($doctor."&".$last_id."&".$id);
        
        header("Location:session?name=".$_POST['number']);
    }
    else{
        echo "Something went wrong";
    }

    $conn->close();

}
else if(isset($_SESSION['login_user_connect'])){
    echo "something went wrong";
?>
<a href="profile?name=<?php echo $_POST['number'] ?>">Home page link</a>
<?php
}
else{
    header("Location:../logout"); 
}
?>
