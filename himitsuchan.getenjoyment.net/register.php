<?php
error_reporting(E_ERROR | E_PARSE);

require_once('PHPMailerAutoload.php');

$host = "fdb28.awardspace.net";
$username = "3775139_db";
$password = "Password12345!";
$database = "3775139_db";

include_once 'dictionary.class.php';
$dictionary = new Dictionary("c13058f5", "b49c649fa87a426fc1a0d5391156b9bd", "en-gb");

$conn = new mysqli($host, $username, $password, $database);




if ($conn) {
} else {

  echo $conn->error;
}

if (isset($_POST["regBtn"])) {
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $uName = $_POST["uName"];
  $pass = $_POST["pass"];
  $cPass = $_POST["cPass"];
  $bDate = $_POST["bDate"];
  $gender = $_POST["gender"];
  $email = $_POST["email"];
  $hash = md5(rand(0, 1000));

  $secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
  $encryptionMethod = "AES-256-CBC";

  $encrypteduName = openssl_encrypt($uName, $encryptionMethod, $secretHash);
  $encryptedemail = openssl_encrypt($email, $encryptionMethod, $secretHash);
  $encryptedfname = openssl_encrypt($fname, $encryptionMethod, $secretHash);
  $encryptedlname = openssl_encrypt($lname, $encryptionMethod, $secretHash);
  $encryptedgender = openssl_encrypt($gender, $encryptionMethod, $secretHash);


  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'ssl';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = '465';
  $mail->isHTML();
  $mail->Username = 'korosensei.sakata@gmail.com';
  $mail->Password = 'vbkqesxuehvddorl';
  $mail->SetFrom('admin@himitsuchan.getenjoyment.com');
  $mail->Subject = 'test';
  $mail->Body = 'test';
  $mail->addAddress('$email');



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

  $sql = "SELECT emp_uName FROM accs_tbl WHERE emp_uName = '$encrypteduName'";
  $result = $conn->query($sql);

  if ($row = $result->fetch_array()) {
    echo "<script>alert('Username Already taken');window.location='register.php';</script>";
  } else {

    if (checkname($pass, explode(" ", $fname)) && checkname($pass, explode(" ", $lname)) && (stripos($pass, $uName) === false)) {
      if ($pass == $cPass) {
        if (strposa($pass, $wordsarray, 1)) {
          $sql = "SELECT emp_email FROM accs_tbl WHERE emp_email = '$encryptedemail'";
          $result = $conn->query($sql);
          if ($row = $result->fetch_array()) {
            echo "<script>alert('Email already taken');window.location='register.php';</script>";
          } else {
            if ($gender != "null") {
              $hashedPass = sha1($pass);
              $file_tmp = $_FILES['profile']['tmp_name'];
              $target_dir = "img/";
              $url = $target_dir . basename($_FILES["profile"]["name"]);
              move_uploaded_file($file_tmp, $url);

              if ($url == "img/") {
                $url = "img/user.png";
              }

              $sql = "INSERT INTO accs_tbl (emp_fname , emp_lname , emp_uName , emp_password ,  emp_bDate, emp_gender, emp_email, emp_profile, hash_col)
              VALUES ('$encryptedfname', '$encryptedlname', '$encrypteduName', '$hashedPass', '$bDate', '$gender', '$encryptedemail', '$url','$hash')";
              $sql2 = "INSERT INTO oldpass_tbl (emp_uName, emp_password) VALUES ('$encrypteduName','$hashedPass')";
              if ($conn->query($sql) == true) {

                if ($conn->query($sql2) == true) {
                  echo "<script>alert('Registered Successfully ');window.location='login.php';</script>";
                }
              } else {
                echo $conn->error;
              }
            } else {
              echo "<script>alert('Please Select Gender');</script>";
            }
          }
        } else {
          echo "<script>alert('Password should not contain words from dictionary');</script>";
        }
      } else {
        echo "<script>alert('Password Does Not Match');</script>";
      }
    } else {
      echo "<script>alert('Password cant be your first name or last name or username');window.location='register.php';</script>";
    }
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <link rel="icon" href="logo.png" type="image/png">
  <title>Create Account</title>
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
    <h1>Register to Himitsu-Chan</h1>
    <div class="contact-form">
      <form method="POST" enctype="multipart/form-data">

        <div class="signin">


          <input name="fname" type="text" class="user" value="First Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}" />
          <input name="lname" type="text" class="user" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}" />
          <input name="uName" type="text" class="user" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" />
          <input name="email" type="email" class="user" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" />
          <p> Password </p>
          <input value="" class="passReg" type="password" name="pass" id="pass" minlength="10" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{10,}$" title="Password does not conform to the Password Policy." required> <br>

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
          <p>Birthday: </p>
          <input class="passReg" id="datefield" type='date' min='1899-01-01' max='2000-13-13' name="bDate" required></input>
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
          <p>Profile: </p>
          <img id="myImg" src="img/user.png" width="150" height="150">
          <input class="passReg" type="file" name="profile" id="uploadfile">

          <script src="js/jquery.js"> </script>
          <script>
            /*File Upload*/
            $(document).ready(function() {
              $('#uploadfile').change(function(e) {
                if (this.files && this.files[0]) {
                  var img = document.querySelector('#myImg');
                  img.src = URL.createObjectURL(this.files[0]);
                }
              });
            });
          </script>

        </div>
        <input name="regBtn" type="submit" value="Register" />
      </form>
      <p> Have an account?<a class="aReg" href="login.php"> Log-In</a></p>
    </div>

  </div>
  <div class="footer">

    <p>Made By Group3</p>
  </div>
</body>

</html>