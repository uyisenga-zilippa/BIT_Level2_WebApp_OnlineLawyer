<?php
include "connection.php";
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $comment = $_POST["comment"];
    $query = "INSERT INTO `contact` (`id`, `name`, `email`, `comment`) VALUES (NULL, '$name', '$email', '$comment');";
    $done = mysqli_query($connect, "$query");
    if ($done) {
?>
        <script>
            alert("Your comment submitted well done");
        </script>
<?php
    } else {
        echo "error:", mysqli_error($connect);
    }
}
?>
<!DOCTYPE html>
<html lang="eng">

<head>

    <title>Contact Us | ...</title>


    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">


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

<body bgcolor="#ebebeb">

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">


        <div class="humberger__menu__widget">

            <div class="header__top__right__auth">
                <a href="login.php"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul style="text-transform:capitalize;">
                <li><a href="index.php">Home</a></li>
                <li><a href="lawyers.php">Lawyers</a></li>
                <li><a href="./about.html">About Us</a></li>
                <li class="active"><a href="contact.php">Contact Us</a></li>
                <li><a href="lawyerLogin.html">Login As Lawyer</a></li>
                <li><a href="login.php">Login As Client</a></li>

            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>

        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>info@onlinelawyer.rw</li>
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
                                <li class="active" style="color:white"><a href="index.php" style="color:white">Home</a></li>
                                <li><a href="lawyers.php" style="color: white">Lawyers</a></li>
                                <li><a href="./about.html" style="color: white">About Us</a></li>
                                <li><a href="./contact.php" style="color: white">Contact Us</a></li>

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

    <br><br>
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Phone</h4>
                        <p>+25078888888888</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Address</h4>
                        <p>60-49 Road 11378 Kigali City</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Open time</h4>
                        <p>08:00 am to 20:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>hello@colorlib.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <!-- <div class="map">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49116.39176087041!2d-86.41867791216099!3d39.69977417971648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886ca48c841038a1%3A0x70cfba96bf847f0!2sPlainfield%2C%20IN%2C%20USA!5e0!3m2!1sen!2sbd!4v1586106673811!5m2!1sen!2sbd"
      height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <div class="map-inside">
      <i class="icon_pin"></i>
      <div class="inside-widget">
        <h4>Kigali</h4>
        <ul>
          <li>Phone: +250780591269</li>
          <li>Add: 16 Creek Ave. Farmingdale, NY</li>
        </ul>
      </div>
    </div>
  </div> -->
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div>
            <form action="#" method="post">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="name" placeholder="Your name" />
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="email" placeholder="Your Email" />
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Your message" name="comment"></textarea>
                        <button type="submit" name="submit" class="site-btn">SEND MESSAGE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->
    <br>

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