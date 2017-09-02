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
		<li><a href="confirm.php">Pembayaran</a></li>
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
	  <li class="active">Zakat Emas dan Perak</li>
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

<h2>Zakat Emas dan Perak</h2>
Untuk menghitung zakat emas dan perak yang telah tersimpan selama <strong>1 tahun hijriyah</strong>. Zakat yang dikeluarkan adalah sebesar <strong>2,5%</strong>.<br />
- Nishab emas adalah <strong>85 gram</strong>.<br />
- Nishab perak adalah <strong>595 gram</strong>.
<br /><br />
<form method='POST' action='zakat_input.php'>
<table class="form_perhitungan">
	<input type="hidden" name="tipe_zakat" value="EmasPerak">

	<span class="label_cols">Emas</span>
	<input type="text" name='emas' id="emas" class="input_angka" style="width:60px" onkeyup="validasiAngka(this); zc_emas_perak();" onblur="validasi_numstring(this);" /> gram

<tr>
	<th class="label_cols">Perak</th>
	<th class="value_cols"><input type="text" name='perak' id="perak" class="input_angka" style="width:60px" onkeyup="validasiAngka(this); zc_emas_perak();" onblur="validasi_numstring(this);" /> gram</th>
</tr>
<tr>
	<th colspan="2" class="tableheader"><strong>Zakat</strong></th>
</tr>
<tr>
	<th class="label_cols">.:. Zakat Emas</th>
	<th class="value_cols"><input type="text" id="zakat_emas" class="input_angka" style="width:60px" disabled="disabled" /> gram</th>
</tr>
<tr>
	<th class="label_cols">.:. Zakat Perak</th>
	<th class="value_cols"><input type="text" id="zakat_perak" class="input_angka" style="width:60px" disabled="disabled" /> gram</th>
</tr>
<tr>
	<th colspan="2" class="tableheader"><strong>Zakat (jika dibayar dengan uang)</strong></th>
</tr>
<tr>
	<th class="label_cols">Harga 1 gram emas</th>
	<th class="value_cols">Rp <input type="text" id="harga_emas" class="input_angka" onkeyup="validasiAngka(this); zc_emas_perak();" onblur="validasi_numstring(this);" value="511.000,00" /></th>
</tr>
<tr>
	<th class="label_cols">Harga 1 gram perak</th>
	<th class="value_cols">Rp <input type="text" id="harga_perak" class="input_angka" onkeyup="validasiAngka(this); zc_emas_perak();" onblur="validasi_numstring(this);" value="11.000,00" /></th>
</tr>
<tr>
	<th class="label_cols">Zakat Emas</th>
	<th class="value_cols">Rp <input type="text" id="zakat_emas_uang" class="input_angka" disabled="disabled" /></th>
</tr>
<tr>
	<th class="label_cols">Zakat Perak</th>
	<th class="value_cols">Rp <input type="text" id="zakat_perak_uang" class="input_angka" disabled="disabled" /></th>
</tr>
<tr>
	<th class="label_cols">.:. Total</th>
	<th class="value_cols">Rp <input type="text" name='total' id="zakat_total_uang" class="input_angka" readonly /></th>
</tr>
<tr>
	<th class="label_cols">.:. No. KTP</th>
	<th class="value_cols"><input type="text" name='no_ktp' id="no_ktp" /></th>
</tr>
<tr>
	<th></th>
	<th class="value_cols"><button type='submit' value='Input' />kelar</th>
</tr>
<tr>
	<th colspan="2" class="tableheader" id="keterangan">&nbsp;</th>
</tr>
</table>
</form>
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