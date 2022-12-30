<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include('../admin/includes/config.php');


if (isset($_POST['emailBTN'])) {

    $datamail = $_POST['email'];
    $sql = "SELECT * FROM `registration` WHERE email= '$datamail'";
    $query = $dbh->prepare($sql);
    $query->execute();
    $userArr = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {

        $name = $userArr[0]->name;
        $email = $userArr[0]->email;
        $phone = $userArr[0]->phone;
        $designation = $userArr[0]->designation;
        $affiliation = $userArr[0]->affiliation;
        $type = $userArr[0]->Type;
        $category = $userArr[0]->category;
        $papername = $userArr[0]->paperTitle;
        $paperid = $userArr[0]->paperid;
        $authorName = $userArr[0]->autherName;
        $registerStatus = $userArr[0]->registerStatus;
        if ($type == '1') {
            $cu = '₹​';
            $bp = 6000;
        } else if ($type == '2') {
            $cu = '₹​';
            $bp = 7000;
        } else if ($type == '3') {
            $cu = '₹​';
            $bp = 5000;
        } else if ($type == '4') {
            $cu = '₹​';
            $bp = 2000;
        } else if ($type == '5') {
            $cu = '$';
            $bp = 200;
        } else if ($type == '6') {
            $cu = '$​';
            $bp = 100;
        } else if ($type == '7') {
            $cu = '$​';
            $bp = 50;
        } else if ($type == '8') {
            $cu = '₹​';
            $bp = 7500;
        } else if ($type == '9') {
            $cu = '₹​';
            $bp = 8500;
        } else if ($type == '10') {
            $cu = '₹​';
            $bp = 6500;
        } else if ($type == '11') {
            $cu = '₹​';
            $bp = 2500;
        } else if ($type == '12') {
            $cu = '$​';
            $bp = 250;
        } else if ($type == '13') {
            $cu = '$​';
            $bp = 150;
        } else if ($type == '14') {
            $cu = '$​';
            $bp = 70;
        }
    } else {
        $_SESSION['userget'] = 'false';
        echo "<script> location.href='pay.php'; </script>";
        exit();
    }
}



