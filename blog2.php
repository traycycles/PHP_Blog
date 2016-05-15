
<?php
include "enterdata2.php";
$b1= blog($tablename);

$blogid = $_GET['var'];

?>
<html>
<head>
<link href="stylesheets/style.css" rel="stylesheet">

<title><?= $b1['title']?></title>
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
<h1>OH HELL NO! FLY LIST</h1>
<div style="padding-top: 40px">
<h2><?=$b1['title']?></h2>
    </div>
<div>
    <img src="<?=$b1['img_url']?>" width="800" height="600">
</div>
<div>
    <p>
        <?= $b1['content']?>
    </p>
    <?= date("F j, Y", strtotime($b1['date'])); ?>
    </div>

<input type="button" value="Edit" onclick="document.location='editblog2.php?blogid='+<?=$blogid?>";> &nbsp;&nbsp;
<input type ="button" value="Delete" onclick="confirmDelete(<?=$blogid?>);" >

<script>
    function confirmDelete(blogid) {
        var yup = confirm('Are you sure you want to delete?');
        if (yup == true )
            document.location="deleteblog2.php?blogid="+blogid;
    }

</script>
</body>
</html>


