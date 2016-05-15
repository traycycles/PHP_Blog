<?php
$tablename = 'blog';
function fieldnamearray($table)
{
    $db = mysqli_connect("127.0.0.1", "root", "1234", "ohellno");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $result = mysqli_query($db, "SELECT * FROM $table");
        $rows = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    }

#first row of table... the header
    $fieldNames = $rows[0];
    $fieldName = array();
    foreach ($fieldNames as $header => $value) {
        array_push($fieldName, $header);
    }
    return $fieldName; #seq. array
    mysqli_close($db);
}





function enter_data($fieldnamearray, $tablename)
{
    $postarray = array();
    foreach ($fieldnamearray as $header) {
        if (isset ($_POST["$header"])) {
            $postarray[$header] = $_POST["$header"];
        }
    }
    $insertlist = array();
    foreach ($fieldnamearray as $field) {
        if (array_key_exists((string)$field, $postarray)) {
            array_push($insertlist, (string)$field);
        }
    }

    $db = mysqli_connect("127.0.0.1", "root", "1234", "ohellno");
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $fieldnamelist = implode(",", $insertlist);
        $escapedvaluesarray = array();
        $escapedarray = array();

        foreach ($postarray as $key => $value) {
            $escapedstring = mysqli_real_escape_string($db, $value);
            $escapedarray[$key] = "'$escapedstring'";
        }
        $escapedvalues = implode(",", $escapedarray);

        $sql = "INSERT INTO $tablename ($fieldnamelist) VALUES ($escapedvalues)";
        array_push($escapedvaluesarray, $escapedvalues);
        global $escapedvaluesarray;
        if (mysqli_query($db, $sql)) {
            ?>
            <script>
                setTimeout(function(){location.href="index2.php"} , 2000);
            </script>
        <?php
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }

        mysqli_close($db);
    }
}




function get_data($fieldnames, $tablename){
    $db = mysqli_connect("127.0.0.1", "root", "1234", "ohellno");
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else {
        $fieldsimploded = implode(",", $fieldnames);

        $sql = "SELECT $fieldsimploded FROM $tablename ORDER BY date DESC";
        $result = mysqli_query($db, $sql);
        $rows = array();
        if (!$result) {
            printf("Errormessage: %s\n", mysqli_error($db));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                #       foreach ($row as $entry => $logged){
                #           echo $entry .": ".$logged . "<br>";
                $rows[] = $row;
            }
            mysqli_close($db);

        }
        return $rows;

    }
}

function delete_data($blogid, $tablename){
    $db = mysqli_connect("127.0.0.1", "root", "1234", "ohellno");

    if(!$db ){
        die("Connection failed: ". mysqli_connect_error());
    }else{
        $sql = "DELETE FROM $tablename WHERE id = $blogid";
        if (mysqli_query($db,$sql)) {
            echo "Record deleted successfully";?>
            <script>
                setTimeout(function(){document.location="index2.php"} , 1000);
            </script><?php
        }
        else {
            echo "Error deleting record: " . mysqli_error($db);
        }
        mysqli_close($db);
    }
}



function blog($tablename){

    $db = mysqli_connect("127.0.0.1", "root", "1234", "ohellno");
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $rowid = $_GET["var"];
        $sql = "SELECT title, img_url, content, date FROM $tablename WHERE id = $rowid";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
    }

    return $row;


    mysqli_close($db);
}






function home_page($tablename){
    $db = mysqli_connect("127.0.0.1", "root", "1234", "ohellno");
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        #       $last_id = mysqli_insert_id($db);
        $sql = "SELECT * FROM $tablename ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($db, $sql);
        if (!$result) {
            printf("Errormessage: %s\n", mysqli_error($db));
        } else {
            $last_row = mysqli_fetch_assoc($result);
            return $last_row;
        }
    }


}



#$allfieldsarray = fieldnamearray($tablename);
#enter_data($allfieldsarray,$tablename);
#$gitmyshit=home_page($tablename);
#print_r($gitmyshit);

?>


