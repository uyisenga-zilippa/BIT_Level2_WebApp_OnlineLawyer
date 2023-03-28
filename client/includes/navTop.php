 <!-- Navigation -->
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #008ae6">
     <div class="navbar-header">
         <a class="navbar-brand" href="index.php" style="color: white">Client Cpanel</a>
     </div>

     <button style="color: white" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
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
             <a class="dropdown-toggle" style="color: white" data-toggle="dropdown" href="#">
                 <i class="fa fa-user fa-fw"></i> <?php echo $clientName; ?> <b class="caret"></b>
             </a>
             <ul class="dropdown-menu dropdown-user">
                 <!-- <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                 </li> -->
                 <li><a href="setting.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                 </li>
                 <li class="divider"></li>
                 <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                 </li>
             </ul>
         </li>
     </ul>
     <!-- /.navbar-top-links -->