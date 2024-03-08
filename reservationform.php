<?php

if (isset($_SESSION["reservation"])) {
    echo 'hi';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Outer Clove</title>
    <link rel="stylesheet" href="styleforms.css">
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

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <script src="hamburger.js" defer></script>
</head>

<body>

    <header class="header">


        <div class="nav-bar">
            <div class="heading">
                <a href="index.php">THE OUTER CLOVE</a>
            </div>
            <div class="links">
                <ul>
                    <li><a class="active" id="active" href="reservations.php?reservation=">Back</a></li>
                </ul>
            </div>



        </div>





    </header>

    <main class="reservationform-main">
        <section class="form">
            <div class="inquire-form">
                <form id="form1" name="form1" method="post" action="db_model.php" onsubmit="return validateForm()">
                    <div class="headings">
                        <p class="reservation-title">Reservation at The Outer Clove</p>
                    </div>
                    <div class="form-details">

                        <div class="inputs">
                            <div class="divided">
                                <div class="col1">
                                    <label class="labels" for="firstName">First Name:</label><br>
                                    <input class="average-input" placeholder="First Name" type="text" name="fName" id="firstName" />
                                </div>
                            </div>
                            <div class="divided">
                                <div class="col1">
                                    <label class="labels" for="lastName">Last Name:</label><br>
                                    <input class="average-input" placeholder="Last Name" type="text" name="lName" id="lastName" />
                                </div>
                            </div>
                            <div class="divided">
                                <div class="col1">
                                    <label class="labels" for="phonenumber">Phone Number:</label><br>
                                    <input class="average-input" placeholder="Phone Number" type="text" name="phoneNo" id="phonenumber" />
                                </div>
                            </div>
                            <div class="divided">
                                <div class="col1">
                                    <label class="labels" for="email">Email:</label><br>
                                    <input class="average-input" type="text" placeholder="Email" name="email" id="email" />
                                </div>
                            </div>
                            <div class="divided">
                                <div class="col1">
                                    <label class="labels" for="nic">NIC Number:</label><br>
                                    <input class="average-input" type="text" placeholder="NIC Number" name="nic" id="nic" />
                                </div>
                            </div>
                            <div class="divided">
                                <div class="col1">
                                    <label class="labels" for="request">Add a Special Request:</label><br>
                                    <input class="average-input" type="text" placeholder="Add a Special Request" name="request" id="request" />
                                </div>
                            </div>
                        </div>

                        <div class="detailed-description">
                            <p class="restaurant-name">The Outer Clove</p>
                            <?php
                            if (isset($_POST["reserve"])) {
                                echo '<div class="icon-box">
                                    <i class="bi bi-calendar4"></i>
                                    <p class="reserved-date">' . $_POST["date"] . '</p><br>
                                    <input type="hidden" name="date" id="date" value="' . $_POST["date"] . '">

                                </div>
                                <div class="icon-box">
                                    <i class="bi bi-clock"></i>
                                    <p class="reserved-time">' . $_POST["time"] . '</p>
                                    <input type="hidden" name="time" id="time" value="' . $_POST["time"] . '">
                                </div>
                                <div class="icon-box">
                                    <i class="bi bi-person"></i>
                                    <p class="reserved-people">' . $_POST["noofpeople"] . '</p>
                                    <input type="hidden" name="noofpeople" id="noofpeople" value="' . $_POST["noofpeople"] . '">
                                </div>
                                <div class="icon-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <p class="location">36 E 20th Anderson Road</p>
                                </div>';
                            }
                            ?>


                        </div>






                    </div>
                    <div class="errors-box">
                                <div class="errors">
                                    <?php
                                    if($_GET["reservation"] == "success") {
                                        echo '<p id="correct">Reservation Successful
                                        <p>';
                                    }
                                    ?>
                                    
                                    <p id="error">
                                    <p>
                                </div>

                            </div>
                    <div class="button">
                        <button name="reservation" class="submit">
                            Confirm Reservation
                        </button>
                    </div>







                </form>
                <script>
                    function validateForm() {
                        var firstName = document.getElementById("firstName").value;
                        var lastName = document.getElementById("lastName").value;
                        var phoneNumber = document.getElementById("phonenumber").value;
                        var email = document.getElementById("email").value;
                        var nic = document.getElementById("nic").value;
                        var errorElement = document.getElementById("error");


                        errorElement.innerHTML = "";

                      
                        if (firstName === "" || lastName === "" || phoneNumber === "" || email === "" || nic === "") {
                            errorElement.innerHTML = "All fields must be filled out";
                            return false;
                        }

                        var emailFormat = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailFormat.test(email)) {
                            errorElement.innerHTML = "Invalid email address";
                            return false;
                        }

                        return true; 
                    }
                </script>
            </div>

        </section>
    </main>