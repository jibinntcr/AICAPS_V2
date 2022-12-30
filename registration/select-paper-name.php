<?php
session_start();
error_reporting(0);
include('../admin/includes/config.php');

if (isset($_POST["paperid"])) {


    $sql = "SELECT paperName,autherName FROM `paper` WHERE lastID= '" . $_POST["paperid"] . "'";
    $query = $dbh->prepare($sql);
    $query->execute();
    $userArr = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) { ?>
<!-- <div id="papername" class="col-lg-4" style="display: none;"> -->
<h4>Paper Name</h4>
<label for="papername" name="papername" id="papername"><?php echo ($userArr[0]->paperName); ?>
    <input type="hidden" placeholder="Paper Name" name="papername" id="papername"
        value="<?php echo ($userArr[0]->paperName); ?>" readonly></label>

</br>
<h4>Author Name</h4>
<label for="authername" name="authername" id="authername"><?php echo ($userArr[0]->autherName); ?>
    <input type="hidden" placeholder="Paper Name" name="authername" id="authername"
        value="<?php echo ($userArr[0]->autherName); ?>" readonly></label>

<!-- <input type="text" placeholder="Auther Name" name="authername" id="authername"
    value=" " readonly> -->
<!-- </div> -->
<?php }
} ?>