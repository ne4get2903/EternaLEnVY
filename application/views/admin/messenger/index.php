                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-3 mail_list_column">
                        <a href="#">
                        <?php
                          foreach ($contactlist as $key => $value) {
                            ?>
                            <div class="mail_list" idmess="<?php echo $value->id ?>">
                              <div class="left">
                                <i class="fa <?php echo ($value->status == 0) ? 'fa-circle' : 'fa-circle-o' ; ?>"></i>
                              </div>
                              <div class="right">
                                <h3><?php echo $value->name ?><small><?php echo $value->date ?></small></h3>
                                <p><?php echo (strlen($value->contact) > 30) ? substr($value->contact, 0, 30).'...' : $value->contact ; ?></p>
                              </div>
                            </div>
                            <?php
                          }
                        ?>
                        </a>
                      </div>
                      <!-- /MAIL LIST -->

                      <!-- CONTENT MAIL -->
                      <div class="col-sm-9 col-xs-offset-3 mail_view">
                      </div>
                      <!-- /CONTENT MAIL -->
                      </div>
                    </div>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".mail_list").click(function(event) {
      $ele = $(this).find('.fa');
      var id = $(this).attr('idmess');
      $.ajax({
        url: "<?php echo base_url("admin/messenger/readmess/index.php?contact=") ?>"+id,
        success: function(result)
        {
          $ele.removeClass('fa-circle');
          $ele.addClass('fa-circle-o');
          $(".mail_view").html(result);
        }
      });
    });
    $('.mail_view').on('click', '.btn-sm', function(event) {
      var id = $('.mail_view .btn-sm').attr('idmess');
      $.ajax({
        url: "<?php echo base_url("admin/messenger/delete/index.php?contact=") ?>"+id,
        success: function(result)
        {
          alert("Xóa thành công");
          location.reload();
        }

      });
    });
  });
</script>