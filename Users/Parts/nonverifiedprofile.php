<div class="w3-modal" id="editun">
    <div class="w3-modal-content w3-animate-zoom w3-card-4" style="max-width:500px">
      <header class="w3-container w3-green"> 
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
        <table class="w3-table w3-margin-top">
            
            <tr>
                <td class="w3-large" style="text-align:right;vertical-align: middle;">Username: </td>
                <td><input class="w3-border w3-input" value="<?php echo $result['u_name'] ?>"></td>
            </tr>
            <tr>
                <td class="w3-large" style="text-align:right;vertical-align: middle;">Email: </td>
                <td><input class="w3-border w3-input" value="<?php echo  $email ?>"></td>
            </tr>
            
        </table>
<?php
    }
    else{
        echo "something went wrong";
    }
?>
        <hr>
        <button type="button" class="w3-button w3-right w3-margin-bottom w3-margin-left w3-border w3-round w3-green" onclick="alert('please verify your email')"><i class="fa fa-pencil-square-o"></i> Update</button>
        <button type="button" onclick="document.getElementById('editun').style.display='none'" class="w3-button w3-right w3-margin-bottom w3-border w3-round"><i class="fa fa-times"></i> Cancel</button>
        
      </form>
      
    </div>
</div>
<center>
<div class='w3-content'>
    <div class="w3-padding w3-large">
       Check your mailbox to find our verification mail...
    </div>
    <hr>
    <div class="w3-padding">
        We have sent an email to your registered email address. If you are unable to find it then please check in spam mails. 
        <br><b>If still you are unable to find the mail then you can again ask for another varification mail. Fill the below form to ask for a new 
        varification mail.</b>
    </div>
    <form>
        <center>
			<div class="w3-text-red" id="error"></div>
			<div class="loader" id="loader" style="display:none"></div>
		</center>
        <div class="w3-section">
            Email:<input type="text" class="w3-input w3-border" placeholder="name@email.com" style="max-width:450px;" id="email">
        </div>
        <div class="w3-section">
            <input type="button" class="w3-button w3-green" value="Send" onclick="update()">
        </div>
    </form>
</div>
</center>
<!-- add check.js before commiting in github -->
<script src="Js/nonvarified.js"></script>
</body>
</html>
