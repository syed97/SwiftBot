<?$url = "https://ubuntu-hgg7.localhost.run/move"
//https://ubuntu-hgg7.localhost.run/move
//https://api.anomoz.com
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.anomoz.com/style/logo.png">
    <link rel="mask-icon" type="" href="https://www.anomoz.com/style/logo.png" color="#111">
    <title>SwiftBot - Navigation Controller</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="./style/css/robo_navigate.css">
</head>

<body translate="no" onload="">
    <div class="wrapper">
        <div class="content">
            <div class="bg-shape">
       
            </div>
            <div class="product-img">
                <div class="product-img__item active" id="img4" style="margin-right:50px;top:150px;" >
                    <img src="https://steemitimages.com/p/D5zH9SyxCKdBnJaFeHnL3svQi9ZN2XzXDbzH7Wc9vAwCtx4gkbjVjvVDJBUeXGSCTsXKXDsPGYhw6yMMBHT9dQsMvxvY2aMddMN97AfkYMuEHJwRcFegsV8WUt4x7X7UVdv4F8?format=match&mode=fit&width=640" alt="star wars" class="product-img__img" >
                </div>
            </div>
            <div class="product-slider swiper-container-fade swiper-container-horizontal">
                
                <div class="product-slider__wrp swiper-wrapper" style="transition-duration: 0ms;">
                    <div class="product-slider__item swiper-slide swiper-slide-active" data-target="img4" style="width: 736px; opacity: 1; transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                        <div class="product-slider__card">
                            <img src="https://res.cloudinary.com/muhammederdem/image/upload/v1536405223/starwars/item-4-bg.jpg" alt="star wars" class="product-slider__cover">
                            <div class="product-slider__content">
                                <h1 class="product-slider__title">
                                    Navigation Panel
</h1>
                                <div class="product-ctr">
                                    <div class="product-labels">
                                    <div style="width:200px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                                                    <defs>
                                                        <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                                            <stop offset="0%" stop-color="#0c1e2c" stop-opacity="0"></stop>
                                                            <stop offset="100%" stop-color="#cb2240" stop-opacity="1"></stop>
                                                        </linearGradient>
                                                    </defs>
                                                    
                                                </svg>

                                            <style>
                                                .button-nav{
                                                    display: inline-flex;
                                                    border: none;
                                                    width: 61px;
                                                    height: 61px;
                                                    border-radius: 50%;
                                                    justify-content: center;
                                                    align-items: center;
                                                    font-size: 25px;
                                                    position: relative;
                                                    top: 50%;
                                                    outline: none;
                                                }
                                            </style>
                                            
                                            <div >
                                                <button style="margin-right: 4px;transform: rotate(270deg);margin: 10px 100px 10px 70px;" class="button-nav" tabindex="0" role="button" onclick="move('ArrowUp')">
                    <span class="icon">
<svg class="icon icon-arrow-right"><use xlink:href="#icon-arrow-right"></use></svg>
</span>
                </button>
                                            </div>
                                            <div>
                                                <div style="float:left">
                                                    <button class="button-nav" tabindex="0" role="button" onclick="move('ArrowLeft')">
                    <span class="icon">
<svg class="icon icon-arrow-right"><use xlink:href="#icon-arrow-left"></use></svg>
</span>
                </button>
                                                </div>
                                                
                                                <div style="float:right">
                                                    <button onclick="move('ArrowDown')" style="margin-right: 4px;transform: rotate(90deg);" class="button-nav" tabindex="0" role="button">
                    <span class="icon">
<svg class="icon icon-arrow-right"><use xlink:href="#icon-arrow-right"></use></svg>
</span>
                </button>
                                                    <button class="button-nav" tabindex="0" role="button"  onclick="move('ArrowRight')">
                    <span class="icon">
<svg class="icon icon-arrow-right"><use xlink:href="#icon-arrow-right"></use></svg>
</span>
                </button>
                                                </div>
                                            </div>
                                            
                                            <br><br><br>
                                            <br>
                                            <br>
                                        <span class="product-inf__title">Controls</span>
                                    </div>
                                    </div>
                                    <span class="hr-vertical"></span>
                                    <div class="product-inf">
                                        
                                        <span class="product-inf__title" style="top:0px;">Status:<br> <span id="statusDisplay"></span></span>
                                        <br style="margin:10px;">
                                        <button class="product-slider__cart" style="width: 100%;
margin: 0px;
padding: 0px; background-color:green;background-image:;" onclick="start()">
                                            Start (S)
                                            </button>
                                    
                                    
                                    <button class="product-slider__cart" style="width: 100%;
