<?php
require_once("db_conn.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Outer Clove</title>
    <link rel="stylesheet" href="stylesheetmain.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&family=Julius+Sans+One&family=Mulish:wght@200&family=Quattrocento&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/tw-cen-mt-std" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <script  src="hamburger.js" defer></script>
    <script  src="arrows.js" defer></script>
</head>

<body>

<header class="header">

        
        <div class="nav-bar">
            <div class="heading">
                THE OUTER CLOVE
            </div>
            <div class="links">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php 

                    $sql = "SELECT * FROM category LIMIT 1";

                    $result = mysqli_query($conn, $sql);

                    $row = mysqli_fetch_assoc($result);
                    
                    echo '<li><a href="menu.php?category_id='.$row["category_id"].'">Menu</a></li>'; ?>
                    <li><a href="promotions.php">Promotions & Offers</a></li>
                    <li><a href="location.php">About Us</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="onlineorder.php" target="_blank">Online Order</a></li>
                    <li><a href="functions.php">Functions</a></li>
                    <li><a  href="reservations.php?reservation=">Reserve</a></li>
                </ul>
            </div>
            <div class="cover-offer">
                <div class="hamburger">
                  <i class='bx bx-menu'></i>
                </div>
                <div class="overlay"></div>

              </div>
        </div>

        

    </header>
