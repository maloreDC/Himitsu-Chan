<?php
error_reporting(E_ERROR | E_PARSE);

$host = "fdb28.awardspace.net";
$username = "3775139_db";
$password = "Password12345!";
$database = "3775139_db";

$conn = new mysqli($host, $username, $password, $database);

session_start();
if (!isset($_SESSION['uName'])) {

  header("Location: login.php");
}

$uName = $_SESSION['uName'];

?>


<!DOCTYPE HTML>

<html>

<head>
  <link rel="icon" href="logo.png" type="image/png">
  <title>Account Settings</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>

  <!-- Header -->
  <header id="header">
    <h1><strong>
        <a href="profile.php"><?php echo $uName ?>'s</a>
      </strong> Himitsus</h1>
    <nav id="nav">
      <ul>
        <li><a href="home.php">Home</a></li>

        <li><a href="logout.php">Log-Out</a></li>
      </ul>
    </nav>
  </header>

  <a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

  <!-- Main -->
  <section id="main" class="wrapper">
    <div class="container">
      <header class="major special">
        <h2>Account Settings</h2>
      </header>
      <ul class="alt">
        <?php

        $secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
        $encryptionMethod = "AES-256-CBC";

        $encrypteduName = openssl_encrypt($uName, $encryptionMethod, $secretHash);

        $sql = "SELECT * FROM accs_tbl WHERE emp_uName = '$encrypteduName'";
        $result = $conn->query($sql);


        while ($row = $result->fetch_array()) {
        ?>
          <li><a href="updateAccInfo.php?id=<?= $row['id']; ?>&url=<?= $row['emp_profile']; ?>&fname=<?= $decryptedMessage = openssl_decrypt($row['emp_fname'], $encryptionMethod, $secretHash); ?>&lname=<?= $decryptedMessage = openssl_decrypt($row['emp_lname'], $encryptionMethod, $secretHash); ?>&mPhone=<?= $row['emp_mPhone']; ?>&email=<?= $decryptedMessage = openssl_decrypt($row['emp_email'], $encryptionMethod, $secretHash); ?>&bDate=<?= $row['emp_bDate']; ?>&gender=<?= $row['emp_gender']; ?>" class="button fit" name="accInfoBtn">Update Account Info</a></li>
        <?php
        }
        ?>
        <li><a href="updatePass.php" name="passBtn" class="button fit">Change Password</a></li>
      </ul>
    </div>
  </section>

  <!-- Footer -->
  <footer id="footer">
    <div class="container">

      <ul class="copyright">
        <li>&copy; Himitsu-Chan</li>
        <li>Design: Group 3</li>
        <li>Images: CTTO</li>
      </ul>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/skel.min.js"></script>
  <script src="assets/js/util.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>