<?php
session_start();
include("header-onlineorder.php");



require_once("db_conn.php");






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


                            <div class="table-container-item">

                                <div class="table-box">

                                    <table id="rows-def">
                                        <tr id="table-head">
                                            <th>ORDER ID</th>

                                            <th>FIRST NAME</th>
                                            <th>LAST NAME</th>
                                            <th>PHONE NO</th>
                                            <th>EMAIL</th>
                                            <th>TOWN</th>
                                            <th>ADDRESS</th>
                                            <th>TOTAL</th>
                                            <th>PAY METHOD</th>

                                            <th>VIEW</th>

                                        </tr>


                                        <?php


                                        $sql = "SELECT * FROM order_table";


                                        $result = mysqli_query($conn, $sql);
                                        $queryResults = mysqli_num_rows($result);

                                        if ($queryResults > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {

                                                echo "
                            <tr>
                      <td id='ID'>" . $row["order_id"] . "</td>

                      <td> " . $row["first_name"] . "</td>
                      <td>" . $row["last_name"] . "</td>
                      <td>" . $row["phone_number"] . "</td>
                      <td>" . $row["email"] . "</td>
                      <td>" . $row["town"] . "</td>
                      <td>" . $row["address"] . "</td>
                      <td>" . $row["total"] . "</td>
                      <td>" . $row["payment_method"] . "</td>
                      <input type='hidden' name='order_id' value=" . $row["order_id"] . ">";

                                                echo "
                            <form action='vieworder_product.php' method='post'><td>
                            <input type='hidden' name='order_id' value=" . $row["order_id"] . ">
                    
                            <button id='update' name='viewItem'> View</button></td></form>
                            


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