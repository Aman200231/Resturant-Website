<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
                // Getting the search keyword
                $search = $_POST['search'];
            ?>
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                // Getting search keyword
                $search = $_POST['search'];

                // SQL query to get foods based on the keyword
                $sql = "SELECT * FROM tbl_food 
                        WHERE Title LIKE '%$search%' OR Description LIKE '%$search%' ";
                
                // Executing Query
                $res = mysqli_query($conn, $sql);

                // Counting rows 
                $count = mysqli_num_rows($res);

                // Checking whether foods are available
                if($count > 0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        // Getting values such as id, title, image
                        $id = $row['id'];
                        $title = $row['Title'];
                        $price = $row['Price'];
                        $description = $row['Description'];
                        $image_name = $row['Image_name'];

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

                                    <a href="#" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        <?php
                    }
                }
                else
                {
                    echo "<div class = 'red'> Food Not Found </div>";
                }
            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>