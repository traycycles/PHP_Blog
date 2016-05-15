<html>
<head>
    <link href="stylesheets/style.css" rel="stylesheet">

    <title>Select Blog</title>
</head>
<link href="stylesheets/selectablog.css" rel="stylesheet">
<body>
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
<h1><span style="word-spacing: 75px">OH... </span>HELL NAH!</h1>

<?php
include "enterdata2.php";

$fields = fieldnamearray($tablename);
$arrayofblogdata = get_data($fields, $tablename);
$numofcolecho = 5;
$numberofrows = ceil(count($arrayofblogdata)/$numofcolecho)
    ?>
<table>
    <?php
         for($x = 0; $x < $numberofrows; $x ++){?>
             <tr>
             <?php
                if(count($arrayofblogdata)- $x * $numofcolecho >= $numofcolecho){
                    $maxbogsperrow = $numofcolecho;
                }
                else {
                    $maxbogsperrow = count($arrayofblogdata)- $x *$numofcolecho;
                }
                for($colnumberprint = 0; $colnumberprint<= $maxbogsperrow -1; $colnumberprint++) {
                    ?>
                    <td><?php
                        $i = ($x * $numofcolecho) + $colnumberprint;
                        $idvalue = $arrayofblogdata[$i]['id'];?>
                        <a href="blog2.php?var=<?=$idvalue?>">
                        <h3><?= $arrayofblogdata[$i]['title'] ?></h3>

                        <span><img id="select" src="<?= $arrayofblogdata[$i]['img_url'] ?>" width="230px" height="200"px></span>
                        <?= date("F j, Y", strtotime($arrayofblogdata[$i]['date'])) ?></a>
                    </td>

                    <?php
                }
             ?>
             </tr><?php
            }
    ?>
</table>


</body>
</html>