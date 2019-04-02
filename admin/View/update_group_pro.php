<?php 


  if(isset($_GET["id"])){
  	$id=$_GET["id"];
  	$sql="SELECT * FROM tbl_product_group where IdGroupProduct='$id'";
	$query= mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);

	if(isset($_POST["btn_update"])){
		$idgroup = $_POST["txt_idgroup"];
		$namegroup = $_POST["txt_namegroup"];
		$sql="UPDATE `tbl_product_group` SET `IdGroupProduct`= '$idgroup',`NameGroupProduct`='$namegroup' WHERE IdGroupProduct='$id' ";
		$query= mysqli_query($conn, $sql) or die("Update thất bại");
		echo('<script>swal({
              title: "Congratulation",
              text: "Update thành công",
              icon: "success",
              button: "OK",
              });</script>');
	}
  }


?>






<div class="container page_update">
	<h3>Update danh sách nhóm sản phẩm</h3>

	<form action="" method="post">
	  <div class="form-group">
	    <label >IdGroupProduct:</label>
	    <input type="text" class="form-control" name="txt_idgroup" value="<?PHP echo($row["IdGroupProduct"]) ?>" readonly>
	  </div>
	  <div class="form-group">
	    <label>NameGroupProduct:</label>
	    <input type="text" class="form-control check_error" name="txt_namegroup" value="<?PHP echo($row["NameGroupProduct"]) ?>">
	    <span class="label label-warning lb_error"><span class="glyphicon glyphicon-remove" style="margin-right: 5px"></span>Không được để trống</span>
	  </div>
	  <button type="submit" class="btn btn-success" name="btn_update">Update</button>
	</form>
</div>