<!DOCTYPE html>
<html>
	<head>
		<title>Assassination of The assassin</title>
		<link rel = "icon" href="https://b.imge.to/2019/10/08/vFxnIk.png" type = "image/x-icon"> 
		<style>
	    	body{
		        margin:0;
		        background-color:#ff0033;
		    }
		    canvas.can2{
		        margin:0;
		        background-image:url('https://b.imge.to/2019/10/08/vFxsV1.png');
                background-size:100% 100%;
		        display:none;
		    }
		    canvas#myCanvas1{
		        background-color:#ff0033;
		        display:none;
		    }
		    button{
		        position:absolute;
		        left:0px;
		        padding:10px;
		        background-color:#000000;
		        color:#ffffff;
		        border:0;
		    }
		    
		    button.play{
		        top:450px;
		        font-family:"Old English Text MT";
		        width:200px;
		        font-size:30px;
		        display:none;
		    }
		    button.credits{
		        top:520px;
		        font-family:"Old English Text MT";
		        width:180px;
		        font-size:30px;
		        display:none;
		    }
		    button.quit{
		        top:590px;
		        font-family:"Old English Text MT";
		        width:160px;
		        font-size:30px;
		        display:none;
		    }
		    button.play:hover{
		        top:450px;
		        background-color:#000000;
		        color:#ffffff;
		        font-weight:600;
		        width:230px;
		        font-size:32px;
		        font-family:"Old English Text MT";
		        display:none;
		    }
		    button.credits:hover{
		        top:520px;
		        background-color:#000000;
		        color:#ffffff;
		        font-weight:600;
		        font-size:32px;
		        width:210px;
		        font-family:"Old English Text MT";
		        display:none;
		    }
		    button.quit:hover{
		        top:590px;
		        background-color:#000000;
		        color:#ffffff;
		        font-weight:600;
		        font-size:32px;
		        width:190px;
		        font-family:"Old English Text MT";
		        display:none;
		    }
		    p.heading{
		        text-align:center;
		        font-family:"Old English Text MT";
		        position:absolute;
		        left:30px;
				font-size:80px;
				display:none;
		    }
		    p.intro{
		        font-family:"Old English Text MT";
		        font-size:30px;
		    }
		    button.start{
		        position:static;
		        margin-top:40px;
		        font-size:30px;
		        font-family:"Old English Text MT";
		        padding:10px;
		    }
		    button.start:hover{
		        position:static;
		        font-family:"Old English Text MT";
		        margin-top:40px;
		        font-size:32px;
		        padding:12px;
		    }
		    canvas.can3{
		        background-color:#ff0033;
		        display:none;
		    }
            button.full{
            	position:relative;
                font-size:40px;
                font-weight:500;
            }
            p#sorry{
                display:none;
                position:absolute;
                top:0px;
                font-family:"Old English Text MT";
		        font-size:30px;
            }
            button#back{
                display:none;
                position:absolute;
                top:100px;
                font-family:"Old English Text MT";
		        font-size:30px;
            }
            
            button#back:hover{
                display:none;
                position:absolute;
                top:100px;
                font-family:"Old English Text MT";
		        font-size:32px;
            }
            button#back1{
                display:none;
                position:absolute;
                top:100px;
                font-family:"Old English Text MT";
		        font-size:30px;
            }
            
            button#back1:hover{
                display:none;
                position:absolute;
                top:100px;
                font-family:"Old English Text MT";
		        font-size:32px;
            }
		</style>
	</head>
	<body>
	    
	    <center><p class="intro" id="intro">The story of an Assassin of the year 2056, leads us to the great adventure of time.<br>
	    You could not stand a chance against him, but still you are here, standing with us hero. <br> 
	    And that makes you Mr. Anderson. 
	    <br> The one who defeated The assassin in the year 1932</p></center>
	    <center><button class="start" id="start" onclick="start()">Start</button></center>
        <div id="can2">
	    <p class="heading" id="heading">Assasination of  The  Assasin</p>
	    <button class="play" onclick="play()" id="play">Play</button>
	    <button class="credits" id="credits" onclick="settings()">Settings</button>
	    <a href="file:///C:/Users/kushang/Desktop/Games/GamePageLink.html"><button class="quit" id="quit">Quit</button><a>
	    <button id="back" onclick="back()">Home</button>
		<p id="sorry">Sorry, but this page is not ready...</p>
		    
	        <canvas id="myCanvas2" class="can2" width="1550px" height="800px"></canvas>
	        </div>
            
        <div id="can1">
            <button id="back1" onclick="back1()">Home</button>
		    <canvas id="myCanvas1" height="890px" width="1550px"></canvas>
		</div>
		<script>
		alert("Play this game only on pc...");
		
		//---------------1st canvas--------------but canvas2 name--------------//
		
		    var canvas2=document.getElementById('myCanvas2');
		    var ctx2=canvas2.getContext('2d');
		    var img1=new Image();
		    var img2=new Image();
		    img1.src='https://a.imge.to/2019/10/07/vFM13F.png';
		    img2.src='https://c.imge.to/2019/10/07/vFMHYV.png';
		    var count=0;
		    var change=0;
		    var elem1 = document.getElementById("can1");
		    var elem2 = document.getElementById("can2");
           
		    var heading=document.getElementById("heading");
            heading.style.left=50+"px";
            heading.style.fontSize=100+"px";
            class sound
            {
                sound;
                constructor(src)
                {
                    this.sound=document.createElement('audio');
                    this.sound.src=src;
                    this.sound.setAttribute("preload","auto");
                    this.sound.setAttribute("controls","none");
                    this.sound.style.display="none";
                }
                play()
                {
                    this.sound.play();
                }
                stop()
                {
                    this.sound.pause();
                }
                decVol()
                {
                	if(this.volume>=0)
                    {
                		this.volume-=20;
                    }
                }
                incVol()
                {
                	if(this.volume<=100)
                    {
                		this.volume+=20;
                    }
                }
            }
			
            class forRandom
		    {
		        n;
		        rand()
		        {
		            this.n=Math.ceil(Math.random()*500);
                    if(this.n>=10)
                    {
                        return this.n;
                    }
                    return null;
		        }
		    }
		    var fr=new forRandom();
		    var i1={
		        x:canvas2.width,
		        y:fr.rand(),
		    }
		    var i2={
		        x:canvas2.width,
		        y:fr.rand(),
		    }
		    
		    function anime()
		    {
		        ctx2.clearRect(0,0,canvas2.width,canvas2.height);
                count++;
		        if(count>=150)
		        {
		            change++;
		            count=0;
		        
		            if(change%2==0)
		            {
		                if(i1.x+150<=0)
		                {   
		                    i1.y=fr.rand();
		                    i1.x=canvas2.width;
		                }
				
		            }
		            else if(change%2==1)
		            {
		                if(i2.x+150<=0)
		                {
		                    i2.y=fr.rand();
		                    i2.x=canvas2.width;
		                }
					}
		        }
		        if(i2.y!=null)
				{
					ctx2.drawImage(img2,i2.x,i2.y);
				}
		        
				if(i1.y!=null)
				{
					ctx2.drawImage(img1,i1.x,i1.y);
				}
		        i1.x-=8;
		        i2.x-=10;    
		    }
		    
		    function begin()
		    {
		        var s1=setInterval(anime,10);
		    }
		    
		    
		    //--------------------for canvas2----------name canvas1-------------//
			
		    var canvas1 = document.getElementById("myCanvas1");
		    var ctx1=canvas1.getContext("2d");
		    var en1=1;
		    var en2=1;
			var en3=1;
		    var flr={
		        x:0,
		        y:canvas1.height-30,
		        height:canvas1.height/15,
		        width:canvas1.width,
		    };
		    
		    class Draw
		    {
		        static floor(x,y,width,height,color)
		        {
		            ctx1.beginPath();
		            ctx1.rect(x,y,width,height);
		            ctx1.fillStyle=color;
		            ctx1.fill();
		            ctx1.closePath();
		        }
		    }
		    
		    class Man{
		        x;
		        y;
		        img;
		        
		        constructor(src)
		        {
		            this.x=0;
		            this.y=canvas1.height-390;
		            this.img=new Image();
		            this.img.src=src;
		        }
		    }
		    
		    class Walk
		    {
		        rl;
		        lwalk;
		        rwalk;
		        Anderson;
		        constructor()
		        {
		            this.rl=0;
		            this.rwalk=0;
		            this.lwalk=0;
		        }
		        leftWalk(Anderson)
		        {
		            if(jump.gj>0)
                    {
	                    Anderson.x -= 0;
	                    return;
                    }
                    
                    if(this.rwalk>0)
                    {
                        this.rwalk=0;
                        Anderson.img.src='https://a.imge.to/2019/10/02/vET8xs.png';
                    }
                    else
                    {
		                this.lwalk++;
		                this.rl=1;
		                Anderson.img.src='https://a.imge.to/2019/10/02/vETqjZ.png';
                        if(this.lwalk%2==1)
                        {
                            Anderson.x -= 20;
                            Anderson.img.src='https://a.imge.to/2019/10/02/vETqjZ.png';
                        }
                        else if(this.lwalk%2==0)
                        {
                            Anderson.x -= 20;
                            Anderson.img.src='https://c.imge.to/2019/10/02/vETF9x.png';
                        }
                    }
		        }
		        rightWalk(Anderson)
		        {
		            if(jump.gj>0)
                    {
	                    Anderson.x += 0;
	                    return;
                    }
                    
                    if(this.lwalk>0)
                    {
                        this.lwalk=0;
                        Anderson.img.src='https://c.imge.to/2019/10/02/vEIfbh.png';
                    }
                    else
                    {
		                this.rwalk++;
		                this.rl=0;
                        Anderson.img.src='https://a.imge.to/2019/10/02/vEIJ2Z.png';
                    
					    if(this.rwalk%2==1)
                        {
                            Anderson.x += 20;
                            Anderson.img.src='https://a.imge.to/2019/10/02/vEIJ2Z.png';
                        }
                        else if(this.rwalk%2==0)
                        {
                            Anderson.x += 20;
                            Anderson.img.src='https://b.imge.to/2019/10/02/vEIbUG.png';
                        }
                    }
		        }
		    }
		    
		    class Jump
		    {
		        j;//for simple jump
		        gj;// for gravity jump
		        time;
		        constructor()
		        {
		            this.j=0;
		            this.gj=0;
		            this.time=10;
		        }
		        simpleJump()
		        {
		            this.j=0;
		        }
		        gravityJump()
		        {
		            this.gj=1;
		            if(walk.rl<=0)
                    {
                        Anderson.img.src='https://b.imge.to/2019/10/03/vEN1vy.png';
                    }
                    else if(walk.rl>0)
                    {
                        Anderson.img.src='https://b.imge.to/2019/10/03/vEN5Nt.png';
                    }
		        }
		        checkJump()
		        {
		            if(this.gj>0)
                    {
                        Anderson.y-=this.time*0.5;
						if(walk.rl<=0)
						{
							Anderson.x+=5;
						}
						else if(walk.rl>0)
						{
							Anderson.x-=5;
						}
                        this.time-=0.1;
                        if((Anderson.y+200)>=canvas1.height-191)
                        {
                            this.gj=0;
                            this.time=10;
                            walk.rwalk=0;
                            walk.lwalk=0;
                            if(walk.rl==0)
                            {
                                Anderson.img.src='https://c.imge.to/2019/10/02/vEIfbh.png';
                            }
                            else if(walk.rl==1)
		                    {
		                        Anderson.img.src='https://a.imge.to/2019/10/02/vET8xs.png';
		                    }
                        }
                    }    
		        }
		    }
		    
		    class SimpleAttack
		    {
		        aR;
		        aL;
		        attR;
		        attL;
		        attimgR;
		        attimgL;
		        xR;
		        yR;
		        xL;
		        yL;
		        constructor(srcR,srcL)
		        {
		            this.aR=0;
		            this.xR=Anderson.x+150;
		            this.yR=Anderson.y+45;
		            this.attR=0;
		            this.attimgR=new Image();
		            this.attimgR.src=srcR;
		        
		            this.aL=0;
		            this.xL=Anderson.x+150;
		            this.yL=Anderson.y+45;
		            this.attL=0;
		            this.attimgL=new Image();
		            this.attimgL.src=srcL;
		        }
		        simpleAttackRight()
		        {
		            en1=0;
                    Anderson.img.src='https://b.imge.to/2019/10/02/vEI8cy.png';
                    this.xR=Anderson.x+150;
                	this.yR=Anderson.y+45;
                    walk.rwalk=0;
                    walk.lwalk=0;
                    this.aR=30;
                    this.attR=1;
		        }
		        
		        simpleAttackLeft()
		        {
		            en2=0;
                    Anderson.img.src=' https://c.imge.to/2019/10/02/vETk86.png';
                    this.xL=Anderson.x-70;
                	this.yL=Anderson.y+45;
                    walk.rwalk=0;
                    walk.lwalk=0;
                    this.aL=30;
                    this.attL=1;
		        }
		        
		        checkSimpleAttRight()
		        {
		             
		            this.aR--;
                    if(this.attR>0)
                    {
                	    if(this.xR<=canvas1.width)
                	    {
                	        this.xR+=6;
                	        ctx1.drawImage(this.attimgR,this.xR,this.yR);
                	    }
                	    else
                	    {
                	        this.attR=0;
                	        this.xR=Anderson.x-150;
                	        this.yR=Anderson.y+45;
                	        en1=1;
                	    }
                    }
                }
		        
		        checkSimpleAttLeft()
		        {
		            this.aL--;
                    if(this.attL>0)
                    {
                	    if(this.xL+100>=0)
                	    {
                	        this.xL-=6;
                	        ctx1.drawImage(this.attimgL,this.xL,this.yL);
                	    }
                	    else
                	    {
                	        this.attL=0;
                	        this.xL=Anderson.x-100;
                	        this.yL=Anderson.y+45;
                	        en2=1;
                	    }
            	    }
                }
		    }
			
			
		    class Block
		    {
		        rightLock()
		        {
		            if(Anderson.x+190>=canvas1.width)
                    {
                        Anderson.x=canvas1.width-190;
                    }
                }
		        leftLock()
		        {
		            if(Anderson.x+120<=0)
                    {
                        Anderson.x=-120;
                    }
		        }
		        bothLock()
		        {
		            if(Anderson.x+190>=canvas1.width)
                    {
                        Anderson.x=canvas1.width-190;
                    }
                    else if(Anderson.x+120<=0)
                    {
                        Anderson.x=-120;
                    }
		        }
		    }
		    
		    var Anderson=new Man('https://c.imge.to/2019/10/02/vEIfbh.png');
		    var walk = new Walk();
		    var jump=new Jump();
		    var satt= new SimpleAttack('https://a.imge.to/2019/10/07/vFM13F.png','https://a.imge.to/2019/10/07/vFM13F.png'); 
            var gatt=new SimpleAttack('https://b.imge.to/2019/10/07/vFM5zi.png','https://c.imge.to/2019/10/07/vFMHYV.png'); 
		    var gameSound= new sound('https://vocaroo.com/media_command.php?media=s00dqV4bzTKQ&command=download_mp3');
			var block= new Block();
		    
		    document.addEventListener('keydown', function(event) 
            {
                //left
                if(event.keyCode==37) 
                {
					if(jump.gj<=0)
					{
						walk.rl=1;
						//walk.rwalk=0;
						walk.leftWalk(Anderson);
					}
                }
                //right
                else if(event.keyCode==39)
                {
					if(jump.gj<=0)
					{
						walk.rl=0;
						//walk.lwalk=0;
						walk.rightWalk(Anderson);
					}
                }
                //jump
                else if(event.keyCode==32)
                {
                    jump.gravityJump();
                }
                //attack1
                else if(event.keyCode==87)
                {
                    if(en1==1 && walk.rl==0)
                    {
                        satt.simpleAttackRight();
                    }
                    else if(en2==1 && walk.rl>0)
                    {
                        satt.simpleAttackLeft();
                    }
                }
                //attack2
                else if(event.keyCode==83)
                {
                    if(en1==1 && walk.rl==0)
                    {
                        gatt.simpleAttackRight();
                    }
                    else if(en2==1 && walk.rl>0)
                    {
                        gatt.simpleAttackLeft();
                    }
                }
            });
            
		    function game()
		    {
		        ctx1.clearRect(0,0,canvas1.width,canvas1.height);
		        Draw.floor(flr.x,flr.y,flr.width,flr.height,"#000000");
		        ctx1.drawImage(Anderson.img,Anderson.x,Anderson.y);
		        jump.checkJump();
		        satt.checkSimpleAttRight();
		        satt.checkSimpleAttLeft();
		        gatt.checkSimpleAttRight();
		        gatt.checkSimpleAttLeft();
		        block.bothLock();
		        if(gatt.aR<=0 && gatt.aL<=0 && satt.aR<=0 && satt.aL<=0 && walk.rwalk<=0 && walk.lwalk<=0 && jump.gj<=0)
                {
                    satt.aR=0;
                    satt.aL=0;
                    if(walk.rl==0)
                    {
                         Anderson.img.src='https://c.imge.to/2019/10/02/vEIfbh.png';
                    }
                    else 
                    {
                         Anderson.img.src='https://a.imge.to/2019/10/02/vET8xs.png';
                    }
                }
		    }
		    
            var ret=0;
            
		    function play()
		    {
				gameSound.stop();
				document.getElementById("back1").style.display="block";
                document.getElementById("back1").style.top="0px";
		        canvas2.style.display="none";
		        document.getElementById('play').style.display="none";
		        document.getElementById('credits').style.display="none";
		        document.getElementById('quit').style.display="none";
		        document.getElementById('heading').style.display="none";
		        canvas1.style.display="block";
		        canvas1.style.width=screen.width+"px";
                canvas1.style.height=screen.height+"px";
		        
		        if (elem1.requestFullscreen) 
		        {
                    elem1.requestFullscreen();
                }
                else if (elem1.mozRequestFullScreen) 
                { 
                    /* Firefox */
                    elem1.mozRequestFullScreen();
                }
                else if (elem1.webkitRequestFullscreen) 
                { 
                    /* Chrome, Safari & Opera */
                    elem1.webkitRequestFullscreen();
                }
                else if (elem1.msRequestFullscreen) 
                {   
                    /* IE/Edge */
                    elem1.msRequestFullscreen();
                }
                ret=setInterval(game,5);
		    }
		    
		    function start()
		    {
		        gameSound.play();
		        document.getElementById("intro").style.display="none";
		        document.getElementById("start").style.display="none";
		        canvas2.style.display="block";
		        document.getElementById('play').style.display="block";
		        document.getElementById('credits').style.display="block";
		        document.getElementById('quit').style.display="block";
		        document.getElementById('heading').style.display="block";
		        canvas2.style.width=screen.width+"px";
                canvas2.style.heigth=screen.heigth+"px";
                document.getElementById("sorry").style.display="none";
                document.getElementById("back").style.display="none";
		        if (elem2.requestFullscreen) 
		        {
                    elem2.requestFullscreen();
                }
                else if (elem2.mozRequestFullScreen) 
                { 
                    /* Firefox */
                    elem2.mozRequestFullScreen();
                }
                else if (elem2.webkitRequestFullscreen) 
                { 
                    /* Chrome, Safari & Opera */
                    elem2.webkitRequestFullscreen();
                }
                else if (elem2.msRequestFullscreen) 
                {   
                    /* IE/Edge */
                    elem2.msRequestFullscreen();
                }
                begin();

		    }
            
            function back()
            {
            	document.getElementById("intro").style.display="none";
		        document.getElementById("start").style.display="none";
		        canvas2.style.display="block";
		        document.getElementById('play').style.display="block";
		        document.getElementById('credits').style.display="block";
		        document.getElementById('quit').style.display="block";
		        document.getElementById('heading').style.display="block";
		        canvas2.style.width=screen.width+"px";
                canvas2.style.heigth=screen.heigth+"px";
                document.getElementById("sorry").style.display="none";
                document.getElementById("back").style.display="none";
                canvas1.style.display="none";
		        if (elem2.requestFullscreen) 
		        {
                    elem2.requestFullscreen();
                }
                else if (elem2.mozRequestFullScreen) 
                { 
                    /* Firefox */
                    elem2.mozRequestFullScreen();
                }
                else if (elem2.webkitRequestFullscreen) 
                { 
                    /* Chrome, Safari & Opera */
                    elem2.webkitRequestFullscreen();
                }
                else if (elem2.msRequestFullscreen) 
                {   
                    /* IE/Edge */
                    elem2.msRequestFullscreen();
                }
		    }
            
            function back1()
            {
				gameSound.play();
            	canvas2.style.display="block";
		        document.getElementById('play').style.display="block";
		        document.getElementById('credits').style.display="block";
		        document.getElementById('quit').style.display="block";
		        document.getElementById('heading').style.display="block";
		        canvas2.style.width=screen.width+"px";
                canvas2.style.heigth=screen.heigth+"px";
                document.getElementById("back1").style.display="none";
                canvas1.style.display="none";
		        if (elem2.requestFullscreen) 
		        {
                    elem2.requestFullscreen();
                }
                else if (elem2.mozRequestFullScreen) 
                { 
                    /* Firefox */
                    elem2.mozRequestFullScreen();
                }
                else if (elem2.webkitRequestFullscreen) 
                { 
                    /* Chrome, Safari & Opera */
                    elem2.webkitRequestFullscreen();
                }
                else if (elem2.msRequestFullscreen) 
                {   
                    /* IE/Edge */
                    elem2.msRequestFullscreen();
                }
                
                clearInterval(ret);
		    }
            
            
		    function settings()
		    {
		        document.getElementById('play').style.display="none";
		        document.getElementById('credits').style.display="none";
		        document.getElementById('quit').style.display="none";
		        document.getElementById('heading').style.display="none";
                canvas2.style.width=screen.width+"px";
                canvas2.style.heigth=screen.heigth+"px";
                document.getElementById("sorry").style.display="block";
                document.getElementById("back").style.display="block";
		    }
		</script>
	</body>
</html>



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

