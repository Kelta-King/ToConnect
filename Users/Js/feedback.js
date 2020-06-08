
let sendfeedback = () => {
    
    let name = document.getElementById('name').value;
    let msg = document.getElementById('msg').value;
    
    if(name == "" || msg == ""){
        
        alert("Please fill the data");
        return;
        
    }
    
    let str = "name="+name+"&msg="+msg;
    let xhttp = new XMLHttpRequest();
    let loader = document.getElementById('loader');
    let error = document.getElementById('error');
    
    xhttp.onreadystatechange = function() {
    	loader.style.display = "block";
    	if(this.readyState == 4 && this.status == 200){
    		error.innerHTML = this.responseText;
    		loader.style.display = "none";
    		if(this.responseText == ""){
    		    alert("Feedback sent");
    		    location.reload(); 
     		}
    	}
    }
    xhttp.open("POST", "sendfeedback", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(str);
    
}
