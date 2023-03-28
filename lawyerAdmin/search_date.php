<?php
$type = $_GET['type'];
$category = $_GET['category'];

?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
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
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Report</h3>
                    </div>
                    <div class="panel-body">
                        <?php if ($type == "student") { ?>
                            <form role="form" method="post" action="studentsReport.php">
                            <?php } else { ?>
                                <form role="form" method="post" action="paymentsReport.php">
                                <?php } ?>
                                <fieldset>
                                    <?php
                                    if ($category == "1") {
                                    ?>
                                        <div class="form-group">
                                            Month: <select name="month">
                                                <option value="" disabled="" selected="">Select month</option>
                                                <option>01</option>
                                                <option>02</option>
                                                <option>03</option>
                                                <option>04</option>
                                                <option>05</option>
                                                <option>06</option>
                                                <option>07</option>
                                                <option>08</option>

                                                <option>09</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                            </select>
                                            Year: <select name="year">
                                                <option value="" disabled="" selected="">Select Year:</option>
                                                <option>2022</option>
                                                <option>2021</option>
                                                <option>2020</option>
                                                <option>2019</option>
                                                <option>2018</option>
                                                <option>2017</option>
                                                <option>2016</option>
                                                <option>2015</option>

                                                <option>2014</option>
                                                <option>2013</option>
                                                <option>2012</option>
                                                <option>2011</option>
                                            </select>
                                        </div>


                                    <?php  } else { ?>
                                        <div class="form-group">
                                            Year: <select name="year">
                                                <option value="" disabled="" selected="">Select Year:</option>
                                                <option>2022</option>
                                                <option>2021</option>
                                                <option>2020</option>
                                                <option>2019</option>
                                                <option>2018</option>
                                                <option>2017</option>
                                                <option>2016</option>
                                                <option>2015</option>

                                                <option>2014</option>
                                                <option>2013</option>
                                                <option>2012</option>
                                                <option>2011</option>
                                            </select>
                                        </div>
                                    <?php }

                                    ?>



                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="submit" class="btn btn-success" name="submit">
                                        </div>
                                        <div class="col-lg-6"><a href="index.php" class="btn btn-warning btn-block">cancel</a>
                                        </div>
                                    </div>

                                </fieldset>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>