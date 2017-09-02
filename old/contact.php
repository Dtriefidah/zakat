<!DOCTYPE html>

<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Yayasan Anak Griya Yatim & Dhuafa" />
  <meta name="keywords" content="yayasan, griya, yatim, dhuafa, gyd, zakat, calculator, calculator zakat, donasi, tangerang selatan, tangsel, jaksel, jakarta, web, aplikasi" />
  <meta name="author" content="" />
  <title>Yayasan Griya Yatim dan Dhuafa</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/modern-business.css" rel="stylesheet">
  <link rel="shortcut icon" href="image/icon.png" type="image/x-icon" />
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 </head>
 <style type="text/css">
  @font-face {
   font-family: "FontAwesome";
   src: url('font-awesome/fonts/FontAwesome.otf');
  }
  .digital {
   font-family: "FontAwesome";
   font-size:20px;
   color:white;
  }
 </style>
 <body>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   <div class="container">
    <div class="navbar-header">
	 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	  <span class="sr-only">Toggle navigation</span>
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	 </button>
	 <a class="navbar-brand" href="index.php"><font class='digital'><img src='image/gyd.png'  
	 width='30px' height='30px' style='float:left;' 'margin-left:-300px;'>
	 <font face='FontAwesome' style='font-size:auto;' color='grey'>
	 <b>GRIYA YATIM & DHUAFA</b></font></a>
	</div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	 <ul class="nav navbar-nav navbar-left">
	  <li><a href="index.php">Home</a></li>
 	  <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Profil<b class="caret"></b></a>
	   <ul class="dropdown-menu">
	    <li><a href="sejarah.php">Sejarah GYD</a></li>
		<li><a href="vimis.php">Visi dan Misi</a></li>
		<li><a href="prog.php">Program Kegiatan</a></li>
		<li><a href="legal.php">Landasan Legal</a></li>
	   </ul>
	  </li>
	  	  <li><a href="info.php" class="dropdown-toggle" data-toggle="dropdown">Info<b class="caret"></b></a>
	   <ul class="dropdown-menu">
	    <li><a href="zakat.php">Info Zakat</a></li>
		<li><a href="berita.php">Berita</a></li>
		<li><a href="majalah.php">Majalah</a></li>
	   </ul>
	  </li>
	  <li><a href="zakat.php" class="dropdown-toggle" data-toggle="dropdown">Calculator<b class="caret"></b></a>
	   <ul class="dropdown-menu">
	    <li><a href="fitrah.php">Zakat Fitrah</a></li>
		<li><a href="mal.php">Zakat Mal</a></li>
	   </ul>
	  </li><li class="active"><a href="contact.php">Contact</a></li>
	 </ul>
	 <ul class="nav navbar-nav navbar-right">
	  <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
	  <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
	 </ul>
	</div>
   </div>
  </nav>
  <div class="container">
   <div class="row">
    <div class="col-lg-12">
	 <h1 class="page-header">Contact Us</h1>
	 <ol class="breadcrumb">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="about.php">About</a></li>
	  <li class="active">Contact</li>
	 </ol>
	</div>
   </div>
   <div class="row">
    <div class="col-md-7">
	 <br>
	 <img class="img-responsive" src="image/gyd.png" style="width:55%; height:55%; alt="">
	 <br>
	</div>
	<div class="col-md-5">
	 <h3>Kantor Pelayanan</h3>
	 <p>Virgin Island NA-7 De Latinos, BSD Rawa Buntu Kec. serpong Tangsel<br></p>
	 <p><i class="fa fa-phone"></i><abbr title="Phone"></abbr> &nbsp Phone : 021 9355 5981</p>
	 <p><i class="fa fa-envelope-o"></i><abbr title="Email"></abbr> &nbsp E-mail : <a href="mailto:griyayatimdhuafa@gmail.com">griyayatimdhuafa@gmail.com</a></p>
	 <p><i class="fa fa-clock-o"></i><abbr title="Hours"></abbr> &nbsp Operational : Senin - Jum'at: 08.00 - 17.00 wib</p><br>
	 <ul class="list-unstyled list-inline list-social-icons">
	  <li><a href="https://www.facebook.com/GYD.Pusat"><i class="fa fa-facebook-square fa-2x"></i></a></li>
	  <li><a href="https://twitter.com/GRIYAYATIMdhf"><i class="fa fa-twitter-square fa-2x"></i></a></li>
	  <li><a href="https://www.youtube.com/chanel/UC6s3TFQfS3VCOCJCIeTMyZw"><i class="fa fa-youtube-square fa-2x"></i></a></li>
	 </ul>
	</div>
   </div>
   <div class="row">
    <div class="col-md-8">
	 <h3>Send us a Message</h3>
	  <form name="sentMessage" id="contactForm" novalidate>
	   <div class="control-group form-group">
	    <div class="controls">
		 <label>Full Name:</label>
		 <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
		 <p class="help-block"></p>
		</div>
	   </div>
	   <div class="control-group form-group">
	    <div class="controls">
		 <label>Phone Number:</label>
		 <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
		</div>
	   </div>
	   <div class="control-group form-group">
	    <div class="controls">
		 <label>Email Address:</label>
		 <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
		</div>
	   </div>
	   <div class="control-group form-group">
	    <div class="controls">
		 <label>Message:</label>
		 <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
		</div>
	   </div>
	   <div id="success"></div>
	   <button type="submit" class="btn btn-primary">Send Message</button>
	  </form>
	 </div>
	</div>
	<hr>
   <footer>
    <div class="row">
	 <div class="col-lg-12">
	  <p>Copyright &copy; By GS Team Development</p>
	 </div>
	</div>
   </footer>
  </div>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>
 </body>
</html>
