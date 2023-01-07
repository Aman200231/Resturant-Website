<?php include('partials-front/menu.php'); ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo HOMEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php
        if (isset($_SESSION['order'])) {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php  
                // To Display categories from databse that are active and featured
                // Creating SQL Query 
                $sql = "SELECT * FROM tbl_category 
                        WHERE Active = 'Yes' AND Featured = 'Yes' 
                        LIMIT 3";
                // Executing query
                $res = mysqli_query($conn, $sql);

                // Counting rows to check whether categories are available
                $count = mysqli_num_rows($res);

                // Checking whether categories are available 
                if($count > 0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        // Getting values such as id, title, image
                        $id = $row['id'];
                        $title = $row['Title'];
                        $image_name = $row['Image_name'];

                        ?>
                            <a href="<?php echo HOMEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                                <div class="box-3 float-container">

                                    <?php
                                        // Checking whether image is available
                                        if($image_name == "")
                                        {
                                            echo "<div class = 'red'> Image Not Available </div>";
                                        }
                                        else
                                        {
                                            ?>
                                            <img src="<?php echo HOMEURL; ?>images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>

                                    <h3 class="float-text text-white"><?php echo $title; ?></h3>
                                </div>
                            </a>
                        <?php
                        
                    }
                }
                else
                {
                    echo "<div class = 'red'> Category Not Added </div>";
                }

            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                // To Display Foods from databse that are active and featured
                // Creating SQL Query
                $sql2 = "SELECT * FROM tbl_food 
                WHERE Active = 'Yes' AND Featured = 'Yes'
                LIMIT 6 ";

                // Executing query
                $res2 = mysqli_query($conn, $sql2);

                // Counting rows to check whether foods are available
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

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>