<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("location: login.php");
    exit(); // Add exit to stop script execution after redirection
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/a23437b52f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./CSS/navbar.css">
    <link rel="stylesheet" href="./CSS/howitworksSub.css">
    <link rel="icon" href="./assets/images/icon-meta.png" type="image/x-icon"/>
    <style>
        .nav-auth {
            align-items: center;
        }

        .hrOfUser {
            font: max(15px, 1vw) "rRegular";
        }

        .register-nav {

            font-size: max(14px, 0.8vw);
            display: none;

        }

        .hrOfUser-nav {
            font: max(15px, 1vw) "rRegular";
            display: none;
        }

        .hamburger-menu {
            display: none;
            flex-direction: column;
        }

        @media (max-width: 1000px) {
            .nav-links {
                display: none;
                flex-direction: column;
                width: 100%;
                text-align: right;
                position: absolute;
                top: 60px;
                right: 0;
                background-color: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                padding: 10px;
            }

            .nav-links.active {
                display: flex;
            }

            .hamburger-menu {
                display: flex;
            }

            .hrOfUser-nav {
                font: max(15px, 1vw) "rRegular";
                display: flex;

            }

            .register-nav {

                font-size: max(14px, 0.8vw);
                display: flex;

            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="logoHolder">
            <a class="logo" href="index.php"></a>
        </div>

        <div class="nav-links">
            <a href="adminHome.php">Home</a>
            <a href="#">How it Works</a>
            <a href="adminProducts.php">Products</a>
            <a href="adminAboutUs.php">About Us</a>
            <a href="adminSuportUs.php">Support Us</a>
            <a href="dashboard.php">Dashboard</a>
            <h3 class="hrOfUser-nav"><?php echo " Admin: " . $_SESSION['name'] . "<br>" ?></h3>
            <a class="register-nav" href="logout.php">Log out</a>
        </div>

        <div class="nav-auth">
            <h3 class="hrOfUser"><?php echo " Admin: " . $_SESSION['name'] . "<br>" ?></h3>
            <a class="register" href="logout.php">Log out</a>
        </div>


        <div class="hamburger-menu">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

    </div>

    <div class="howitWorksSub">
        <div class="howitworks-sub-conatiner">
            <h1>Embark on this extraordinary adventure into the Metaverse – where imagination knows no limits, and the future is now. Join us as we shape the next frontier of digital exploration and community building!</h1>
            <a href="adminProducts.php">Click here <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
    <script>
        // JavaScript to toggle the hamburger menu
        document.querySelector('.hamburger-menu').addEventListener('click', function() {
            document.querySelector('.nav-links').classList.toggle('active');
        });
    </script>
</body>

</html>