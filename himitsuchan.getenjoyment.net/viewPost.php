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
$id = $_GET['id'];

$uName = $_SESSION['uName'];

if (isset($_POST["saveBtn"])) {
    $write = $_POST["write"];
    $encryptedwrite = openssl_encrypt($write, $encryptionMethod, $secretHash);

    $sql = "UPDATE emp_post SET emp_write = '$encryptedwrite' WHERE id = '$id'";
    $result = $conn->query($sql);
    echo "<script>alert('Updated Successfully!');window.location='viewPost.php?id=$id';</script>";
}

if (isset($_POST["deleteBtn"])) {
    $sql = "DELETE FROM emp_post WHERE id='$id'";
    $result = $conn->query($sql);
    echo "<script>alert('Deleted Successfully!');window.location='home.php';</script>";
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

<body>

    <!-- Header -->
    <header id="header">
        <h1><strong><a href="profile.php"><?php echo $uName ?>'s</a></strong> Himitsu</h1>
        <nav id="nav">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="accountSettings.php">Account Settings</a></li>
                <li><a href="logout.php">Log-Out</a></li>
            </ul>
        </nav>
    </header>

    <a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="container">
            <?php
            $sql = "SELECT * FROM emp_post  WHERE id = '$id' ";
            $result = $conn->query($sql);

            $secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
            $encryptionMethod = "AES-256-CBC";

            while ($row = $result->fetch_array()) {
            ?>
                <header class="major special">
                    <h2><?= $row['emp_dateTime'] ?></h2>

                </header>
                <?php
                if ($row['emp_pic'] != "img/") {
                ?>
                    <a href="#" class="image fit"><img src="<?= $row['emp_pic'] ?>" alt="" /></a>
                    <p><?= $decryptedMessage = openssl_decrypt($row['emp_write'], $encryptionMethod, $secretHash); ?></p>
                <?php
                } else {
                ?>
                    <a href="#" class="image fit"><img src="images/No_image_3x4.svg.png" alt="" /></a>
                    <p><?= $decryptedMessage = openssl_decrypt($row['emp_write'], $encryptionMethod, $secretHash); ?></p>
                <?php
                }
                ?>
                <button class="open-button" onclick="openForm()">Edit</button>

                <div class="form-popup" id="myForm">
                    <form method="POST" class="form-container">
                        <h1>Edit Himitsu</h1>

                        <textarea class="text" cols="50" rows="4" name="write" required><?= $decryptedMessage = openssl_decrypt($row['emp_write'], $encryptionMethod, $secretHash); ?></textarea>
                        <button type="submit" class="btn" name="saveBtn">Save</button>

                        <button type="submit" class="btn cancel" name="deleteBtn">Delete</button>
                        <button type="button" onclick="closeForm()">Close</button>
                    </form>
                </div>

                <script>
                    function openForm() {
                        document.getElementById("myForm").style.display = "block";
                    }

                    function closeForm() {
                        document.getElementById("myForm").style.display = "none";
                    }
                </script>
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