<?php

session_start();

if(isset($_SESSION['login_user_connect']) && isset($_REQUEST['name'])){
    
    $dts = explode("&",base64_decode($_SESSION['login_user_connect']));
    $id = $dts[0];
    $email = $dts[1];
    $name = $dts[2];
    
    require_once("../../../Database/dbconnect_connect.php");
    
    $theme_color = "blue";
    
    $qry = "SELECT theme FROM users WHERE u_id = $id";
    
    if($data = $conn->query($qry)){
        
        $result = $data->fetch_assoc();
        $theme_color = $result['theme'];
        
    }
    
    $qry = "SELECT real_name FROM users WHERE u_id = $id";
    
    if($data = $conn->query($qry)){
        
        $result = $data->fetch_assoc();
        $name = $result['real_name'];
        
    }
    
    $q = "SELECT verified FROM users WHERE u_id = $id";
    
    if($d = $conn->query($q)){
        
        $rslt = $d->fetch_assoc();
        
        if($rslt['verified'] == '1'){
            define("TITLE", "start session | ToConnect");
            include("../Commen/header.php");
?>
<!-- Verified account area -->

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
        <hr>
        <center>
        	<div class="w3-text-red" id="up-error"></div>
        	<div class="loader" id="up-loader" style="display:none"></div>
        </center>
        <table class="w3-table w3-margin-top">
            <tr>
                <td class="w3-large" style="text-align:right;vertical-align: middle;">Username: </td>
                <td><input class="w3-border w3-input" id="u_name" value="<?php echo $result['u_name'] ?>"></td>
            </tr>
        
             <tr style="margin-top:30px;">
                <td class="w3-large" style="text-align:right;vertical-align: middle;">Current Pass: </td>
                <td><input class="w3-border w3-input" id="pass" type="password" placeholder="Current Password"></td>
            </tr>
            <tr>
                <td class="w3-large" style="text-align:right;vertical-align: middle;">New Pass: </td>
                <td><input class="w3-border w3-input" id="newPas" type="password" placeholder="New Password"></td>
            </tr>
            <tr>
                <td class="w3-large" style="text-align:right;vertical-align: middle;">Again new Pass: </td>
                <td><input class="w3-border w3-input" id="newAga" type="password" placeholder="New Password Again"></td>
            </tr> 
            
        </table>
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

<div class="w3-padding-64 w3-animate-bottom">
<div class="w3-content w3-light-gray w3-padding-32 w3-text-<?php echo $theme_color ?>">
    <div class="w3-xxlarge w3-center w3-padding">Start New Session</div>
    <hr style="border-top:1px solid black;margin:10px">
    <div class="w3-container w3-padding">
        <div class="w3-xlarge w3-padding">
            Welcome <?php echo $name ?>!!!
        </div>
        <div class="w3-text-black w3-padding w3-large">
            Read the below instructions carefully and select the counselor to start these session. We have two counselors.<br> 1) Dr Karen <br>2) Dr Batla
        </div>
        <hr style="border-top:1px solid black;margin:10px">
        <div class="w3-padding w3-xlarge w3-center w3-text-black">
            Instructions
        </div>
        <div class="w3-large">
            If you want us to recite the instructions then select those lines with the help of cursor.
        </div>
        <ul class="w3-list w3-text-black" id="instructions">
            <li>This is a vertual counselling session. At the end of this session you will find out the best way to solve your problems as well as a contact details of 
            a doctor who will guide you in future.</li>
            <li>If you turn off your computer before submitting the data then you ae not able to attend that session again.</li>
            <li>You session's result is totally dependent on your answers. So be a honest answerer. Do not lie.</li>
            <li>In case you gave incorrect answers then the result will be incorrect. We are not responsible any of those kind of things.</li>
            <li>In case you are thinking that what happens to my answers, then your answeres are secured with us. No one is going to be able to watch it as english language.</li>
            <li>This software is to turn your feelings positive. On the basis of your answers we will provide you the way to feel better</li>
            <li>This is a totally free service.</li>
        </ul>
        
        <form class="w3-margin w3-padding w3-text-black" id="data">
            <input type="checkbox" id="read" required> I have read and understand all the above instructions
            <input value="Karen" id="dr" name="dr" hidden>
            <input value="<?php echo $_REQUEST['name'] ?>" name="number" hidden>
            <div class="w3-section">
                <b>Select Doctor: </b>
                <table class="w3-xxlarge">
                    <tr>
                        <td class="w3-center kel-hover-2"><img src="https://www.w3schools.com/w3images/avatar2.png" id="Batla" class="w3-circle w3-margin" style="width:200px;" onclick="select('Batla')"></td>
                        <td class="w3-center kel-hover-2"><img src="https://www.w3schools.com/howto/img_avatar2.png" id="Karen" class="w3-circle w3-margin" style="width:200px;border:5px solid blue" onclick="select('Karen')"></td>
                    </tr>
                    <tr>
                        <td class="w3-center">Dr. Batla</td>
                        <td class="w3-center">Dr. Karen</td>
                    </tr>
                </table>
            </div>
            <div class="w3-section">
                <input type="button" value="Start Session" onclick="start()" class="w3-button kel-hover w3-<?php echo $theme_color ?>">
            </div>
        </form>
    </div>
    <form class="w3-padding">
        <div class="w3-section">
            
        </div>
        <div class="w3-section">
            
        </div>
        <div class="w3-section">
            
        </div>
    </form>
</div>
</div>
<?php
        }
        else{
           
?>
<!-- Notverified account area -->

<?php
            header("Location:../logout.php");
        }
        
    }
    else{
        echo "Something went wrong, Please try again later"; 
    }
    
    
?>
<script src="/ToConnect/Js/check.js"></script>
<script src="Js/varified.js"></script>
<script src="https://code.responsivevoice.org/responsivevoice.js?key=enR4dReg"></script>
<script src="Js/startNew.js">
    
</script>
</body>
</html>
<?php
    
    $conn->close();
}
else{
    header("Location:../logout"); 
}

?>
