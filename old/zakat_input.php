<?php
	
	$total = $_POST['total'];
	
	$con=mysqli_connect("localhost","root","","zakatkal");
	$waktu_input=gmdate("Ymd");
	$no_ktp = $_POST['no_ktp'];
	$total_zak = $_POST['total'];
	$tipe_zakat = $_POST['tipe_zakat'];
	$con=mysqli_connect("localhost","root","","zakatkal");
	
	if (mysqli_connect_error())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		$qz = "SELECT kd_pembayara FROM zakat ORDER BY kd_pembayara DESC LIMIT 1" ;
		$qz = str_replace("\'","",$qz);
		$result = mysqli_query($con,$qz);
		$sub_tanggal;
		$sub_kd;
		while($row = mysqli_fetch_array($result))
		{
			$sub_tanggal = substr($row['kd_pembayara'],0,8);
			$sub_kd = substr($row['kd_pembayara'],8,12);;
		}
		if($waktu_input==$sub_tanggal){
			$no_tran = (int) $sub_kd;
			if($no_tran<9){
			   $no_tran++;
			   $kd="000".$no_tran;
			} else 
			if($no_tran<99){
			   $no_tran++;
			   $kd="00".$no_tran;
			} else
			if($no_tran<999){
			   $no_tran++;
			   $kd="0".$no_tran;
			} else {
			if($no_tran<9999){
			   $no_tran++;
			   $kd=$no_tran;
			}
			}
		$kd_pembayaran = $waktu_input.$kd;
		echo $kd_pembayaran;
		} else if($waktu_input!=$sub_tanggal) {
			$kd_pembayaran = $waktu_input."0001";
			echo $kd_pembayaran;
		}
		
		$sql = "INSERT INTO `zakat` (`no_ktp`,`total_zakat`,`jns_zakat`,`kd_pembayara`) 
		VALUES ('$no_ktp', '$total_zak','$tipe_zakat', '$kd_pembayaran')";
		mysqli_query ($con, $sql);
		$sql1 = "INSERT INTO `transaksi` (`kd_pembayara`, `no_rek_peng`, `status`,`rek_tujuan`,`tgl_konf`) 
		VALUES ('$kd_pembayaran','','b','','')";
		mysqli_query ($con, $sql1);
		mysqli_close($con);
?>