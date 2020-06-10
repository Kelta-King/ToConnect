<!DOCTYPE html>
<html>
<head>
<title>Home | ToConnect</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Literata&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../CSS/kel.css">
<style>
</style>
<script>
    function myFunction() {
      var x = document.getElementById("Demo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else { 
        x.className = x.className.replace(" w3-show", "");
      }
    }
</script>
<script src="Js/varified.js"></script>
</head>
<body>

<header class="w3-bar w3-<?php echo $theme_color ?> w3-padding">
<div class="w3-bar-item w3-xlarge w3-hide-small" style="margin-right:40px;">ToConnect</div>
<button class="w3-bar-item w3-border kel-hover-2 w3-red" title="Leave" style="margin-top:7px;margin-bottom:7px" onclick="leave(<?php echo $s_id ?>)">
    <i class="fa fa-times"></i> Leave
</button>
<button class="w3-bar-item w3-right w3-border kel-hover-2" title="My Account" style="margin-top:7px;margin-bottom:7px" onclick="document.getElementById('editun').style.display='block'">
    <i class="fa fa-lock"></i> <?php echo $name ?>
</button>

<div class="w3-dropdown-click w3-bar-item w3-right w3-<?php echo $theme_color ?> w3-hover-<?php echo $theme_color ?>">
<button class="kel-hover-2 w3-button w3-<?php echo $theme_color ?> w3-hover-<?php echo $theme_color ?>" onclick="myFunction()" title="Options" >
    <i class="fa fa-caret-down"></i>
</button>
    <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
      <a onclick="document.getElementById('editun').style.display='block'" class="w3-bar-item w3-button"><i class="fa fa-pencil"></i> Edit</a>
      <a href="../logout" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> LogOut</a>
    </div>
</div>

</header>
