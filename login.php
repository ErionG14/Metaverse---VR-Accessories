<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./CSS/login.css">
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
    <style>
        .hamburger-menu {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .signIn-nav {
            color: #000;
            display: none;
        }

        .register-nav {
            color: #ffffff;
            display: none;
        }

        .register-nav,
        .signIn-nav {
            font-size: max(14px, 0.8vw);
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

            .signIn-nav {
                display: flex;
            }

            .register-nav {
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
            <a href="index.php">Home</a>
            <a href="howitworks.php">How it Works</a>
            <a href="products.php">Products</a>
            <a href="aboutUs.php">About Us</a>
            <a href="supportus.php">Support Us</a>
            <a class="register-nav" href="resgister.php">Register</a>
        </div>

        <div class="nav-auth">
            <a class="signIn" href="login.php">Log In</a>
            <a class="register" href="register.php">Register</a>
        </div>

        <div class="hamburger-menu">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>

    <div class="container">
        <form action="loginController.php" method="POST" class="login">
            <div class="loginHeading">
                <h1>LOGIN</h1>
            </div>
            <div class="inputName input">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="inputSurname input">
                <label for="surname">Surname:</label>
                <input type="text" id="surname" name="surname" required>
            </div>
            <div class="inputPassword input">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="buttonSubmit">
                <button type="submit" name="loginBtn">Submit</button>
            </div>
        </form>
    </div>

    <script src="./JavaScript/loginValidate.js"></script>
    <script>
        // JavaScript to toggle the hamburger menu
        document.querySelector('.hamburger-menu').addEventListener('click', function() {
            document.querySelector('.nav-links').classList.toggle('active');
        });
    </script>
</body>

</html>