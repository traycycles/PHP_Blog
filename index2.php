<html>
<head>
<link href="stylesheets/style.css" rel="stylesheet">

<title>No Fly List!</title>

</head>
<body>
<?php include "enterdata2.php";
$db = mysqli_connect("127.0.0.1", "root", "1234", "ohellno");
    if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
    } else{
    $last_row = home_page($tablename);

?>
<div>
<header>
    <nav>
        <ul>
            <li><a href="index2.php">HOME</a></li>
            <li><a href="selectablog2.php">PREVIOUS POSTS</a></li>
            <li><a href="add_someone2.php">POST</a></li>

        </ul>
    </nav>
</header>
    </div>

<h1>OH HELL NO! FLY LIST</h1>

<div style="padding-top: 40px">
    <h2><?= $last_row['title']?></h2>

    </div>
    <div>
        <img src="<?= $last_row['img_url']?>" width="800px" height="600px">
    </div>
<?= $last_row['content'] ?>
</div>


<p>Submitted: <?=date("F j, Y",strtotime($last_row['date']))?><br>

<input type="button" value="New" onclick="newDoc()">
<script>
    function newDoc(){
        window.location.assign("add_someone2.php")
    }
    </script>
</body>
</html>
<?php
mysqli_close($db);}
?>