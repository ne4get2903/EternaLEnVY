<script type="text/javascript">
  $(document).ready(function() {
    $('.close').click(function(event) {
        $('.hide-show').hide();
        $('.hide-show').html('');
    });
    $('form').submit(function(event) {
      $('#hoten-error, #user-error,#password-error,#password_r-error,#email-error,#name-error').html('');
      $.ajax({
        url: '<?php echo base_url() ?>user/checkregist',
        type: 'POST',
        data:
        {
          hoten: $('#hoten').val(),
          gt: $('#gt').val(),
          user: $('#user').val(),
          password: $('#password').val(),
          password_r: $('#password_r').val(),
          birth: $('#birth').val(),
          email: $('#email').val()
        },
        success : function(result)
        {
          var data = $.parseJSON(result);
          if (data.errors == 'fail')
          {
            if (data.name_error) {$('#hoten-error').html(data.name_error);};
            if (data.user_error) {$('#user-error').html(data.user_error);};
            if (data.password_error) {$('#password-error').html(data.password_error);};
            if (data.password_r_error) {$('#password_r-error').html(data.password_r_error);};
            if (data.email_error) {$('#email-error').html(data.email_error);};
          }
          else
          {
            window.location.reload();
          }
        }
      })
      return false;
    });
  });
</script>
              <div class="modal-dialog">
                <!-- Modal đăng ký content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Đăng ký tài khoản</h2>
                  </div>
                  <div class="modal-body">
                    <form id="form" name="form" method="post" role="form" enctype="multipart/form-data" class="form-horizontal" action="">
                      <!-- nhập họ tên -->
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Họ tên</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="hoten" name="hoten" placeholder="Họ tên người dùng">
                          <div id="hoten-error" class="clear error bg-danger" name="name_error"></div>
                        </div>
                      </div>
                      <!-- giới tính -->
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Giới tính</label>
                        <div class="col-sm-9" style="text-align:left">
                            <input type="radio" name="gt" id="gt" value="1" checked> Nam
                            <input type="radio" name="gt" id="gt" value="0" > Nữ
                            <input type="radio" name="gt" id="gt" value="2" > Khác
                         </div>
                      </div>
                      <!-- nhập user -->
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Tài khoản</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="user" name="user" placeholder="Tài khoản đăng nhập">
                          <div id="user-error" class="clear error bg-danger" name="name_error"></div>
                        </div>
                      </div>
                      <!-- nhập mật khẩu -->
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
                          <div id="password-error" class="clear error bg-danger" name="name_error"></div>
                        </div>
                      </div>
                      <!-- nhập lại mật khẩu -->
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Nhập lại Pass</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="password_r" name="password_r" placeholder="Nhập lại mật khẩu">
                          <div id="password_r-error" class="clear error bg-danger" name="name_error"></div>
                        </div>
                      </div>
                      <!-- nhập ngày sinh -->
                      <div class="form-group">
                        <label for="link" class="col-sm-3 control-label">Ngày sinh</label>
                        <div class="col-sm-9">
                          <input class="form-control" type="date" name="birth" id="birth" value="">
                        </div>
                      </div>
                      <!-- nhập email -->
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                          <div id="email-error" class="clear error bg-danger" name="name_error"></div>
                        </div>
                      </div>
                      <!-- nhập nút xác nhận đăng ký -->
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10" style="text-align: right">
                          <button type="submit" class="btn btn-success" name="dangky">Đăng ký</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>