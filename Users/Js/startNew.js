let select = (name) => {
        
        let karen = document.getElementById("Karen");
        let batla = document.getElementById("Batla");
        
        if(name == "Karen"){
            
            karen.style.border = "thick solid #0000FF";
            batla.style.border = "thick solid #f1f1f1";
            document.getElementById("dr").value = "Karen";
            let speak = "Hi, My name is Dr Karen";
            responsiveVoice.speak(speak,"Australian Female");
            
        }
        else if(name == "Batla"){
            
            batla.style.border = "thick solid #0000FF";
            karen.style.border = "thick solid #f1f1f1";
            document.getElementById("dr").value = "Batla";
            let speak = "Hello, My name is Dr Batla";
            responsiveVoice.speak(speak,"Hindi Male");
            
        }
        
    }
    
    let start = () => {
        
        let dr = document.getElementById("dr").value;
        
        if(!document.getElementById("read").checked){
            alert("Please select checkbox")
            document.getElementById("read").focus();
            return false;
        }
        
        if(!confirm("Are you sure, you want to choose Dr. "+dr)){
            return false;
        }
        
        document.getElementById('data').method = "post";
        document.getElementById('data').action = "sessionSet";
        document.getElementById('data').submit();
        
    }
    
