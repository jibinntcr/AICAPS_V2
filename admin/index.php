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
                                                <th class="border w-1/4 px-4 py-2">#</th>
                                                <th class="border w-1/4 px-4 py-2">Name</th>
                                                <th class="border w-1/6 px-4 py-2">Email</th>
                                                <th class="border w-1/6 px-4 py-2">Phone</th>
                                                <th class="border w-1/6 px-4 py-2">Designation</th>
                                                <th class="border w-1/7 px-4 py-2">Affiliation</th>
                                                <th class="border w-1/5 px-4 py-2">Type</th>
                                                <th class="border w-1/5 px-4 py-2">Category</th>
                                                <th class="border w-1/5 px-4 py-2">Papper ID</th>
                                                <th class="border w-1/5 px-4 py-2">Papper Name</th>
                                                <th class="border w-1/5 px-4 py-2">Status</th>
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
                                                <td class="border px-4 py-2"><?php echo   $result->Type ?></td>
                                                <td class="border px-4 py-2"><?php echo   $result->category ?></td>
                                                <td class="border px-4 py-2"><?php echo   $result->paperid ?></td>
                                                <td class="border px-4 py-2"><?php echo   $result->paperTitle ?></td>
                                                <td class="border px-4 py-2"><?php echo   $result->registerStatus ?>
                                                </td>
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