let send = () => {
    
    let pass = document.getElementById('pass').value;
    
    if(pass == ""){
        
        alert("Please fill the data");
        return;
        
    }
    
    let check = new Check();
    let error = document.getElementById('error');
    
    if(check.check(pass)){
        alert("Please enter valid email");
		error.innerHTML = "Please enter valid email";
        return false;
    }
    
    let str = "data=<?php echo $_REQUEST['data'] ?>"+"&pass="+pass;
    let xhttp = new XMLHttpRequest();
    let loader = document.getElementById('loader');
    
    xhttp.onreadystatechange = function() {
    	loader.style.display = "block";
    	if(this.readyState == 4 && this.status == 200){
    		error.innerHTML = this.responseText;
    		loader.style.display = "none";
    		if(this.responseText.length == 1){
    		    alert("Password changed");
    		    location.replace("https://keltagoodlife.co/ToConnect"); 
     		}
    	}
    }
    xhttp.open("POST", "dorecovery", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(str);
    
}
