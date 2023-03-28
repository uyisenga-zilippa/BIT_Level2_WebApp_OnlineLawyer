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
                        <h3 class="panel-title">You are about to pay Registration fees</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    Registration: <?php echo "<b>".$result2[0]."</b>"; ?>
                                </div>
                                <div class="form-group">
                                    School Name: <?php echo "<b>".$result2[1]."</b>"; ?>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-6">
                                    	<!-- paywith card button -->
                                   <form action="../stripe/charge.php?id=<?php echo $result[0]; ?>" method="post">
                                  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $stripe['publishable_key']; ?>" data-description="<?php echo "Pay Registration fees of ".$result2[0]; ?>" data-amount="<?php echo $result2[0] ?>" data-locale="auto"></script>
                                    </form></div>
                                    <div class="col-lg-6"><a href="#" class="btn btn-warning btn-block">cancel</a>
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