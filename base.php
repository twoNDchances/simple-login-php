<?php
global $message;
    session_start();
    if (!isset($_SESSION['username'])) {
        echo "<table>
            <tr>
                <td><a href=\"welcome.php\">Home</a></td>
                <td><a href=\"login.php\">Login</a></td>
                <td><a href=\"register.php\">Register</a></td>
            </tr>
        </table>";
        $message = "Welcome, Guest!";
    }
    else {
        echo "<table>
            <tr>
                <td><a href=\"welcome.php\">Home</a></td>
                <td><a href=\"logout.php\">Logout</a></td>
            </tr>
        </table>";
        $message = "Welcome, " . $_SESSION['username'];
    }
    if (strpos($_SERVER['REQUEST_URI'], 'base.php') != false) {
        header('location: welcome.php');
    }
?>