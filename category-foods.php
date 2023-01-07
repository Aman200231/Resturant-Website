<?php include('partials-front/menu.php'); ?>

    <?php
        // Checking whether id is passed
        if(isset($_GET['category_id']))
        {
            $category_id = $_GET['category_id'];
            // Getting category title based on caategory id
            // query
            $sql = "SELECT Title FROM tbl_category WHERE id = $category_id";

            // Executing query
            $res = mysqli_query($conn, $sql);

            // Getting the value from database
            $row = mysqli_fetch_assoc($res);

            // Getting title
            $category_title = $row['Title'];
        }
        else
        {
            header('location:' . HOMEURL);
        }

    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                // Create sql query to get food based on selected category
                $sql2 = "SELECT * FROM tbl_food WHERE category_id = $category_id";

                // Executing query 
                $res2 = mysqli_query($conn, $sql2);

                // Counting rows 
                $count2 = mysqli_num_rows($res2);

                // Checking whether food are available 
                if($count2 > 0)
                {
                    while($row2 = mysqli_fetch_assoc($res2))
                    {
                        // Getting values such as id, title, image
                        $id = $row2['id'];
                        $title = $row2['Title'];
                        $price = $row2['Price'];
                        $description = $row2['Description'];
                        $image_name = $row2['Image_name'];

                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                        // Checking whether image is available
                                        if($image_name == "")
                                        {
                                            echo "<div class = 'red'> Image Not Available </div>";
                                        }
                                        else
                                        {
                                            ?>
                                            <img src="<?php echo HOMEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price"><?php echo $price; ?>rs</p>
                                    <p class="food-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo HOMEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        <?php

                    }
                }
                else
                {
                    echo "<div class = 'red'> Food Not Available </div>";
                }
            ?>

            
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>