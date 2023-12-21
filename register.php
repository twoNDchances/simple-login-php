<?php
    // session_start();
    include('config.php');
    include('base.php');
    if (isset($_SESSION['username'])) {
        header('location:welcome.php');
    }
    $message = "";
    if ($connect_sql_database) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (!(empty($username) && empty($password))) {
                $check_user = "SELECT id FROM user WHERE username = '$username';";
                if (mysqli_num_rows($connect_sql_database->query($check_user)) == 0) {
                    $new_user = "INSERT INTO user(username, passcode) VALUES('$username', '$password');";
                    $connect_sql_database->query($new_user);
                    header('location:login.php?message=success');
                }
                else {
                    $message_register = "Your username existed!";
                }
            }
            else {
                $message_register = "Please enter your username and password!";
            }
        }
    }
    else {
        $message_register = "Something went wrong!";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register</title>
    </head>
    <body>
        <form action="register.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username">
            <br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password">
            <br>
            <input type="submit" value="Register" name="register">
        </form>
        <?php
            if (isset($message_register)) {
                echo $message_register;
            }
        ?>
    </body>
</html>