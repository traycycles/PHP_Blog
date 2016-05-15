<?php

include"enterdata2.php";
$tablename = 'aca_article_blog';
$blogid = $_GET['blogid'];

delete_data($blogid, $tablename);

?>



