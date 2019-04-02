<?php 
	if(isset($_POST["btn_add"])){
		$namegroup = $_POST["txt_namegroup"];
		$sql="SELECT MAX(IdGroupProduct) as max FROM tbl_product_group";
		$query= mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		$idgroup = $row["max"] + 1;
		$sql="INSERT INTO `tbl_product_group`(`IdGroupProduct`, `NameGroupProduct`) VALUES ('$idgroup','$namegroup')";
		$query= mysqli_query($conn, $sql) or die("Thêm mới thất bại");
		echo('<script>swal({
              title: "Congratulation",
              text: "Thêm mới thành công thành công",
              icon: "success",
              button: "OK",
              });</script>');
	}
  


?>






<div class="container page_update ">
	<h3>Thêm mới nhóm sản phẩm</h3>
	<form action="" method="post">
	  <div class="form-group">
	    <label>NameGroupProduct:</label>
	    <input type="text" class="form-control check_error" name="txt_namegroup" value="" placeholder="Nhập tên nhóm...">
	    <span class="label label-warning lb_error"><span class="glyphicon glyphicon-remove" style="margin-right: 5px"></span>Không được để trống</span>
	  </div>
	  <button type="submit" class="btn btn-success" name="btn_add">Add</button>
	</form>
</div>