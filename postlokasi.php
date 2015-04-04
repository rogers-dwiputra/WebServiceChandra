<?php
require_once 'config.php';
//setup HTTP Header supaya client tau kalau ouput dari service ini json
header('Content-Type: application/json');

	//cek apakah HTTP REQUEST header dari client POST
	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
		//setting untuk upload file
		$target_dir = "img/lokasi/";
		$target_file = $target_dir . basename($_FILES["foto"]["name"]);

		if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) 
		{
	        //insert data
	        $sql = "INSERT INTO tb_lokasi (nama_lokasi, harga_bawah, harga_atas, latitude, longitude, foto, id_user, status) VALUES ('".$_POST['nama_lokasi']."', '".$_POST['harga_bawah']."', '".$_POST['harga_atas']."', '".$_POST['latitude']."', '".$_POST['longitude']."', '".$_FILES["foto"]["name"]."', '".$_POST['id_user']."', '".$_POST['status']."')";

			if (mysql_query( $sql, $conn)) 
			{
				//bikin array response, kalau berhasil statusnya true, biasanya gw outputin apa yang barusan di insert ke database, untuk memudahkan client aja biar ngga usah get2 lagi
			    $response = array(
			    	'status' => 'true',
			    	'nama_lokasi' => $_POST['nama_lokasi'],
			    	'harga_bawah' => $_POST['harga_bawah'],
			    	'harga_atas' => $_POST['harga_atas'],
			    	'latitude' => $_POST['latitude'],
			    	'longitude' => $_POST['longitude'],
			    	'foto' => $base_url.'img/lokasi/'.$_FILES["foto"]["name"],
			    	'id_user' => $_POST['id_user'],
			    	'status' => $_POST['status']
			    	);
			} 
			else
			{
				die('Insert Error: ' . mysql_error());
			}

			mysql_close($conn);
	    } 
	    else 
	    {
	    	//bikin array response kalau uploadnya gagal, misal karena chmod direktorinya ngga readable atau folder img/lokasi ngga ada
	        $response = array(
			'status' => 'error',
			'msg' => 'Upload file gagal'
			);
	    }

	}
	else
	{
		//array response kalau HTTP REQUEST yg masuk bukan POST
		$response = array(
			'status' => 'error',
			'msg' => 'Request Method POST'
			);
	}

	//ubah array response jadi json
	echo json_encode($response);	
?>