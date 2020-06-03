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
}
