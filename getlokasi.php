<?php
require_once 'config.php';
//setup HTTP Header supaya client tau kalau ouput dari service ini json
header('Content-Type: application/json');

//cek HTTP REQUEST Method yg datang GET atau bukan
if ($_SERVER['REQUEST_METHOD'] == 'GET') 
{
	//cek kalau di parameter request ada id_lokasi berarti outputin cuma 1 lokasi aja
    if (isset($_GET['id_lokasi'])) 
    {
    	$sql = "SELECT * FROM tb_lokasi WHERE id_lokasi = ".$_GET['id_lokasi'];

		$result = mysql_query($sql, $conn);

		//bikin array lokasi, buat nampung data yg bakal jadiin json
	    $lokasi = array();
	    while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
	    {
	    	$lokasi = array(
	    		'id_lokasi' => $row["id_lokasi"],
	    		'nama_lokasi' => $row['nama_lokasi'],
	    		'harga_bawah' => $row["harga_bawah"],
	    		'harga_atas' => $row["harga_atas"],
	    		'latitude' => $row["latitude"],
	    		'longitude' => $row["longitude"],
	    		'foto' => $base_url.$row["foto"],
	    		'id_user' => $row['id_user'],
	    		'status' => $row['status']
	    		);
	    }

		mysql_close($conn);

		//bikin array response yg bakan di echo jadi json, biasanya gw tambahin status disini
		$response = array(
			'status' => 'true',
			'lokasi' => $lokasi
			);
    }
    //ngga ada parameter id_lokasi berarti outputin semua lokasi
    else
    {
    	$sql = "SELECT * FROM tb_lokasi";

		$result = mysql_query($sql, $conn);

		//bikin array lokasi buat nampung data lokasi dari database
		$lokasi = array();
	    while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
	    {
	    	$lokasi[] = array(
	    		'id_lokasi' => $row["id_lokasi"],
	    		'nama_lokasi' => $row['nama_lokasi'],
	    		'harga_bawah' => $row["harga_bawah"],
	    		'harga_atas' => $row["harga_atas"],
	    		'latitude' => $row["latitude"],
	    		'longitude' => $row["longitude"],
	    		'foto' => $base_url.$row["foto"],
	    		'id_user' => $row['id_user'],
	    		'status' => $row['status']
	    		);
	    }

		mysql_close($conn);

		//bikin array responsenya yang bakal jadiin json
		$response = array(
			'status' => 'true',
			'lokasi' => $lokasi
			);
    }
}
else
{
	//array response kalau ada request yang salah, statusnya bisa error atau false, bebaslah
	$response = array(
		'status' => 'error',
		'msg' => 'Request Method GET'
		);
}

//ubah array response tadi jadi json
echo json_encode($response);