if (isset($_POST['paymentBTN'])) {
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
    $date = date('d-m-Y H:i:s');


    $datamail = $_POST['datamail'];
    $status = 'Completed';
    $TransactionID = $_POST['TransactionID'];

    $folder = 'receipt/';

    $file = $folder . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES['image']['tmp_name'], $file);
    $image = basename($_FILES["image"]["name"]);

    $sql = "UPDATE  registration SET registerStatus='$status',transactionId='$TransactionID',updatedTime='$date',image='$image' where email='$datamail'";
    // print_r($sql);
    // exit();
    $query = $dbh->prepare($sql);
    $result = $query->execute();
    if ($query->rowCount() > 0) {
        $_SESSION['updateSTS'] = 'true';
        echo "<script> location.href='pay.php'; </script>";
        exit();
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
        <!-- <div id="preloder">
            <div class="loader"></div>
        </div> -->

        <div class="container-fluid nav-bar bg-transparent ">
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

        <?php
        if (isset($_SESSION["registration"])) {
            if ($_SESSION["registration"] == "initiated") {
        ?>
        <script>
        swal({
            title: "Success",
            text: "Phase 1 Completed",
            icon: "success",
            button: "OK",
        });
        </script>

        <?php
                unset($_SESSION["registration"]);
            } else if ($_SESSION["registration"] == "failed") {
            ?>
        <script>
        swal("Something went wrong !", "Please try after some time!", "error");
        </script>
        <?php
                unset($_SESSION["registration"]);
            }
        }
        ?>


        <?php
        if (isset($_SESSION['userget'])) {
            if ($_SESSION['userget'] == 'false') {
        ?>
        <script>
        swal("Email id not exist", "Please Register", "error");
        </script>
        <?php
                unset($_SESSION["userget"]);
            }
        }



        // AFTER UPDATE
        if (isset($_SESSION['updateSTS'])) {
            if ($_SESSION['updateSTS'] == 'true') { ?>
        <script>
        swal({
            title: "Success",
            text: "Phase 1 & 2 Completed",
            icon: "success",
            button: "OK",
            type: "success"
        }).then(okay => {
            if (okay) {
                window.location.href = "index.php";
            }
        });
        </script>

        <?php
                unset($_SESSION["updateSTS"]);
            } else { ?>
        <script>
        swal("Something went wrong ", "Please try again later", "error");
        </script>

        <?php unset($_SESSION["updateSTS"]);
            }
        }
        ?>









        <!-- form start -->
        <?php
        if (!isset($datamail)) { ?>

        <section class="contact-from-section spad ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Phase 2</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 ">
                        <form class="comment-form contact-form" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="email" placeholder="Email" name="email" id="email" required>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <!-- <textarea placeholder="Messages"></textarea> -->
                                    <button name="emailBTN" id="emailBTN" type="submit" class="site-btn">submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php

        } ?>
        <?php
        if (isset($datamail)) {
            if ($registerStatus == "Initiated") { ?>
        <section class="contact-from-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Phase 2</h2>
                            <!-- <h4>Details</h> -->


                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 rcorners2">
                        <div class="section-title">
                            <h2>User Details</h2>
                            <!-- <h4>Details</h> -->


                        </div>
                        <div class="comment-form contact-form">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label><b>Name: </b></label>
                                    <?php echo $name ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label><b>Email:</b> </label>
                                    <?php echo $email ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label><b>Phone Number:</b> </label>
                                    <?php echo $phone ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label><b>Designation:</b> </label>
                                    <?php echo $designation ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label><b>Affiliation:</b> </label>
                                    <?php echo $affiliation ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label><b>Price:</b> </label>

                                    <?php if ($type == '6' || $type == '7' || $type == '12' || $type == '13' || $type == '14') {
                                                echo $cu . $bp;
                                            } else {
                                                echo $cu . $bp . " + 18% GST";
                                            ?>
                                    </br>
                                    <label><b>Total Amount:</b> </label>
                                    <?php
                                                $gst_amt = ($bp * 18) / 100;
                                                $total = $gst_amt + $bp;
                                                echo $cu . $total;
                                            } ?>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label><b>Category:</b> </label>
                                    <?php echo $category ?>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label><b>Paper ID:</b> </label>
                                    <?php echo $paperid ?>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label><b>Paper Name:</b> </label>
                                    <?php echo $papername ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label><b>Author Name:</b> </label>
                                    <?php echo $authorName ?>
                                </div>

                            </div>
                            <div class="row">
                                <div class="section-title">
                                    <h2>Account Details For Payment</h2>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label>Account number - <b>67216724749</b></label>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label>IFSC CODE - <b>SBIN0070235</b> </label>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label>Account holder name - <b>Head Department of Computer Applications</b>
                                    </label>
                                </div>
                                <!-- <div class="col-lg-12 text-center">
                                    <button name="paymentBTN" id="paymentBTN" type="submit" class="site-btn mt-4">Upload
                                        Payment Details</button>
                                </div> -->
                            </div>
                        </div>
                        <div class="section-title mt-5">
                            <h2>Payment Details</h2>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 ">
                                <form class="comment-form contact-form" enctype="multipart/form-data" method="POST">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label>Transaction Reference Number</label>
                                            <input type="text" placeholder="" name="TransactionID" id="TransactionID"
                                                required>
                                            <input type="hidden" name="datamail" id="datamail"
                                                value="<?php echo $datamail ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Transaction Reciept</label>
                                            <input type="file" placeholder="Transaction Reciept" name="image" id="image"
                                                accept=".jpg,.jpeg,.png,.pdf">
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <!-- <textarea placeholder="Messages"></textarea> -->
                                            <button name="paymentBTN" id="paymentBTN" type="submit"
                                                class="site-btn">submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <?php
            } else { ?>
        <script>
        swal({
            title: "Success",
            text: "Phase 1 & 2 Completed",
            icon: "success",
            button: "OK",
            type: "success"
        }).then(okay => {
            if (okay) {
                window.location.href = "pay.php";
            }
        });
        </script>

        <?php  }

            ?>

        </section>

        <?php }
        ?>





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

</body>

</html>