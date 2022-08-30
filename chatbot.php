<?php require_once("config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--  -->
    <link rel="stylesheet" href="<?=ASSET?>css/bootstrap.min.css">

    <!--  -->
    <link rel="stylesheet" href="<?=ASSET?>css/bot.css">

    <!--  -->
    <title><?=$data['page_title'] ." | ". WEBSITE?></title>

</head>
<body>
<!-- main container start -->
<div class="container-fluid" >
    <div class="p-4 mx-auto" style="max-width:550px;">
        <div id="screen">
            <!-- header start -->
            <div id="header">
                <h1 class="text-center">Chatbot</h1>
            </div>
            <!-- header end -->

            <!-- display message start -->
            <div  class="display">
                <!-- messages goes in here -->
            </div>
            <!-- display message end -->

            <!-- messages input field start -->
            <div id="userInput">
                <input type="text" name="message" class="message" id="messages" placeholder="Type Your Message Here." required>
                <input type="submit" value="Send" id="send" name="send">
            </div>
            <!-- messages input field end -->

        </div>
    </div>
</div>
<!-- main container end -->

</body>
</html>

        <!-- jQuery CDN -->
        <script src="<?=ASSET?>js/jquery-3.6.0.js"></script>

        <!-- JQuery script start-->
        <script>
        $(document).ready(function()
        {
        // when send button clicked
        $("#send").on("click",function(){
            var user_message = $("input.message").val();
            $append_user_message = '<div class="chat user_message">'+user_message+'</div>';
            $("div.display").append($append_user_message);
            if (user_message != "") 
            {
            //ajax start
            $.ajax({
                url: "respond.php",
                type: "POST",
                // sending data
                data: 
                {
                message: user_message,
                },
                // response text
                success: function(data){
                    // show response
                    $response = '<div id="message_section"><div class="chat bot_message">'+data+'</div></div>';
                    $("div.display").append($response);
                }
            });
            }
        });
        });
    </script>
    <!-- JQuery script end -->

</html>