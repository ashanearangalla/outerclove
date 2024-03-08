<?php
session_start();
require_once("db_conn.php");

include("header-onlineorder.php");



if (isset($_POST["remove"])) {
    if ($_GET["action"] == "remove") {
  
      $cookie_data = stripslashes($_COOKIE["shopping_cart"]);
      $cart_data = json_decode($cookie_data, true);
  
      //print_r($cart_data);
  
      foreach ($cart_data as $key => $value) {
  
        if ($value["item_id"] == $_GET["item_id"]) {
          unset($cart_data[$key]);
          $cart_data = array_values($cart_data);
        }
      }
    }
    $item_data = json_encode($cart_data);
    setcookie('shopping_cart', $item_data, time() + (86400 * 60));
    header("Location: cart.php");

  }


?>

<main>

    <section class="cart-view">

        <div class=cart-container">
            <div class="cart-card">
                <div class="cart-heading">
                    <p>
                        Cart
                    </p>

                </div>
                <div class="cart-total">
                    <div class="cart-list">

                    <?php
                        $total = 0.00;
                        $acttotal = 0.00;

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

                                        echo '<div class="cart-item">


                                        <img id="cart-image" src="images/' . $row["item_image"] . '" alt="">
                                        <div class="item-des-cart">
                                            <div class="cart-item-price-qty-box">
                                            <p class="cart-item-name">' . $row["item_name"] . '</p>
                                            <div class="prices-cart">
                                                            <p class="price-cart">Rs ' . $row["item_price"] . '/- </p>
                                                            <p class="total-cart">Rs ' . $row["total_price"] . '/-</p>
                                                        </div>
        
                                                        <select disabled class="qty" name="qty" id="qty">
                                                        <option selected ="selected">' . $qty . '</option>            
                                                        </select>
        
                                            </div>
                                            <div class="cart-item-price-box">
                                            <form action="cart.php?action=remove&item_id=' . $row["item_id"] . '" method="post">
                                            <p class="cart-item-price">LKR '.$totalxqty.'/-</p>
                                            <div class="trash"><button id="remove" name="remove" type="submit"><i class="bi bi-trash"></i></button></div>
                                            </form>
                                            </div>';
        
                                            $acttotal = $acttotal + $actxqty;
                                            $total = $total + $totalxqty;
        
        
                                        echo '</div>
                                    </div>';
                                    
                                    }
                                }
                            }
                        }
                        $discount = $acttotal - $total;
                        ?>
</div>

                    


                        

                    <div class="calculation">
                        <div class="calculation-box">
                            <div class="col1">
                                <p>Subtotal</p>
                                <p>Discount</p>
                                <p>Total</p>

                            </div>
                            <div class="col2"><?php
                            echo '<p>LKR '.$acttotal.'/-</p>
                            <p>LKR '.$discount.'/-</p>
                            <p>LKR '.$total.'/-</p>
                        </div>';    
?>

                        </div>
                        <a href="checkout.php?status=">
                            <button class="checkout">
                                Checkout
                            </button>
                    </a>

                    </div>
                </div>

            </div>
        </div>






    </section>

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