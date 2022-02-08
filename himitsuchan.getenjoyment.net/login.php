<?php
session_start();
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
if (isset($_SESSION["locked"])) {
    $difference = time() - $_SESSION["locked"];
    if ($difference > 30) {
        unset($_SESSION["locked"]);
        unset($_SESSION["login_attempts"]);
    }
}

$host = "fdb28.awardspace.net";
$username = "3775139_db";
$password = "Password12345!";
$database = "3775139_db";


$conn = new mysqli($host, $username, $password, $database);

if ($conn) {
} else {

    echo $conn->error;
}

if (isset($_POST["logBtn"])) {

    $uName = $_POST["uName"];
    $pass = $_POST["pass"];

    $secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
    $encryptionMethod = "AES-256-CBC";

    $encrypteduName = openssl_encrypt($uName, $encryptionMethod, $secretHash);

    $query = "SELECT id FROM accs_tbl WHERE emp_uName = '$encrypteduName' and start_date < DATE_SUB(NOW(), INTERVAL 20 Day) and start_date > DATE_SUB(NOW(), INTERVAL 30 Day) ";
    $test = $conn->query($query);

    $sql = "SELECT emp_password FROM accs_tbl WHERE emp_uName = '$encrypteduName'";
    $result = $conn->query($sql);



    while ($row = $result->fetch_array()) {
        $hashedPass = $row['emp_password'];
    }


    $curr = sha1($pass);

    if ($curr == $hashedPass) {
        if (@mysqli_num_rows($test) == 1) {

            $_SESSION['uName'] = $uName;
            echo "<script> alert('Welcome $uName! You need to change your password soon!'); window.location='home.php'; </script>";
        } else {
            $sql = "SELECT id FROM accs_tbl WHERE emp_uName = '$encrypteduName'";
            $result = $conn->query($sql);
            if (@mysqli_num_rows($result) == 1) {

                $_SESSION['uName'] = $uName;
                echo "<script> alert('Welcome $uName!'); window.location='home.php'; </script>";
            } else {
                $_SESSION["login_attempts"] += 1;
                echo "<script> alert('Invalid Username or Password'); window.location='login.php'; </script>";
            }
        }
    } else {
        $_SESSION["login_attempts"] += 1;
        echo "<script> alert('Invalid Username or Password'); window.location='login.php'; </script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="logo.png" type="image/png">
    <title>Himitsu-chan</title>
    <!-- For-Mobile-Apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="User Icon Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //For-Mobile-Apps -->
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>

<body>
    <div class="container">
        <h1>Himitsu-Chan</h1>
        <div class="contact-form">
            <form method="POST">
                <div class="profile-pic">
                    <img src="images/1.png" alt="User Icon" />
                </div>
                <div class="signin">

                    <input name="uName" type="text" class="user" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" />
                    <input name="pass" type="password" class="pass" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" />
                    <p><a href="forgotPass.php">Forgot Password?</a></p>

                    <p><a href="register.php">Sign-Up</a></p>

                </div>
                <?php
                if ($_SESSION["login_attempts"] > 2) {
                    $_SESSION["locked"] = time();
                    echo "Please wait for 5 minutes before trying again";
                } else {
                ?>
                    <input name="logBtn" type="submit" value="Login" />
                <?php } ?>
            </form>
        </div>
    </div>
    <div class="footer">
        <p>Made By Group3</p>
    </div>
</body>

</html>