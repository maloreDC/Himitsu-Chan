<?php
error_reporting(E_ERROR | E_PARSE);
$host = "fdb28.awardspace.net";
$username = "3775139_db";
$password = "Password12345!";
$database = "3775139_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn) {
} else {

    echo $conn->error;
}

session_start();
if (!isset($_SESSION['uName'])) {

    header("Location: login.php");
}

$uName = $_SESSION['uName'];

if (isset($_POST["regBtn"])) {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $bDate = $_POST["bDate"];
    $gender = $_POST["gender"];
    $mPhone = $_POST["mPhone"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $id = $_GET['id'];

    $secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
    $encryptionMethod = "AES-256-CBC";

    $encrypteduName = openssl_encrypt($uName, $encryptionMethod, $secretHash);
    $encryptedemail = openssl_encrypt($email, $encryptionMethod, $secretHash);
    $encryptedfname = openssl_encrypt($fname, $encryptionMethod, $secretHash);
    $encryptedlname = openssl_encrypt($lname, $encryptionMethod, $secretHash);
    $encryptedgender = openssl_encrypt($gender, $encryptionMethod, $secretHash);

    $sql = "SELECT emp_password FROM accs_tbl where emp_uName = '$encrypteduName'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_array()) {
        $hashedPass = $row['emp_password'];
    }
    $curr = sha1($pass);

    if ($curr == $hashedPass) {
        if ($gender != "null") {
            $sql = "UPDATE accs_tbl SET emp_fname = '$encryptedfname', emp_lname = '$encryptedlname',emp_bDate = '$bDate', emp_gender = '$encryptedgender', emp_mPhone = '$mPhone', emp_email='$encryptedemail' WHERE id= '$id'";

            if ($conn->query($sql) == true) {

                echo "<script>alert('Updated Successfuly');window.location='accountSettings.php';</script>";
            } else {

                echo $conn->error;
            }
        } else {
            echo "<script>alert('Please Select Gender');</script>";
        }
    } else {
        echo "<script>alert('Wrong Password');</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="logo.png" type="image/png">
    <title>Update Account Info</title>
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
        <h1>Update Account Info</h1>
        <div class="contact-form">
            <form method="POST" enctype="multipart/form-data">

                <div class="signin">


                    <input value="<?= $_GET['fname'] ?>" name="fname" type="text" class="user" value="First Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}" />
                    <input value="<?= $_GET['lname'] ?>" name="lname" type="text" class="user" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}" />
                    <input value="<?= $_GET['email'] ?>" name="email" type="text" class="user" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" />

                    <p>Birthday: </p>
                    <input value="<?= $_GET['bDate'] ?>" class="passReg" id="datefield" type='date' min='1899-01-01' max='2000-13-13' name="bDate" required></input>
                    <br>
                    <script>
                        var today = new Date();
                        var dd = today.getDate();
                        var mm = today.getMonth() + 1;
                        var yyyy = today.getFullYear() - 10;
                        if (dd < 10) {
                            dd = '0' + dd
                        }
                        if (mm < 10) {
                            mm = '0' + mm
                        }

                        today = yyyy + '-' + mm + '-' + dd;
                        document.getElementById("datefield").setAttribute("max", today);
                    </script>
                    <p>Gender: </p>
                    <select name="gender" required>
                        <option value="null">Select Gender </option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select> <br>
                    <p>Confirm Password to Update</p>
                    <input value="" class="passReg" type="password" name="pass" id="pass" minlength="10" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{10,}$" title="Password does not conform to the Password Policy." required> <br>

                </div>
                <input name="regBtn" type="submit" value="Update Acc" />
            </form>
            <p> <a class="aReg" href="accountSettings.php"> Cancel</a></p>
        </div>

    </div>
    <div class="footer">

        <p>Made By Group3</p>
    </div>
</body>

</html>