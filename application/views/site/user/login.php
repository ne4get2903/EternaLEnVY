<script type="text/javascript">
  $(document).ready(function() {
    $('.close').click(function(event) {
        $('.hide-show').hide();
        $('.hide-show').html('');
    });
    $('#form').submit(function(event) {
      $('#user-error, #password-error, #errors-alert').html('');
      $.ajax({
        url: '<?php echo base_url() ?>user/checklogin',
        type: 'POST',
        data: {
          user : $('#user').val(),
          password : $('#password').val()
        },
        success : function(string){
          var data = $.parseJSON(string);
          if (data.errors == 'fail')
          {
            if (data.username_errors)
            {
              $('#user-error').html(data.username_errors);
            }
            if (data.password_errors)
            {
              $('#password-error').html(data.password_errors);
            }
            if (data.errors_alert)
            {
              $('#errors-alert').html(data.errors_alert);
            }
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
                <!-- Modal Đăng nhập content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Đăng Nhập</h2>
                    <div id="errors-alert" class="clear error bg-danger" name="name_error"></div>
                  </div>
                  <div class="modal-body">
                    <form id="form" name="form" method="post" role="form" class="form-horizontal" action="">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Tài khoản</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="user" name="user" placeholder="Tài khoản đăng nhập">
                          <div id="user-error" class="clear error bg-danger" name="name_error"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
                          <div id="password-error" class="clear error bg-danger" name="name_error"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10" style="text-align: right">
                          <button id="submit" type="submit" class="btn btn-success" name="dangnhap">Đăng Nhập</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>