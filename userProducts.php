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
    <title>Blog</title>
    <script src="https://kit.fontawesome.com/a23437b52f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./CSS/navbar.css">
    <link rel="stylesheet" href="./CSS/footer.css">
    <link rel="stylesheet" href="./CSS/productSub.css">
</head>
<style>
    .nav-auth {
        align-items: center;
    }

    .hrOfUser {
        font: max(15px, 1vw) "rRegular";
    }

    .nav-auth {
        align-items: center;
    }

    .hrOfUser {
        font: max(15px, 1vw) "rRegular";
    }

    @media screen and (max-width:1215px) {
        .productSubCard {
            width: 30%;
        }
    }

    @media screen and (max-width:879px) {
        .productSubCard {
            width: 48%;
        }
    }

    @media screen and (max-width:660px) {
        .productSubCard {
            width: 60%;
        }
    }

    @media screen and (max-width:530px) {
        .productSubCard {
            width: 70%;
        }
    }

    @media screen and (max-width:430px) {
        .productSubCard {
            width: 80%;
        }
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
            <a href="userHome.php">Home</a>
            <a href="userHowitworks.php">How it Works</a>
            <a href="#">Products</a>
            <a href="userAboutUs.php">About Us</a>
            <a href="userSuportUs.php">Support Us</a>
        </div>

        <div class="nav-auth">
            <h3 class="hrOfUser"><?php echo "Username: " . $_SESSION['name'] . "<br>" ?></h3>
            <a class="register <?php echo $hide ?>" href="logout.php">Log out</a>
        </div>


        <div class="hamburger-menu">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

    </div>

    <div class="productsSub">
        <div class="productSubHeader">
            <h1>Products</h1>
            <div class="productsLine"></div>
        </div>

        <div class="productSubCards">
            <?php
            include_once 'productRepository.php';

            $productRepo = new ProductRepository();
            $products = $productRepo->getAllProducts();

            foreach ($products as $product) {
                echo '<div class="productSubCard">';
                echo '<form method="post" action="add_to_cart.php">';
                echo '<input type="hidden" name="productId" value="' . $product['id'] . '">';

                echo '<div class="productSubCard-up">';
                echo '<div class="productImage" style="background-image: url(' . $product['image_url'] . ');"></div>';
                echo '</div>';

                echo '<div class="productSubCard-down">';
                echo '<div class="cardTitleS">';
                echo '<p>' . $product['name'] . '</p>';
                echo '</div>';

                echo '<div class="cardDescription">';
                echo '<p>' . $product['description'] . '</p>';
                echo '</div>';

                echo '<div class="cardPrice">';
                echo '<p>' . $product['price'] . '$</p>';

                echo '<div class="addToCart">';
                echo '<p class="plus">+</p>
        <i class="fa-solid fa-cart-shopping"></i>';
                echo '</div>';

                echo '</div>';
                echo '</div>';
                echo '</form>';
                echo '</div>';
            }
            ?>
        </div>

    </div>
    </div>

    <div class="footer">
        <div class="footerUp">
            <div class="footerLogo"></div>
            <div class="socials">
                <p class="contact">Contact Us :</p>
                <div class="socialMedia">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                    <i class="fa-brands fa-discord"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>

            </div>
        </div>

        <div class="footer-links">
            <div class="footerLink">
                <p class="footerLink-title">What is Metaverse?</p>
                <a href="">Virtual Reality (VR)</a>
                <a href="">Augmented Reality (AR)</a>
                <a href="">Digital World</a>
                <a href="">Community</a>
            </div>

            <div class="footerLink">
                <p class="footerLink-title">Blog</p>
                <a href="">Metaverse</a>
                <a href="">How it Works</a>
                <a href="">Latest News</a>
                <a href="">Our Blog</a>
            </div>

            <div class="footerLink">
                <p class="footerLink-title">About Us</p>
                <a href="">Products</a>
                <a href="">Who We Are</a>
                <a href="">Our Story</a>
                <a href="">The Metaverse Journey</a>
            </div>

            <div class="footerLink">
                <p class="footerLink-title">Support</p>
                <a href="">Get Help</a>
                <a href="">Customer Support</a>
                <a href="">Assistance Center</a>
                <a href="">Reach Out to Our Support Team</a>
            </div>

            <div class="footerLink">
                <p class="footerLink-title">Get In touch</p>
                <a href="">Get in Touch with Us</a>
                <a href="">Contact Us</a>
                <a href="">Reach Out to Us</a>
                <a href="">How to Contact Us</a>
            </div>
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