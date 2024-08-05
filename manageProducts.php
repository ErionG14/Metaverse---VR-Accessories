    <?php
    session_start();
    if (!isset($_SESSION['name'])) {
        header("location: login.php");
        exit(); // Add exit to stop script execution after redirection
    }
    include_once 'productRepository.php';
    include_once 'product.php';

    if (isset($_POST['addBtn'])) {
        if (
            empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price']) ||
            empty($_POST['image_url'])
        ) {
            echo "Fill all fields!";
        } else {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $image_url = $_POST['image_url'];
            $id = $name . rand(100, 999);

            $product = new Product($id, $name, $description, $price, $image_url);
            $productRepository = new ProductRepository();

            $productRepository->insertProduct($product);

            header("Location: adminProducts.php");
            exit();
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Products</title>
        <script src="https://kit.fontawesome.com/a23437b52f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./CSS/login.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="./CSS/navbar.css">
        <link rel="stylesheet" href="./CSS/footer.css">
        <link rel="stylesheet" href="./CSS/dashboard.css">
    </head>
    <style>
        .nav-auth {
            align-items: center;
        }

        .hrOfUser {
            font: max(15px, 1vw) "rRegular";
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
                <a href="dashboard.php">Dashboard</a>
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
                <a>Products Dashboard</a>
                <a>Profile</a>
                <a>Analytics</a>
            </div>
            <div class="rightSideDashboard">
                <table class="tableDashboard">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php

                    include_once 'productRepository.php';

                    $productRepository = new ProductRepository();

                    $products = $productRepository->getAllProducts();

                    foreach ($products as $product) {
                        echo
                        "
                   <tr>
                        <td>$product[id]</td>
                        <td>$product[name]</td>
                        <td>$product[description] </td>
                        <td>$product[price] </td>
                        <td>$product[image_url] </td>
                        <td><a href='editproducts.php?id=$product[id]' class='button'><i class='fa-solid fa-pencil'></i></a></td>
                        <td><a href='deleteproduct.php?id=$product[id]' class='button'><i class='fa-solid fa-trash'></i></a></td>
                   </tr>
                   ";
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="container">
            <form action="" method="POST" class="login">
                <div class="addproductsHeading">
                    <h1>ADD PRODUCT</h1>
                </div>
                <div class="inputName input">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="inputSurname input">
                    <label for="surname">Description:</label>
                    <input type="text" id="description" name="description" required>
                </div>
                <div class="inputPassword input">
                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price" required>
                </div>
                <div class="inputPassword input">
                    <label for="password">Image:</label>
                    <input type="file" id="image_url" name="image_url" required>
                </div>
                <div class="buttonSubmit">
                    <button type="submit" name="addBtn">Add</button>
                </div>
            </form>
        </div>
        <script>
            // JavaScript to toggle the hamburger menu
            document.querySelector('.hamburger-menu').addEventListener('click', function() {
                document.querySelector('.nav-links').classList.toggle('active');
            });
        </script>
    </body>

    </html>