              <div class="content row">
                <div class="col-sm-offset-2 col-sm-7">
                    <form id="form" name="form" method="post" role="form" class="form-horizontal" action="">
                    <!-- nhập mật khẩu cũ -->
                      <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Nhập mật khẩu cũ</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" value="<?php echo set_value('password') ?>">
                          <div class="clear error bg-danger" name="name_error"><?php echo form_error('password') ?></div>
                        </div>
                      </div>
                      <!-- nhập mật khẩu mới -->
                      <div class="form-group">
                        <label for="new_password" class="col-sm-3 control-label">Nhập mật khẩu mới</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Mật khẩu" value="<?php echo set_value('new_password') ?>">
                          <div class="clear error bg-danger" name="name_error"><?php echo form_error('new_password') ?></div>
                        </div>
                      </div>
                      <!-- nhập lại mật khẩu mới -->
                      <div class="form-group">
                        <label for="new_password_r" class="col-sm-3 control-label">Nhập lại mật khẩu mới</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="new_password_r" name="new_password_r" placeholder="Nhập lại mật khẩu" value="<?php echo set_value('new_password_r') ?>">
                          <div class="clear error bg-danger" name="name_error"><?php echo form_error('new_password_r') ?></div>
                        </div>
                      </div>
                      <!-- nhập nút xác nhận cập nhật-->
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10" style="text-align: right">
                          <input type="submit" class="btn btn-success" name="ok" value="Cập nhật" placeholder="">
                        </div>
                      </div>
                    </form>
                </div>
              </div>