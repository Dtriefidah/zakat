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
	  <li class="active">Zakat Perdagangan</li>
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

<h2>Zakat Perdagangan</h2>
Barang dagangan di sini termasuk tanah, rumah, kendaraan, ternak (selain kambing, sapi/kerbau dan unta), perhiasan dll yang diniatkan untuk dijual.<br /><br />
- Nishabnya senilai <strong>85 gram emas</strong>.<br />
- Ukuran zakatnya adalah sebesar <strong>2,5% atau 1/40</strong>.<br />
- Telah mencapai haul <strong>1 tahun hijriyah</strong>.
<br /><br />
<table class="form_perhitungan">
<tr>
	<th colspan="2" class="tableheader"><strong>Nishab</strong></th>
</tr>
<tr>
	<th class="label_cols">Harga 1 gram emas murni</th>
	<th class="value_cols">Rp <input type="text" id="harga_emas" class="input_angka" onkeyup="validasiAngka(this); nisab_emas(); zc_mal_hitung();" value="511.000,00" /></th>
</tr>
<tr>
	<th class="label_cols"><strong>.:. Nishab</strong></th>
	<th class="value_cols">Rp <input type="text" id="nisab_emas" class="input_angka" disabled="disabled" value="43.435.000,00" /> <input type="hidden" id="nisab_emas_float" value="43435000.00" /></th>
</tr>

<tr>
	<th colspan="2" class="tableheader"><strong>Harta</strong></th>
</tr>
<tr>
	<th class="label_cols">Uang (Cash, Tabungan, dkk)</th>
	<th class="value_cols">Rp <input type="text" id="uang" class="input_angka" onkeyup="validasiAngka(this); zc_dagang_total_harta();" /></th>
</tr>
<tr>
	<th class="label_cols">Stok Barang Dagangan</th>
	<th class="value_cols">Rp <input type="text" id="stok" class="input_angka" onkeyup="validasiAngka(this); zc_dagang_total_harta();" /></th>
</tr>
<tr>
	<th class="label_cols">Piutang <sup>[1]</sup></th>
	<th class="value_cols">Rp <input type="text" id="piutang" class="input_angka" onkeyup="validasiAngka(this); zc_dagang_total_harta();" /></th>
</tr>
<tr>
	<th class="label_cols"><strong>.:. Total Harta Kena Zakat</strong></th>
	<th class="value_cols">Rp <input type="text" id="total_harta" class="input_angka" disabled="disabled" /> <input type="hidden" id="total_harta_float" /></th>
</tr>

<tr>
	<th colspan="2" class="tableheader"><strong>Kewajiban</strong></th>
</tr>
<tr>
	<th class="label_cols">Hutang <sup>[2]</sup></th>
	<th class="value_cols">Rp <input type="text" id="hutang" class="input_angka" onkeyup="validasiAngka(this); zc_dagang_total_kewajiban();" /></th>
</tr>
<tr>
	<th class="label_cols">Biaya Lain <sup>[3]</sup></th>
	<th class="value_cols">Rp <input type="text" id="biaya" class="input_angka" onkeyup="validasiAngka(this); zc_dagang_total_kewajiban();" /></th>
</tr>
<tr>
	<th class="label_cols"><strong>.:. Total Kewajiban</strong></th>
	<th class="value_cols">Rp <input type="text" id="total_kewajiban" class="input_angka" disabled="disabled" /> <input type="hidden" id="total_kewajiban_float" /></th>
</tr>

<tr>
	<th colspan="2" class="tableheader"><strong>Zakat</strong></th>
</tr>
<tr>
	<th class="label_cols">Selisih harta dan kewajiban</th>
	<th class="value_cols">Rp <input type="text" id="selisih_harta" class="input_angka" disabled="disabled" /></th>
</tr>
<tr>
	<th class="label_cols"><strong>.:. Zakat</strong></th>
	<th class="value_cols">Rp <input type="text" id="zakat_harta" class="input_angka" disabled="disabled" /></th>
</tr>

<tr>
	<th colspan="2" class="tableheader" id="keterangan">&nbsp;</th>
</tr>
</table>
<br />
<div id="footnote">
Keterangan :
<ol>
<li>Piutang yang diharapkan dapat kembali atau ditagih.</li>
<li>Hutang dagang (jangka pendek).</li>
<li>Biaya lain yang masih harus dibayar sebelum sampai waktu pembayaran zakat.</li>
</ol>
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