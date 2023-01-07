<?php include('partials/menu.php'); ?>

<!--main content starts here  -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>

        <br><br><br>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Food</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>

            <?php
                // Getting all orders from database
                $sql = "SELECT * FROM tbl_order";

                // Executing Query
                $res = mysqli_query($conn, $sql);

                // Counting rows
                $count = mysqli_num_rows($res);
                
                // Creating a serial number
                $sn = 1;

                if($count > 0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        // Getting all order details
                        $id = $row['id'];
                        $food = $row['Food'];
                        $price = $row['Price'];
                        $qty = $row['Qty'];
                        $total = $row['Total'];
                        $order_date = $row['Order_date'];
                        $status = $row['Status'];
                        $customer_name = $row['Customer_name'];
                        $customer_contact = $row['Customer_contact'];
                        $customer_email = $row['Customer_email'];
                        $customer_address = $row['Customer_address'];

                        ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $food; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $total; ?></td>
                                <td><?php echo $order_date; ?></td>
                                <td><?php echo $status; ?></td>
                                <td><?php echo $customer_name; ?></td>
                                <td><?php echo $customer_contact; ?></td>
                                <td><?php echo $customer_email; ?></td>
                                <td><?php echo $customer_address; ?></td>
                                <td> 
                                    <a href="#" class="btn-secondary">Update Order</a>
                                </td>
                            </tr>
                        <?php
                    }
                }
                else
                {
                    echo "<tr> <td colspan = '12' class = 'red'> Orders Not Available </td> </tr>";
                }
            ?>

            
        </table>
    </div>
</div>
<!--main content starts here  -->

<?php include('partials/footer.php'); ?>