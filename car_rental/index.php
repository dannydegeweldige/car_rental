<?php

@include 'database.php';

session_start();

if (isset($_POST['submit'])) {

    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $confirmPassword = md5($_POST['confirmPassword']);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {

            $_SESSION['admin_fullName'] = $row['fullName'];
            header('location:admin.php');

        } elseif ($row['user_type'] == 'user') {

            $_SESSION['user_fullName'] = $row['fullName'];
            header('location:index.php');

        }

    } else {
        $error[] = 'incorrect email or password!';
    }

}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- header begint -->

    <header class="header">

        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo"> <span> Danny's </span> cars </a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#vehicles">vehicles</a>
            <a href="#services">services</a>
            <a href="#featured">featured</a>
        </nav>

        <?php

        if (isset($_SESSION['user_fullName'])) {
            echo '<a href="logout.php" class="btn">Logout</a>';
        } else {
            echo " <div id='login-btn' class='btn'>
            <button class='btn'>login</button>
            <i class='far fa-user'></i>
        </div>";
        }

        ?>


    </header>

    <!-- header eindigt -->

    <!-- login form -->

    <div class="login-form-container">

        <span id="close-login-form" class="fas fa-times"></span>

        <form method="POST">
            <h3>user login</h3>
            <input type="email" placeholder="email" name="email" class="box">
            <input type="password" placeholder="password" name="password" class="box">
            <input type="submit" name="submit" value="login now" class="btn">
            <p> don't have an account? <a href="registration.php">create one</a> </p>
        </form>

    </div>

    <!-- home section begint -->

    <section class="home" id="home">
        <h1 class="home-parallax" data-speed="-2">find your car</h1>
        <img class="home-parallax" data-speed="5" src="foto's/home-img.png" alt="">
        <a href="#" class="btn home-parallax" data-speed="7"> explore cars</a>
    </section>

    <!-- home section eindigt -->

    <!-- icons section begint -->

    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-home"></i>
            <div class="content">
                <h3>150+</h3>
                <p>branches</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-car"></i>
            <div class="content">
                <h3>4770+</h3>
                <p>cars sold</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-users"></i>
            <div class="content">
                <h3>590+</h3>
                <p>happy clients</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-car"></i>
            <div class="content">
                <h3>890+</h3>
                <p>new cars</p>
            </div>
        </div>


    </section>

    <!-- icons section eindigt -->

    <!-- vehicles section begint -->

    <section class="vehicles" id="vehicles">

        <h1 class="heading"> popular <span>vehicles</span></h1>

        <div class="swiper vehicles-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <img src="foto's/vehicles-1.png" alt="">
                    <div class="content">
                        <h3>new model</h3>
                        <div class="price"> <span>price: </span> 650000/- </div>
                        <p>
                            <span class="fas fa-circle"></span> new
                            <span class="fas fa-circle"></span> 2021
                            <span class="fas fa-circle"></span> automatic
                            <span class="fas fa-circle"></span> petrol
                            <span class="fas fa-circle"></span> 183mph
                        </p>
                        <a href="#" class="btn">check out</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="foto's/vehicles-2.png" alt="">
                    <div class="content">
                        <h3>new model</h3>
                        <div class="price"> <span>price: </span> 650000/- </div>
                        <p>
                            <span class="fas fa-circle"></span> new
                            <span class="fas fa-circle"></span> 2021
                            <span class="fas fa-circle"></span> automatic
                            <span class="fas fa-circle"></span> petrol
                            <span class="fas fa-circle"></span> 183mph
                        </p>
                        <a href="#" class="btn">check out</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="foto's/vehicles-3.png" alt="">
                    <div class="content">
                        <h3>new model</h3>
                        <div class="price"> <span>price: </span> 650000/- </div>
                        <p>
                            <span class="fas fa-circle"></span> new
                            <span class="fas fa-circle"></span> 2021
                            <span class="fas fa-circle"></span> automatic
                            <span class="fas fa-circle"></span> petrol
                            <span class="fas fa-circle"></span> 183mph
                        </p>
                        <a href="#" class="btn">check out</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="foto's/vehicles-4.png" alt="">
                    <div class="content">
                        <h3>new model</h3>
                        <div class="price"> <span>price: </span> 650000/- </div>
                        <p>
                            <span class="fas fa-circle"></span> new
                            <span class="fas fa-circle"></span> 2021
                            <span class="fas fa-circle"></span> automatic
                            <span class="fas fa-circle"></span> petrol
                            <span class="fas fa-circle"></span> 183mph
                        </p>
                        <a href="#" class="btn">check out</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="foto's/vehicles-5.png" alt="">
                    <div class="content">
                        <h3>new model</h3>
                        <div class="price"> <span>price: </span> 650000/- </div>
                        <p>
                            <span class="fas fa-circle"></span> new
                            <span class="fas fa-circle"></span> 2021
                            <span class="fas fa-circle"></span> automatic
                            <span class="fas fa-circle"></span> petrol
                            <span class="fas fa-circle"></span> 183mph
                        </p>
                        <a href="#" class="btn">check out</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="foto's/vehicles-6.png" alt="">
                    <div class="content">
                        <h3>new model</h3>
                        <div class="price"> <span>price: </span> 650000/- </div>
                        <p>
                            <span class="fas fa-circle"></span> new
                            <span class="fas fa-circle"></span> 2021
                            <span class="fas fa-circle"></span> automatic
                            <span class="fas fa-circle"></span> petrol
                            <span class="fas fa-circle"></span> 183mph
                        </p>
                        <a href="#" class="btn">check out</a>
                    </div>
                </div>
            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>

    <!-- vehicles section eindigt -->

    <!-- services section begint -->

    <section class="services" id="services">

        <h1 class="heading"> our <span>services</span></h1>

        <div class="box-container">
            <div class="box">
                <i class="fa-fa-car"></i>
                <h3>car selling</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas a iure cupiditate dolore id
                    dolorem quibusdam facilis vel, repudiandae earum ipsam recusandae tenetur laborum illo deleniti quam
                    ducimus quia corrupti.</p>
                <a href="#" class="btn">read more</a>
            </div>

            <div class="box">
                <i class="fa-fa-tools"></i>
                <h3>parts selling</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas a iure cupiditate dolore id
                    dolorem quibusdam facilis vel, repudiandae earum ipsam recusandae tenetur laborum illo deleniti quam
                    ducimus quia corrupti.</p>
                <a href="#" class="btn">read more</a>
            </div>

            <div class="box">
                <i class="fa-fa-car-crash"></i>
                <h3>insurance</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas a iure cupiditate dolore id
                    dolorem quibusdam facilis vel, repudiandae earum ipsam recusandae tenetur laborum illo deleniti quam
                    ducimus quia corrupti.</p>
                <a href="#" class="btn">read more</a>
            </div>

            <div class="box">
                <i class="fa-fa-car-battery"></i>
                <h3>battary replacement</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas a iure cupiditate dolore id
                    dolorem quibusdam facilis vel, repudiandae earum ipsam recusandae tenetur laborum illo deleniti quam
                    ducimus quia corrupti.</p>
                <a href="#" class="btn">read more</a>
            </div>

            <div class="box">
                <i class="fa-fa-gas-pump"></i>
                <h3>oil change</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas a iure cupiditate dolore id
                    dolorem quibusdam facilis vel, repudiandae earum ipsam recusandae tenetur laborum illo deleniti quam
                    ducimus quia corrupti.</p>
                <a href="#" class="btn">read more</a>
            </div>

            <div class="box">
                <i class="fa-fa-headset"></i>
                <h3>24/7 suppurt</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas a iure cupiditate dolore id
                    dolorem quibusdam facilis vel, repudiandae earum ipsam recusandae tenetur laborum illo deleniti quam
                    ducimus quia corrupti.</p>
                <a href="#" class="btn">read more</a>
            </div>

        </div>


    </section>

    <!-- services section eindigt -->

    <!-- featured section begint -->

    <section class="featured" id="featured">

        <h1 class="heading"> <span>featured</span> cars</h1>

        <div class="swiper featured-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <img src="foto's/vehicles-1.png" alt="">
                    <h3>new model</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">55,000/-</div>
                    <a href="#" class="btn">check out"></a>
                </div>

                <div class="swiper-slide box">
                    <img src="foto's/vehicles-2.png" alt="">
                    <h3>new model</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">55,000/-</div>
                    <a href="#" class="btn">check out"></a>
                </div>

                <div class="swiper-slide box">
                    <img src="foto's/vehicles-3.png" alt="">
                    <h3>new model</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">55,000/-</div>
                    <a href="#" class="btn">check out"></a>
                </div>

                <div class="swiper-slide box">
                    <img src="foto's/vehicles-4.png" alt="">
                    <h3>new model</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">55,000/-</div>
                    <a href="#" class="btn">check out"></a>
                </div>
            </div>

        </div>
        <br>
        <div class="swiper featured-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <img src="foto's/vehicles-5.png" alt="">
                    <h3>new model</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">55,000/-</div>
                    <a href="#" class="btn">check out"></a>
                </div>

                <div class="swiper-slide box">
                    <img src="foto's/vehicles-6.png" alt="">
                    <h3>new model</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">55,000/-</div>
                    <a href="#" class="btn">check out"></a>
                </div>

                <div class="swiper-slide box">
                    <img src="foto's/vehicles-7.png" alt="">
                    <h3>new model</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">55,000/-</div>
                    <a href="#" class="btn">check out"></a>
                </div>

                <div class="swiper-slide box">
                    <img src="foto's/vehicles-8.png" alt="">
                    <h3>new model</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">55,000/-</div>
                    <a href="#" class="btn">check out"></a>
                </div>
            </div>

        </div>

    </section>

    <!-- featured section eindigt -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- custom js link -->
    <script src="script.js" defer></script>

</body>

</html>