<?php

	require dirname(__FILE__)."/php/csrf.php";
	$new_token = new CSRF('booking');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="apple-touch-icon" sizes="57x57" href="..img/favicon.ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="..img/favicon.ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="..img/favicon.ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="..img/favicon.ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="..img/favicon.ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="..img/favicon.ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="..img/favicon.ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="..img/favicon.ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="..img/favicon.ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="..img/favicon.ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="..img/favicon.ico..img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="..img/favicon.ico..img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="..img/favicon.ico..img/favicon-16x16.png">
    <link rel="manifest" href="..img/favicon.ico/manifest.json">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    
    <title>Custom Animations</title>

    <!-- Favicon -->
    <link rel="icon" href="img..img/favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">  
    <!-- Icon CSS-->
	<link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="vendors/et-line-icon/et-line.min.css"> 
    <!-- Flexslider CSS-->
	<link rel="stylesheet" type="text/css" href="vendors/flexslider/flexslider.css" media="all"> 
	<!-- Pop Up-->
	<link rel="stylesheet" type="text/css" href="vendors/popup/lightbox.css" media="all"> 
    <!-- Owlcarousel CSS-->
	<link rel="stylesheet" type="text/css" href="vendors/owl_carousel/owl.carousel.css" media="all">
    <!-- Fonts --> 
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,400,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    
    <!--Theme Styles CSS-->
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" /> 
    
    <!--Media Elements CSS-->
	<link rel="stylesheet" type="text/css" href="css/mediaelementplayer.css" />

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// --> 
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>   

    <!-- Preloader -->
    <div class="preloader"></div>
        
	<!-- Header_Area -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu_main" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="../img/custom-animation-logo-2.png" alt="Custom Animation" ></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="row collapse navbar-collapse" id="menu_main">
                <ul class="nav navbar-nav navbar-right navbar-menu">
                    <li><a href="index.html">Home</a></li>
                    	<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sample Videos</a>
                            <ul class="dropdown-menu">
                                <li><a href="education.html">Education</a></li>
                              <li><a href="finance.html">Finance</a></li>
                              <li><a href="catalogue.html">Catalogue</a></li>
                              <li><a href="public-service.html">Public Service</a></li> 
                                <li class="active"><a href="entertainment.html">Entertainment<span class="sr-only">current</span></a></li>
                            </ul>
                        </li> 
                      <li><a href="request-quote.php">Request Quote</a></li> 
                    <!--<li><a href="#"><i class="fa fa-search"></i></a></li> 
                    <li><a href="#"><i class="fa fa-bars"></i></a></li>-->
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <!-- End Header_Area -->
     
    
<div class="container">
    <div class="row">
        <div class="quote-request col-md-8 col-md-offset-2">
           <p><h2>Request a Quotation</h2></br><i>Fill in the form below to get a quotation on your project.</br>Expect a response within 48hrs.</i></p></br>
        <form class="form-horizontal" action="php/action.php" method="post" id="contactForm" role="form">
        		<!-- start token -->
				<div class="token">
					<?php echo $new_token->get_token();?>
				</div>
				<!-- end token -->
                
              <div class="form-group">
                <label class="col-sm-2 control-label" for="name">Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="email">Email address</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="phonenumber">Telephone Number</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Telephone Number">
                </div>
              </div>
              
              <div class="form-group">
              <label class="col-sm-2 control-label">Video Type</label>
              <div class="radio-inline">
              <label class=" control-label"><input type="radio" name="vidtype" id="opt1" value="Advertisement">Advertisement</label>
              </div>
              <div class="radio-inline">
              <label class=" control-label"><input type="radio" name="vidtype" id="opt2" value="Tutorial">Tutorial</label>
              </div>
              <div class="radio-inline">
              <label class=" control-label"><input type="radio" name="vidtype" id="opt3" value="Training">Training</label>
              </div>
              <div class="radio-inline">
              <label class=" control-label"><input type="radio" name="vidtype" id="opt4" value="Public Service Announcement">Public Service Announcement</label>
              </div>
              <div class="radio-inline">
              <label class=" control-label"><input type="radio" name="vidtype" id="opt5" value="Catalogue">Catalogue</label>
              </div>
              <div class="radio-inline">
              <label class="control-label"><input type="radio" name="vidtype" id="opt6" value="Other">Other</label>
              </div>
              
              </div>
            
              <div class="form-group">
                <label class="col-sm-2 control-label" for="length">Video Length</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="length" name="length" placeholder="Video Length">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label" for="addinfo">Any Additional Info?</label>
                <div class="col-sm-10">
                <textarea class="form-control" rows="3" name="addinfo" id="addinfo" placeholder="Additional Info"></textarea>
                </div>
              </div>
              
              <div class="form-group"> 
              
              <label class="col-sm-2 control-label">How did you hear about us?</label>
              <div class="radio-inline">
              <label class="control-label"><input name="discovery" type="radio" id="opt1" value="Online Ad">Online Ad</label>
              </div>
              <div class="radio-inline">
              <label class="control-label"><input name="discovery" type="radio" id="opt2" value="Word of Mouth">Word of Mouth</label>
              </div>
              <div class="radio-inline">
              <label class="control-label"><input name="discovery" type="radio" id="opt3" value="Youtube">Youtube</label>
              </div> 
              <div class="radio-inline">
              <label class="control-label"><input name="discovery" type="radio" id="opt4" value="Other">Other</label>
              </div> 
              
              </div>

            
             </br></br>      
            <button type="submit" class="btn btn-primary">Request Quote</button>
            
        </form>

        </div>
    </div>
</div>
  
   
    <!-- Footer Area -->
    <footer class="footer_area">
        <!-- Footer_bottom -->
        <div class="footer_bottom">
            <div class="container-fluid">
                <div class="row m0">
                    <div class="col-md-6 col-xs-6 footer_bottom_left">
                    	<div class="row">
                        	<div class="col-md-12 col-xs-6">
                            <p>Copyright &copy; 2016 | <a href="request-quote.php">Request a quotation</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 footer_bottom_right footer_icon">
                    	<ul>
                            <li><a href="https://www.youtube.com/channel/UC3IykuMITcfjouqyNY3lLfw"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="http://facebook.com/customanimations"><i class="fa fa-facebook"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> 
    </footer>
    <!-- End Footer Area -->
     
    <!-- jQuery JS -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Pop Up -->
    <script src="vendors/popup/lightbox.min.js"></script>
    
    <!-- Mixitup JS --> 
    <script src="vendors/mixitup/jquery.mixitup.min.js"></script> 
    <!-- Progress JS --> 
    <script src="vendors/circle-progress/circle-progress.js"></script> 
    <!-- Progress JS --> 
    <script src="vendors/counter/jquery.counterup.min.js"></script> 
    <script src="vendors/counter/waypoints.min.js"></script> 
    <!-- Flexslider JS -->
    <script src="vendors/flexslider/jquery.flexslider-min.js"></script> 
    <!-- Owlcarousel JS -->
    <script src="vendors/owl_carousel/owl.carousel.min.js"></script> 
    <!-- Media JS -->
    <script src="vendors/media_file/mediaelement-and-player.min.js"></script>
    <!-- Theme JS -->
    <script src="js/theme.js"></script>
    <!-- media Elements JS -->
    <script src="js/mediaelement-and-player.min.js"></script>
</body>
</html> 