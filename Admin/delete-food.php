<?php
    // Including constants page
    include('../config/constants.php');

    // Checking whether value is passed 
    if(isset($_GET['id']) and isset($_GET['image_name']))
    {
        //  *****************  Getting id and image name ***********************************

        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // **********************************************************************************
        
        // ******************** Removing image if available *********************************

        // Checking whether image is available 
        if($image_name != "")
        {
            // Getting iamge path 
            $path = "../images/food/". $image_name;

            // Removing img file from folder
            $remove = unlink($path);

            // Checking whether img is removed successfully
            if($remove == false)
            {
                $_SESSION['upload'] = "<div class = 'red'> Failed to remove Image </div>";
                header('location:'. HOMEURL . 'admin/manage-food.php');
                // Stoping the process
                die();
            }
        }

        // *************************************************************************************

        // *************************** Delete Food data from Database **************************

        // Query 
        $sql = "DELETE FROM tbl_food WHERE id = $id";
        // Executing query 
        $res = mysqli_query($conn, $sql);

        // Checking whether the query is executed successfully
        if($res == true)
        {
            $_SESSION['delete'] = "<div class = 'green'> Food Deleted Successfully </div>";
            header('location:'. HOMEURL . 'admin/manage-food.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class = 'red'> Failed to Delete Food </div>";
            header('location:'. HOMEURL . 'admin/manage-food.php');   
        }
    }
    else
    { 
        $_SESSION['unauthorize'] = "<div class = 'red'> Unauthorized Access </div>";
        header('location:'. HOMEURL . 'admin/manage-food.php');
    }
?>