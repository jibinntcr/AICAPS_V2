<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../admin/includes/config.php');


if (isset($_POST['registerBTN'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $designation = $_POST['designation'];
    $affiliation = $_POST['affiliation'];
    // print_r($_POST['typeAttendeeID']);
    // exit();
    if (isset($_POST['typeAutherID'])) {
        $type = $_POST['typeAutherID'];
    }
    if (isset($_POST['typeAttendeeID'])) {
        $type = $_POST['typeAttendeeID'];
    }
    // $type = $_POST['type'];
    $membership = $_POST['Membership'];

    $folder = 'id/';

    $file = $folder . basename($_FILES["StudentId"]["name"]);
    move_uploaded_file($_FILES['StudentId']['tmp_name'], $file);
    $studentId = basename($_FILES["StudentId"]["name"]);

    $category = $_POST['category'];
    if ($category == 'Participant') {
        $paperid = 'No Data Found';
        $papername = 'No Data Found';
        $authername = 'No Data Found';
        $copyright = 'Data Not Found';
        $CameraReadyPaper = 'Data Not Found';
        $PresentationMode = 'Data Not Found';
    } else {
        $paperid = $_POST['paperid'];
        $paperid = 'ICA_2023_paper_' . $paperid;
        $papername = $_POST['papername'];
        $authername = $_POST['authername'];
        $copyright = $_POST['copyright'];
        $CameraReadyPaper = $_POST['CameraReadyPaper'];
        $PresentationMode = $_POST['PresentationMode'];
    }

    $registerStatus = 'Initiated';
    $transactionId = 'No Data Found';
    $receipt = 'No Data Found';
    if (!empty($PresentationMode)) {
        if ($PresentationMode == 'online') {
            $FoodPreference = 'NA';
        } else if ($PresentationMode == 'offline') {
            $FoodPreference = $_POST['FoodPreference'];
        } else {
            $FoodPreference = 'NA';
        }
    } else {
        $FoodPreference = 'NA';
    }


    if (!empty($CameraReadyPaper)) {
        if ($CameraReadyPaper == 'no') {
            echo '<script>alert("Upload pdf express generated camera ready paper in the IEEE portal")</script>';
            echo '<script>window.location = "index.php";</script>';
            exit();
        }
    }

    if (!empty($copyright)) {
        if ($copyright == 'no') {
            echo '<script>alert("Upload IEEE copyright form")</script>';
            echo '<script>window.location = "index.php";</script>';
            exit();
        }
    }
    $paymentSts = "Na Data Found";

    $sql = "INSERT INTO registration(name,email,phone,designation,category,paperid,paperTitle,autherName,affiliation,type,registerStatus,PresentationMode,transactionId,receipt,FoodPreference,cameraReadyPaper,copyright,paymentStatus,member_ship,student_id) VALUES ('" . $name . "','" . $email . "','" . $phone . "','" . $designation . "','" . $category . "','" . $paperid . "','" . $papername . "','" . $authername . "','" . $affiliation . "','" . $type . "','" . $registerStatus . "','" . $PresentationMode . "','" . $transactionId . "','" . $receipt . "','" . $FoodPreference . "','" . $CameraReadyPaper . "','" . $copyright . "','" . $paymentSts . "','" . $membership . "','" . $studentId . "')";
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
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800,900&display=swap" rel="stylesheet" />
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
                        <form name="regFORM" id="regFORM" class="comment-form contact-form" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Name" name="name" id="name" pattern="^[A-Za-zÀ-ÿ ,.'-]+$" required>
                                </div>
                                <div class="col-lg-4">
                                    <input type="email" placeholder="Email" name="email" id="email" required>
                                    <span id="availability"> </span>
                                </div>
                                <div class="col-lg-4">
                                    <input type="number" placeholder="Phone" name="phone" id="phone" required>
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Designation" name="designation" id="designation" pattern="[a-zA-Z][a-zA-Z0-9\s]*" required>
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Affiliation and Organisation" name="affiliation" id="affiliation" pattern="[a-zA-Z][a-zA-Z0-9\s]*" required>
                                </div>
                                <div class="col-lg-4">
                                    <select onchange="yesnoCheck(this);" name="category" placeholder="Category" id="category" required>
                                        <option value="" selected="true" disabled="disabled">Category</option>
                                        <option value="Participant">Participant</option>
                                        <option value="Author">Author</option>
                                    </select>
                                </div>

                                <div class="col-lg-4" id="typeAuther" style="display:none;">
                                    <select name="typeAutherID" onchange="extraFeild(this);" placeholder="Type" id="typeAutherID">
                                        <option value="" selected="true" disabled="disabled">Type</option>
                                        <option value="1">IEEE Indian Author (Academia)</option>
                                        <option value="2">IEEE Indian Author (Industry)</option>
                                        <option value="3">IEEE Indian Student</option>
                                        <option value="5">IEEE Foreign Author</option>
                                        <option value="6">IEEE Foreign Student</option>
                                        <option value="8">Non-IEEE Indian Author (Academia)</option>
                                        <option value="9">Non-IEEE Indian Author (Industry)</option>
                                        <option value="10">Non-IEEE Indian Student</option>
                                        <option value="12">Non-IEEE Foreign Author</option>
                                        <option value="13">Non-IEEE Foreign Student</option>

                                    </select>
                                </div>
                                <div class="col-lg-4" id="typeAttendee" style="display:none;">
                                    <select name="typeAttendeeID" onchange="extraFeild(this);" placeholder="Type" id="typeAttendeeID">
                                        <option value="" selected="true" disabled="disabled">Type</option>
                                        <option value="4">IEEE Indian Participant</option>
                                        <option value="7">IEEE Foreign Participant</option>
                                        <option value="11">Non-IEEE Indian Participant</option>
                                        <option value="14">Non-IEEE Foreign Participant</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" placeholder="IEEE Membership Number" name="Membership" display="none" id="Membership">
                                </div>
                                <div class="col-lg-4" id="StudentIdDiv" display="none">
                                    <label>Student Id Card</label>
                                    <input type="file" placeholder="Student Id" name="StudentId" display="none" id="StudentId" accept=".jpg,.jpeg,.png,.pdf">
                                </div>
                                <div class="col-lg-4" id="CameraReadyPaperDiv" style="display:none;">
                                    <select name="CameraReadyPaper" placeholder="Camera ready paper" id="CameraReadyPaper" onchange="cameraReadyPaperChange(this);">
                                        <option value="" selected="true" disabled="disabled">Have you uploaded pdf
                                            express generated camera ready paper in the IEEE portal</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                                <div class="col-lg-4" id="copyrightDiv" style="display:none;">
                                    <select name="copyright" placeholder="Camera ready paper" id="copyright" onchange="paperCopyright(this);">
                                        <option value="" selected="true" disabled="disabled">Have you uploaded IEEE
                                            copyright form</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>


                                <div class="col-lg-4" id="paperidDiv" style="display:none;">
                                    <input type="text" onchange="showPaperid(this.value)" placeholder="Paper ID (Last Digits)" name=" paperid" id="paperid">
                                    <span id="availability"> </span>
                                </div>


                                <div class="col-lg-4" id="PresentationDiv" style="display:none;">
                                    <select name="PresentationMode" placeholder="PresentationMode" id="PresentationMode" onchange="FoodCheck(this);">
                                        <option value="" selected=" true" disabled="disabled">Presentation Mode
                                        </option>
                                        <option value="online">Online</option>
                                        <option value="offline">Offline</option>
                                    </select>
                                </div>
                                <div class="col-lg-4" id="FoodPreferenceDiv" style="display: none;">
                                    <select name="FoodPreference" placeholder="Food Preference" id="FoodPreference">
                                        <option value="" selected=" true" disabled="disabled">Food Preference</option>
                                        <option value="Vegetarian">Vegetarian</option>
                                        <option value="None Vegetarian">Non-Vegetarian</option>
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
                                    Already Registered?<a href="pay.php" style="color: red;"> Click Here</a>
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
                // type.required = true;
                paperid.required = true;
                PresentationMode.required = true;
                copyright.required = true;
                CameraReadyPaper.required = true;
                typeAutherID.required = true;


                document.getElementById("paperidDiv").style.display = "block";
                document.getElementById("papername").style.display = "block";
                document.getElementById("authername").style.display = "block";
                document.getElementById("PresentationDiv").style.display = "block";
                document.getElementById("CameraReadyPaperDiv").style.display = "block";
                document.getElementById("typeAuther").style.display = "block"
                document.getElementById("typeAttendee").style.display = "none"
                document.getElementById("copyrightDiv").style.display = "block"


            } else if (that.value == "Participant") {
                typeAttendeeID.required = true;
                // type.required = true;
                document.getElementById("paperidDiv").style.display = "none";
                document.getElementById("papername").style.display = "none";
                document.getElementById("authername").style.display = "none";
                document.getElementById("PresentationDiv").style.display = "none";
                document.getElementById("CameraReadyPaperDiv").style.display = "none";
                document.getElementById("typeAttendee").style.display = "block"
                document.getElementById("typeAuther").style.display = "none"
                document.getElementById("copyrightDiv").style.display = "none"


            }
        }

        function paperCopyright(that) {
            if (that.value == "no") {

                swal("Error", "Upload IEEE copyright form",
                    "error");

                $('#registerBTN').attr("disabled", true);

            } else if (that.value == "yes") {
                $('#registerBTN').attr("disabled", false);
            }
        }

        function cameraReadyPaperChange(that) {
            if (that.value == "no") {

                swal("Error", "Upload pdf express generated camera ready paper in the IEEE portal !",
                    "error");

                $('#registerBTN').attr("disabled", true);

            } else if (that.value == "yes") {
                $('#registerBTN').attr("disabled", false);
            }
        }


        function FoodCheck(that) {
            if (that.value == "offline") {
                FoodPreference.required = true;
                document.getElementById("FoodPreferenceDiv").style.display = "block";
            } else if (that.value == "online") {

                document.getElementById("FoodPreferenceDiv").style.display = "none";

            }
        }

        function extraFeild(that) {
            console.log(that.options[that.selectedIndex].text);
            console.log(that.value);
            var str = that.options[that.selectedIndex].text;
            console.log(str.includes('Non-IEEE'));
            if (that.value == '1' || that.value == '2' || that.value == '4' || that.value == '5' || that.value ==
                '7') {
                document.getElementById("Membership").style.display = "block";
                document.getElementById("StudentIdDiv").style.display = "none";
                Membership.required = true;
                StudentId.required = false;

            } else if (that.value == '3' || that.value == '6') {
                document.getElementById("Membership").style.display = "block";
                document.getElementById("StudentIdDiv").style.display = "block";
                Membership.required = true;
                StudentId.required = true;
            } else if (that.value == '10' || that.value == '13') {
                document.getElementById("Membership").style.display = "none";
                document.getElementById("StudentIdDiv").style.display = "block";
                StudentId.required = true;
                Membership.required = false;

            } else if (that.value == '8' || that.value == '9' || that.value == '11' || that.value == '12' || that
                .value ==
                '14') {
                document.getElementById("Membership").style.display = "none";
                document.getElementById("StudentIdDiv").style.display = "none";
                StudentId.required = false;
                Membership.required = false;


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

                    console.log(data);
                    if (data == 'Paper Id not valid') {
                        $('#registerBTN').attr("disabled", true);
                        swal("Error", "Enter last digits of the Paper ID",
                            "error");
                    } else {
                        $('#papername').html(data);
                        $('#registerBTN').attr("disabled", false);
                    }
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