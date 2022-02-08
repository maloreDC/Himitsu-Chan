<?php

error_reporting(E_ERROR | E_PARSE);

$host = "fdb28.awardspace.net";
$username = "3775139_db";
$password = "Password12345!";
$database = "3775139_db";

$conn = new mysqli($host, $username, $password, $database);

$secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
$encryptionMethod = "AES-256-CBC";



session_start();
if (!isset($_SESSION['uName'])) {

    header("Location: login.php");
}

$uName = $_SESSION['uName'];

$encrypteduName = openssl_encrypt($uName, $encryptionMethod, $secretHash);

$sql = "SELECT id FROM accs_tbl WHERE emp_uName = '$encrypteduName' and start_date > DATE_SUB(NOW(), INTERVAL 30 Day)";
$result = $conn->query($sql);

if (@mysqli_num_rows($result) != 1) {
    echo "<script> alert('$uName, please change your password!'); window.location='updatePass.php'; </script>";
}


if (isset($_POST["postBtn"])) {

    $post = $_POST["write"];
    $file_tmp = $_FILES['profile']['tmp_name'];
    $target_dir = "img/";
    $url = $target_dir . basename($_FILES["profile"]["name"]);
    move_uploaded_file($file_tmp, $url);

    $secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
    $encryptionMethod = "AES-256-CBC";

    $encrypteduNamepost = openssl_encrypt($post, $encryptionMethod, $secretHash);


    $sql = "INSERT INTO emp_post (emp_dateTime, emp_write, emp_pic, emp_uName) VALUES (current_timestamp(), ' $encrypteduNamepost', '$url','$encrypteduName')";

    if ($conn->query($sql) == true) {

        echo "<script>window.location='home.php';</script>";
    } else {

        echo $conn->error;
    }
}

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

<body class="landing">

    <!-- Header -->
    <header id="header" class="alt">
        <h1><strong><a href="profile.php"><?php echo $uName ?>'s</a></strong> Himitsu</h1>
        <nav id="nav">
            <ul>
                <li><a href="search.php">Search</a></li>
                <li><a href="accountSettings.php">Account Settings</a></li>
                <li><a href="logout.php">Log-Out</a></li>
            </ul>
        </nav>
    </header>

    <a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

    <!-- Banner -->
    <section id="banner">
        <form method="POST" enctype="multipart/form-data">
            <div class="12u$">
                <textarea name="write" type="text" id="message" placeholder="Enter your Himitsu" rows="6" required></textarea>
            </div>
            <div class="12u$">
                <ul class="actions">

                    <li><input name="postBtn" type="submit" value="Post Himitsu" class="special" /></li>
                    <li><input name="profile" class="button icon fa-download" type="file" value="Reset" /></li>

                    <script src="js/jquery.js"></script>
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
                </ul>

            </div>
        </form>
    </section>

    <!-- One -->

    <?php

    $sql = "SELECT * FROM emp_post WHERE emp_uName = '$encrypteduName' ORDER BY emp_dateTime DESC ";
    $result = $conn->query($sql);


    $secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
    $encryptionMethod = "AES-256-CBC";

    while ($row = $result->fetch_array()) {
    ?>
        <section id="one" class="wrapper style1">
            <div class="container 75%">

                <?php
                if ($row['emp_pic'] != "img/") {
                ?>
                    <div class="row 200%">

                        <div class="6u 12u$(medium)">
                            <header class="major">
                                <div class="12u$"><span class="image fit"><img src="<?= $row['emp_pic'] ?>" alt="" /></span></div>
                            </header>
                        </div>
                        <div class="6u$ 12u$(medium)">
                            <a class="post" href="viewPost.php?id=<?= $row['id']; ?>">
                                <p><?= $decryptedMessage = openssl_decrypt($row['emp_write'], $encryptionMethod, $secretHash); ?></p>
                            </a>
                            <p><?= $row['emp_dateTime'] ?></p>
                        </div>

                    </div>
                    </a>
                <?php
                } else {
                ?>
                    <div class="row 200%">

                        <div class="6u 12u$(medium)">
                            <header class="major">
                                <div class="12u$"><span class="image fit"><img src="images/No_image_3x4.svg.png" alt="" /></span></div>
                            </header>
                        </div>
                        <div class="6u$ 12u$(medium)">
                            <a class="post" href="viewPost.php?id=<?= $row['id']; ?>">
                                <p><?= $decryptedMessage = openssl_decrypt($row['emp_write'], $encryptionMethod, $secretHash); ?></p>
                            </a>
                            <p><?= $row['emp_dateTime'] ?></p>
                        </div>

                    </div>

                <?php
                }
                ?>
            </div>
        </section>

    <?php
    }
    ?>

    <!-- Two -->



    <!-- Three -->



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