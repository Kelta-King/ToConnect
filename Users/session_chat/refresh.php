<?php
session_start();

if(isset($_SESSION['login_user_connect']) && isset($_SESSION['session_begin']) && isset($_REQUEST['name']) && isset($_SESSION['msg_order']) && $_SESSION['msg_order'] <= 2){
 
    $datas = base64_decode($_SESSION['session_begin']);
    $datas = explode("&",$datas);
    $doc = $datas[0];
    $s_id = $datas[1];
    //user id 
    $id = $datas[2];
    
    require_once("../../../../Database/dbconnect_connect.php");
    
    $order = $_SESSION['msg_order'];
    $query = "SELECT * FROM msgs WHERE msg_doc = '$doc' AND msg_order = $order";
    $msg = "hey";
    
    if($data = $conn->query($query)){
        $result = $data->fetch_assoc();
        $msg = $result['msg_data'];
        $_SESSION['msg_order']+=1;
        $message = "<div class='w3-bar'>";
        $message .= "<div class='w3-bar-item w3-border w3-round w3-margin-top w3-margin-left w3-animate-opacity w3-white' style='max-width:80%;'>";
        $message .= $msg;                                               
        $message .= "</div></div>";
        
        echo $message;
        
    }
    else{
        echo "Something went wrong";
    }

}
else if(isset($_SESSION['login_user_connect']) && isset($_REQUEST['name'])){
    header("Location:profile?name=".$_REQUEST['name']);
    
}
else{
    header("Location:../logout"); 
}
?>
