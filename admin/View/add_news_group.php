<?php 
	if(isset($_POST["btn_add"])){
        $sql="SELECT MAX(IdNewsGroup) as max FROM tbl_news_group";
        $query= mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
		$idnewsgroup = $row["max"] + 1;
		$namenewsgroup = $_POST["txt_namenewsgroup"];
		$sql="INSERT INTO `tbl_news_group`(`IdNewsGroup`, `NameNewsGroup`) VALUES ('$idnewsgroup','$namenewsgroup')";
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
	<h3>Update danh sách nhóm tin tức</h3>

	<form action="" method="post">
	  <div class="form-group">
	    <label >NameNewsGroup:</label>
	    <input type="text" class="form-control" name="txt_namenewsgroup" value="" >
			<span class="label label-warning lb_error"><span class="glyphicon glyphicon-remove" style="margin-right: 5px"></span>Không được để trống</span>
	  </div>
	  
	  <button type="submit" class="btn btn-success" name="btn_add">Update</button>
	</form>
</div>