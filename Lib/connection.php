<?php 
	//Kết nối csdl ở loaclhost start	

	$conn = mysqli_connect("localhost", "root","","webshop") or die("Kết nối thất bại");
	mysqli_query($conn, "SET NAMES 'UTF8'");
	$conn1 = mysqli_connect("localhost", "root","","don_vi_hanh_chinh") or die("Kết nối thất bại");
	mysqli_query($conn1, "SET NAMES 'UTF8'");

	/*Ket noi voi sql server start*/
	$serverName = "DESKTOP-NUVDSSC"; //serverName\instanceName
	$connectionInfo = array( "Database"=>"webshop_dung", "UID"=>"sa", "PWD"=>"123456", "CharacterSet"=>"UTF-8");
	$conn_sqlsrv = sqlsrv_connect( $serverName, $connectionInfo);
	sqlsrv_query($conn_sqlsrv, "SET NAMES 'UTF8'");
	ini_set('mssql.charset', 'UTF-8');
	if($conn){
		/*echo 'Ket noi thanh cong';*/
	}else{
		echo 'Ket noi that bai';
		die(print_r(sqlsrv_errors(), true));
	}

	/*Ket noi voi sql server end*/


	//Kết nối csdl ở loaclhost end	


	//Kết nối csdl trên host start

	// $conn = mysqli_connect("localhost", "id7429096_1","matkhaudailam","id7429096_webshop") or die("Kết nối thất bại");
	// mysqli_query($conn, "SET NAMES 'UTF8'");
	/*$conn1 = mysqli_connect("localhost", "root","","don_vi_hanh_chinh") or die("Kết nối thất bại");
	mysqli_query($conn1, "SET NAMES 'UTF8'");*/
	
	//Kết nối csdl trên host end


 ?>