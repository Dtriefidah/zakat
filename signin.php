<!DOCTYPE html>

<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Yayasan Anak Griya Yatim Dhuafa" />
  <meta name="keywords" content="yayasan, griya, yatim, dhuafa, gyd, zakat, calculator, calculator zakat, donasi, tangerang selatan, tangsel, jaksel, jakarta, web, aplikasi" />
  <meta name="author" content="" />
  <title>Yayasan Anak Griya Yatim dan Dhuafa</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/acordin.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="shortcut icon" href="image/icon.png" type="image/x-icon" />
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
	 
	 <ul class="nav navbar-nav navbar-right">
	  <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
	  <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
	 </ul>
	</div>
   </div>
  </nav>
  
 <body background='image/bg1.jpg'>
<form name="form1" method="post" action="login.php?register2=success">
<center><table width="650" height='200' bgcolor='#ffe4e1' style='border-radius:10px; margin-top:150px;'>
<tr>
<td colspan="2"><font size='5' style='font-family:snap itc;'><center>Login</center></td>
</tr>
<tr>
<td><font size='4' style='font-family:snap itc; padding:15px;'>UserName : </td>
<td><input name="username" type="text" id="username" style='width:300px;'></td>
</tr>
<tr>
<td><font size='4' style='font-family:snap itc; padding:15px;'>Password : </td>
<td><input name="password" type="password" id="password"></td>
</tr>
<tr>
<td colspan="2"> </td>
</tr>
<tr>
<td colspan="2"><center><input type="submit" name="Submit" value="Login"
style="background-color:#00bfff; width:100; height:30; border-radius:7px; font-family:times new roman; font-size:18px;"></center></td>
</tr>
<tr>
<td colspan="2"> </td>
</tr>
</table>
<p>Klik <a href="index.php">disini</a> untuk kembali ke Home </p></center>
</form>
</body>
<?php mysql_close($connect); ?>