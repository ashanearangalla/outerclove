<?php
session_start();
require_once("db_conn.php");

include("header-onlineorder.php");
?>

<main>



    <section class="menu-search">

        <div class="sort-items">
            <div class="sort-heading">
                <p>
                    Search Items
                </p>
                <form method="post" action="search.php">
                    <div class="sort-bar">

                        <div class="sort-box">
                            <p>Preferences</p>
                            <div class="select-opt">

                                <select name="diet" onchange='this.form.submit()'>
                                    <option value="0" selected>All</option>
                                    <?php


                                    $sql = "SELECT * FROM diet_preference";




                                    $result = mysqli_query($conn, $sql);
                                    $queryResults = mysqli_num_rows($result);


                                    if ($queryResults > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if (isset($_POST["diet"]) &&  $_POST["diet"] > 0) {
                                                $optionValue = $row["diet_pref_id"];
                                                $optionText = $row["diet_pref_name"];
                                                $isSelected = ($optionValue ==  $_POST["diet"]) ? 'selected' : ''; // Check if it's the default option

                                                echo "<option value='$optionValue' $isSelected>$optionText</option>";
                                            } else {
                                                echo "<option value='" . $row["diet_pref_id"] . "'>" . $row["diet_pref_name"] . "</option>";
                                            }
                                        }
                                    }
                                    ?>



                                </select>
                            </div>

                        </div>

                        <div class="sort-box">
                            <p>Cuisine types</p>
                            <div class="select-opt">
                                <select name="cuisine" onchange='this.form.submit()'>
                                    <option value="0" selected>All</option>
                                    <?php
                                    $sql = "SELECT * FROM cuisine_type";

                                    $result = mysqli_query($conn, $sql);
                                    $queryResults = mysqli_num_rows($result);


                                    if ($queryResults > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if (isset($_POST["cuisine"]) &&  $_POST["cuisine"] > 0) {
                                                $optionValue = $row["cuisine_id"];
                                                $optionText = $row["cuisine_name"];
                                                $isSelected = ($optionValue ==  $_POST["cuisine"]) ? 'selected' : ''; // Check if it's the default option

                                                echo "<option value='$optionValue' $isSelected>$optionText</option>";
                                            } else {
                                                echo "<option value='" . $row["cuisine_id"] . "'>" . $row["cuisine_name"] . "</option>";
                                            }
                                        }
                                    }
                                    ?>

                                </select>
                            </div>

                        </div>

                        <div class="sort-box">
                            <p>Categories</p>
                            <div class="select-opt">
                                <select name="category" onchange='this.form.submit()'>
                                    <option value="0" selected>All</option>
                                    <?php
                                    $sql = "SELECT * FROM category";

                                    $result = mysqli_query($conn, $sql);
                                    $queryResults = mysqli_num_rows($result);


                                    if ($queryResults > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row["category_id"] . "'>" . $row["category_name"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>



                    </div>
                </form>
            </div>

        </div>

        <div class="menu-container">
            <div class="menu-card">
                <div class="menu-heading-search">
                    <?php

                    if (isset($_POST["search"]) || isset($_POST["cuisine"]) || isset($_POST["category"]) || isset($_POST["diet"])) {


                        if (isset($_POST["search"])) {
                            $search = mysqli_real_escape_string($conn, $_POST["search"]);
                            $sql = "SELECT * FROM item 
                            INNER JOIN category ON item.category_id = category.category_id 
                            WHERE item_name LIKE '%$search%' OR  category_name LIKE '%$search%'";
                        } elseif (isset($_POST["cuisine"]) &&  $_POST["cuisine"] > 0) {

                            $sql = "SELECT * FROM item 
                            WHERE cuisine_id = " . $_POST["cuisine"] . "";
                        } elseif (isset($_POST["category"]) &&  $_POST["category"] > 0) {

                            $sql = "SELECT * FROM item 
                            WHERE category_id = " . $_POST["category"] . "";
                        } elseif (isset($_POST["diet"]) &&  $_POST["diet"] > 0) {

                            $sql = "SELECT * FROM item 
                        WHERE diet_pref_id = " . $_POST["diet"] . "";
                        } else {
                            $sql = "SELECT * FROM item";
                        }

                        $result = mysqli_query($conn, $sql);

                        $queryResults = mysqli_num_rows($result);

                        echo "<p>
                        Search Results<p class='results'>({$queryResults} Results)</p>
                    </p>";


                    ?>


                </div>
                <div class="menu-list-search">
                <?php

                        if ($queryResults > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '
                            <a href="itemview.php?item_id=' . $row["item_id"] . '">
                                <div class="item">

                                    <img id="resturant-image" src="images/' . $row["item_image"] . '" alt="">
                                    <p class="order-item-name">
                                        ' . $row["item_name"] . '
                                    </p>
                                    <div class="prices-online">
                                    <p class="price-online">LKR ' . $row["item_price"] . '</p>
                                    <p class="total-online">LKR ' . $row["total_price"] . '</p>
                                    </div>
                                </div>
                            </a>';
                            }
                        } else {
                        }
                        echo '</div>';
                    }
                ?>








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