<?php
//error_reporting(0);
if (isset($_POST['signup'])) {
  $fname    = $_POST['fullname'];
  $email    = $_POST['emailid'];
  $mobile   = $_POST['mobileno'];
  $password = md5($_POST['password']);

  // 1. Kiểm tra xem email hoặc số điện thoại đã tồn tại chưa
  $sql   = "SELECT ND_Email, ND_SoDt FROM nguoi_dung WHERE ND_Email = :email OR ND_SoDt = :mobile";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
  $query->execute();

  if ($query->rowCount() > 0) {
      echo "<script>alert('Email hoặc số điện thoại đã được đăng ký. Vui lòng thử lại với email/số điện thoại khác.');</script>";
  } else {
      // 2. Thực hiện chèn bản ghi mới
      $sqlInsert = "INSERT INTO nguoi_dung (ND_HoTen, ND_Email, ND_SoDt, ND_PassWord)
                    VALUES (:fname, :email, :mobile, :password)";
      $insert = $dbh->prepare($sqlInsert);
      $insert->bindParam(':fname', $fname, PDO::PARAM_STR);
      $insert->bindParam(':email', $email, PDO::PARAM_STR);
      $insert->bindParam(':mobile', $mobile, PDO::PARAM_STR);
      $insert->bindParam(':password', $password, PDO::PARAM_STR);

      if ($insert->execute()) {
          echo "<script>alert('Đăng ký thành công. Bây giờ bạn có thể đăng nhập.');</script>";
      } else {
          echo "<script>alert('Đăng ký không thành công. Vui lòng thử lại.');</script>";
      }
  }
}

?>


<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script>

<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Đăng ký</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup">
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Họ và tên" required="required">
                </div>
                      <div class="form-group">
                  <input type="text" class="form-control" name="mobileno"  placeholder="Số điện thoại" maxlength="10" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Địa chỉ email" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required="required">
                </div>
          
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">Tôi đồng ý với <a href="http://localhost/carrental/page.php?type=terms">Điều khoản sử dụng</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Đăng ký" name="signup" id="submit" class="btn btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Bạn đã có tài khoản? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Đăng nhập ngay</a></p>
      </div>
    </div>
  </div>
</div>