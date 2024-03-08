<?php
session_start();
require_once("db_conn.php");

include("header-onlineorder.php");

if (isset($_POST["add"])) {

    $qty = $_POST["qty"];
    if (isset($_COOKIE["shopping_cart"])) {

        $cookie_data = stripslashes($_COOKIE["shopping_cart"]);
        $cart_data = json_decode($cookie_data, true);

        $item_array_id = array_column($cart_data, "item_id");

        if (in_array($_POST["item_id"], $item_array_id)) {

            foreach ($cart_data as $key => $value) {

                if ($value["item_id"] == $_GET["item_id"]) {
                    unset($cart_data[$key]);
                    $cart_data = array_values($cart_data);
                    $buttonText = "remove";
                }
            }
        } else {

            $buttonText = "add";
            $count = count($cart_data);
            $item_array = array(
                "item_id" => $_POST["item_id"], "qty" => $_POST["qty"]
            );
            $cart_data[] = $item_array;
        }
    } else {

        $item_array = array("item_id" => $_POST["item_id"], "qty" => $_POST["qty"]);

        $cart_data[] = $item_array;
    }
    $item_data = json_encode($cart_data);
    setcookie('shopping_cart', $item_data, time() + (86400 * 60));
    header("Location: itemview.php?item_id=" . $_GET["item_id"] . "");

} else {
    if (isset($_COOKIE["shopping_cart"])) {

        $cookie_data = stripslashes($_COOKIE["shopping_cart"]);
        $cart_data = json_decode($cookie_data, true);

        $item_array_id = array_column($cart_data, "item_id");

        if (in_array($_GET["item_id"], $item_array_id)) {

            foreach ($cart_data as $key => $value) {
                if ($value["item_id"] == $_GET["item_id"]) {
                    $qty = $value["qty"];
                    $buttonText = "add";
                }
            }
        } else {
            $buttonText = "remove";
        }
    } else {
        $buttonText = "remove";
    }
}

$categoryId = '';
?>

<main class="item-view-main">

    <section class="item-view">

        <div class="item-container">
            <?php

            $itemId = mysqli_real_escape_string($conn, $_GET["item_id"]);

            $sql = "SELECT * FROM item
                WHERE item_id = $itemId";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $categoryId = $row["category_id"];

            echo '<img id="item-image" src="images/' . $row["item_image"] . '" alt="">
            <div class="item-info">
                    <div class="item-name">
                    <p>' . $row["item_name"] . '</p>
                        </div>
                        <div class="item-description">
                        <div class="prices">
                            <p class="price">LKR ' . $row["item_price"] . '/-</p>
                            <p class="total">LKR ' . $row["total_price"] . '/-</p>
                        </div>
                            <p class="description"> ' . $row["item_description"] . ' </p>';

            echo "<form action='itemview.php?item_id=" . $row["item_id"] . "' method='post'>
            <input type='hidden' name='item_id' id='item_id' value='$itemId'>";

            if ($buttonText === "add") {
                echo '<select disabled class="qty" name="qty" id="qty">
                    <option selected ="selected">' . $qty . '</option>';
            } else {
                echo '<select class="qty" name="qty" id="qty">
                    <option selected="selected">1</option>';
            }
            ?>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>

            </select>
            <button name="add" class="addtocart">
                <?php
                if ($buttonText === "add") {
                    echo 'Remove from cart';
                } else {
                    echo 'Add to cart';
                }
                ?>
            </button>

            </form>
        </div>



        </div>
        </div>
    </section>

    <div class=suggest-container">
        <div class="suggest-card">
            <div class="suggest-heading">
                <p>
                    Frequently Brought Together
                </p>
                <div class="arrows">
                    <i class="fa-solid fa-angle-left"></i>
                    <i class="fa-solid fa-angle-right"></i>
                </div>
            </div>
            <div class="suggest-list">
                <?php
                $sql = "SELECT * FROM category
                    INNER JOIN item ON item.category_id = category.category_id 
                    WHERE item.category_id=$categoryId";

                $result = mysqli_query($conn, $sql);
                $queryResults = mysqli_num_rows($result);


                if ($queryResults > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row["item_id"] != $_GET["item_id"]) {

                            echo '
                            <a href="itemview.php?item_id=' . $row["item_id"] . '">
                            <div class="suggest-item">
        
                                <img id="suggest-image" src="images/' . $row["item_image"] . '" alt="">
                                <div class="item-des-suggest">
                                    <p class="suggest-name">
                                    ' . $row["item_name"] . '
        
                                    </p>
                                    <p class="suggest-price">
                                    ' . $row["total_price"] . '
        
                                    </p>
                                    <p class="suggest-description">
                                    ' . $row["item_description"] . '
        
                                    </p>
        
                                </div>
                            </div>
                        </a>';
                        }
                    }
                }
                ?>



            </div>
        </div>
    </div>



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