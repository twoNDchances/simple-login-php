<?php
    // session_start();
    include('config.php');
    include('base.php');
    $errorMessage = "";
    if (isset($_SESSION['username'])) {
        header('location:welcome.php');
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (!(empty($username) && empty($password))) {
            $get_user = "SELECT id FROM user WHERE username = '$username' AND passcode = '$password';";
            if (mysqli_num_rows($connect_sql_database->query($get_user)) == 1) {
                $_SESSION['username'] = $username;
                header('location: welcome.php');
            }
            else {
                $errorMessage = "Your account isn't exists or wrong input!";
            }
        }
        else {
            $errorMessage = "Please enter your username and password for login!";
        }
    }
    if (isset($_GET['message']) and $_GET['message'] == 'success') {
        echo "Register done, you can login now!";
    }
?>

<html>
    <head>
        <title>Login</title>
    </head>

    <body>
        <form action="login.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Username">
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password">
            <br>
            <input type="submit" value="Login" name="login">
        </form>
        <?php 
            if (isset($errorMessage)) {
                echo $errorMessage;
            }
        ?>
    </body>
</html>