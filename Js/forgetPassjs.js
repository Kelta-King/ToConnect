let send = () => {
    
    let email = document.getElementById('email').value;
    let check = new Check();
    let error = document.getElementById('error');
    
    if(email == ""){
        
        alert("Please fill the data");
        return;
        
    }
    
    if(check.check(email)){
        alert("Please enter valid email");
		error.innerHTML = "Please enter valid email";
        return false;
    }
    
    if(!check.emailCheck(email)){
        alert("Please enter valid email");
		error.innerHTML = "Please enter valid email";
        return false;
    }
    
    let str = "email="+email;
    let xhttp = new XMLHttpRequest();
    let loader = document.getElementById('loader');
    
    xhttp.onreadystatechange = function() {
    	loader.style.display = "block";
    	if(this.readyState == 4 && this.status == 200){
    		error.innerHTML = this.responseText;
    		loader.style.display = "none";
    		if(this.responseText == ""){
    		    alert("Email sent");
    		    location.reload(); 
     		}
    	}
    }
    xhttp.open("POST", "sendrecovery", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(str);
    
}

