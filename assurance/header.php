<!DOCTYPE html>
<html>
 
<head>
    <meta charset="UTF-8">
    <title>Assurance Maladies</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--Font awesome css-->
    <link href="css/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Bootstrap Datepicker css -->
    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
    <!--Layout css-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
  </head>

  <body class="full-width">

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="fa fa-bars"></span>
              </button>

              <!--logo start-->
              <a href="home.php" class="logo">Assurance<span> MALADIES</span></a>
              <!--logo end-->
              <div class="horizontal-menu navbar-collapse collapse ">
                  <ul class="nav navbar-nav">
                      <li class="<?php if(strstr($_SERVER['REQUEST_URI'], 'home.php')) echo 'active'; ?>"><a href="home.php">Accueil</a></li>
                      <li class="<?php if(strstr($_SERVER['REQUEST_URI'], 'new_customer.php')) echo 'active'; ?>"><a href="new_customer.php">Nouveau Assuré</a></li>
                      <li class="<?php if(strstr($_SERVER['REQUEST_URI'], 'list_customers.php')) echo 'active'; ?>"><a href="list_customers.php">Liste Assurés</a></li>
                      <li class="<?php if(strstr($_SERVER['REQUEST_URI'], 'controleur.php')) { echo 'active';  } ?>"><a href="controleur.php">Service controle</a></li>

                    </ul>
              </div>
              
              <div class="top-nav ">
                  <ul class="nav pull-right top-menu">
                      <!-- staff user login dropdown start-->
                      <li class="dropdown">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                              <span class="username">Service Accueuil</span>
                              <b class="caret"></b>
                          </a>
                          <ul class="dropdown-menu extended logout">
                              <div class="log-arrow-up"></div>
                              <li><a href="#"><i class=" fa fa-suitcase"></i>Edit Profile</a></li>
                              <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                              <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                              <li><a href="#"><i class="fa fa-key"></i> Log Out</a></li>
                          </ul>
                      </li>
                      <!-- staff user login dropdown end -->
                  </ul>
              </div>

          </div>

      </header>
      <!--header end-->