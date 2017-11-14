<!DOCTYPE html>
<html lang="en">
<head>

  <title>E-Pass Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
  .margin {margin-bottom: 45px;}

  .container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
  }
  .navbar {
    padding-top: 5px;
    padding-bottom: 5px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;

  }

  .navbar-nav li a:hover {
    color: #1abc9c !important;
  }
  .navbar-nav li button:hover{
    color: #1abc9c !important;
  }
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
  <!-- Navbar -->
  <nav  class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="bt" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>

        </button>
        <a class="navbar-brand" href="index.php">E-Pass</a>
      </div>
      <div class="collapse navbar-collapse"id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li ><a style="font-size:16px; color:black;" href="login.php">Login</a></li>
          <li class="dropdown">
            <a style="font-size:16px; color:black;" class="dropdown-toggle" data-toggle="dropdown" href="#">Register As
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="passenger/student_register.html">Student</a></li>
                <li><a href="passenger/senior_register.html">Senior</a></li>
                <li><a href="passenger/normal_register.html">Normal</a></li>
              </ul>
            </li>
            <li><a style="color:black; font-size:16px" href="#SECTION">About Us</a></li>

          </ul>
        </div>

      </div>
    </nav>


    <!-- First Container -->
    <div class="text-center" style="padding-top:10% !important; padding-bottom:10% !important;  background-image: url(&quot;https://s3.amazonaws.com/dev.assets.neo4j.com/wp-content/uploads/20170109140118/bloor-report-2017-bnr.jpg&quot;); background-color:rgb(15,66,111);">
      <img src="logo.png" class="img-responsive img-center" style="display:inline;" alt="Bird" width="500" height="350">

    </div>

    <div >

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>

        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active text-center "  style="color: #fff; height:350px;background-image:url(&quot;https://s3.amazonaws.com/dev.assets.neo4j.com/wp-content/uploads/20161212225117/neo4j-3-1p-banner-2000x500.jpg&quot;); background-position:left top;background-repeat: no-repeat; background-color: rgb(15, 66, 111); z-index: 1;">

            <br><br>
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <h1 style="padding-bottom: 10px;">Register as a Student</h1>
                <p class="lead">We provide 50% discount on Student E-pass</p>
                <p class="lead"> Only Students of age 10 and above can apply</p>

                <a href="passenger/student_register.html" class="btn btn-warning btn-lg btn-active">Register Now</a>
              </div>
              <div class="col-md-3"></div>
            </div>
          </div>

          <div class="item text-center "  style="color: #fff; height:350px;background-image:url(&quot;https://s3.amazonaws.com/dev.assets.neo4j.com/wp-content/uploads/20161212225117/neo4j-3-1p-banner-2000x500.jpg&quot;); background-position:left top;background-repeat: no-repeat; background-color: rgb(15, 66, 111); z-index: 1;">
            <br><br>
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <h1 style="padding-bottom: 10px;">Register as a Senior</h1>
                <p class="lead">We provide 50% discount on Senior E-pass</p>
                <p class="lead">One has to be above 60 years of age to apply for the E-pass</p>

                <a href="passenger/senior_register.html" class="btn btn-lg btn-warning">Register Now</a>
              </div>
              <div class="col-md-3"></div>
            </div>
          </div>

          <div class="item text-center "  style="color: #fff;height:350px;background-image:url(&quot;https://s3.amazonaws.com/dev.assets.neo4j.com/wp-content/uploads/20161212225117/neo4j-3-1p-banner-2000x500.jpg&quot;); background-position:left top;background-repeat: no-repeat; background-color: rgb(15, 66, 111); z-index: 1;">
            <br><br>
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <h1 style="padding-bottom: 10px;">Register as a Standard Passenger</h1>
                <p class="lead">Free yourself from standing in the long queue.</p>
                <p class="lead">Book your pass from your couch</p>

                <a href="passenger/normal_register.html" class="btn btn-warning btn-lg">Register Now</a>
              </div>
              <div class="col-md-3"></div>
            </div>
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" style="z-index:2" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" style="z-index:2" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>




    <footer class="container-fluid bg-4 text-center">
      <!-- Second Container -->
      <div id="SECTION" class="container-fluid  text-center">
        <div class="row">
          <div class="col-md-1">
            <!-- Empty div, for padding at the side -->
          </div>
          <div class="col-md-10 ">
            <div class="row">
              <div class="col-md-1 col-xs-1"></div>
              <div class="col-md-5 hidden-xs" style="border-right: 2px solid #ee896b;">
                <img src="chowgules_new_logo.png" class="img-responsive">
              </div>
              <div class="col-md-5 home_data  col-xs-10" style="padding-left: 25px;">
                <h2>Computer Science Department</h2>
                <p>An innitiative taken by the Msc IT students to digitize the bus concession pass system of Goa.</p>
              </div>
              <div class="col-md-1 col-xs-1"></div>
            </div>

          </div>
          <div class="col-md-1">
            <!-- Empty div, for padding at the side -->
          </div>
        </div>
      </div>

    </footer>
  </body>
  </html>
