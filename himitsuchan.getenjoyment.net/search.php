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
                <li><a href="home.php">Home</a></li>
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
                <textarea name="write" type="text" id="message" placeholder="Search your Himitsu" rows="6" required></textarea>
            </div>
            <div class="12u$">
                <ul class="actions">
                    <li><button name="searchBtn" type="submit" class="special"><i class="fa fa-search"></i> Search Himitsu </button></li>
                </ul>
            </div>
        </form>
        <form method="POST" enctype="multipart/form-data">
            <div class="12u$">
                <input class="passReg" id="datefield" type='date' name="searchDate" required></input>
                <ul class="actions">
                    <li><button name="searchDateBtn" type="submit" class="special"><i class="fa fa-search"></i> Search Date </button></li>
                </ul>
            </div>
        </form>
    </section>


    <!-- One -->

    <?php
    $sql = "SELECT * FROM emp_post WHERE emp_uName = '$encrypteduName'";
    $result = $conn->query($sql);
    $himitsu = array();
    $himitsuIndex = array();
    $hresult = array();
    $IDresult = array();

    while ($row = $result->fetch_array()) {
        $h = openssl_decrypt($row['emp_write'], $encryptionMethod, $secretHash);
        array_push($himitsu, $h);
        array_push($himitsuIndex, $row['id']);
    }

    if (isset($_POST["searchBtn"])) {
        $searchText = $_POST["write"];
        $hresult = preg_grep("/$searchText/i", $himitsu);
    }
    $n = -1;
    foreach ($himitsu as $h) {
        $n = $n + 1;
        if (in_array($h, $hresult)) {
            array_push($IDresult, $himitsuIndex[$n]);
        }
    }

    if (isset($_POST["searchDateBtn"])) {
        $searchDate = $_POST["searchDate"];
        $sql = "SELECT * FROM emp_post WHERE emp_uName = '$encrypteduName' AND emp_dateTime LIKE '$searchDate%'";
        $getDate = $conn->query($sql);

        while ($row = $getDate->fetch_array()) {
            if ($getDate == NULL) {
                echo "<script>alert('No result found');window.location='search.php';</script>";
            }
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
    } else {
        foreach ($IDresult as $i) {
            $sql = "SELECT * FROM emp_post WHERE id = '$i'";
            $getID = $conn->query($sql);

            while ($row = $getID->fetch_array()) {
                if ($getID == NULL) {
                    echo "<script>alert('No result found');window.location='search.php';</script>";
                }
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
            $x--;
        }
    }
    ?>

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