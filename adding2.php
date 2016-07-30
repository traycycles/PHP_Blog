
<!--<html>-->
<!--<style>-->
<!--body{-->
<!--background-image: url("img/crash.gif");-->
<!--        background-size: cover;-->
<!---->
<!-- }-->
<!--</style>-->
<!--<body>-->
<?php
include "enterdata2.php";
fieldnamearray($tablename);

$allfieldsarray = fieldnamearray($tablename);
enter_data($allfieldsarray,$tablename);

