<?php
session_start();
error_reporting(0);
include('../admin/includes/config.php');

if (isset($_POST["paperid"])) {


    $sql = "SELECT * FROM `paper` WHERE paperId= '" . $_POST["paperid"] . "'";
    $query = $dbh->prepare($sql);
    $query->execute();
    $userArr = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) { ?>
<!-- <div id="papername" class="col-lg-4" style="display: none;"> -->
<input type="text" placeholder="Paper Name" name="papername" id="papername"
    value=" <?php echo ($userArr[0]->paperName); ?>" readonly>
<input type="text" placeholder="Auther Name" name="authername" id="authername"
    value=" <?php echo ($userArr[0]->autherName); ?>" readonly>
<!-- </div> -->
<?php }
} ?>