<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:login.php');
} else { ?>




    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
        <!-- Css -->
        <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="./dist/styles.css">
        <link rel="stylesheet" href="./dist/all.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
        <title>Dashboard | AICAPS ADMIN Admin</title>
    </head>

    <body>
        <!--Container -->
        <div class="mx-auto bg-grey-400">
            <!--Screen-->
            <div class="min-h-screen flex flex-col">
                <!--Header Section Starts Here-->
                <?php include('partials/header.php'); ?>
                <!--/Header-->

                <div class="flex flex-1">
                    <!--Sidebar-->
                    <?php include('partials/sidebar.php'); ?>
                    <!--/Sidebar-->
                    <!--Main-->
                    <main class="bg-white-300 flex-1 p-3 overflow-hidden">

                        <div class="flex flex-col">
                            <!-- Stats Row Starts Here -->
                            <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                                <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                    <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                        Table Name
                                    </div>
                                    <div class="p-3">
                                        <table class="table-responsive w-full rounded" id="table_date">
                                            <thead>
                                                <tr>
                                                    <th class="border w-1/4 px-4 py-2">#</th>
                                                    <th class="border w-1/4 px-4 py-2">Name</th>
                                                    <th class="border w-1/6 px-4 py-2">Email</th>
                                                    <th class="border w-1/6 px-4 py-2">Phone</th>
                                                    <th class="border w-1/6 px-4 py-2">Designation</th>
                                                    <th class="border w-1/7 px-4 py-2">Affiliation</th>
                                                    <th class="border w-1/5 px-4 py-2">Type</th>
                                                    <th class="border w-1/5 px-4 py-2">Presentation Mode</th>
                                                    <th class="border w-1/5 px-4 py-2">Category</th>
                                                    <th class="border w-1/5 px-4 py-2">Papper ID</th>
                                                    <th class="border w-1/5 px-4 py-2">Papper Name</th>
                                                    <th class="border w-1/5 px-4 py-2">Author Name</th>
                                                    <th class="border w-1/5 px-4 py-2">Have you uploaded pdf
                                                        express generated camera ready paper in the IEEE portal</th>
                                                    <th class="border w-1/5 px-4 py-2">Food Preference</th>
                                                    <th class="border w-1/5 px-4 py-2">IEEE Membership ID</th>
                                                    <th class="border w-1/5 px-4 py-2">Student ID Card</th>
                                                    <th class="border w-1/5 px-4 py-2">Status</th>
                                                    <th class="border w-1/5 px-4 py-2">Transaction ID</th>
                                                    <th class="border w-1/5 px-4 py-2">Receipt</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $cnt =  1;
                                                $sql = "SELECT * from registration ";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);

                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {
                                                ?>

                                                        <tr>
                                                            <td class="border px-4 py-2"><?php echo   $cnt ?></td>
                                                            <td class="border px-4 py-2"><?php echo   $result->name ?></td>
                                                            <td class="border px-4 py-2"><?php echo   $result->email ?></td>
                                                            <td class="border px-4 py-2"><?php echo   $result->phone ?></td>
                                                            <td class="border px-4 py-2"><?php echo   $result->designation ?></td>
                                                            <td class="border px-4 py-2"><?php echo   $result->affiliation ?></td>

                                                            <?php
                                                            $type = $result->Type;
                                                            if ($type == '1') {
                                                                $type = 'IEEE Indian Author (Academia)';
                                                            } else if ($type == '2') {
                                                                $type = 'IEEE Indian Author (Industry)';
                                                            } else if ($type == '3') {
                                                                $type = 'IEEE Indian Student';
                                                            } else if ($type == '4') {
                                                                $type = 'IEEE Indian Non-Author Attendee';
                                                            } else if ($type == '5') {
                                                                $type = 'IEEE Foreign Author';
                                                            } else if ($type == '6') {
                                                                $type = 'IEEE Foreign Student Author';
                                                            } else if ($type == '7') {
                                                                $type = 'IEEE Foreign Non-Author Attendee';
                                                            } else if ($type == '8') {
                                                                $type = 'Non-IEEE Indian Author (Academia)';
                                                            } else if ($type == '9') {
                                                                $type = 'Non-IEEE Indian Author (Industry)';
                                                            } else if ($type == '10') {
                                                                $type = 'Non-IEEE Indian Student';
                                                            } else if ($type == '11') {
                                                                $type = 'Non-IEEE Indian Non-Author Attendee';
                                                            } else if ($type == '12') {
                                                                $type = 'Non-IEEE Foreign Author';
                                                            } else if ($type == '13') {
                                                                $type = 'Non-IEEE Foreign Student Author';
                                                            } else if ($type == '14') {
                                                                $type = 'Non-IEEE Foreign Non-Author Attendee';
                                                            }
                                                            ?>

                                                            <td class="border px-4 py-2"><?php echo   $type ?></td>


                                                            <?php $PresentationMode = $result->PresentationMode;
                                                            if (!empty($PresentationMode)) { ?>
                                                                <td class="border px-4 py-2"><?php echo   $result->PresentationMode ?>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td class="border px-4 py-2">No Data Found </td>
                                                            <?php }
                                                            ?>



                                                            <td class="border px-4 py-2"><?php echo   $result->category ?></td>


                                                            <td class="border px-4 py-2"><?php echo   $result->paperid ?></td>
                                                            <td class="border px-4 py-2"><?php echo   $result->paperTitle ?></td>
                                                            <td class="border px-4 py-2"><?php echo   $result->autherName ?></td>
                                                            <td class="border px-4 py-2"><?php echo   $result->cameraReadyPaper ?>
                                                            </td>



                                                            <?php $FoodPreference = $result->FoodPreference;
                                                            if (!empty($FoodPreference)) { ?>
                                                                <td class="border px-4 py-2"><?php echo   $result->FoodPreference ?>
                                                                <?php } else { ?>
                                                                <td class="border px-4 py-2">No Data Found </td>
                                                            <?php }
                                                            ?>



                                                            <?php $member_ship = $result->member_ship;
                                                            if (!empty($member_ship)) { ?>
                                                                <td class="border px-4 py-2"><?php echo   $result->member_ship ?>
                                                                <?php } else { ?>
                                                                <td class="border px-4 py-2">No Data Found </td>
                                                            <?php }
                                                            ?>


                                                            <?php $studentID = $result->student_id;
                                                            if (!empty($studentID)) { ?>
                                                                <td class="border px-4 py-2"><a href="../registration/id/<?php echo ($result->student_id) ?>" class="btn btn-success">View</a>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td class="border px-4 py-2">No Data Found </td>
                                                            <?php }
                                                            ?>
                                                            <td class="border px-4 py-2"><?php echo   $result->registerStatus ?>
                                                            <td class="border px-4 py-2"><?php echo   $result->transactionId ?>
                                                                <?php $image = $result->image;
                                                                if (!empty($image)) { ?>
                                                            <td class="border px-4 py-2"><a href="../registration/receipt/<?php echo ($result->image) ?>" class="btn btn-success">View</a>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td class="border px-4 py-2">No Data Found </td>
                                                        <?php }
                                                        ?>
                                                        </tr>
                                                <?php $cnt = $cnt + 1;
                                                    }
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <!--/Profile Tabs-->
                        </div>
                        <div align="center">
                            <button name="create_excel" id="create_excel" onClick="ExportToExcel('xlsx');" class="btn btn-success">Download Exel</button>
                        </div>
                    </main>
                    <!--/Main-->
                </div>

                <!--Footer-->
                <footer class="bg-grey-darkest text-white p-2">
                    <div class="flex flex-1 mx-auto">&copy; AICAPS 2022 </div>
                    <div class="flex flex-1 mx-auto">Designed By&ensp;<a href="https://infinio.co.in/" target=" _blank">Infinio
                            Technology Solutions</a></div>
                </footer>
                <!--/footer-->

            </div>

        </div>
        <script>
            function ExportToExcel(type, fn, dl) {
                alert(location.href)
                var elt = document.getElementById('table_date');
                console.log(elt);
                var wb = XLSX.utils.table_to_book(elt, {
                    sheet: "sheet1"
                });
                return dl ?
                    XLSX.write(wb, {
                        bookType: type,
                        bookSST: true,
                        type: 'base64'
                    }) :
                    XLSX.writeFile(wb, fn || ('MySheetName.' + (type || 'xlsx')));
            }
        </script>
        <script src="./main.js"></script>
    </body>

    </html>
<?php }
?>