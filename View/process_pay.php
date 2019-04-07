<?php 
	session_start();											/*Trang xử lý giao hàng và thanh toán*/
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	include("../Lib/connection.php");
    if(isset($_SESSION["user"])){ 					/*Lấy ID khách hàng từ session*/ 
    	$user = $_SESSION["user"];
    	$sql="Select * from tbl_customer where Username = '$user'";
		$query= sqlsrv_query($conn_sqlsrv, $sql);
		$row = sqlsrv_fetch_array($query);
		$idcustomer = $row["IdCustomer"];
    } 
    if(isset($_SESSION["total_money"])){				/*Lấy tổng tiền từ session cart*/
    	$total_money = $_SESSION["total_money"];   
    }


 	if(isset($_POST["btn_luu"])){						/*Lấy dữ liệu vừa nhập từ form thanh toán*/
 		$name = $_POST["txt_name1"];
 		$phone = $_POST["txt_phone1"];
 		$hinhthucthanhtoan = $_POST["sl_hinhthucthanhtoan"];
 		$addr = $_POST["txt_addr1"];
 		
 		$tinhthanhpho = $_POST["sl_tinhthanhpho"];			/*Truy vấn lấy ra tên tỉnh*/
 		$sql="Select * from devvn_tinhthanhpho where matp = '$tinhthanhpho'";
		$query= mysqli_query($conn1, $sql);
		$row = mysqli_fetch_array($query);
		$tinhthanhpho = $row["name"];
 		
 		$quanhuyen = $_POST["sl_quanhuyen"];			/*Truy vấn lấy ra tên huyện*/
 		$sql="Select * from devvn_quanhuyen where maqh = '$quanhuyen'";
		$query= mysqli_query($conn1, $sql);
		$row = mysqli_fetch_array($query);
		$quanhuyen = $row["name"];

 		if(isset($_POST["sl_xaphuong"])){			/*Truy vấn lấy ra tên xã*/
 			$xaphuong = $_POST["sl_xaphuong"];
 			$sql="Select * from devvn_xaphuongthitran where xaid = '$xaphuong'";
			$query= mysqli_query($conn1, $sql);
			$row = mysqli_fetch_array($query);
			$xaphuong = $row["name"];
 		}else {
 			$xaphuong ="";
 		}

		$trangthai = "Đang xử lý";

 		$AddressRecevier = "$addr "."$xaphuong".", $quanhuyen".", $tinhthanhpho";
 		
 		$time = date('Y-m-d H:i:s');
 		/*INSERT dữ liệu vào bảng hóa đơn*/
 		$sql="INSERT INTO tbl_bill(IdCustomer, NameRecevier, PhoneReceiver, AddressRecevier, Total, Pay, Time, Status, IdBranch) VALUES ('$idcustomer',N'$name','$phone',N'$AddressRecevier','$total_money',N'$hinhthucthanhtoan','$time',N'$trangthai', '1')";
		$query= sqlsrv_query($conn_sqlsrv, $sql) or die(print_r(sqlsrv_errors(), true));


		/*INSERT dữ liệu vào bảng chi tiết hóa đơn*/
		$sql="SELECT MAX(IdBill) as 'max' FROM tbl_bill";
		$query= sqlsrv_query($conn_sqlsrv, $sql);
		$row = sqlsrv_fetch_array($query);
		$idbill = $row["max"];


		if(isset($_SESSION["cart"])){
			foreach ($_SESSION["cart"] as $key => $val) {
				$number = $val["number"];
				$sql="INSERT INTO tbl_bill_detail(IdBill, IdProduct, Number) VALUES ('$idbill','$key', '$number')";
		        $query= sqlsrv_query($conn_sqlsrv, $sql) or die(print_r(sqlsrv_errors(), true));
		        unset($_SESSION["cart"]);
				header("location: ../index.php?page=cart&&alert=paysuccess");
		}
	}
} else header("location: ../index.php?page=cart&&alert=paysuccess");

 ?>