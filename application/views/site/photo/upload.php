<div class="content">
    <div class="col-sm-offset-2 col-sm-7">
		<form id="form" name="form" action="" class="form-horizontal" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<!-- nhập description -->
      <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
          <div class="col-sm-9">
            	<textarea class="form-control" id="description" name="description" placeholder="Ghi chú cho hình ảnh" ><?php echo $info->description ?></textarea>
          </div>
      </div>
      <!-- Thể loại -->
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Chủ đề</label>
        <div class="col-sm-9" style="text-align:center;">
          <select class="form-control" name="cat">
					 <option value="0">Cat</option>
			     <?php
					 foreach ($list_cat as $key => $value) {
					 ?>
						<option value="<?php echo $value->id ?>"><?php echo $value->catname ?></option>
					 <?php
					}
				?>
				  </select>
        </div>
      </div>
      <!-- Đường dẫn hình -->
			<div class="form-group">
      	<label for="inputEmail3" class="col-sm-3 control-label">Hình ảnh</label>
      	<div class="col-sm-9">
              <input class="form-control" type="file" name="img" value="" placeholder="">
           </div>
      </div>
      <!-- Đường status -->
			<div class="form-group">
        	<label for="inputEmail3" class="col-sm-3 control-label">Chia sẻ</label>
        	<div class="col-sm-9">
            <select class="form-control" name="status">
      				<option value="0">public</option>
      				<option value="1">private</option>
      			</select>
         </div>
      </div>
        <!-- submit -->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10" style="text-align: right">
              	<input type="submit" class="btn btn-success" id="submit" name="ok" value="Đăng tải">
            </div>
         </div>
		</form>
	</div>
</div>