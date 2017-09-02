<!DOCTYPE HTML>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="Distribution" content="Global" />
<meta name="Robots" content="index,follow" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Yayasan Anak Griya Yatim & Dhuafa" />
  <meta name="keywords" content="yayasan, griya, yatim, dhuafa, gyd, zakat, calculator, calculator zakat, donasi, tangerang selatan, tangsel, jaksel, jakarta, web, aplikasi, ZakatCalc, zakat, mal, harta, penghasilan, profesi, kalkulator" />
  <meta name="author" content="" />
  <title>Yayasan Anak Griya Yatim dan Dhuafa</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/elsyifa.js"></script>
<script language="javascript" type="text/javascript" src="js/main.js"></script>
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
	 <a class="navbar-brand" href="index.php"><font class='digital'><img src='image/gyd.png' width='30px' height='30px'
	 style='float:left;' 'margin-left:-300px;'><b>GRIYA YATIM & DHUAFA <b></font></a>
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
	  <li  class="dropdown active"><a href="zakat.php" class="dropdown-toggle" data-toggle="dropdown">Calculator<b class="caret"></b></a>
	   <ul class="dropdown-menu">
	    <li><a href="fitrah.php">Zakat Fitrah</a></li>
		<li class="active"><a href="mal.php">Zakat Mal</a></li>
	   </ul>
	  </li><li><a href="contact.php">Contact</a></li>
	 </ul>
	 <ul class="nav navbar-nav navbar-right">
	  <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
	  <li><a href="signin.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
	 </ul>
	</div>
   </div>
  </nav>

<div class="container">
   <div class="row">
    <div class="col-lg-12">
	 <h1 class="page-header">KALKULATOR ZAKAT</h1>
	 <ol class="breadcrumb">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="mal.php">Calculator</a></li>
	  <li><a href="mal.php">Zakat Mal</a></li>
	  <li class="active">Zakat Pertanian</li>
	 </ol>
	</div>
   </div>
  
<div id='container'>
<div id='containerbox'>


<div id='searchbar'></div>
<div class='cleared'></div>
</div>
<table id="mainwrapper"><tr>

<th id="contentwrapper">
<div id="content">
<!-- content -->

<h2>Zakat Hasil Pertanian dan Buah-buahan</h2>
Nishab untuk jenis zakat ini adalah sebesar <strong>750 kg</strong>. Dikeluarkan <strong>saat panen</strong> sebesar <strong>5% jika irigasinya menggunakan biaya/beban</strong>, atau <strong>10% jika diairi dengan air hujan/sungai (tanpa biaya)</strong>.
<br /><br />
<table class="form_perhitungan">
<tr>
	<th colspan="2" class="tableheader"><strong>Biji-bijian dan Buah-buahan</strong></th>
</tr>
<tr>
	<th class="label_cols">Hasil Panen</th>
	<th class="value_cols"><input type="text" id="panen" class="input_angka" style="width:60px" onkeyup="validasiAngka(this); zc_pertanian();" /> kg</th>
</tr>
<tr>
	<th class="label_cols">Jenis Pengairan</th>
	<th class="value_cols">
	<select id="persen_zakat" onchange="zc_pertanian();">
		<option value="0.1">tanpa biaya</option>
		<option value="0.05">dengan biaya</option>
	</select>
	</th>
</tr>

<tr>
	<th colspan="2" class="tableheader"><strong>Zakat</strong></th>
</tr>
<tr>
	<th class="label_cols"><strong>.:. Zakat</strong></th>
	<th class="value_cols"><input type="text" id="zakat" class="input_angka" style="width:60px" disabled="disabled" /> kg</th>
</tr>

<tr>
	<th colspan="2" class="tableheader" id="keterangan">&nbsp;</th>
</tr>
</table>
<br />
<div id="footnote">
</div>

<!-- end of content -->

</div>
</th>

</tr></table> <!-- mainwrapper -->

<hr>
   <footer>
    <div class="row">
	 <div class="col-lg-12">
	  <p>Copyright &copy; By Griya Yatim Dhuafa</p>
	 </div>
	</div>
   </footer>
  </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
 </body>
</html>