<?php

include('../config/constants.php');
include('login-check.php');

?>


<html>

<head>
    <title>Hunter Foods - Admin Panel</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/site.webmanifest">
    <link rel="mask-icon" href="../favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>

<body>

    <!-- Menu Section Starts -->


    <div class="wrapper">
        <div class="logo">
            <a href="#" title="Logo">
                <img src="../images/hunterlogo.png" alt="Hunter Foods Logo" class="img-responsive">
            </a>
        </div>
        <div class="menu text-right">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="../index.php">Preview to site</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-food.php">Food</a></li>
                <li><a href="manage-order.php">Order</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <!-- Menu Section Ends -->