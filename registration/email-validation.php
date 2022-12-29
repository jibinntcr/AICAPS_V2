<?php
session_start();
error_reporting(0);
include('../admin/includes/config.php');
if (isset($_POST["email"])) {
    $sql = "SELECT * FROM registration WHERE email = '" . $_POST["email"] . "'";
    // echo $sql;
    // exit();
    $query = $dbh->prepare($sql);
    $query->execute();
    $userArr = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $paySts = $userArr[0]->registerStatus;
        if ($paySts == 'Initiated') {
            // $_SESSION["initiated"] = "true";
            $paySts = 'Initiated';
            echo $paySts;
        } else if ($paySts == 'Completed') {
            // $_SESSION["completed"] = "true";
            $paySts = 'Completed';
            echo $paySts;
        }
    } else {
        $paySts = 0;
        echo $paySts;
    }
    // echo ($query->rowCount());
    //            echo("This Email id is Already Used");
    //            echo'<span  class="text-danger"> This Email id is Already Used</span>';
    //            echo$query;
    //        } else {
    //            echo'<span class="text-success">Email id is available</span>';
    ////            echo$query;
    //        }
}