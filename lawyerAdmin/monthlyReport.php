<?php

// include "../connection.php";

// $id = $_GET['id'];
// $date = date("d/m/Y");

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
                        <h3 class="panel-title">Seach Monthly Report</h3>
                    </div>
                    <div class="panel-body">

                        <fieldset>
                            <div class="form-group">

                            </div>

                            <form action="getMonthlyReport.php" method="POST" enctype='multipart/form-data'>

                                <div class="form-group">
                                    <label>Month</label>
                                    <select name="month" id="">
                                        <option value="">Select month</option>
                                        <?php
                                        for ($i = 1; $i <= 12; $i++) {
                                            if ($i < 10) { ?>
                                                <option value="0<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php  } else {
                                            ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Year</label>
                                    <select name="year" id="">
                                        <option value="">Select Year</option>
                                        <?php
                                        for ($i = 2000; $i <= 2025; $i++) { ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php  }
                                        ?>

                                    </select>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="form-group">

                                            <button type="submit" name="done" id="" class="btn btn-success btn-block">Send</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6"><a href="./index.php" class="btn btn-warning btn-block">cancel</a>
                                    </div>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>



    </div>

</body>

</html>