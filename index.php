<?php
include("header.php");

session_start();






?>



<section class="cover">

    <div class="cover-image">
        <div class="login-div">
            <div class="login-box">
                <a href="loginform.php" target="_blank">Login</a>
            </div>
        </div>




        <p>The Outer Clove</p>



    </div>
</section>
<section class="welcome">
    <div class="welcome-container">
        <div class="welcome-message">
            <div class="message-heading">
                <p>
                    WELCOME
                </p>
            </div>
            <div class="message-p1">
                <div>
                    <p>

                        Step into The Outer Clove, where a warm embrace awaits, inviting you into a world of culinary delight.

                    </p><br>
                    <p>
                        Our welcome is more than just a greeting; it's an invitation to experience the essence of Colombo's culinary spirit.

                    </p><br>
                    <p>
                        The moment you cross our threshold, you become part of a community where flavors come alive, and every dish tells a story.
                    </p><br>
                    <p>

                        Welcome to The Outer Clove, where each visit is a celebration of taste, tradition, and togetherness—an experience curated just for you.
                    </p><br><br><br><br>
                    <a href="#">Our Menu</a>
                </div>

            </div>


        </div>

        <img id="resturant-image" src="images/welcome-rest.jpg" alt="">


    </div>

</section>
<div class="index-part-1">

    <div class="services-container-index" style="padding-bottom: 0px;">

        <div class="services-heading" style="padding-top: 10px;">
            <p>Our Services</p>
        </div>
        <div class="services-index" style="margin-bottom: 15px;">

            <div class="info-box">
                <i id="remix" class="material-icons">&#xe56c;</i>

                <p class="heading-services">
                    Dine-In</p>
                <p class="description-services">
                    Experience the pleasure of dining at our restaurant</p>
            </div>
            <div class="info-box">
                <i id="remix" class="bi bi-backpack4-fill"></i>
                <p class="heading-services">Take Out</p>
                <p class="description-services">
                    Elevate your experience with our convenient take-away service.</p>
            </div>
            <div class="info-box">
                <i id="remix" class="ri-money-dollar-circle-line"></i>
                <p class="heading-services">Cash on Delivery</p>
                <p class="description-services">Enjoy the convenience of our Cash on Delivery service.</p>
            </div>
            <div class="info-box">
                <i id="remix" class="ri-bank-card-line"></i>
                <p class="heading-services">Secure Payments</p>
                <p class="description-services">via PayHere Powered by Sampath Bank.</p>
            </div>




        </div>
        <div class="link-box" style="margin-top: 10px; margin-bottom: 0px; padding-bottom: 0px;">
            <a href="#">View More >></a>
        </div>


    </div>



    <div class="promotions-container-index" style="margin-bottom: 50px;">
        <div class="promotions-heading">
            <p></p>
        </div>
        <div class="services-heading" style="padding-bottom: 10px;">
            <p>Promotions & Offers</p>
        </div>
        <div class="promotions-index">
            <div class="banner-box-1">

            </div>
            <div class="banner-box-2">

            </div>
            <div class="banner-box-3">

            </div>
            <div class="banner-box-4">

            </div>
        </div>
        <div class="link-box" style="padding-top: 10px;">
            <a href="#">View More >></a>
        </div>

    </div>


    <section class="welcome">

        <div class="menu-container-home">
            <div class="menu-card-home">
                <div class="menu-heading-home">
                    <div class="heading-browse">
                        <p>
                            Browse Our Items
                        </p>
                        <div class="arrows">
                            <i class="fa-solid fa-angle-left"></i>
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </div>

                </div>
                <div class="menu-list-home">
                    <?php
                    $sql = "SELECT * FROM item
                        WHERE home_display = 'Yes' ";


                    $result = mysqli_query($conn, $sql);
                    $queryResults = mysqli_num_rows($result);

                    if ($queryResults > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<a href="itemview.php?item_id=' . $row["item_id"] . '" target="_blank">
                            <div class="item-home">
    
                                <img id="resturant-image-home" src="images/' . $row["item_image"] . '" alt="">
                                <p class="order-item-name-home">
                                    ' . $row["item_name"] . '
    
                                </p>
                                
                                <div class="prices">
                                    <p class="price">LKR ' . $row["item_price"] . '</p>
                                    <p class="total">LKR ' . $row["total_price"] . '</p>
                                </div>
    
                                
                            </div>
                        </a>';
                        }
                    }
                    ?>

                </div>
                <div class="link-box">
                    <a href="onlineorder.php" target="_blank">View More >></a>
                </div>





            </div>
        </div>
    </section>
