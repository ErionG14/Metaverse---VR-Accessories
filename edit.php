<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("location: login.php");
    exit(); // Add exit to stop script execution after redirection
}
$userId = $_GET['id'];
include_once 'userRepository.php';



$userRepository = new UserRepository();

$user  = $userRepository->getUserById($userId);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="./CSS/edit.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./CSS/navbar.css">
    <link rel="stylesheet" href="./CSS/banner.css">
    <link rel="stylesheet" href="./CSS/second-banner.css">
    <link rel="stylesheet" href="./CSS/paragraf-banner.css">
    <link rel="stylesheet" href="./CSS/flexbox.css">
    <link rel="stylesheet" href="./CSS/howitworks.css">
    <link rel="stylesheet" href="./CSS/blog.css">
    <link rel="stylesheet" href="./CSS/products.css">
    <link rel="stylesheet" href="./CSS/footer.css">
</head>
<style>
    .nav-auth {
        align-items: center;
    }

    .hrOfUser {
        font: max(15px, 1vw) "rRegular";
    }

    .inputPassword select {
        width: 100%;
        height: max(30px, 2vw);
        outline: none;
        border: 1px solid lightgray;
        border-radius: max(10px, 1vw);
        padding: 2%;
        font-family: "rRegular";
        background-color: #f9f9f9;
        color: #333;
        cursor: pointer;
    }

    .hamburger-menu {
        display: none;
        flex-direction: column;
        cursor: pointer;
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
                <h1>EDIT USER</h1>
            </div>
            <div class="inputName input">
                <input type="text" name="id" value="<?= $user['id'] ?>" readonly>
            </div>
            <div class="inputName input">
                <input type="text" name="name" value="<?= $user['name'] ?>">
            </div>
            <div class="inputSurname input">
                <input type="text" name="surname" value="<?= $user['surname'] ?>">
            </div>
            <div class="inputPassword input">
                <input type="text" name="email" value="<?= $user['email'] ?>">
            </div>
            <div class="inputPassword input">
                <input type="text" name="password" value="<?= $user['password'] ?>">
            </div>
            <div class="inputPassword input">
                <select name="role">
                    <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                </select>
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
    $id = $user['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $userRepository->updateUser($id, $name, $surname, $email, $password, $role);
    header("location:dashboard.php");
}


?>