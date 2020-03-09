<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Chat</title>

    <link rel="stylesheet" href="style_p.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />



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
<body>
<div class="ali"></div>

</body>
</html>