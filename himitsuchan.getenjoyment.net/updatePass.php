<?php
error_reporting(E_ERROR | E_PARSE);

$host = "fdb28.awardspace.net";
$username = "3775139_db";
$password = "Password12345!";
$database = "3775139_db";

include_once 'dictionary.class.php';
$dictionary = new Dictionary("c13058f5", "b49c649fa87a426fc1a0d5391156b9bd", "en-gb");

$conn = new mysqli($host, $username, $password, $database);

session_start();

if (!isset($_SESSION['uName'])) {

    header("Location: login.php");
}

if (isset($_POST["regBtn"])) {
    $uName = $_SESSION['uName'];
    $confirmPass = $_POST['currPass'];
    $pass = $_POST["pass"];
    $cPass = $_POST["cPass"];

    $secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
    $encryptionMethod = "AES-256-CBC";

    $encrypteduName = openssl_encrypt($uName, $encryptionMethod, $secretHash);

    $sql = "SELECT * FROM accs_tbl WHERE emp_uName = '$encrypteduName'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_array()) {
        $oldPass = $row['emp_password'];
        $fname = $row['emp_fname'];
        $lname = $row['emp_lname'];
    }

    $hashedCurrPass = sha1($confirmPass);
    $hashedPass = sha1($pass);

    $sql1 = "SELECT emp_password FROM oldpass_tbl WHERE emp_uName = '$encrypteduName'";
    $result1 = $conn->query($sql1);
    $history = array();

    while ($row = $result1->fetch_array()) {
        $history[] = $row['emp_password'];
    }

    $index = count($history);
    if ($index > 6) {
        $i = 6;
    } else {
        $i = $index;
    }

    $a = array();
    for ($x = 0; $x < $i; $x++) {
        array_push($a, $history[--$index]);
    }

    function checkname($pass, $name, $offset = 0)
    {
        if (!is_array($name)) $name = array($name);
        foreach ($name as $n) {
            if (stripos($pass, $n, $offset) !== false) {
                return false;
            }
        }
        return true;
    }

    $wordsarray = explode("\n", file_get_contents('assets/english3.txt'));


    function strposa($haystack, $needle, $offset = 0)
    {
        if (!is_array($needle)) $needle = array($needle);
        foreach ($needle as $query) {
            if (stripos($haystack, $query, $offset) !== false) return false;
        }
        return true;
    }


    if ($oldPass == $hashedCurrPass) {
        if (checkname($pass, explode(" ", $fname)) && checkname($pass, explode(" ", $lname)) && (stripos($pass, $uName) === false)) {
            if ($oldPass != $hashedPass) {
                if (!(in_array($hashedPass, $a))) {
                    if ($pass == $cPass) {
                        if (strposa($pass, $words, 1)) {
                            $sql1 = "INSERT INTO oldpass_tbl (emp_uName , emp_password) VALUES ('$encrypteduName', '$hashedPass')";
                            $sql = "UPDATE accs_tbl SET emp_password = '$hashedPass', start_date = NOW() WHERE emp_uName = '$encrypteduName'";

                            if ($conn->query($sql1) == true) {
                                if ($conn->query($sql) == true) {
                                    echo "<script>alert('Updated Successfully!');window.location='accountSettings.php';</script>";
                                }
                            } else {

                                echo $conn->error;
                            }
                        } else {
                            echo "<script>alert('Password cannot contain a word from the dictionary');window.location='updatePass.php';</script>";
                        }
                    } else {
                        echo "<script>alert('Password Does Not Match');window.location='updatePass.php';</script>";
                    }
                } else {
                    echo "<script>alert('Password cannot be the same as previous passwords');window.location='updatePass.php';</script>";
                }
            } else {
                echo "<script>alert('New Password Cant be Your current Password');window.location='updatePass.php';</script>";
            }
        } else {
            echo "<script>alert('Password cant be your first name or last name or username');window.location='updatePass.php';</script>";
        }
    } else {
        echo "<script>alert('Wrong Password');window.location='updatePass.php';</script>";
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="logo.png" type="image/png">
    <title>Update Password</title>
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
        <h1>Update Password</h1>
        <div class="contact-form">

            <div class="signin">
                <form method="POST" enctype="multipart/form-data">

                    <p> Current Password </p>
                    <input class="passReg" type="password" name="currPass" id="currPass" minlength="10" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{10,}$" title="Password does not conform to the Password Policy." required> <br>
                    <p> Password </p>
                    <input class="passReg" type="password" name="pass" id="pass" minlength="10" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{10,}$" title="Password does not conform to the Password Policy." required> <br>

                    <div id="message">
                        <h3>Password must contain the following:</h3>
                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                        <p id="number" class="invalid">A <b>number</b></p>
                        <p id="specialChara" class="invalid">A <b>special</b> characters</p>
                        <p id="length" class="invalid">Minimum <b>10 characters</b></p>
                    </div>

                    <script>
                        var myInput = document.getElementById("pass");
                        var letter = document.getElementById("letter");
                        var capital = document.getElementById("capital");
                        var specialChara = document.getElementById("specialChara");
                        var number = document.getElementById("number");
                        var length = document.getElementById("length");

                        // When the user clicks on the password field, show the message box
                        myInput.onfocus = function() {
                            document.getElementById("message").style.display = "block";
                        }

                        // When the user clicks outside of the password field, hide the message box
                        myInput.onblur = function() {
                            document.getElementById("message").style.display = "none";
                        }

                        // When the user starts to type something inside the password field
                        myInput.onkeyup = function() {
                            // Validate lowercase letters
                            var lowerCaseLetters = /[a-z]/g;
                            if (myInput.value.match(lowerCaseLetters)) {
                                letter.classList.remove("invalid");
                                letter.classList.add("valid");
                            } else {
                                letter.classList.remove("valid");
                                letter.classList.add("invalid");
                            }
                            // Validate capital letters
                            var upperCaseLetters = /[A-Z]/g;
                            if (myInput.value.match(upperCaseLetters)) {
                                capital.classList.remove("invalid");
                                capital.classList.add("valid");
                            } else {
                                capital.classList.remove("valid");
                                capital.classList.add("invalid");
                            }

                            // Validate numbers
                            var numbers = /[0-9]/g;
                            if (myInput.value.match(numbers)) {
                                number.classList.remove("invalid");
                                number.classList.add("valid");
                            } else {
                                number.classList.remove("valid");
                                number.classList.add("invalid");
                            }

                            var specialCharacters = /[#?!@$%^&*-]/g;
                            if (myInput.value.match(specialCharacters)) {
                                specialChara.classList.remove("invalid");
                                specialChara.classList.add("valid");
                            } else {
                                specialChara.classList.remove("valid");
                                specialChara.classList.add("invalid");
                            }
                            // Validate length
                            if (myInput.value.length >= 10) {
                                length.classList.remove("invalid");
                                length.classList.add("valid");
                            } else {
                                length.classList.remove("valid");
                                length.classList.add("invalid");
                            }
                        }
                    </script>
                    <p>Confirm Password </p>
                    <input name="cPass" type="password" class="passReg" value="" />

                    <input name="regBtn" type="submit" value="Update Password" />
                </form>
            </div>
            <p> <a class="aReg" href="accountSettings.php"> Cancel</a></p>
        </div>
    </div>
    <div class="footer">
        <p>Made By Group3</p>
    </div>
</body>

</html>