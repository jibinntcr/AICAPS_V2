<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:login.php');
} else { ?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
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
                                    <table class="table-responsive w-full rounded">
                                        <thead>
                                            <tr>
                                                <th class="border w-1/4 px-4 py-2">Name</th>
                                                <th class="border w-1/6 px-4 py-2">Email</th>
                                                <th class="border w-1/6 px-4 py-2">Phone</th>
                                                <th class="border w-1/6 px-4 py-2">Institution</th>
                                                <th class="border w-1/7 px-4 py-2">Category</th>
                                                <th class="border w-1/5 px-4 py-2">Papper ID</th>
                                                <th class="border w-1/5 px-4 py-2">Papper Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border px-4 py-2">Micheal Clarke</td>
                                                <td class="border px-4 py-2">Sydney</td>
                                                <td class="border px-4 py-2">MS</td>
                                                <td class="border px-4 py-2">900 $</td>
                                                <td class="border px-4 py-2">Auther
                                                    <!-- <i class="text-green-500">Auther</i> -->
                                                </td>
                                                <td class="border px-4 py-2">11000332255</td>
                                                <td class="border px-4 py-2">papper name</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/Profile Tabs-->
                    </div>
                </main>
                <!--/Main-->
            </div>
            <!--Footer-->
            <footer class="bg-grey-darkest text-white p-2">
                <div class="flex flex-1 mx-auto">&copy; AICAPS 2022 </div>
                <div class="flex flex-1 mx-auto">Designed By&ensp;<a href="https://infinio.co.in/"
                        target=" _blank">Infinio
                        Technology Solutions</a></div>
            </footer>
            <!--/footer-->

        </div>

    </div>
    <script src="./main.js"></script>
</body>

</html>
<?php }
?>