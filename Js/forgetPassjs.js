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
}
