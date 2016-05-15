<?php
include "enterdata2.php";
$fields = fieldnamearray($tablename);




    $db = mysqli_connect("127.0.0.1", "root", "1234", "ohellno");
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else {
        $fieldsimploded = implode(",", $fields);

        $sql = "SELECT $fieldsimploded FROM $tablename ORDER BY id";
        $result = mysqli_query($db, $sql);
        $rows = array();
        if (!$result) {
            printf("Errormessage: %s\n", mysqli_error($db));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                #       foreach ($row as $entry => $logged){
                #           echo $entry .": ".$logged . "<br>";?>
<pre><?php
                var_dump ($row);?></pre><?php
                $rows[] = $row;
            }
            mysqli_close($db);

        }

    }