</div>
<main class="index-main">
    <section class="welcome">

        <div class="welcome-container">

            <div class="welcome-message">
                <div class="message-heading">
                    <p>
                        Reserve
                    </p>
                </div>
                <div class="message-p1">
                    <div>
                        <p>
                        Elevate your dining experience by reserving a table for an unforgettable culinary journey. 

                        </p><br>
                        <p>
                        Whether it's a romantic dinner for two, a family celebration, or a business meeting, our carefully curated ambiance awaits you. 

                        </p><br>
                        <p>
                        Immerse yourself in the exquisite blend of flavors while our attentive staff ensures every moment is a celebration. 
                        </p><br>
                        <p>
                        Reserve your table now and savor the anticipation of a dining experience tailored to your desires.
                        </p><br><br><br><br>
                        <a href="#">Reserve Now</a>
                    </div>

                </div>


            </div>
            <img id="resturant-image" src="images/restaurant.jpg" alt="">




        </div>

    </section>




    <section class="welcome">
        <div class="welcome-container">

            <img id="resturant-image" src="images/privatedining.jpg" alt="">

            <div class="welcome-message">
                <div class="message-heading">
                    <p>
                        Host an Event
                    </p>
                </div>
                <div class="message-p1">
                    <div>
                        <p>
                        Elevate your special events with The Outer Clove's impeccable hosting services. 

                        </p><br>
                        <p>
                        Whether it's a birthday celebration, corporate event, or intimate gathering, our venue provides the perfect backdrop for unforgettable moments. 

                        </p><br>
                        <p>
                        Host your event with us and experience the seamless blend of culinary excellence and impeccable hospitality. 
                        </p><br>
                        <p>
                        Inquire now to unlock the possibilities of creating cherished memories at The Outer Clove.
                        
                        </p>
                        <br><br><br><br>
                        <a href="#">Inquire</a>
                    </div>

                </div>


            </div>





        </div>

    </section>

    <div class="newsletter-container-index">
        <div class="heading-contact">
            <p>
                Opening Hours
            </p>
        </div>
        <div class="newsletter">
            <div class="newsletter-heading">

                <div class="opening-hours">
                    <p class="description-newsletter">Sunday to Tuesday</p>
                    <p class="description-newsletter">09:00 - 06:00</p>
                </div>
                <div class="opening-hours">
                    <p class="description-newsletter">Friday to Sunday</p>
                    <p class="description-newsletter">06:00 - 09:00</p>
                </div>
                <div class="opening-hours">
                    <p class="description-newsletter">Sunday to Tuesday</p>
                    <p class="description-newsletter">09:00 - 06:00</p>
                </div>
                <div class="opening-hours">
                    <p class="description-newsletter">Monday to Friday</p>
                    <p class="description-newsletter">06:00 - 09:00</p>
                </div>
                <div class="opening-hours">
                    <p class="description-newsletter">Monday to Saturday</p>
                    <p class="description-newsletter">06:00 - 09:00</p>
                </div>
                <div class="footer-newsletter">
                    <p class="">Call Us Now</p>
                    <p class="">0771231234</p>
                </div>


            </div>

        </div>



    </div>








</main>
<footer>

    <div class="footer">
        <div class="contact">
            <p>author: Ashane Lakshitha</p>
            <a href="mailto:ashane@gmail.com">alarangalla@gmail.com</a>
        </div>
        <div class="logo">
            The Outer Clove
        </div>
        <div>
            <p>copyrights reserved 2023</p>
        </div>



    </div>
</footer>

</body>

</html>