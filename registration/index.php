<?php
session_start();
error_reporting(0);
include('../admin/includes/config.php');


if (isset($_POST['registerBTN'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $designation = $_POST['designation'];
    $affiliation = $_POST['affiliation'];
    $type = $_POST['type'];
    $category = $_POST['category'];
    $paperid = $_POST['paperid'];
    $papername = $_POST['papername'];


    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['designation'] = $_POST['designation'];
    $_SESSION['affiliation'] = $_POST['affiliation'];
    $_SESSION['type'] = $_POST['type'];
    $_SESSION['category'] = $_POST['category'];
    $_SESSION['paperid'] = $_POST['paperid'];
    $_SESSION['papername'] = $_POST['papername'];

    $registerStatus = 'initiated';
    $sql = "INSERT INTO registration(name,email,phone,designation,category,paperid,paperTitle,affiliation,type,registerStatus) VALUES ('" . $name . "','" . $email . "','" . $phone . "','" . $designation . "','" . $category . "','" . $paperid . "','" . $papername . "','" . $affiliation . "','" . $type . "','" . $registerStatus . "')";
    // print_r($sql);
    // exit();
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
                        <form class="comment-form contact-form" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Name" name="name" id="name" required>
                                </div>
                                <div class="col-lg-4">
                                    <input type="email" placeholder="Email" name="email" id="email" required>
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Phone" name="phone" id="phone" required>
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Designation" name="designation" id="designation"
                                        required>
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Affiliation" name="affiliation" id="affiliation"
                                        required>
                                </div>
                                <div class="col-lg-4">
                                    <select name="type" placeholder="Type" id="type" required>
                                        <option selected="true" disabled="disabled">Type</option>
                                        <option value="₹6000">IEEE Indian Author (Academia)</option>
                                        <option value="₹7000">IEEE Indian Author (Industry)</option>
                                        <option value="₹5000">IEEE Indian Student</option>
                                        <option value="₹2000">IEEE Indian Non-Author Attendee</option>
                                        <option value="$200">IEEE Foreign Author</option>
                                        <option value="$100">IEEE Foreign Student Author</option>
                                        <option value="$50">IEEE Foreign Non-Author Attendee</option>
                                        <option value="₹7500">Non-IEEE Indian Author (Academia)</option>
                                        <option value="₹8500">Non-IEEE Indian Author (Industry)</option>
                                        <option value="₹6500">Non-IEEE Indian Student</option>
                                        <option value="₹2500">Non-IEEE Indian Non-Author Attendee</option>
                                        <option value="$250">Non-IEEE Foreign Author</option>
                                        <option value="$150">Non-IEEE Foreign Student Author</option>
                                        <option value="$70">Non-IEEE Foreign Non-Author Attendee</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <select onchange="yesnoCheck(this);" name="category" placeholder="Category"
                                        id="category" required>
                                        <option selected="true" disabled="disabled">Category</option>
                                        <option value="Participant">Participant</option>
                                        <option value="Auther">Author</option>
                                    </select>
                                </div>

                                <div id="paperid" class="col-lg-4" style="display: none;">
                                    <input type="text" placeholder="Paper ID" name="paperid" id="paperid"
                                        onchange="showPaperid(this.value)">
                                </div>

                                <div id="papername" class="col-lg-4" style="display: none;">
                                    <!-- <input type="text" placeholder="Paper Name" name="papername" id="papername"> -->
                                </div>
                                <div class="col-lg-12 text-center">
                                    <!-- <textarea placeholder="Messages"></textarea> -->
                                    <button name="registerBTN" id="registerBTN" type="submit" class="site-btn">Proceed
                                        to payment</button>
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
                                    <a href="registration.php">REGISTRATIONS</a>
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
        if (that.value == "Auther") {
            document.getElementById("paperid").style.display = "block";
            document.getElementById("papername").style.display = "block";
        } else if (that.value == "Participant") {
            document.getElementById("paperid").style.display = "none";
            document.getElementById("papername").style.display = "none ";
        }
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
            }
        });
    }
    </script>
</body>

</html>