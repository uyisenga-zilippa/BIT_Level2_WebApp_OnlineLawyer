<?php
$missingInforQuery = "SELECT * FROM `clients` where `id`= '$id' AND (id_number='' OR sector='') ";
$missingInfor = mysqli_query($connect, "$missingInforQuery");
?>

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li class="active">
                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            <li>
                <a href="profile.php"><i class="fa fa-user fa-fw"></i> My Profile</a>
            </li>
            <?php if (mysqli_num_rows($missingInfor) == 0) { ?>
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> Cases<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="new_application.php">Make New Case</a>
                        </li>
                        <li>
                            <a href="my_applications.php">My Cases</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            <?php } else {
            ?>
                <div style="padding: 10px;">
                    <h4 title="Click to see case contract" style="color: red;">Please Make sure you complete all required information on <a href="profile.php"><b>My Profile</b> </a> to continue</h4>
                </div>
            <?php
            } ?>
        </ul>
    </div>
</div>