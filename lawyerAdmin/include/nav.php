<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background: #008ae6">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php" style="color: white">Lawyer Cpanel</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="../index.php" style="color: white"><i class="fa fa-home fa-fw"></i> Website</a></li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white">
                <i class="fa fa-user fa-fw"></i> <?php echo $lawyerName; ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">

                <li><a href="setting.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li class="active">
                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="profile.php"><i class="fa fa-user fa-fw"></i> My Profile</a>
                </li>

                <?php
                $id = $_SESSION['lawyerId'];
                $lawyerName = $_SESSION['lawyerName'];

                $select_lawyer = mysqli_query($connect, "SELECT status FROM lawyers WHERE id='$id'");
                while ($row = mysqli_fetch_array($select_lawyer)) {

                    if ($row[0] == "paid") { ?>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Cases<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="new_cases.php">New Cases</a>
                                </li>
                                <li>
                                    <a href="ongoing_cases.php">Ongoing Cases</a>
                                </li>
                                <li>
                                    <a href="closed_cases.php">Closed Cases</a>
                                </li>
                                <li>
                                    <a href="rejected_cases.php">Rejected Cases</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="view_payments.php"><i class="fa fa-money fa-fw"></i> Recieved Payments</a>
                        </li>
                        <li>
                            <a href="tax.php"><i class="fa fa-money fa-fw"></i>Pay Tax</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Report<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="monthlyReport.php">Monthly Report</a>
                                </li>
                                <li>
                                    <a href="annualy_report.php">Annualy Report</a>
                                </li>

                            </ul>
                        </li>

                    <?php
                        break;
                    }
                    if ($row[0] == 'pending') { ?>

                        <li>
                            <b style='color:red'>Make sure you fill form found on <a href='profile.php'>My Profile</a></b>
                        </li>

                    <?php
                        break;
                    }
                    if ($row[0] == 'rejected') { ?>

                        <li>
                            <b style='color:red'>Your Documents Rejected check again on <a href='profile.php'>My Profile</a></b>
                        </li>

                    <?php
                        break;
                    }

                    if ($row[0] == "active") { ?>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Cases<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="new_cases.php">New Cases</a>
                                </li>
                                <li>
                                    <a href="pending_cases.php">Pending Cases</a>
                                </li>
                                <li>
                                    <a href="ongoing_cases.php">Ongoing Cases</a>
                                </li>
                                <li>
                                    <a href="closed_cases.php">Closed Cases</a>
                                </li>
                                <li>
                                    <a href="rejected_cases.php">Rejected Cases</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="tax.php"><i class="fa fa-money fa-fw"></i>Pay Tax</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Report<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="monthlyReport.php">Monthly Report</a>
                                </li>
                                <li>
                                    <a href="annualy_report.php">Annualy Report</a>
                                </li>

                            </ul>
                        </li>


                <?php
                        break;
                    }
                }
                ?>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>