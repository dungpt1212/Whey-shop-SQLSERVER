<?PHP
  $user = "";
  $pass = "";
  if(isset($_POST["bt_dangnhap"])){
    $user = $_POST["txt_user"];
    $pass = $_POST["txt_pass"];
    $pass_md5 = md5($_POST["txt_pass"]);
    if($user =="" || $pass ==""){
      echo('<script>swal({
        text: "Vui lòng nhập đầy đủ thông tin",
        icon: "warning",
        button: "OK",
        });</script>');
    }else{
      $sql= "SELECT * FROM tbl_admin where Username='$user' and Pass='$pass_md5'";
      $params = array();
      $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
      $query = sqlsrv_query($conn_sqlsrv, $sql , $params, $options);
      if(sqlsrv_num_rows($query) != false){
        $_SESSION["admin"]=$user;
        header("location: index.php");
      }else{
        echo '<script>alert("Sai thông tin đăng nhập")</script>';
      }
    }
  }
?>


<div class="full">
        <div class="login">
          <div class="tren">
            <h3>WHEY SHOP</h3>
            <form method="post">
              <div class="form-group">
                <label for="email">USENAME:</label>
                <input type="text" class="form-control" name="txt_user" value="<?PHP echo($user) ?>">
              </div>
              <div class="form-group">
                <label for="pwd">PASSWORD:</label>
                <input type="password" class="form-control" name="txt_pass" value="<?PHP echo($pass) ?>">
              </div>
              <div class="checkbox">
                <label><input type="checkbox">Nhớ mật khẩu</label>
              </div>
              <button type="submit" class="btn btn-block bt_dangnhap" name="bt_dangnhap">Login</button>
            </form>
            <div class="bottom">
                <a href="">Fogot password?</a>
            </div>
          </div>
          <div class="duoi"></div>
        </div>
</div