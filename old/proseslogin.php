<?php
$user = $_POST['user'];
$password = $_POST['password'];
$query = mysql_query("SELECT * FROM costumer where username='$user'");
$result = mysql_fetch_array($query);
$row = mysql_num_rows($query);
if(($user == "") && ($password == ""))
{
print "<script>alert('Anda belum memasukkan username dan password !');
javascript:history.go(-1);</script>";
exit;
}
if($row != 0)
{
if($password != $result['password'])
{
print "<script>alert('Password salah !');
javascript:history.go(-1);</script>";
}
else
{
setcookie("username",$user);
print "<body background='image/bg1.jpg'><center><hr><font size='6'>Anda telah berhasil login sebagai user
$user<br><a href=index2.php style='text-decoration:none; color:black;'><font color=blue>Back to home</a><hr>";
}
}
else
{
print "<body background='image/bg1.jpg'><center><hr><font size='6'>Maaf, Username tidak terdaftar !<br>Silahkan daftar dulu
<a href='login.php?register=masukkan nama,email,dan password untuk daftar'><font
color=blue>disini</a><hr></font>";
}
?>
<?php mysql_close($connect); ?>