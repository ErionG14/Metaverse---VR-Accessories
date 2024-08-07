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
    <title>Dashboard</title>
    <script src="https://kit.fontawesome.com/a23437b52f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./CSS/navbar.css">
    <link rel="stylesheet" href="./CSS/footer.css">
    <link rel="stylesheet" href="./CSS/dashboard.css">
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

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .button {
            text-decoration: none;
            text-align: center;
            background-color: var(--mainColor);
            ;
            color: white;
            padding: 2px 8px 2px 8px;
            border-radius: 8px;
            transition: .5s ease-in-out;
        }

        .button:hover {
            background-color: #83A5FF;
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
            <a class="logo" href="adminHome.php"></a>
        </div>

        <div class="nav-links">
            <a href="adminHome.php">Home</a>
            <a href="adminHowitworks.php">How it Works</a>
            <a href="adminProducts.php">Products</a>
            <a href="adminAboutUs.php">About Us</a>
            <a href="adminSuportUs.php">Support Us</a>
            <a href="#">Dashboard</a>
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


    <div class="dashboard">
        <div class="leftSideDashboard sidebar">
            <p><?php echo " Admin: " . $_SESSION['name'] . "" ?></p>
            <a>Dashboard</a>
            <a>Profile</a>
            <a>Analytics</a>
        </div>
        <div class="rightSideDashboard">
            <table class="tableDashboard">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php

                include_once 'userRepository.php';

                $userRepository = new UserRepository();

                $users = $userRepository->getAllUsers();

                foreach ($users as $user) {
                    echo
                    "
                <tr>
                     <td>$user[id]</td>
                     <td>$user[name]</td>
                     <td>$user[surname] </td>
                     <td>$user[email] </td>
                     <td>$user[password] </td>
                     <td>$user[role] </td>
                     <td><a href='edit.php?id=$user[id]' class='button'><i class='fa-solid fa-pencil'></i></a></td>
                     <td><a href='delete.php?id=$user[id]' class='button'><i class='fa-solid fa-trash'></i></a></td>
                     
                </tr>
                ";
                }
                ?>
            </table>
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