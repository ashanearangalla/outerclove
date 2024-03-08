<?php
session_start();
require_once("db_conn.php");



include("header-onlineorder.php");

?>

<main>
    <section class="cover">

        <div class="cover-image">




            <p>Online Order</p>



        </div>
    </section>


    <section class="menu">

        <div class="sort-items">
            <div class="sort-heading">
                <p>
                    Online Order
                </p>
                <div class="sort-bar">
                    <div class="sort-box">
                        <p>Preferences</p>
                        <div class="select-opt">
                        
                            <select>
                            <option selected>All</option>
                                <?php
                                $sql = "SELECT * FROM diet_preference";

                                $result = mysqli_query($conn, $sql);
                                $queryResults = mysqli_num_rows($result);

                                if ($queryResults > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option>" . $row["diet_pref_name"] . "</option>";
                                    }
                                }
                                ?>


                            </select>
                        </div>

                    </div>
                    <div class="sort-box">
                        <p>Cuisine types</p>
                        <div class="select-opt">
                            <select>
                            <option selected>All</option>
                                <?php
                                $sql = "SELECT * FROM cuisine_type";

                                $result = mysqli_query($conn, $sql);
                                $queryResults = mysqli_num_rows($result);


                                if ($queryResults > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option>" . $row["cuisine_name"] . "</option>";
                                    }
                                }
                                ?>

                            </select>
                        </div>

                    </div>
                    <div class="sort-box">
                        <p>Categories</p>
                        <div class="select-opt">
                            <select>
                            <option selected>All</option>
                                <?php
                                $sql = "SELECT * FROM category";

                                $result = mysqli_query($conn, $sql);
                                $queryResults = mysqli_num_rows($result);

                                if ($queryResults > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option>" . $row["category_name"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="sort-button-box">

                        <form action="search.php"><button class="filter">Filter</button></form>
                    </div>

                </div>
            </div>

        </div>

        <div class="menu-container">
            <?php
            $sql = "SELECT DISTINCT c.category_name,c.category_id,i.category_id FROM item i, category c
            WHERE c.category_id = i.category_id 
            ORDER BY c.category_id asc";

            $result = mysqli_query($conn, $sql);
            $queryResults = mysqli_num_rows($result);

            if ($queryResults > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo ' 
                    <div class="menu-card">
                    <div class="menu-heading">    
                        <p>
                            ' . $row["category_name"] . '
                        </p>
                        <div class="arrows">
                            <i class="fa-solid fa-angle-left"></i>
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </div>';
                    $sql2 = "SELECT * FROM category
                    INNER JOIN item ON item.category_id = category.category_id 
                    WHERE item.category_id=" . $row["category_id"] . "";

                    $result2 = mysqli_query($conn, $sql2);
                    $queryResults2 = mysqli_num_rows($result2);

                    echo '<div class="menu-list">';
                    if ($queryResults2 > 0) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {

                            echo '
                            <a href="itemview.php?item_id=' . $row2["item_id"] . '">
                                <div class="item">

                                    <img id="resturant-image" src="images/' . $row2["item_image"] . '" alt="">
                                    <p class="order-item-name">
                                        ' . $row2["item_name"] . '
                                    </p>
                                    <div class="prices-online">
                                    <p class="price-online">LKR ' . $row2["item_price"] . '</p>
                                    <p class="total-online">LKR ' . $row2["total_price"] . '</p>
                                    </div>
                                </div>
                            </a>';
                        }
                    }
                    echo '</div>
                    </div>';
                }
            }
            ?>



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