<?php

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

  $pass = $_POST["pass"];
  $id = $_GET['id'];

  $sql = "SELECT emp_password FROM accs_tbl where emp_uName = '$uName'";
  $result = $conn->query($sql);


  while ($row = $result->fetch_array()) {
    $checkPassword = $row['emp_password'];
  }

  if ($pass == $checkPassword) {


    $file_tmp = $_FILES['profile']['tmp_name'];
    $target_dir = "img/";
    $url = $target_dir . basename($_FILES["profile"]["name"]);
    move_uploaded_file($file_tmp, $url);

    $sql = "UPDATE accs_tbl SET emp_profile = '$url' WHERE emp_uName = '$uName'";

    if ($conn->query($sql) == true) {

      echo "<script>alert('Updated Successfuly');window.location='accountSettings.php';</script>";
    } else {

      echo $conn->error;
    }
  } else {
    echo "<script>alert('Wrong Password');</script>";
  }
}

?>

<html>

<link rel="stylesheet" href="css/register.css">

<head>
  <link rel="icon" href="logo.png" type="image/png">
  <title>Himitsu-chan</title>
</head>

<body>

  <div class="regPanel">

    <h1>Update Account</h1>

    <form method="POST" enctype="multipart/form-data">

      <label>Profile:</label>
      <img id="myImg" src="img/user.png">
      <input type="file" name="profile" id="uploadfile">

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

      <input name="pass" type="password" placeholder="Confirm Password to change" required> <br>

      <input class="register" name="regBtn" type="submit" value="Update">

    </form>
    <h6> <a href="accountSettings.php"> Cancel </a> </h6>

  </div>

</body>

</html>