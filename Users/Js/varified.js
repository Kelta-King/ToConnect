let updatetheme = (color) => {
    
    let str = "Color="+color;
    let xhttp = new XMLHttpRequest();
    let loader = document.getElementById('color-loader');
    let error = document.getElementById('color-error');
    
    xhttp.onreadystatechange = function() {
    	loader.style.display = "block";
    	if(this.readyState == 4 && this.status == 200){
    		error.innerHTML = this.responseText;
    		loader.style.display = "none";
    		if(this.responseText == ""){
    		    alert("Theme updated");
    		    location.reload(); 
     		}
    	}
    }
    xhttp.open("POST", "Parts/updatetheme", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(str);
}
