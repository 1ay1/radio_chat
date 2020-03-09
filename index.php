<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Chat</title>
    
    <link rel="stylesheet" href="style_p.css" type="text/css" />
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">
    
        // ask user for name with popup prompt    
        var name = prompt("Enter your chat name:", "Guest");

        // default name is 'Guest'
    	if (!name || name === ' ') {
    	   name = "Guest";	
    	}
    	
    	// strip tags
    	name = name.replace(/(<([^>]+)>)/ig,"");
    	
    	// display name on page
    	$("#name-area").html("You are: <span>" + name + "</span>");
    	
    	// kick off chat
        var chat =  new Chat();
    	$(function() {
    	
    		 chat.getState(); 
    		 
    		 // watch textarea for key presses
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 //all keys including return.  
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																																});
    		 // watch textarea for release of key press
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
                    var text1 = text;
                    if (!text1.replace(/\s/g, '').length) {
                        console.log('string only contains whitespace (ie. spaces, tabs or line breaks)');
                        return
                    }
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // send 
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, name);	
    			        $(this).val("");
    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
    </script>

</head>

<body onload="setInterval('chat.update()', 500)" style="background: #010101">

<div style="width: 100%; float: left">

    <div style="width: 60%; float: left;">
        <div align="center"><img src="logo.png" style="width: 35%; margin-top: 5px"></div>
        <div align="center"><img src="pavit.PNG" style="width: 45%; padding-left: 13%; margin-top: 5px"></div>
        <div align="center" style="margin-top: 20px">
            <script type="text/javascript" src="https://hosted.muses.org/mrp.js"></script>
            <script type="text/javascript">
                MRP.insert({
                    'url':'http://thepsychedelics.club:8000',
                    'codec':'mp3',
                    'volume':100,
                    'autoplay':true,
                    'forceHTML5':true,
                    'jsevents':true,
                    'buffering':0,
                    'title':'The Psychedelics',
                    'welcome':'WELCOME!',
                    'wmode':'transparent',
                    'skin':'cassette',
                    'width':200,
                    'height':120
                });
            </script>
        </div>


    </div>

    <div style="width: 36%; float: left; margin-top: 10%; margin-right: 30px">
        <h2>Your Psychedelic Chat Room</h2>

        <p id="name-area"></p>

        <div id="chat-wrap"><div id="chat-area"></div></div>

        <form id="send-message-area">
            <p>Your message: </p>
            <textarea id="sendie" maxlength = '100' ></textarea>
        </form>
    </div>

</div>


<!--    <div id="page-wrap">-->
<!---->
<!--        <h2>Your Psychedelic Chat Room</h2>-->
<!---->
<!--        <p id="name-area"></p>-->
<!---->
<!--        <div id="chat-wrap"><div id="chat-area"></div></div>-->
<!---->
<!--        <form id="send-message-area">-->
<!--            <p>Your message: </p>-->
<!--            <textarea id="sendie" maxlength = '100' ></textarea>-->
<!--        </form>-->
<!--    </div>-->

    <!-- BEGINS: AUTO-GENERATED MUSES RADIO PLAYER CODE -->


    <!-- ENDS: AUTO-GENERATED MUSES RADIO PLAYER CODE -->


</body>

</html>
