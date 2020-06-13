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
<center>
<div class="w3-padding-64">
<div class="w3-row w3-content w3-padding w3-margin-top" style="max-width:600px">

<div class='w3-half w3-padding w3-animate-right'>
    <a href="startNew?name=<?php echo $_REQUEST['name'] ?>" style="text-decoration:none">
    <div class="w3-light-gray w3-padding-32 w3-text-<?php echo $theme_color ?> w3-xlarge">
    <div><i class="fa fa-plus w3-jumbo"></i></div>
    <div>New Session</div>
    </div>
    </a>
</div>

<div class='w3-half w3-padding w3-animate-left'>
    <a href="feedback?name=<?php echo $_REQUEST['name'] ?>" style="text-decoration:none">
    <div class='w3-light-gray w3-padding-32 w3-text-<?php echo $theme_color ?> w3-xlarge'>
    <div><i class="fa fa-comments w3-jumbo"></i></div>
    <div>Feedback</div>
    </div>
    </a>
</div>

</div>

<div class="w3-row w3-content w3-padding" style="max-width:600px">

<div class='w3-half w3-padding w3-animate-right'>
    <a href="mySessions?name=<?php echo $_REQUEST['name'] ?>" style="text-decoration:none">
    <div class="w3-light-gray w3-padding-32 w3-text-<?php echo $theme_color ?> w3-xlarge">
    <div><i class="fa fa-home w3-jumbo"></i></div>
    <div>My Sessions</div>
    </div>
    </a>
</div>

<div class='w3-half w3-padding w3-animate-left'>
    <a onclick="document.getElementById('editun').style.display='block'" class="kel-hover-2" style="text-decoration:none">
    <div class='w3-light-gray w3-padding-32 w3-text-<?php echo $theme_color ?> w3-xlarge'>
    <div><i class="fa fa-cog w3-jumbo"></i></div>
    <div>Settings</div>
    </div>
    </a>
</div>

</div>

</div>
</center>
<script src="/ToConnect/Js/check.js"></script>
<script src="Js/varified.js"></script>

</body>
</html>