margin: 0px;
padding: 0px; background-color:green;background-image:;margin-top:5px;" onclick="stop()">
                                            Stop (Esc)
                                            </button>
                                            
                                            
                                    </div>
                                    
                                </div>
                               <br>
                                    <input style="width:70px;" id="commandInp">
                                        <button onclick="moveLoop('fetch',1)">Send</button> 
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
    <svg class="hidden" hidden="">
        <symbol id="icon-arrow-left" viewBox="0 0 32 32">
            <path d="M0.704 17.696l9.856 9.856c0.896 0.896 2.432 0.896 3.328 0s0.896-2.432 0-3.328l-5.792-5.856h21.568c1.312 0 2.368-1.056 2.368-2.368s-1.056-2.368-2.368-2.368h-21.568l5.824-5.824c0.896-0.896 0.896-2.432 0-3.328-0.48-0.48-1.088-0.704-1.696-0.704s-1.216 0.224-1.696 0.704l-9.824 9.824c-0.448 0.448-0.704 1.056-0.704 1.696s0.224 1.248 0.704 1.696z"></path>
        </symbol>
        <symbol id="icon-arrow-right" viewBox="0 0 32 32">
            <path d="M31.296 14.336l-9.888-9.888c-0.896-0.896-2.432-0.896-3.328 0s-0.896 2.432 0 3.328l5.824 5.856h-21.536c-1.312 0-2.368 1.056-2.368 2.368s1.056 2.368 2.368 2.368h21.568l-5.856 5.824c-0.896 0.896-0.896 2.432 0 3.328 0.48 0.48 1.088 0.704 1.696 0.704s1.216-0.224 1.696-0.704l9.824-9.824c0.448-0.448 0.704-1.056 0.704-1.696s-0.224-1.248-0.704-1.664z"></path>
        </symbol>
    </svg>
    
    <script>
        //https://ager.serveo.net/robo_move
        var status = "";
        var command = "";
        function keyListner(){
            var statusDisplay = document.getElementById("statusDisplay");
            
            document.addEventListener('keyup', (e) => {
                //console.log("e.code", e.code)
                if(((e.code=='ArrowUp')||(e.code=='ArrowDown')||(e.code=='ArrowRight')||(e.code=='ArrowLeft'))&&((status!='Stopped')&&(status!='Connection_Failed'))){
                    if(status != 'Connection_Failed'){
                        move(e.code)
                    }
                }
                else if(e.code=='KeyS'){
                    start();
                }
                else if(e.code=='Escape'){
                    stop();
                }
                else{
                    console.log("err")
                }
            });
            
            stop();
            tryHttpsConnection("<?echo $url?>/8")
            //https://api.anomoz.com/api/library-management/post/read_live_bookings.php
            //https://ager.serveo.net/robo_move
        }
        
        function move(direction){
            //console.log("direction", direction)
            if(direction=='ArrowUp'){
                status="Moving_Forward";
                command = "i"
            }
            else if(direction=='ArrowRight'){
                status="Moving_Right";
                command = "l"
            }
            else if(direction=='ArrowLeft'){
                status="Moving_Left";
                command = "j"
            }
            else if(direction=='ArrowDown'){
                status="Moving_Backward";
                command = ","
            }

            statusDisplay.innerHTML = status;
            moveLoop(status, command)
        }
        
        function moveLoop(statusLocal, command){
            //console.log(statusLocal, status)
            if(status!='Connection_Failed' || status!='Stopped'){
                console.log("status", status)
                if(statusLocal=='fetch'){
                    command = document.getElementById('commandInp').value
                    sendAPIRequest("<?echo $url?>/"+command)
                }else{
                    sendAPIRequest("<?echo $url?>/"+command)
                }
                //setTimeout(function(){ moveLoop(statusLocal, command); }, 400);
            }
            return 0;
        }
        
        function start(){
            if(status!='Connection_Failed'){
                move('ArrowUp')
            }
        }
        
        function stop(){
            if(status!='Connection_Failed'){
                status="Stopped";
                statusDisplay.innerHTML = status;
            }
        }
        
        function tryHttpsConnection(theUrl)
        {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() { 
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200){
                    //callback(xmlHttp.responseText);
                    status="Connection_Established";
                    console.log("working")
                    statusDisplay.innerHTML = status;
                    
                }
                else if(xmlHttp.readyState == 4  && xmlHttp.status == 0){
                    //console.log("502")
                    //console.log("Failed during Movement")
                    //status="Connection_Failed";
                    //statusDisplay.innerHTML = status;
                }
                console.log(xmlHttp.status, xmlHttp.readyState  )
            }
            xmlHttp.open("GET", theUrl, true); // true for asynchronous 
            xmlHttp.send(null);
        }
        
        function sendAPIRequest(theUrl)
        {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() { 
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200){
                    //callback(xmlHttp.responseText);
                    console.log("succ")
                }
                else if(xmlHttp.readyState == 4 && xmlHttp.status == 0){
                    //console.log("Failed during Movement")
                    //status="Connection_Failed";
                    //statusDisplay.innerHTML = status;
                }
                console.log(xmlHttp.status, xmlHttp.readyState  )
            }
            xmlHttp.open("GET", theUrl, true); // true for asynchronous 
            xmlHttp.send(null);
        }
        
        keyListner();
    </script>
  
</body>

</html>