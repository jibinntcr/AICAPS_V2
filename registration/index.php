<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../admin/includes/config.php');


if (isset($_POST['registerBTN'])) {
    $targetDir = "upload/";
   
    $allowTypes = array('jpg','png','jpeg','gif','pdf');


    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $designation = $_POST['designation'];
    $affiliation = $_POST['affiliation'];
    $type = $_POST['type'];
    $PresentationMode = $_POST['PresentationMode'];
    $category = $_POST['category'];
    if ($category == 'Participant') {
        $paperid = 'No Data Found';
        $papername = 'No Data Found';
        $authername = 'No Data Found';
    } else {
        $paperid = $_POST['paperid'];
        $papername = $_POST['papername'];
        $authername = $_POST['authername'];
    }
    $memberShip=null;
    $studentId=null;
    $studentIdPath=null;
    $memberShipPath=null;
        $memberShip=$_FILES['Membership'];
        $studentId=$_FILES['StudentId'];
        $studentIdPath=$targetDir.$studentId["name"];
        $memberShipPath=$targetDir.$memberShip["name"];
        echo "done";
    $registerStatus = 'Initiated';
    $transactionId = 'No Data Found';
    $receipt = 'No Data Found';
    if ($PresentationMode == 'online') {
        $FoodPreference = 'NA';
    } else {
        $FoodPreference = $_POST['FoodPreference'];
    }

    $CameraReadyPaper = $_POST['CameraReadyPaper'];
    $paymentSts = "Na Data Found";
    if(move_uploaded_file($studentId["tmp_name"], $studentIdPath) || move_uploaded_file($studentId["tmp_name"], $memberShipPath)){
        $sql = "INSERT INTO registration(name,email,phone,designation,category,paperid,paperTitle,autherName,affiliation,type,registerStatus,PresentationMode,transactionId,receipt,FoodPreference,cameraReadyPaper,paymentStatus,member_ship,student_id) VALUES ('" . $name . "','" . $email . "','" . $phone . "','" . $designation . "','" . $category . "','" . $paperid . "','" . $papername . "','" . $authername . "','" . $affiliation . "','" . $type . "','" . $registerStatus . "','" . $PresentationMode . "','" . $transactionId . "','" . $receipt . "','" . $FoodPreference . "','" . $CameraReadyPaper . "','" . $paymentSts . "','" . $memberShipPath . "','" . $studentIdPath . "')";
        $query = $dbh->prepare($sql);
        $result = $query->execute();
        if ($query->rowCount() > 0) {
            $_SESSION["registration"] = "initiated";
            echo '<script>window.location = "pay.php";</script>';
        } else {
            $_SESSION["registration"] = "failed";
            echo '<script>window.location = "index.php";</script>';
        }
    }
else
{
    $sql = "INSERT INTO registration(name,email,phone,designation,category,paperid,paperTitle,autherName,affiliation,type,registerStatus,PresentationMode,transactionId,receipt,FoodPreference,cameraReadyPaper,paymentStatus,member_ship,student_id) VALUES ('" . $name . "','" . $email . "','" . $phone . "','" . $designation . "','" . $category . "','" . $paperid . "','" . $papername . "','" . $authername . "','" . $affiliation . "','" . $type . "','" . $registerStatus . "','" . $PresentationMode . "','" . $transactionId . "','" . $receipt . "','" . $FoodPreference . "','" . $CameraReadyPaper . "','" . $paymentSts . "','" . $memberShipPath . "','" . $studentIdPath . "')";
        $query = $dbh->prepare($sql);
        $result = $query->execute();
        if ($query->rowCount() > 0) {
            $_SESSION["registration"] = "initiated";
            echo '<script>window.location = "pay.php";</script>';
        } else {
            $_SESSION["registration"] = "failed";
            echo '<script>window.location = "index.php";</script>';
        }
}

   
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Manup Template" />
    <meta name="keywords" content="Manup, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registration| AICAPS 2023</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800,900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div class="container-xxl p-0">
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="../index.html" class="navbar-brand d-flex align-items-center text-center">
                    <img src="../img/logo_cap.png" class="m-0 text-primary" style="width: 250px" />
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="../index.html#about" class="nav-item nav-link active">About</a>
                        <a href="../committee.html" class="nav-item nav-link">Committee</a>
                        <a href="#" class="nav-item nav-link">Speakers</a>
                        <a href="../call-for-paper.html" class="nav-item nav-link">Call For Paper</a>
                        <a href="../index.html#imp_dates" class="nav-item nav-link">Important Dates</a>
                        <a href="../registration.php" class="nav-item nav-link">Registration</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->



        <!-- form start -->

        <section class="contact-from-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Register Here</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form name="regFORM" id="regFORM" class="comment-form contact-form"
                            enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Name" name="name" id="name"
                                        pattern="^[A-Za-zÀ-ÿ ,.'-]+$" required>
                                </div>
                                <div class="col-lg-4">
                                    <input type="email" placeholder="Email" name="email" id="email" required>
                                    <span id="availability"> </span>
                                </div>
                                <div class="col-lg-4">
                                    <input type="number" placeholder="Phone" name="phone" id="phone" required>
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Designation" name="designation" id="designation"
                                        required>
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Affiliation and Organisation" name="affiliation"
                                        id="affiliation" required>
                                </div>

                                <div class="col-lg-4">
                                    <select name="type" onchange="extraFeild(this);" placeholder="Type" id="type" required="true">
                                        <option value="" selected="true" disabled="disabled">Type</option>
                                        <option value="1">IEEE Indian Author (Academia)</option>
                                        <option value="2">IEEE Indian Author (Industry)</option>
                                        <option value="3">IEEE Indian Student</option>
                                        <option value="4">IEEE Indian Non-Author Attendee</option>
                                        <option value="5">IEEE Foreign Author</option>
                                        <option value="6">IEEE Foreign Student Author</option>
                                        <option value="7">IEEE Foreign Non-Author Attendee</option>
                                        <option value="8">Non-IEEE Indian Author (Academia)</option>
                                        <option value="9">Non-IEEE Indian Author (Industry)</option>
                                        <option value="10">Non-IEEE Indian Student</option>
                                        <option value="11">Non-IEEE Indian Non-Author Attendee</option>
                                        <option value="12">Non-IEEE Foreign Author</option>
                                        <option value="13">Non-IEEE Foreign Student Author</option>
                                        <option value="14">Non-IEEE Foreign Non-Author Attendee</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <input type="file" placeholder="IEEE Membership" name="Membership" display="none"
                                        id="Membership" required>
                                </div>
                                <div class="col-lg-4">
                                    <input type="file" placeholder="Student Id" name="StudentId" display="none"
                                        id="StudentId" required>
                                </div>
                                <div class="col-lg-4">
                                    <select name="CameraReadyPaper" placeholder="Camera ready paper"
                                        id="CameraReadyPaper" required="true">
                                        <option value="" selected="true" disabled="disabled">Have you uploaded pdf
                                            express generated camera ready paper in the IEEE portal</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <select onchange="yesnoCheck(this);" name="category" placeholder="Category"
                                        id="category" required>
                                        <option value="" selected="true" disabled="disabled">Category</option>
                                        <option value="Participant">Participant</option>
                                        <option value="Author">Author</option>
                                    </select>
                                </div>
                                <div id="paperid" class="col-lg-4" style="display:none;">
                                    <select onchange="showPaperid(this.value)" name="paperid"
                                        placeholder="Paper ID & Name" id="paperid" required>
                                        <option selected="true" disabled="disabled">Paper Name</option>
                                        <?php
                                        $sql = "SELECT * from paper ";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {
                                        ?>

                                        <option value="<?php echo  $result->paperId ?>"><?php echo $result->paperId ?>
                                            <?php }
                                        }

                                            ?>

                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <select name="PresentationMode" placeholder="PresentationMode" id="PresentationMode"
                                        required="true" onchange="FoodCheck(this);">
                                        <option value="" selected=" true" disabled="disabled">Presentation Mode
                                        </option>
                                        <option value="online">Online</option>
                                        <option value="offline">Offline</option>
                                    </select>
                                </div>
                                <div class="col-lg-4" id="FoodPreference" style="display: none;">
                                    <select name="FoodPreference" placeholder="Food Preference" id="FoodPreference">
                                        <option value="" selected=" true" disabled="disabled">Food Preference</option>
                                        <option value="Vegetarian">Vegetarian</option>
                                        <option value="None Vegetarian">Non-Vegetarian</option>
                                        <option value="NA">NA</option>
                                    </select>
                                </div>



                                <!-- <div id="paperid" class="col-lg-4" style="display: none;">
                                    <input type="text" placeholder="Paper ID" name="paperid" id="paperid"
                                        onchange="showPaperid(this.value)">
                                </div> -->

                                <div class="col-lg-4" id="papername" style="display: none;"> </div>
                                <div class="col-lg-4" id="authername" style="display: none;"> </div>
                                <div class="col-lg-12 text-center">
                                    <!-- <textarea placeholder="Messages"></textarea> -->
                                    <button name="registerBTN" id="registerBTN" type="submit" class="site-btn">Proceed
                                        to payment</button>

                                </div>
                                <div class=" col-lg-12 text-center mt-5">
                                    Already Registered?<a href="pay.php"> Click Here</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- for end -->



        <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-text">
                            <ul>
                                <li>
                                    <a href="index.html#about">ABOUT</a>
                                </li>
                                <li>
                                    <a href="committee.html">COMMITTEE</a>
                                </li>
                                <li>
                                    <a href="call-for-paper.html">CALL FOR PAPER</a>
                                </li>

                                <li>
                                    <a href="index.html#imp_dates">IMPORTANT DATES</a>
                                </li>
                                <li>
                                    <a href="registration.php">REGISTRATION</a>
                                </li>
                            </ul>
                            <div class="copyright-text">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    &copy;
                                    <script>
                                    document.write(new Date().getFullYear());
                                    </script>
                                    AICAPS 2023. All rights reserved. <br />Designed By
                                    <a href="http://infinio.co.in/" target="_blank">infinio</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Footer Section End -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZZ4D32S7RC"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());

    gtag("config", "G-ZZ4D32S7RC");
    </script>
    <!-- Js Plugins -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.countdown.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/mainO.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
    function yesnoCheck(that) {
        if (that.value == "Author") {
            document.getElementById("paperid").style.display = "block";
            document.getElementById("papername").style.display = "block";
            document.getElementById("authername").style.display = "block";
        } else if (that.value == "Participant") {
            document.getElementById("paperid").style.display = "none";
            document.getElementById("papername").style.display = "none ";
            document.getElementById("authername").style.display = "none ";
        }
    }

    function FoodCheck(that) {
        if (that.value == "offline") {
            document.getElementById("FoodPreference").style.display = "block";
        } else if (that.value == "online") {
            document.getElementById("FoodPreference").style.display = "none";

        }
    }

    function extraFeild(that) {
        console.log(that.options[that.selectedIndex].text);
        var str=that.options[that.selectedIndex].text;
        console.log(str.includes('Non-IEEE'));
        if(str.includes('Non-IEEE'))
        {
            document.getElementById("StudentId").style.display = "none";
            document.getElementById("Membership").style.display = "none";
        }
        else{
            document.getElementById("Membership").style.display = "block";
            document.getElementById("StudentId").style.display = "block";
        }

       /* if (that.value == "offline") {
            document.getElementById("FoodPreference").style.display = "block";
        } else if (that.value == "online") {
            document.getElementById("FoodPreference").style.display = "none";

        }*/
    }


    function showPaperid(paperid) {
        console.log("paperId =>", paperid);
        $.ajax({
            url: "select-paper-name.php",
            method: "post",
            data: {
                paperid: paperid
            },
            success: function(data) {
                $('#papername').html(data);
                console.log(data);
                //     $('#authername').html(data);
                // console.log(data);
            }
        });
    }
    </script>
    <script>
    $(document).ready(function() {
        $("#email").on('keyup', function() {
            var email = $(this).val();
            console.log("email_id =>", email);
            $.ajax({
                url: "email-validation.php",
                method: "POST",
                data: {
                    email: email
                },
                datatype: "text",
                success: function(data) {
                    // alert(data);
                    console.log(data);
                    if (data == 'Initiated' || data == 'Completed') {
                        $('#registerBTN').attr("disabled", true);
                        $('#phone').attr("disabled", true);
                        $('#designation').attr("disabled", true);
                        $('#affiliation').attr("disabled", true);
                        $('#type').attr("disabled", true);
                        $('#category').attr("disabled", true);
                        $('#CameraReadyPaper').attr("disabled", true);
                        $('#PresentationMode').attr("disabled", true);
                        // $('#registerBTN').attr("disabled", true);
                        // console.log("keri mone");
                        $('#availability').html(
                            '<span class="error" style="color:red">This email already exist.</span>'
                        );
                        if (data == 'Initiated') {
                            swal({
                                title: "Done",
                                text: "Phase 1 Completed",
                                icon: "success",
                                button: "OK",
                            });
                        } else if (data == 'Completed') {
                            swal({
                                title: "Success",
                                text: "Phase 1 & 2 Completed",
                                icon: "success",
                                button: "OK",
                            });

                        }
                    } else if (data == 0) {
                        $('#availability').html(
                            '<span class="error" style="color:green"></span>'
                        );
                        $('#registerBTN').attr("disabled", false);
                        $('#registerBTN').attr("disabled", false);
                        $('#phone').attr("disabled", false);
                        $('#designation').attr("disabled", false);
                        $('#affiliation').attr("disabled", false);
                        $('#type').attr("disabled", false);
                        $('#category').attr("disabled", false);
                        $('#CameraReadyPaper').attr("disabled", false);
                        $('#PresentationMode').attr("disabled", false);
                    }
                }
            });
        });
    });
    </script>
</body>

</html>