<?php
session_start();
require_once("../db_conn.php");
include("sidemenu.php");




if (isset($_POST["confirmOrder"])) {

    $orderId = $_POST["order_id"];



    $sql = "UPDATE order_table SET order_status = 'Confirmed' WHERE order_id = $orderId";

    mysqli_query($conn, $sql);
}

if (isset($_POST["deleteOrder"])) {
    $orderId = $_POST["order_id"];

    $sql = "DELETE FROM order_table WHERE order_id = $orderId";

    mysqli_query($conn, $sql);

    header("Location: orderView.php");
}




?>

<div class="dashboard-content">


    <div class="heading-box">
        <div class="box-1">

            <div class="title">
                <p>ORDERS</p>
               
            </div>
        </div>
        <div class="box-1">
            <div class="search-bar">
                <ul>
                    <li class="search">
                        
                        <form action="search.php" method="post">

                            <input type="text" placeholder="Search items" name="search" <?php
                                                                                        // Check if the session variable is set and not empty
                                                                                        if (isset($_SESSION["search"]) && !empty($_SESSION["search"])) {
                                                                                            echo 'value="' . $_SESSION["search"] . '"';
                                                                                        }
                                                                                        ?> required id="search-input" />
                            <i class="bx bx-search-alt-2"></i>


                        </form>
                    </li>

                </ul>


            </div>
        </div>
    </div>

    <div class="table-section-item">


        <div class="table-container-item">

            <div class="table-box">

                <table id="rows-def">
                    <tr id="table-head">
                        <th>ORDER ID</th>
                        <th>USER ID</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>PHONE NO</th>
                        <th>EMAIL</th>
                        <th>TOWN</th>
                        <th>ADDRESS</th>
                        <th>TOTAL</th>
                        <th>PAY METHOD</th>
                        <th>CONFIRM</th>
                        <th>VIEW</th>
                        <th>DELETE</th>
                    </tr>


                    <?php


                    $sql = "SELECT * FROM order_table";


                    $result = mysqli_query($conn, $sql);
                    $queryResults = mysqli_num_rows($result);

                    if ($queryResults > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<form action='orderview.php' method='post'>
                            <tr>
                      <td id='ID'>" . $row["order_id"] . "</td>
                      <td> " . $row["user_id"] . "</td>
                      <td> " . $row["first_name"] . "</td>
                      <td>" . $row["last_name"] . "</td>
                      <td>" . $row["phone_number"] . "</td>
                      <td>" . $row["email"] . "</td>
                      <td>" . $row["town"] . "</td>
                      <td>" . $row["address"] . "</td>
                      <td>" . $row["total"] . "</td>
                      <td>" . $row["payment_method"] . "</td>
                      <input type='hidden' name='order_id' value=" . $row["order_id"] . ">
                      <td>";
                            if ($row["order_status"] == "Pending") {
                                echo "<button id='confirm' name='confirmOrder'>Confirm</button></td>";
                            } else if ($row["order_status"] == "Confirmed") {
                                echo "<button id='confirmed' name='confirmOrder'>Confirmed</button></td></form>";
                            }
                            echo "
                            <form action='order_product_view.php' method='post'><td>
                            <input type='hidden' name='order_id' value=" . $row["order_id"] . ">
                    
                            <button id='update' name='viewItem'> View</button></td></form>
                            
                            <form action='orderview.php' method='post'>
                            <td>
                            <input type='hidden' name='order_id' value=" . $row["order_id"] . ">
                            <button id='bin' name='deleteOrder'><i class='ri-delete-bin-line'></i></button> </td>
                            </form>

                  </tr>";
                        }
                    }

                    ?>




                </table>


            </div>




        </div>
    </div>
    <div class="bottom-box">
        <div class="button">
            
        </div>

    </div>


</div>







</body>

</html>