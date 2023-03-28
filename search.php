<?php
//connting to database
include "connection.php";

// get search item 
$item = $_GET['item'];

//make query for displaying schools
$query = "SELECT * FROM `schools` WHERE `name`LIKE '%$item%'  OR `options` LIKE '%$item%'  AND `status`='active' ";
$data = mysqli_query($connect, "$query");


?>
<!DOCTYPE html>
<html lang="eng">

<head>
    <!-- <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Home | ...</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <!--  <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">


        <div class="humberger__menu__widget">

            <div class="header__top__right__auth">
                <a href="login.php"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active"><a href="schools.php">Schools</a></li>
                <li><a href="./contact.html">About Us</a></li>

            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>

        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> yvetto@info.com</li>
                <li></li>
            </ul>
        </div>
    </div>


    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top" style="background:white ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> yvetto@info.com</li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>

                            </div>

                            <div class="header__top__right__auth">
                                <a href="login.php"><i class="fa fa-user"></i> Login as student</a>
                            </div>
                            &nbsp;&nbsp;
                            &nbsp; <div class="header__top__right__auth">
                                <a href="schoolLogin.html"><i class="fa fa-user"></i> Login as school</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="div_header mb-2" style="height: 70px;background:#008ae6;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="header__logo">

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav class="header__menu">
                            <ul>
                                <li class="active" style="color: white"><a href="index.html" style="color: white">Home</a></li>
                                <li><a href="schools.php" style="color: white">Schools</a></li>
                                <li><a href="./about.html" style="color: white">About Us</a></li>

                            </ul>
                        </nav>
                    </div>

                </div>
                <div class="humberger__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Header Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="section-title">
                        <h2>Search Result for "<?php echo $item ?>"</h2>
                    </div>

                </div>
            </div>
            <div class="row featured__filter" style="background-color: white; ">

                <!-- displaying schools here -->
                <?php
                if (mysqli_num_rows($data)) {
                    while ($row = mysqli_fetch_array($data)) {
                        $query2 = "SELECT * FROM `head_teacher` WHERE `school_id`='$row[0]' ORDER BY `head_teacher`.`id` DESC LIMIT 1";
                        $head = mysqli_fetch_array(mysqli_query($connect, "$query2"));
                        echo "
            <div class='col-lg-3 col-md-4 col-sm-6 mix  photo' style='background-color: white; border: 2px solid cyan;margin-left:5px;margin-top:5px;'>
                    <a href='school_details.php?id=$row[0]'>
                        <div class='featured__item'>
                           <center> <div class='featured__item__pic set-bg'  data-setbg='$row[8]' style='width:50%;height:3.5cm'>

                            </div></center>
                            <div class='featured__item__text'>
                             <h5>$row[2]</h5> <br>
                             <p style='text-align:left'>
                                <h6 style='text-align:left'><b> Location:</b> $row[13]</h6>
                                <h6 style='text-align:left'><b> School Type:</b> $row[4]</h6>
                                <h6 style='text-align:left'><b> Options:</b> $row[7]</h6>
                                <h6 style='text-align:left'><b> Levels:</b> $row[5]</h6>
                                <h6 style='text-align:left'><b> Categories:</b> $row[6]</h6>
                                <h6 style='text-align:left'><b> Head Mastor:</b> $head[2] $head[3]</h6>
                                <h6 style='text-align:left'><b> Contact:</b> $head[5]</h6>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            ";
                    }
                } else {
                    echo "  
                    
                     </div>
                    <div class='section-title'>
                    <br><br><br><center><h4 style='color:red;text-align:center'>No Result found for \" $item \"</h4></center><br><br><br>
                    </div>";
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->



    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                        </div>
                        <ul>
                            <li>Address: kn 204 kigali</li>
                            <li>Phone: +250780591269</li>
                            <li>Email: yvetto@email.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>



                        </ul>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <div class="footer__widget__social">
                            <a href="#" style="background: #008ae6;color: white"><i class="fa fa-facebook"></i></a>
                            <a href="#" style="background: #008ae6;color: white"><i class="fa fa-instagram"></i></a>
                            <a href="#" style="background: #008ae6;color: white"><i class="fa fa-twitter"></i></a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright text-center">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved 2020 <b>

                        </b>
                    </div>
                </div>
            </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>