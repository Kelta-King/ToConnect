function OpenLogIn()
	{
		document.getElementById("layer2").style.display = "none";
		document.getElementById("layer1").style.display = "block";
		
	}
	
	function OpenSignIn()
	{
		document.getElementById("layer2").style.display = "block";
		document.getElementById("layer1").style.display = "none";
	}
	
	
	let loginCheck = () => {
	    
	    let formL = document.getElementById('login');
		document.getElementById('eu').name = "Eu";
		document.getElementById('password').name = "Password";
		
		let eu = formL.Eu.value;
		let pass = formL.Password.value;
		let error = document.getElementById('loginerror');
		
		let check_data = new Check();
		if(check_data.check(eu) || check_data.check(pass)){
		    
		    alert("Please add correct details");
		    error.innerHTML = "Please add correct details";
		    return;
		    
		}
		
		//email login
		if(eu.includes("@")){
		    if(check_data.emailCheck(eu, error)){
		        
		        let str = "Pass="+pass+"&Email="+eu;
            	let xhttp = new XMLHttpRequest();
            	let loader = document.getElementById('loginloader');
            	xhttp.onreadystatechange = function() {
            		loader.style.display = "block";
            		if(this.readyState == 4 && this.status == 200){
            			error.innerHTML = this.responseText;
            			loader.style.display = "none";
            			if(this.responseText == ""){
            			    
            			    formL.action = "login";
            				formL.method = "post";
            				formL.submit();
            				
            			}
            		}
        		}
        		xhttp.open("POST", "Check/loginEmailCheck", true);
        		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        		xhttp.send(str);
		        
		    }
		    else{
		        return false;
		    }
		    
		}
		//username login
		else{
		    
		    let str = "Pass="+pass+"&Uname="+eu;
            let xhttp = new XMLHttpRequest();
            let loader = document.getElementById('loginloader');
            xhttp.onreadystatechange = function() {
            	loader.style.display = "block";
            	if(this.readyState == 4 && this.status == 200){
            	error.innerHTML = this.responseText;
            	loader.style.display = "none";
            		if(this.responseText == ""){
            		    
            		    formL.action = "login";
            			formL.method = "post";
            			formL.submit();
            			
            		}
            	}
        	}
        	xhttp.open("POST", "Check/loginUnameCheck", true);
        	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        	xhttp.send(str);
		    
		}
	    
	}
