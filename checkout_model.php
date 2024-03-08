<?php
session_start();
require_once("db_conn.php");





if (isset($_POST["placeorder"])) {
    $email = $_POST["email"];
    $userId = $_SESSION["user"]["user_id"];
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $phoneNo = $_POST["phoneNo"];
    $town = $_POST["town"];
    $address = $_POST["address"];
    $noofitems = $_POST["noofitems"];
    $subtotal = $_POST["subtotal"];
    $delivery = $_POST["delivery"];
    $total = $_POST["total"];
    $payment = $_POST["payment"];

    $sql = "INSERT INTO order_table (user_id,first_name,last_name,phone_number,email,town,address,
        no_of_items,sub_total,delivery ,total,payment_method) VALUES ($userId,'$fName','$lName',
        '$phoneNo','$email','$town','$address','$noofitems','$subtotal','$delivery','$total','$payment')";
    mysqli_query($conn, $sql);

    $last_id = mysqli_insert_id($conn);
    $cookie_data = stripslashes($_COOKIE["shopping_cart"]);
    $cart_data = json_decode($cookie_data, true);
    $sql2 = "SELECT * FROM item";
    $result = mysqli_query($conn, $sql2);

    while ($row = mysqli_fetch_assoc($result)) {

        foreach ($cart_data as $key => $value) {
            if ($row["item_id"] == $value["item_id"]) {
               $sql3 = "INSERT INTO order_item (order_id, item_id,user_id, qty) VALUES ($last_id, ".$value["item_id"].",$userId, ".$value["qty"].");";
                mysqli_query($conn, $sql3);
            }
        }
    }
    header("Location: checkout.php?status=success");
}

?>