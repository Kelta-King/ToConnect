<?php
session_start();

function write_msg($msg){
    
    $theme_color = "blue";
    if(isset($_REQUEST['theme'])){
        $theme_color = $_REQUEST['theme'];
    }
    
    
    $message = "<div class='w3-bar'>";
    $message .= "<div class='w3-bar-item w3-right w3-border w3-round w3-margin-top w3-margin-left w3-animate-opacity w3-$theme_color' style='max-width:80%;'>";
    $message .= $msg;
    $message .= "</div></div>";
    
    echo $message;
}

function incorrect(){
    
    $msgs = array("Please answer as asked", "Please obey the instructions", "Do it properly", "Come on, be serious", "If you want to leave then click leave");
    
    $id = rand(0,4);
    $msg = $msgs[$id];
    $message = "<div class='w3-bar'>";
    $message .= "<div class='w3-bar-item w3-border w3-round w3-margin-top w3-margin-left w3-animate-opacity w3-white' style='max-width:80%;'>";
    $message .= $msg;                                               
    $message .= "</div></div>";
    
    echo $message;
    
}

function giveResult(){
    
    $msg = "";
    $message = "<div class='w3-bar'>";
    $message .= "<div class='w3-bar-item w3-border w3-round w3-margin-top w3-margin-left w3-animate-opacity w3-white' style='max-width:80%;'>";
    $message .= $msg;                                               
    $message .= "</div></div>";
    
    echo $message;
    
}

function done(){
    
    $msgs = array("Your session is over", "There are no more questions left", "Thanks for giving the correct answers");
    
    $id = rand(0,2);
    $msg = $msgs[$id];
    $message = "<div class='w3-bar'>";
    $message .= "<div class='w3-bar-item w3-border w3-round w3-margin-top w3-margin-left w3-animate-opacity w3-white' style='max-width:80%;'>";
    $message .= $msg;                                               
    $message .= "</div></div>";
    
    echo $message;
    
}

if(isset($_SESSION['login_user_connect']) && isset($_SESSION['session_begin']) && isset($_REQUEST['msg']) && isset($_SESSION['msg_order'])){
 
    $datas = base64_decode($_SESSION['session_begin']);
    $datas = explode("&",$datas);
    $doc = $datas[0];
    $s_id = $datas[1];
    //user id 
    $id = $datas[2];
    $msg = $_REQUEST['msg'];
    
    require_once("../../../../Database/dbconnect_connect.php");
    write_msg($msg);
    
    $order = $_SESSION['msg_order'];
    
    if(strcasecmp("quit", $msg) == 0){
        
        if($order < 7){
            
            $msg = "Your session is not over yet.";
            $message = "<div class='w3-bar'>";
            $message .= "<div class='w3-bar-item w3-border w3-round w3-margin-top w3-margin-left w3-animate-opacity w3-white' style='max-width:80%;'>";
            $message .= $msg;                                               
            $message .= "</div></div>";
            
            echo $message;
            
        }
        else{
            
            unset($_SESSION['session_begin']);
            
        }
        
    }
    else if($order == 3){
            
        if(strcasecmp("START", $msg) == 0 || strcasecmp("Begin", $msg) == 0){
            
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
        else{
            incorrect();
        }
        
    }
    else if($order == 4){
        
        if(strcasecmp("Health", $msg) == 0 || strcasecmp("Mental", $msg) == 0 || strcasecmp("Study", $msg) == 0 || strcasecmp("Health related", $msg) == 0 || strcasecmp("Mental problems", $msg) == 0 || strcasecmp("Study related", $msg) == 0){
            
            $query = "UPDATE sessions SET problem_out = '$msg' WHERE s_id = $s_id";
            
            if($conn->query($query)){
                
            }
            else{
                echo "Something went wrong";
            }
            
            if(strcasecmp("Health", $msg) == 0){
                $_SESSION['suggetion'] = "Dr.Gohil";
            }
            else if(strcasecmp("Mental", $msg) == 0){
                $_SESSION['suggetion'] = "Dr.Gohil";
            }
            else if(strcasecmp("Study", $msg) == 0){
                $_SESSION['suggetion'] = "Dr.Gohil";
            }
            
            $query = "SELECT * FROM msgs WHERE msg_doc = '$doc' AND msg_order = $order";
            $msg = "Something went wrong";
            
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
        else{
            incorrect();
        }
        
    }
    else if($order == 5){
        
        if(strcasecmp("Lonely", $msg) == 0 || strcasecmp("Guilty", $msg) == 0 || strcasecmp("Guilty", $msg) == 0 || strcasecmp("Deseased", $msg) == 0 || strcasecmp("Stressed", $msg) == 0 || strcasecmp("Depressed", $msg) == 0){
            
            $query = "UPDATE sessions SET feeling_out = '$msg' WHERE s_id = $s_id";
            
            if($conn->query($query)){
                
            }
            else{
                echo "Something went wrong";
            }
            
            $query = "SELECT * FROM msgs WHERE msg_doc = '$doc' AND msg_order = $order";
            $msg = "Something went wrong";
            
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
        else{
            incorrect();
        }
    }
    else if($order == 6){
        
        if(strcasecmp("Yes", $msg) == 0 || strcasecmp("No", $msg) == 0 || strcasecmp("Ya", $msg) == 0 || strcasecmp("Nah", $msg) == 0){
            
            $query = "UPDATE sessions SET talk_out = '$msg' WHERE s_id = $s_id";
            
            if($conn->query($query)){
                
            }
            else{
                echo "Something went wrong";
            }
            
            $query = "SELECT * FROM msgs WHERE msg_doc = '$doc' AND msg_order = $order";
            $msg = "Something went wrong";
            
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
        else{
            incorrect();
        }
        
    }
    else if($order == 6){
        
        if(strcasecmp("Yes", $msg) == 0 || strcasecmp("No", $msg) == 0 || strcasecmp("Ya", $msg) == 0 || strcasecmp("Nah", $msg) == 0){
            
            $query = "UPDATE sessions SET movie_out = '$msg' WHERE s_id = $s_id";
            
            if($conn->query($query)){
                
            }
            else{
                echo "Something went wrong";
            }
            echo $query;
            
            $query = "SELECT * FROM msgs WHERE msg_doc = '$doc' AND msg_order = $order";
            $msg = "Something went wrong";
            
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
        else{
            incorrect();
        }
        
    }
    else if($order == 7){
    
        $suggetion = "";
        $query = "SELECT doctors.d_name, doctors.d_data FROM (sessions INNER JOIN doctors ON sessions.problem_out = doctors.d_field) WHERE s_id = $s_id";
    
        if($data = $conn->query($query)){
            
            $result = $data->fetch_assoc();
            $suggetion = $result['d_name']." is our suggetion for you for your problem. ".$result['d_data'];
            
        }
        else{
            echo "something went wrong";
        }
    
        $query = "SELECT * FROM msgs WHERE msg_doc = '$doc' AND msg_order = $order";
        $msg = "Something went wrong";
            
        if($data = $conn->query($query)){
                
            $result = $data->fetch_assoc();
            $msg = $result['msg_data']."<br>".$suggetion."<br>"."Your session is over type 'quit' to save and continue to your lobby";
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
    else{
        
        done();
        
    }
    
}
else if(isset($_SESSION['login_user_connect']) && isset($_REQUEST['name'])){
    header("Location:profile?name=".$_REQUEST['name']);
    
}
else{
    header("Location:../logout"); 
}
?>
