<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include('../admin/includes/config.php');
require('razorpay-php/Razorpay.php');

if (!isset($_SESSION['email'])) {
    header("location:index.php");
    exit();
} else {
    $type = $_SESSION['type'];
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
        <!-- <div id="preloder">
            <div class="loader"></div>
        </div> -->

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
                            <h2>Pay Here</h2>
                            <?php
                            include("gatway-config.php");

                            use Razorpay\Api\Api;

                            $api = new Api($keyId, $keySecret);

                            $name = $_SESSION['name'];
                            $email = $_SESSION['email'];
                            $phone = $_SESSION['phone'];
                            $designation = $_SESSION['designation'];
                            $affiliation = $_SESSION['affiliation'];
                            $type = $_SESSION['type'];
                            $category = $_SESSION['category'];
                            $paperid = $_SESSION['paperid'];
                            $papername = $_SESSION['papername'];
                            $webtitle = "AICAPS2023";

                            if ($type == '$200' || $type = '$100' || $type = '$50' || $type = '$250' || $type = '$150' || $type = '$70') {
                                $displayCurrency = 'USD';
                                $typeDoller = ltrim($type, '$');
                                $curRate = $typeDoller * 82.80;
                            } else {
                                $displayCurrency = 'INR';
                                $typeDoller = ltrim($type, '₹');
                                $curRate = $typeDoller;
                            }
                            $imageurl = "";
                            $orderData = [
                                'receipt'         => 3456,
                                'amount'          => $curRate * 100, // 2000 rupees in paise
                                'currency'        => 'INR',
                                'payment_capture' => 1 // auto capture
                            ];

                            $razorpayOrder = $api->order->create($orderData);

                            $razorpayOrderId = $razorpayOrder['id'];

                            $_SESSION['razorpay_order_id'] = $razorpayOrderId;

                            $displayAmount = $amount = $orderData['amount'];

                            if ($displayCurrency !== 'INR') {
                                $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
                                $exchange = json_decode(file_get_contents($url), true);

                                $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
                            }

                            $data = [
                                "key"               => $keyId,
                                "amount"            => $amount,
                                "name"              => $webtitle,
                                "description"       => $type,
                                "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
                                "prefill"           => [
                                    "name"              => $name,
                                    "email"             => $email,
                                    "contact"           => $phone,
                                ],
                                "notes"             => [
                                    "address"           => "Hello World",
                                    "merchant_order_id" => "12312321",
                                ],
                                "theme"             => [
                                    "color"             => "#F37254"
                                ],
                                "order_id"          => $razorpayOrderId,
                            ];
                            if ($displayCurrency !== 'INR') {
                                $data['display_currency']  = $displayCurrency;
                                $data['display_amount']    = $displayAmount;
                            }

                            $json = json_encode($data);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
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
                                    <?php echo $type ?>
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
                                <center>
                                    <form action="verify.php" method="POST">
                                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="<?php echo $data['key'] ?>"
                                            data-amount="<?php echo $data['amount'] ?>" data-currency="INR"
                                            data-name="<?php echo $data['name'] ?>"
                                            data-image="<?php echo $data['image'] ?>"
                                            data-description="<?php echo $data['description'] ?>"
                                            data-prefill.name="<?php echo $data['prefill']['name'] ?>"
                                            data-prefill.email="<?php echo $data['prefill']['email'] ?>"
                                            data-prefill.contact="<?php echo $data['prefill']['contact'] ?>"
                                            data-notes.shopping_order_id="3456"
                                            data-order_id="<?php echo $data['order_id'] ?>"
                                            <?php if ($displayCurrency !== 'INR') { ?>
                                            data-display_amount="<?php echo $data['display_amount'] ?>" <?php } ?>
                                            <?php if ($displayCurrency !== 'INR') { ?>
                                            data-display_currency="<?php echo $data['display_currency'] ?>" <?php } ?>>
                                        </script>
                                        <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                                        <input type="hidden" name="shopping_order_id" value="<?php echo $type ?>">
                                    </form>
                                </center>
                            </div>
                        </div>
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

</body>

</html>