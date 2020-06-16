<?php

session_start();

if(isset($_SESSION['login_user_connect']) && isset($_SESSION['session_begin']) && isset($_REQUEST['name'])){
    
    $datas = base64_decode($_SESSION['session_begin']);
    $datas = explode("&",$datas);
    $doc = $datas[0];
    $s_id = $datas[1];
    $dts = explode("&",base64_decode($_SESSION['login_user_connect']));
    $id = $dts[0];
    $email = $dts[1];
    $name = $dts[2];
    //user id 
    $id = $datas[2];
    
    require_once("../../../Database/dbconnect_connect.php");
    
    $_SESSION['msg_order'] = 1;
    $_SESSION['order_hold'] = false;
    
    $theme_color = "blue";
    $qry = "SELECT theme FROM users WHERE u_id = $id";
    
    if($data = $conn->query($qry)){
        
        $result = $data->fetch_assoc();
        $theme_color = $result['theme'];
        
    }
    
    include("sessionHeader.php");
?>

<div class="w3-modal" id="editun">
    <div class="w3-modal-content w3-animate-zoom w3-card-4" style="max-width:500px">
      <header class="w3-container w3-<?php echo $theme_color ?>"> 
        <span onclick="document.getElementById('editun').style.display='none'" 
        class="w3-button w3-display-topright w3-xlarge">&times;</span>
        <h2>My Account</h2>
      </header>
      <form class="w3-container">
<?php
    $query1 = "SELECT u_name FROM users WHERE u_id = $id";
    
    if($data1 = $conn->query($query1)){
        
        $result = $data1->fetch_assoc();
?>
        <div class="w3-container w3-margin w3-padding w3-large">
            <center>
        		<div class="w3-text-red" id="color-error"></div>
        		<div class="loader" id="color-loader" style="display:none"></div>
            </center>
            <b>Choose Theme:</b> <span class="w3-badge w3-blue w3-text-blue w3-margin-left kel-hover-2" onclick="updatetheme('blue')">a</span>
            <span class="w3-badge w3-green kel-hover-2 w3-text-green" onclick="updatetheme('green')">a</span>
            <span class="w3-badge w3-red kel-hover-2 w3-text-red" onclick="updatetheme('red')">a</span>
            <span class="w3-badge w3-pink kel-hover-2 w3-text-pink" onclick="updatetheme('pink')">a</span>
            <span class="w3-badge w3-indigo kel-hover-2 w3-text-indigo" onclick="updatetheme('indigo')">a</span>
        </div>
        
<?php
    }
    else{
        echo "something went wrong";
    }
?>
        <hr>
        <button type="button" class="w3-button w3-right w3-margin-bottom w3-margin-left w3-border w3-round w3-<?php echo $theme_color ?>" onclick="updateProfile()"><i class="fa fa-pencil-square-o"></i> Update</button>
        <button type="button" onclick="document.getElementById('editun').style.display='none'" class="w3-button w3-right w3-margin-bottom w3-border w3-round"><i class="fa fa-times"></i> Cancel</button>
        
      </form>
      
    </div>
</div>

<?php
    
    
    
?>
<div class="w3-margin">
<div class="w3-padding-large w3-border w3-round w3-xlarge w3-<?php echo $theme_color ?>">
    <i class="fa fa-user-md"></i> Dr <?php echo $doc ?> <span id="typing" class="w3-large"> Is typing...</span>
</div>

<div class="w3-border w3-round w3-round w3-xlarge w3-light-gray" >
<div id="chats" style="height:500px;overflow:scroll">
    

    
</div>
</div>

<div class="w3-row" style="margin-top:10px">
<div class="w3-col l11 m10 s10">
    
<input class="w3-input w3-border w3-round w3-large" id="sender" placeholder="your message...">
</div>
<button class="w3-col l1 m2 s2 w3-button w3-<?php echo $theme_color ?> w3-round w3-large" type="submit" onclick="send()">Send</button>
</div>
</div>
</div>
<script src="https://code.responsivevoice.org/responsivevoice.js?key=enR4dReg"></script>
<script>
    
var context;
window.addEventListener('load', init, false);
function init() {
    try {
        // Fix up for prefixing
        window.AudioContext = window.AudioContext||window.webkitAudioContext;
        context = new AudioContext();
    }
    catch(e) {
        alert('Web Audio API is not supported in this browser');
    }
}
    
    
var objDiv = document.getElementById("chats");
objDiv.scrollTop = objDiv.scrollHeight;

let leave = (id) => {
    
    if(!confirm("Do you really want to leave?")){
        return false;
    }
    
    let str = "s_id="+id;
    let xhttp = new XMLHttpRequest();
    let data = document.getElementById("chats").innerHTML;
    document.getElementById("sender").value = "";
    xhttp.onreadystatechange = function() {
    	
    	if(this.readyState == 4 && this.status == 200){
    		location.replace("profile?name=<?php echo $_REQUEST['name'] ?>");
    	}
    }
    xhttp.open("POST", "session_chat/remove", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(str);
    
}

let scrollUpdate = () => {
    
    var element = document.getElementById("chats");
    element.scrollTop = element.scrollHeight;

}    

let send = () => {
    
    document.getElementById("typing").style.display = "inline-block";
    let msg = document.getElementById("sender").value;
    
    if(msg == ""){
        document.getElementById("typing").style.display = "None";
        return false;
    }
    
    let msglength = msg.length;
    let str = "msg="+msg+"&theme=<?php echo $theme_color ?>";
    let xhttp = new XMLHttpRequest();
    let data = document.getElementById("chats").innerHTML;
    document.getElementById("sender").value = "";
    xhttp.onreadystatechange = function() {
    	
    	if(this.readyState == 4 && this.status == 200){
    		
    		let speak = this.responseText.slice(309 + msglength, this.responseText.length-12);
    		
    		datas = speak.split("<br>");
    		speak = "";
    		for(let i = 0; i < datas.length; i++){
    		    speak += datas[i];
     		}
    		
<?php
    if($doc == "Karen"){
?>
responsiveVoice.speak(speak,"Australian Female");
<?php
    }
    else{
?>
responsiveVoice.speak(speak,"Hindi Male");
<?php
    }
?>
    		document.getElementById("chats").innerHTML += this.responseText;
    		document.getElementById("typing").style.display = "None";
    		scrollUpdate();
    		
    		if(this.responseText == "<div class='w3-bar'><div class='w3-bar-item w3-right w3-border w3-round w3-margin-top w3-margin-left w3-animate-opacity w3-green' style='max-width:80%;'>quit</div></div>" || this.responseText.length == 169){
    		    location.replace("profile?name=<?php echo $_REQUEST['name'] ?>");
    		}
    		
    	}
    }
    xhttp.open("POST", "session_chat/send", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(str);
}
   

let count = 0;

let refresh = () => {
    
    document.getElementById("typing").style.display = "inline-block";
    let str = "name=<?php echo $_REQUEST['name'] ?>";
    let xhttp = new XMLHttpRequest();
    let data = document.getElementById("chats").innerHTML;
    if(count == 2){
        clearInterval(x);
        document.getElementById("typing").style.display = "None";
    }
    xhttp.onreadystatechange = function() {
    	
    	if(this.readyState == 4 && this.status == 200){
    		let str = this.responseText.slice(144,this.responseText.length-12);
    		document.getElementById("typing").style.display = "None";
    		document.getElementById("chats").innerHTML += this.responseText;
    		count++;
    		scrollUpdate();
    		
<?php
    if($doc == "Karen"){
?>
responsiveVoice.speak(str,"Australian Female");
<?php
    }
    else{
?>
responsiveVoice.speak(str,"Hindi Male");
<?php
    }
?>
            
    	}
    }
    xhttp.open("POST", "session_chat/refresh", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(str);
}
refresh();
let x = setInterval(refresh,2000);

</script>
</body>
</html>
<?php

}
else if(isset($_SESSION['login_user_connect']) && isset($_REQUEST['name'])){
    header("Location:profile?name=".$_REQUEST['name']);
}
else{
    header("Location:../logout"); 
}
?>
