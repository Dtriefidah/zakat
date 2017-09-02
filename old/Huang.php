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
	  <li class="active">Zakat Uang</li>
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

<h2>Zakat Uang dan Surat Berharga Lainnya</h2>
Untuk menghitung zakat harta yang telah tersimpan selama <strong>1 tahun hijriyah</strong>. Metode perhitungannya sama dengan zakat emas atau perak. Yaitu, dengan nisab senilai <strong>85 gram emas atau 595 gram perak</strong>. Sedangkan zakatnya adalah sebesar <strong>2,5%</strong>.
<br /><br />
<table class="form_perhitungan">
<tr>
	<th colspan="2" class="tableheader"><strong>Nishab</strong></th>
</tr>
<tr>
	<th class="label_cols">Nishab yang digunakan</th>
	<th class="value_cols">
	<select name="opsi_nisab" id="opsi_nisab" onchange="zc_mal_nisab(); zc_mal_hitung();">
		<option value="emas" selected="selected">Emas</option>
		<option value="perak">Perak</option>
	</select>
	</th>
</tr>
<tr>
	<th class="label_cols">Harga 1 gram emas</th>
	<th class="value_cols">Rp <input type="text" id="harga_emas" class="input_angka" onkeyup="validasiAngka(this); zc_mal_nisab(); zc_mal_hitung();" onblur="validasi_numstring(this);" value="511.000,00" /></th>
</tr>
<tr>
	<th class="label_cols">Harga 1 gram perak</th>
	<th class="value_cols">Rp <input type="text" id="harga_perak" class="input_angka" onkeyup="validasiAngka(this); zc_mal_nisab(); zc_mal_hitung();" onblur="validasi_numstring(this);" value="11.000,00" disabled="disabled" /></th>
</tr>
<tr>
	<th class="label_cols"><strong>.:. Nishab</strong></th>
	<th class="value_cols">Rp <input type="text" id="nisab" class="input_angka" disabled="disabled" value="43.435.000,00" /> <input type="hidden" id="nisab_float" value="43435000.00" /></th>
</tr>

<tr>
	<th colspan="2" class="tableheader"><strong>Harta</strong></th>
</tr>
<tr>
	<th class="label_cols">Uang tunai dan tabungan</th>
	<th class="value_cols">Rp <input type="text" id="uang_tabungan" class="input_angka" onkeyup="validasiAngka(this); zc_mal_total_harta();" onblur="validasi_numstring(this);" /></th>
</tr>
<tr>
	<th class="label_cols">Saham dan surat berharga lainnya <sup>[1]</sup></th>
	<th class="value_cols">Rp <input type="text" id="saham" class="input_angka" onkeyup="validasiAngka(this); zc_mal_total_harta();" onblur="validasi_numstring(this);" /></th>
</tr>
<tr>
	<th class="label_cols">Piutang <sup>[2]</sup></th>
	<th class="value_cols">Rp <input type="text" id="piutang" class="input_angka" onkeyup="validasiAngka(this); zc_mal_total_harta();" onblur="validasi_numstring(this);" /></th>
</tr>
<tr>
	<th class="label_cols"><strong>.:. Total Harta</strong></th>
	<th class="value_cols">Rp <input type="text" id="total_harta" class="input_angka" disabled="disabled" /> <input type="hidden" id="total_harta_float" /></th>
</tr>

<tr>
	<th colspan="2" class="tableheader"><strong>Kewajiban</strong></th>
</tr>
<tr>
	<th class="label_cols">Hutang <sup>[3]</sup></th>
	<th class="value_cols">Rp <input type="text" id="hutang" class="input_angka" onkeyup="validasiAngka(this); zc_mal_total_kewajiban();" onblur="validasi_numstring(this);" /></th>
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
<li>Termasuk di dalamnya adalah investasi seperti reksadana dkk. Khusus untuk saham, kami sarankan untuk membaca tulisan di <a href="http://konsultasisyariah.com/zakat-saham" target="_blank">KonsultasiSyariah.com</a>.</li>
<li>Piutang yang diharapkan dapat kembali / ditagih.</li>
<li>Cicilan hutang yang harus dibayar (jatuh tempo) dalam waktu dekat.</li>
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