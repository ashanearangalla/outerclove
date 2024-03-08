<?php
include("header.php");
$categoryId = $_GET["category_id"];
?>

<section class="cover-menu">

    <div class="cover-image-menu">


        <p>Menu</p>

    </div>

</section>


<section class="container-menu-categories">


    <div class="menu-category-list">

        <div class="menu-categories">

            <ul>
                <?php
                $sql = "SELECT * FROM category";

                $result = mysqli_query($conn, $sql);
                $queryResults = mysqli_num_rows($result);


                if ($queryResults > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo ' <li><a href="menu.php?category_id=' . $row["category_id"] . '">' . $row["category_name"] . '</a></li>';
                    }
                }
                ?>


            </ul>
        </div>

    </div>





</section>

<section class="menu">
    <div class="menu-container">
        <div class="menu-card">
            <div class="menu-heading">
                <?php

                $sql = "SELECT * FROM category WHERE category_id=$categoryId";

                $result = mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($result);

                echo '<p>' . $row["category_name"] . '</p>';
                
                ?>
            </div>
            <div class="menu-list">
                <?php
                $sql = "SELECT * FROM item WHERE category_id=$categoryId";

                $result = mysqli_query($conn, $sql);
                $queryResults = mysqli_num_rows($result);

                if ($queryResults > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo '<div class="item">
                                <div class="name-price">
                                    <p>
                                        ' . $row["item_name"] . '    
                                    </p>
                                    <p>
                                        Rs ' . $row["total_price"] . '    
                                    </p>
                                </div>
                                <div class="description">
                                    <p>
                                    ' . $row["item_description"] . '   
                                    </p>
                                </div>
    
                            </div>';
                    }
                }
                ?>

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