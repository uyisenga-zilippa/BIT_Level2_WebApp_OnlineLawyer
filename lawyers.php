<?php
//connting to database
include "connection.php";

//make query for displaying schools
$query = "SELECT * FROM `lawyers` WHERE `status`='active'";
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
    <link rel="stylesheet" href="css/css.css" type="text/css">
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
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="lawyers.php">Lawyers</a></li>
                <li><a href="./about.html">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="lawyerLogin.html">Login As Lawyer</a></li>
                <li><a href="login.php">Login As Client</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>

        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> info@onlinelawyer.rw</li>
                <li></li>
            </ul>
        </div>
    </div>


    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top" style="background:black;color:white ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li style="color: white;"><i class="fa fa-envelope"></i> info@onlinelawyer.rw</li>
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
                                <a href="login.php"><i class="fa fa-user"></i> Login as client</a>
                            </div>
                            &nbsp;&nbsp;
                            &nbsp; <div class="header__top__right__auth">
                                <a href="lawyerLogin.html"><i class="fa fa-user"></i> Login as lawyer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div><br>
            <h1 class="text-center title_text"><b>Online Lawyers Services M.I.S</b></h1>
        </div><br>
        <div class="div_header mb-2" style="height: 70px;background:#008ae6;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="header__logo">

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav class="header__menu">
                            <ul style="text-transform:capitalize;">
                                <li class="active" style="color: white"><a href="index.php" style="color: white">Home</a></li>
                                <li><a href="#" style="color: white">Lawyers</a></li>
                                <li><a href="./about.html" style="color: white">About Us</a></li>
                                <li><a href="contact.php" style="color: white">Contact Us</a></li>

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
                        <h2 class="text-center"><b>LAWYERS PROFILES ...</b></h2>
                    </div>

                </div>
                <!-- <div class="col-lg-6">
                    <form action="search.php" method="get">
                        <table style="width: 100%;">
                            <tr>
                                <td> <input type="search" name="item" id="" placeholder="Search By District in Rwanda" class="form-control" required></td>
                                <td><button type="submit" class="btn btn-primary">Search</button></td>
                            </tr>

                        </table>
                    </form>
                </div> -->
            </div>
            <div class="row featured__filter" style="background-color: white; ">

                <!-- displaying schools here -->


                <?php
                while ($row = mysqli_fetch_array($data)) {
                    $query2 = "SELECT * FROM `lawyers`  ORDER BY `lawyers`.`id` DESC LIMIT 1";
                    $head = mysqli_fetch_array(mysqli_query($connect, "$query2"));
                    $wonCases = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(id) FROM  `cases` WHERE lawyer_id='{$row[0]}' AND status='won'"));
                ?>
                    <div class='col-lg-3 col-md-4 col-sm-6 mix  photo'>
                        <a href='selecting.php?id=<?php echo $row[0] ?>'>
                            <div class='featured__item'>
                                <center>
                                    <div class='featured__item__pic set-bg' data-setbg='<?php echo $row['picture'] ?>'></div>
                                </center>
                                <div class='featured__item__text'>
                                    <h5><?php echo $row[2] ?></h5> <br>
                                    <p style='text-align:left'>

                                    <h6 style='text-align:left'><b> EMAIL:</b> <?php echo  $row['email'] ?></h6>
                                    <h6 style='text-align:left'><b> PHONE:</b><?php echo  $row['phone'] ?></h6>
                                    <h6 style='text-align:left'><b> PROVINCE:</b><?php echo  $row['province'] ?></h6>
                                    <h6 style='text-align:left'><b> DISTRICT:</b><?php echo $row['district'] ?></h6>
                                    <h6 style='text-align:left'><b> LANGUAGE:</b><br><?php echo  $row['langauges'] ?></h6>
                                    <h6 style='text-align:left'><b> WON CASES:</b><?php echo  $wonCases[0] ?></h6>

                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php

                }
                ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->



    <!-- Footer Section Begin -->
    <footer class="footer spad" style="background-color: #008ae6;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                        </div>
                        <ul>
                            <li>Address: kn 204 kigali</li>
                            <li>Phone: +250780591269</li>
                            <li>Email: info@onlinelawyer.rw</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="about.html">About Us</a></li>

                            <li><a href="lawyers.php">Lawyer</a></li>

                        </ul>
                        <ul>




                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">


                        <div class="footer__widget__social">
                            <a href="#" style="background:black;color:white"><i class="fa fa-facebook"></i></a>
                            <a href="#" style="background: black;color:white"><i class="fa fa-instagram"></i></a>
                            <a href="#" style="background: black;color:white"><i class="fa fa-twitter"></i></a>

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
                        </script> All rights reserved <b>

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