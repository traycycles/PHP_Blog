<html>
<head>
    <meta charset="UTF-8">
    <title>Fun Project--ACA</title>
    <link href="stylesheets/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--    <script>-->
<!--        function gotit(){-->
<!--            window.alert('Thanks for the entry!');-->
<!--        }-->
<!--    </script>-->
    <script>
        $(document).ready(function() {
            $('form').submit(function(evt) {
                evt.preventDefault();
                var url = $(this).attr("action");
                var data = $(this).serialize();
                var $submitButton = $('#submit');


                //kill input while ajax
                $submitButton.attr('disabled', true).val('submitting...');


                //AJAX part
                console.log(data);
                $.post(url,data,function(response) {
                    var thanks = '<p>Thanks for signing up!</p>';
                    $('#thanks').html(thanks);
                    //woops
                }).fail(function (jqXHR){
                    var errorMessage = '<p>Sorry, there\'s been an error.';
                    errorMessage += 'Please try again later. </p>';
                    $('#thanks').html(errorMessage);
                });

                $submitButton.attr('disabled', false).val('Submit!');
                $('input[type=text]').each(function(){
                    $(this).val('');
                });
                $('#content').val('');
            }); //end submit
        }); // end ready
    </script>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index2.php">HOME</a></li>
            <li><a href="selectablog2.php">PREVIOUS POSTS</a></li>
            <li><a href="add_someone2.php">POST</a></li>
        </ul>
    </nav>
</header>
<!-- start slipsum code -->

<h1>Let's Add Someone</h1>

<form action="adding2.php" method="post">
    <div class="formBox">
        <strong>Title</strong> <input type="text" name="title" style="width:500px">
    </div>

    <div class="formBox">
        <strong>Image URL:</strong><input type="text" name="img_url" style="width: 500px">
    </div>
    <div class="formBox">
        <strong>Content:</strong><br>
        <textarea name="content" id="content" style="width:80%"></textarea>
    </div>
    <input type="submit" value="Submit!" id="submit">
    <p id="thanks"></p>
</form>

</body>

</html>
