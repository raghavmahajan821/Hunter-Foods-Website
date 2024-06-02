<?php include('../config/constants.php'); ?>

<html>

<head>
    <title>Login - Food Order System</title>
    <link rel="stylesheet" href="../css/loginstyles.css">
</head>

<body>
    <div class="container">
        <!-- Login Form Starts Here -->
        <form class="login-form" action="" method="POST">
            <h2>Admin Login</h2>
            <?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if (isset($_SESSION['no-login-message'])) {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
            ?>
            <br>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required />
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required />
            </div>
            <input type="submit" name="submit" value="Login" class="submit">
        </form>
        <!-- Login Form Ends HEre -->
    </div>
</body>

</html>

<?php

//CHeck whether the Submit Button is Clicked or NOt
if (isset($_POST['submit'])) {
    //Process for Login
    //1. Get the Data from Login form
    // $username = $_POST['username'];
    // $password = md5($_POST['password']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);

    $raw_password = md5($_POST['password']);
    $password = mysqli_real_escape_string($conn, $raw_password);

    //2. SQL to check whether the user with username and password exists or not
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    //3. Execute the Query
    $res = mysqli_query($conn, $sql);

    //4. COunt rows to check whether the user exists or not
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        //User AVailable and Login Success
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

        //REdirect to HOme Page/Dashboard
        header('location:' . SITEURL . 'admin/');
    } else {
        //User not Available and Login FAil
        $_SESSION['login'] = "<div class='error text-center'>Username or Password didn't match.</div>";
        //REdirect to HOme Page/Dashboard
        header('location:' . SITEURL . 'admin/login.php');
    }
}

?>