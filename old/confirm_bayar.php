<?php
	$waktu_input=gmdate("Y-m-d H:i:s", time()+60*60*7);
	$kd_pembayaran = $_POST['kd_pembayaran'];
	/*$no_rek_peng = $_POST['no_rek_peng'];
	$rek_tuj = $_POST['rek_tuj'];*/
	
	$con=mysqli_connect("localhost","root","","zakatkal");
	$qz = "SELECT * FROM transaksi where kd_pembayara=$kd_pembayaran" ;
		$qz = str_replace("\'","",$qz);
		$result = mysqli_query($con,$qz);
		$status;
		while($row = mysqli_fetch_array($result))
		{
			$kd_pembayaran = $row['kd_pembayara'];
			$no_rek_peng = $row['no_rek_peng'];
			$rek_tuj = $row['rek_tujuan'];
			$status = $row['status'];
		}
		if($status=="s"){
			$stat="Sudah Di Konfirmasi";
			echo "<form method='POST' action=''>			
   <table>
   <tr>
    <td>Kode Pembayaran</td>
    <td>:</td>
    <td><input type='text' name='kd_pembayaran1' value='$kd_pembayaran' readonly></td>
   </tr>
   <tr>
    <td>Nomor Rekening Pengirim</td>
    <td>:</td>
    <td><input type='text' name='no_rek_peng' value='$no_rek_peng' readonly></td>
   </tr>
   <tr>
    <td>Rekening Tujuan</td>
    <td>:</td>
    <td><input type='text' name='rek_tuj' value='$rek_tuj' readonly></td>
   </tr>
   <tr>
    <td>Status Konformasi</td>
    <td>:</td>
    <td><input type='text' name='status' value='$stat' readonly> </td>
   </tr>
   <tr>
    <td></td>
    <td></td>
    <td><input type='submit' value='CEK' disabled='disable'></td>
   </tr>
    <tr>
    <td></td>
    <td></td>
    <td><input type='submit' value='Konfirmasi' disabled='disable'></td>
   </tr>  
  </table>  
 </form>";
			
		} else
			if($status=="b"){
				$stat="Belum Di Konfirmasi";
			echo "<form method='POST' action='email.php'>			
			<table>   
   <tr>
    <td>Kode Pembayaran</td>
    <td>:</td>
    <td><input type='text' name='kd_pembayaran1' value='$kd_pembayaran' readonly></td>
   </tr>
   <tr>
    <td>Nomor Rekening Pengirim</td>
    <td>:</td>
    <td><input type='text' name='no_rek_peng' ></td>
   </tr>
   <tr>
    <td>Rekening Tujuan</td>
    <td>:</td>
    <td><input type='text' name='rek_tuj' ></td>
   </tr>
   <tr>
    <td>Status Konformasi</td>
    <td>:</td>
    <td><input type='text' name='status' value='$stat' readonly> </td>
   </tr>
   <tr>
    <td></td>
    <td></td>
    <td><input type='submit' value='CEK' disabled='disable'></td>
   </tr> 
    <tr>
    <td></td>
    <td></td>
    <td><input type='submit' value='Konfirmasi' name='konfir'></td>
   </tr> 
  </table>
  </form>";
			}
		mysqli_close($con);
?>
