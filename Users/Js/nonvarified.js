let update = () => {
	    
	    let email = document.getElementById('email').value;
	    let check_data = new Check();
	    let error = document.getElementById('error');
	        
	    if(email == ""){
	        alert("Please enter your email");
	        error.innerHTML = "Please enter your email";
	        return false;
	    }
	    
	    if(check_data.check(email)){
	        
	        return false;
	    }
	    
	    if(!check_data.emailCheck(email, error)){
	        return false;
	    }
	    
	    let str = "Email="+email;
        let xhttp = new XMLHttpRequest();
        let loader = document.getElementById('loader');
        xhttp.onreadystatechange = function() {
        	loader.style.display = "block";
        	if(this.readyState == 4 && this.status == 200){
        		error.innerHTML = this.responseText;
        		loader.style.display = "none";
        		if(this.responseText == ""){
        		    alert("Email updated and verification mail sent");
        		    location.reload(); 
         		}
        	}
        }
        xhttp.open("POST", "updateEmail", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(str);
	    
	}
