<html>
<head>
    <meta charset="UTF-8">
    <title>Fun Project--ACA</title>
    <link href="stylesheets/style.css" rel="stylesheet">
    <script>
        function gotit(){
            window.alert('Thanks for the entry!');
        }
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
        <textarea name="content" style="width:80%"></textarea>
    </div>
    <p><input type="submit" value="Submit"onclick="gotit();">&nbsp;&nbsp;</p>
</form>

</body>

</html>
