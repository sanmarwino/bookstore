<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" id="headnav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Online Bookstore</a>
        </div>

        <!--/.navbar-collapse -->
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <!-- link to publiser_list.php -->
              <li><a href="admin_publisher.php"><span class="glyphicon glyphicon-paperclip"></span>&nbsp;Publisher</a></li>
              <!-- link to admin add book -->
              <li><a href="admin_add.php"><span class="glyphicon glyphicon-book"></span>&nbsp; Add Book</a></li>
              <!-- link to admin add publisher -->
              <li><a href="admin_addpub.php"><span class="glyphicon glyphicon-plus"></span>&nbsp; Add Publisher</a></li>
              <!-- link to admin customer.php -->
              <li><a href="admin_customer.php"><span class="glyphicon glyphicon-th-list"></span>&nbsp; Customer Order</a></li>
              <li><a href="admin_signout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
            </ul>
        </div>
      </div>
    </nav>
    <?php
      if(isset($title) && $title == "Index") {
    ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome to online bookstore</h1>
        <p class="lead"></p>
      </div>
    </div>
    <?php } ?>

    <div class="container" id="main">