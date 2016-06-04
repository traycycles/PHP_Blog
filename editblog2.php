<?php

$tablename = 'blog';
$blogid2 = $_GET['blogid'];
$entries=blog($tablename);


function blog($tablename){

    $db = mysqli_connect("127.0.0.1", "root", "root", "ohellno");
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $rowid = $_GET['blogid'];
        $sql = "SELECT title, img_url, content, date FROM $tablename WHERE id = $rowid";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    return $row;
    mysqli_close($db);
}
?>
<html>
<head>
    <link href="stylesheets/style.css" rel="stylesheet">

    <title>No Fly List!</title>

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
<h1>Let's Edit Someone</h1>
<script>
    function gotit(){
        window.alert('Thanks for the entry!');
    }
</script>
<form action="editing2.php" method="post">
    <div class="formBox">
        <strong>Title</strong> <input type="text" name="title" value="<?=$entries['title']?>" style="width:500px">
    </div>

    <div class="formBox">
        <strong>Image URL:</strong><input type="text" name="img_url" value="<?=$entries['img_url']?>" style="width: 500px">
    </div>
    <div class="formBox">
        <strong>Content:</strong><br>
        <textarea name="content" style="width:80%"><?=$entries['content']?></textarea>
    </div>
    <p><input type="submit" value="Submit"onclick="gotit()">&nbsp;&nbsp;</p>

    <input type="hidden" name="blogid" value="<?=$blogid2?>" >
</form>

</body>
</html>