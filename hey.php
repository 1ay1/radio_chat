<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Chat</title>

    <link rel="stylesheet" href="style_p.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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

<body style="background-image: url(pavit.jpg); background-repeat: no-repeat; background-size: cover;">
<div class="container-fluid" >

    <div class="container-fluid" style="width: 100%;">
        <!--		<div >&nbsp;</div>-->

        <div style="line-height: .0">&nbsp;</div>

        <div style="background-color: aliceblue; margin-left: 35%; margin-right: 35%; line-height: 25.0">
        </div>

        <div style="margin-left: 35%; margin-right: 35%; line-height: 2.0">&nbsp;</div>




        <div style="margin-left: 38%; margin-right: 35%;">
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

        <div style="margin-left: 35%; margin-right: 35%; line-height: 2.0">&nbsp;</div>


    </div>
</div>

</body>
</html>
