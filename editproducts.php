<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("location: login.php");
    exit(); // Add exit to stop script execution after redirection
}
$productId = $_GET['id'];
include_once 'productRepository.php';



$productRepository = new ProductRepository();

$product  = $productRepository->getProductById($productId);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="./CSS/edit.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./CSS/navbar.css">
    <link rel="icon" href="./assets/images/icon-meta.png" type="image/x-icon"/>
</head>
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

<body>
    <div class="navbar">
        <div class="logoHolder">
            <a class="logo" href="index.php"></a>
        </div>

        <div class="nav-links">
            <a href="adminHome.php">Home</a>
            <a href="adminHowitworks.php">How it Works</a>
            <a href="adminProducts.php">Products</a>
            <a href="adminAboutUs.php">About Us</a>
            <a href="adminSuportUs.php">Support Us</a>
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
    <div class="container">
        <form action="" method="POST" class="edit">
            <div class="editHeading">
                <h1>EDIT PRODUCT</h1>
            </div>
            <div class="inputName input">
                <input type="text" name="id" value="<?= $product['id'] ?>" readonly>
            </div>
            <div class="inputName input">
                <input type="text" name="name" value="<?= $product['name'] ?>">
            </div>
            <div class="inputSurname input">
                <input type="text" name="description" value="<?= $product['description'] ?>">
            </div>
            <div class="inputPassword input">
                <input type="text" name="price" value="<?= $product['price'] ?>">
            </div>
            <div class="inputPassword input">
                <input type="file" name="image_url" value="<?= $product['image_url'] ?>">
            </div>

            <input type="submit" name="editBtn" value="save">

        </form>
        <script>
            // JavaScript to toggle the hamburger menu
            document.querySelector('.hamburger-menu').addEventListener('click', function() {
                document.querySelector('.nav-links').classList.toggle('active');
            });
        </script>
</body>

</html>

<?php

if (isset($_POST['editBtn'])) {
    $id = $product['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];

    $productRepository->updateProduct($id, $name, $description, $price, $image_url);
    header("location:manageProducts.php");
}


?>