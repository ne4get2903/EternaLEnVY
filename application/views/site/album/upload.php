<div class="content">
    <div class="col-sm-offset-2 col-sm-7">
	<form id="form" name="form" class="form-horizontal" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<!-- Tên album -->
		<div class="form-group">
      	<label for="inputEmail3" class="col-sm-3 control-label">Tên album</label>
	      	<div class="col-sm-9">
	              <input class="form-control" type="text" name="name" value="" placeholder="Album name">
	        </div>
      	</div>
      	<!-- Description -->
		<div class="form-group">
      	<label for="inputEmail3" class="col-sm-3 control-label">Description</label>
	      	<div class="col-sm-9">
	              <textarea class="form-control" name="description" placeholder="Description"></textarea>
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
		<!--Đường dẫn hình ảnh -->
		<div class="form-group">
      	<label for="inputEmail3" class="col-sm-3 control-label">Đường dẫn hình ảnh</label>
	      	<div class="col-sm-9">
	              <input class="form-control" type="file"  id="image_list" name="image_list[]" multiple>
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
		<br>
		<!-- submit -->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10" style="text-align: right">
              	<input type="submit" class="btn btn-success" id="submit" name="ok" value="Đăng tải">
            </div>
        </div>
	</form>
	</div>
</div>