<?php
session_start();
include("header-onlineorder.php");



require_once("db_conn.php");
$orderId = $_POST["order_id"];


if (isset($_POST["confirmOrder"])) {

    $orderId = $_POST["order_id"];



    $sql = "UPDATE order_table SET order_status = 'Confirmed' WHERE order_id = $orderId";

    mysqli_query($conn, $sql);
}




?>

<main class="account-main">

    <section class="account-view">

        <div class=account-container>
            <div class="account-card">
                <div class="account-heading">
                    <p>
                        Orders
                    </p>

                </div>
                <div class="account-info">

                    <div class="account-summary">
                        <div class="account-box">
                            <div class="account-heading-box">
                                <p class="user-name">My Account</p>

                            </div>
                            <div class="account-icon-box">
                                <i class="bi bi-person-circle"></i>


                            </div>
                            <div class="account-username-box">
                                <p class="welcome">Welcome!</p>
                                <p class="name">Ashane Lakshitha</p>
                            </div>

                            <div class="button-box">
                            <a href="account.php"><button class="viewbutton">
                                    Account
                                </button></a>

                                <a href="feedbackform.php"><button class="viewbutton">
                                    Give Feedback
                                </button></a>

                                <a href="admin/logout.php"><button class="viewbutton">
                                    Log Out
                                </button></a>
                            </div>

                        </div>

                    </div>

                    <div class="account-table">






                        <div class="table-section-item">


                        <div class="table-container">
                        <div class="sort-button-box">


<form action="vieworder.php"><button class="filter">Back</button></form>
</div>

<div class="table-box">

    <table id="rows-def">
        <tr id="table-head">
            <th>ORDER ID</th>
            <th>ITEM NAME</th>
            <th>QUANTITY</th>

        </tr>

        <?php


        $sql = "SELECT * FROM order_item
        INNER JOIN item ON order_item.item_id = item.item_id
        WHERE $orderId =order_id";

        $result = mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);

        if ($queryResults > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                echo "
                <tr>
              <td id='ID'>" . $row["order_id"] . "</td>
              <td> " . $row["item_name"] . "</td>
              <td>" . $row["qty"] . "</td>


          </tr>";
            }
        }

        ?>

    </table>


</div>


</div>
                        </div>






                        </body>

                        </html>


                    </div>



                </div>
            </div>



        </div>

    </section>
</main>