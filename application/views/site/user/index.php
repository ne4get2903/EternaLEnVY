              <div class="content">
                <div class="col-sm-offset-2 col-sm-7">
                  <div class="modal-body">
                    <form id="form" name="form" method="post" role="form" enctype="multipart/form-data" class="form-horizontal" action="">
                      <!-- nhập họ tên -->
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Họ tên</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="hoten" name="hoten" placeholder="Họ tên người dùng" value="<?php echo $info->name ?>">
                          <div class="clear error bg-danger" name="name_error"><?php echo form_error('hoten') ?></div>
                        </div>
                      </div>
                      <!-- giới tính -->
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Giới tính</label>
                        <div class="col-sm-9" style="text-align:center;">
                            <input type="radio" name="gt" id="gt" value="1" <?php if($info->sex == 1 ){ echo 'checked'; } ?>> Nam
                            <input type="radio" name="gt" id="gt" value="0" <?php if($info->sex == 0 ){ echo 'checked'; } ?>> Nữ
                            <input type="radio" name="gt" id="gt" value="2" <?php if($info->sex == 2 ){ echo 'checked'; } ?>> Khác
                         </div>
                      </div>
                      <!-- đường dẫn avata -->
                      <div class="form-group">
                        <label for="link" class="col-sm-3 control-label">Ảnh đại diện</label>
                        <div class="col-sm-9">
                          <input class="form-control" type="file" name="avata" id="avata">
                        </div>
                      </div>
                      <!-- nhập ngày sinh -->
                      <div class="form-group">
                        <label for="link" class="col-sm-3 control-label">Ngày sinh</label>
                        <div class="col-sm-9">

                          <input class="form-control" type="date" name="ngaysinh" id="ngaysinh"  value="<?php echo $info->birthday ?>" placeholder="">
                        </div>
                      </div>
                      <!-- nhập email -->
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $info->email ?>">
                          <div class="clear error bg-danger" name="name_error"><?php echo form_error('email') ?></div>
                        </div>
                      </div>
                      <!-- nhập nút xác nhận cập nhật-->
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10" style="text-align: right">
                          <input type="submit" class="btn btn-success" id="submit" name="submit" value="Cập nhật">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>