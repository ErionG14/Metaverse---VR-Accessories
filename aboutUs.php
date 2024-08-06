<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/a23437b52f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/aboutUsSub.css">
    <link rel="stylesheet" href="./CSS/aboutUs.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./CSS/navbar.css">
    <link rel="stylesheet" href="./CSS/flexbox.css">
    <link rel="stylesheet" href="./CSS/blog.css">
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
            <a class="signIn-nav" href="login.php">Log In</a>
            <a class="register-nav" href="resgister.php">Register</a>
        </div>

        <div class="nav-auth">
            <a class="signIn" href="login.php">Log In</a>
            <a class="register" href="resgister.php"> Register</a>
        </div>


        <div class="hamburger-menu">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

    </div>
    <!-- ABOUT US COVER STARTS HERE -->
    <div class="aboutUsSub">
        <div class="aboutUs-sub-conatiner">
            <h1>Welcome to metaverse where innovation meets virtual reality. We are dedicated to redefining
                the digital landscape by creating a dynamic metaverse that transcends boundaries,
                offering users a unique and immersive experience like never before.</h1>
        </div>
    </div>
    <!-- ABOUT US COVER ENDS HERE -->

    <!-- OURMISSION STARTS HERE -->
    <div class="ourmission">
        <h5>our mission</h5>
        <h1>Giving people the power to build <br> community and bring the world closer together</h1>
        <div class="center-container">
            <img src="./assets/images/OurMission.jpg" alt="" width="550" height="300">
        </div>
    </div>
    <!-- OURMISSION STARTS HERE -->

    <!-- SECONDTEXT THAT INCLUDES "OUR PRINCIPLES" STARTS HERE -->
    <div class="secondtext">
        <div class="secondtext-heading">
            <h1>Our Principles</h1>
        </div>
        <div class="secondtext-down">
            <div class="secondtext-leftSide">
                <p>They embody what we stand for and guide our approach to how we build technology for people and their relationships</p>
            </div>

            <div class="secondtext-rightSide">
                <div class="secondtextImgHolder">
                    <div class="secondtextImg"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- SECONDTEXT QTHAT INCLUDES "OUR PRINCIPLES" STARTS HERE -->

    <!-- LEADERSHIP STARTS HERE -->
    <div class="leadership">

        <div class="leadershipUp">
            <h1>Our leadership</h1>
        </div>

        <div class="leadershipDown">
            <div class="leadership-leftside">
                <div class="leadershipImgHolder">
                    <div class="leadershipImg"></div>
                </div>
            </div>

            <div class="leadership-rightside">
                <p>Meta’s leaders are guiding our company as the metaverse evolves,
                    helping to create the next evolution of digital connection</p>
            </div>
        </div>

    </div>

    <!-- LEADERSHIP ENDS HERE -->

    <!-- FOOTER STARTS HERE -->
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