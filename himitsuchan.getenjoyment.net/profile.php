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
$secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
$encryptionMethod = "AES-256-CBC";
$encrypteduName = openssl_encrypt($uName, $encryptionMethod, $secretHash);


?>

<!DOCTYPE HTML>

<html>

<head>
  <link rel="icon" href="logo.png" type="image/png">
  <title>Himitsu-chan</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>

  <!-- Header -->
  <header id="header">
    <h1><strong>
        <?php echo $uName ?>'s
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
    <?php
    $sql = "SELECT * FROM accs_tbl WHERE emp_uName = '$encrypteduName'";
    $result = $conn->query($sql);


    while ($row = $result->fetch_array()) {
    ?>
      <div class="container">
        <header class="major special">
          <h2><?php echo $uName ?>'s Profile</h2>
        </header>
        <div class="12u$"><span class="image fit"><img src="<?= $row['emp_profile'] ?>" alt="" /></span></div>
        <ul class="alt">
          <li>Name:<?= $decryptedMessage = openssl_decrypt($row['emp_fname'], $encryptionMethod, $secretHash); ?> <?= $decryptedMessage = openssl_decrypt($row['emp_lname'], $encryptionMethod, $secretHash); ?></li>
          <li>Gender: <?= $row['emp_gender']; ?></li>
          <li>Email: <?= $decryptedMessage = openssl_decrypt($row['emp_email'], $encryptionMethod, $secretHash); ?></li>
          <li>Birthday: <?= $row['emp_bDate']; ?> </li>
        </ul>
      <?php
    }
      ?>

      <?php
      $sql = "SELECT * FROM emp_post WHERE emp_uName = '$encrypteduName'";
      $result = $conn->query($sql);


      while ($row = $result->fetch_array()) {
      ?>
        <section>
          <div class="box alt">
            <div class="row 50% uniform">
              <div class="4u"><span class="image fit"><img src="<?= $row['emp_pic'] ?>" alt="" /></span></div>
            </div>
          </div>


        </section>
      <?php
      }
      ?>
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