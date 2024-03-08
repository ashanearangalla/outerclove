<?php


session_start();
require_once("db_conn.php");


include("header-onlineorder.php");

if (!isset($_SESSION["user"])) {
    header("Location: loginform.php");
}
?>


?>



<main class="checkout-main">

    <section class="checkout-view">
        <form id="form1" name="form1" method="post" onsubmit="return validateForm()" action="checkout_model.php">
            <div class=checkout-container>
                <div class="checkout-card">
                    <div class="checkout-heading">
                        <p>
                            Checkout
                        </p>

                    </div>
                    <div class="checkout-total">

                        <div class="checkout-form">
                            

                                <div class="checkout-form-details">

                                    <div class="inputs">
                                        <div class="divided">
                                            <div class="col1">
                                                <label class="labels" for="firstName">First Name:</label><br>
                                                <input class="divided-input-checkout" placeholder="First Name" type="text" name="fName" id="fName" />
                                            </div>

                                        </div>

                                        <div class="divided">
                                            <div class="col1">
                                                <label class="labels" for="lastName">Last Name:</label><br>
                                                <input class="divided-input-checkout" placeholder="Last Name" type="text" id="lName" name="lName" />
                                            </div>

                                        </div>

                                        <div class="divided">
                                            <div class="col1">
                                                <label class="labels" for="phonenumber">Phone Number:</label><br>
                                                <input class="divided-input-checkout" placeholder="Phone Number" type="text" name="phoneNo" id="phoneNo" />
                                            </div>
                                        </div>

                                        <div class="divided">
                                            <div class="col1">
                                                <label class="labels" for="email">Email:</label><br>
                                                <input class="divided-input-checkout" type="text" placeholder="Email" name="email" id="email" />
                                            </div>

                                        </div>

                                        <div class="divided">
                                            <div class="col1">
                                                <label class="labels" for="town">Town:</label><br>
                                                <input class="divided-input-checkout" type="text" placeholder="Town" name="town" id="town" />
                                            </div>
                                        </div>

                                        <div class="divided">
                                            <div class="col1">
                                                <label class="labels" for="address">Address:</label><br>
                                                <textarea class="textarea-checkout" name="address" id="address" placeholder="Address"></textarea>
                                            </div>

                                        </div>

                                    </div>

                                </div>


                        </div>

                        <div class="order-summary">
                            <div class="summary-box">
                                <div class="heading-box">
                                    <p class="order-title">Order Summary</p>

                                </div>
                                <?php

                                $subtotal = 0.00;
                                $total = 0.00;
                                $acttotal = 0.00;
                                $number_of_products = 0;


                                if (isset($_COOKIE["shopping_cart"])) {

                                    $cookie_data = stripslashes($_COOKIE["shopping_cart"]);
                                    $cart_data = json_decode($cookie_data, true);



                                    $sql = "SELECT * FROM item";

                                    $result = mysqli_query($conn, $sql);


                                    while ($row = mysqli_fetch_assoc($result)) {

                                        foreach ($cart_data as $key => $value) {

                                            if ($row["item_id"] == $value["item_id"]) {
                                                $qty = intval($value["qty"]);
                                                $actual_price = (doubleval($row["item_price"]));
                                                $total_price = (doubleval($row["total_price"]));
                                                $actxqty = $actual_price * $qty;
                                                $totalxqty = $total_price * $qty;

                                                echo '<div class="order-description-box">
                                            <div class="order-box-col1">
        
                                                <p>' . $row["item_name"] . ' x ' . $qty . '</p>
                                                
        
                                            </div>
                                            <div class="order-box-col2">
        
                                                <p>LKR ' . $totalxqty . '</p>
                                                
                                            </div>
        
        
                                        </div>';
                                                $subtotal = $subtotal + $totalxqty;
                                                $number_of_products = $number_of_products + $qty;
                                            }
                                        }
                                    }
                                }
                                $delivery = 400.00;
                                $total = $subtotal + $delivery;


                                echo '<div class="order-subtotal-box">
                                <div class="order-box-col1">

                                    <p class="order-heading">Subtotal</p>
                                    <p class="order-heading">Delivery</p>

                                </div>
                                <div class="order-box-col2">

                                    <p>LKR ' . $subtotal . '</p>
                                    <p>LKR ' . $delivery . '</p>
                                </div>
                            </div>

                            <div class="order-total-box">
                                <div class="order-box-col1">

                                    <p class="order-heading">Total Amount</p>

                                </div>
                                <div class="order-box-col2">

                                    <p>LKR ' . $total . '</p>

                                </div>
                            </div>
                                
                                ';
                                echo '
                                <input type="hidden" name="user_id" id="user_id" value="' . $_SESSION["user"]["user_id"] . '">
                                <input type="hidden" name="noofitems" id="noofitems" value="' . $number_of_products . '">
                                <input type="hidden" name="subtotal" id="subtotal" value="' . $subtotal . '">
                                <input type="hidden" name="delivery" id="delivery" value="' . $delivery . '">
                                <input type="hidden" name="total" id="total" value="' . $total . '">
                                ';



                                ?>




                                <br>


                                <div class="payment-heading-box">
                                    <p class="order-title">Select Payment Method</p>

                                </div>
                                <div class="payment-box">
                                    <div class="payment-method">
                                        <input name="payment" value="card" class="radio" type="radio" />
                                        <p class="payment-method-type">Credit/ Debit Card</p>
                                    </div>
                                    <div class="payment-method">
                                        <input checked name="payment" value="cod" class="radio" type="radio" />
                                        <p class="payment-method-type">Cash On Delivery</p>
                                    </div>


                                </div>


                                <button type="submit" name="placeorder" class="placeorder">
                                    Place Order
                                </button>
                            </div>


                        </div>




                    </div>
                    <div class="errors-box">
                        <div class="errors">
                            <?php
                            if ($_GET["status"] == "success") {
                                echo '<p id="correct">Order Successful
                                        <p>';
                            }
                            ?>

                            <p id="error">
                            <p>
                        </div>

                    </div>
                </div>




        </form>
        <script>
            function validateForm() {
                var fname = document.getElementById('fName').value;
                var lname = document.getElementById('lName').value;
                var email = document.getElementById('email').value;
                var phoneNo = document.getElementById('phoneNo').value;
                var town = document.getElementById('town').value;
                var address = document.getElementById('address').value;
                var error = document.getElementById("error");

                if (fname === '' || lname === '' || email === '' || phoneNo === '' || town === '' || address === '') {
                    error.innerHTML = "All fields must be filled out";
                    return false;
                }

                
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    error.innerHTML = "Invalid email address"; // Changed variable name
                    return false;
                }

                return true;
            }
        </script>
    </section>


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