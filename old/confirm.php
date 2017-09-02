<?php
$waktu_input=gmdate("Y-m-d H:i:s", time()+60*60*7);

?>
<html>
<head>
 <title>Konfirmasi Pembayaran</title>
</head>
<body>
 <form method = 'POST' action= "confirm_bayar.php">
  <table>
   
   <tr>
    <td>Kode Pembayaran</td>
    <td>:</td>
    <td><input type='text' name='kd_pembayaran'></td>
   </tr>
   <tr>
    <td>Nomor Rekening Pengirim</td>
    <td>:</td>
    <td><input type='text' name='no_rek_peng'></td>
   </tr>
   <tr>
    <td>Rekening Tujuan</td>
    <td>:</td>
    <td><input type='text' name='rek_tuj'></td>
   </tr>
   <tr>
    <td>Status Konformasi</td>
    <td>:</td>
    <td><input type='text' name='status' readonly></td>
   </tr>
   <tr>
    <td></td>
    <td></td>
    <td><input type='submit' value='CEK'></td>
   </tr> 
  </table>  
 </form>
</body>
</html>