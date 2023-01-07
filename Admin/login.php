<?php include('../config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/Admin.css">
</head>

<body>
    <div class="login">
        <h1 class="text-center">Login</h1>

        <br>

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login']; // Displaying Session
            unset($_SESSION['login']); // Removing Session
        }

        if (isset($_SESSION['no-login'])) {
            echo $_SESSION['no-login']; // Displaying Session
            unset($_SESSION['no-login']); // Removing Session
        }
        ?>

        <br>

        <!-- Login Form -->
        <form action="" method="post">
            <table>
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Enter Password">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="submit" value="Login" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>

<?php
// Checking if the submit button is clicked
if (isset($_POST['submit'])) {
    // Getting data from form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Query to Check whether username and password exists
    $sql = "SELECT * FROM tbl_admin 
            WHERE Username = '$username'
            AND Password = '$password' ";

    // Executing Query
    $res = mysqli_query($conn, $sql);

    // Counting rows to check whether user exists
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        // User found and Login Successfully
        $_SESSION['login'] = "<div class='green'>Logged-in Successfully</div>";
        $_SESSION['user'] = $username; // To Check whether user is logged in and logout will unset it

        // Redirect to Manage admin page
        header('location:' . HOMEURL . 'admin/');
    } else {
        // User not found and Login failed
        $_SESSION['login'] = "<div class='red'>Username or Password did not match</div>";
        // Redirect to Manage admin page
        header('location:' . HOMEURL . 'admin/login.php');
    }
}
?>