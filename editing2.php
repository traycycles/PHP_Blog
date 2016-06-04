<html>
<style>
    body{
        background-image: url("img/crash.gif");
        background-size: cover;

    }
</style>

<body>
<?php
include "enterdata2.php";

$blogid = $_POST['blogid'];
$blogimg = $_POST['img_url'];

$allfieldsarray = fieldnamearray($tablename);
$editable_array= edit_data($allfieldsarray, $tablename, $blogid);

function edit_data($fieldnamearray, $tablename, $primarykey)
{
    $postarray = array();
    foreach ($fieldnamearray as $header) {
        if (isset ($_POST["$header"])) {
            $postarray[$header] = $_POST["$header"];
        }
    }

    $updatelist = array();
    foreach ($postarray as $field => $value) {
        $updatelist[$field] = $value;


    }


    $db = mysqli_connect("127.0.0.1", "root", "root", "ohellno");
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
#        $fieldnamelist = implode(",", $updatelist);
        #       $escapedvaluesarray = array();
        $escapedarray = array();


        foreach ($updatelist as $key => $value) {
            $escapedstring = mysqli_real_escape_string($db, $value);
            $escapedarray[$key] = "'$escapedstring'";
        }
        #$escapedvalues = implode(",", $escapedarray);

        foreach ($escapedarray as $key => $value) {
            $sql = "UPDATE $tablename SET $key = $value WHERE id =$primarykey";
            $result = mysqli_query($db, $sql);
        }
        if (!$result) {
            echo "Error message:" . mysqli_error($db);
        } else {
            ?>
            <script>
                setTimeout(function () {
                    location.href = "index2.php"}, 2000);
            </script>
            <?php

            mysqli_close($db);
        }
    }
}
?>
</body>
</html>
