<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTEMS</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Questrial&family=Scope+One&display=swap"
        rel="stylesheet">
</head>

<body>


    <?php
    include("databaseFunctions.php");
    $db = new databaseFunctions('localhost', 'root', '', 'employee_records');
    ?>

    <!-- header section start here -->
    <div class="header">
        <section class="flex">
            <a href="index.php" class="logo">MTEMS</a>


            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>

                <div id="toggle-btn" class="fas fa-sun"></div>


            </div>


        </section>
    </div>




    <!-- header section end here -->

    <!-- sidebar section starts -->

    <div class="side-bar">
        <div class="close-side-bar">
            <i class="fas fa-times"></i>
        </div>
        <div class="profile">



        </div>
        <nav class="navbar">
            <a href="index.php"><i class="fas fa-home"></i><span>home</span></a>
            <a href="add_employee.php"><i class="fas fa-plus"></i><span>create employee</span></a>
            <a href="departments.php"><i class="fas fa-plus"></i><span>create department</span></a>




        </nav>
    </div>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>