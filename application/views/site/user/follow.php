<script type="text/javascript">
  $(document).ready(function() {
    $('.delete').click(function(event) {
      $.ajax({
        url: '<?php echo base_url() ?>/user/dounfollow',
        type: 'POST',
        data: {
          userx: $(this).attr('userid')
        },
        success : function()
        {
          window.location.reload();
        }
      });
    });
  });
</script>
                        <div class="content">
                          <div class="list-user col-sm-offset-2 col-sm-7">
                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                          <th></th>
                                          <th align="left">ID</th>
                                          <th align="left">Name</th>
                                          <th align="left">Thời điểm theo dõi</th>
                                          <th></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $stt = 1;
                                        foreach ($followlist as $key => $value) {
                                          ?>
                                          <tr class='rowlist'>
                                            <td><?php echo $stt ?></td>
                                            <td class='username' align="left"><?php echo $user[$key]->username ?></td>
                                            <td class='name' align="left"><?php echo $user[$key]->name ?></td>
                                            <td class='datetime' align="left"><?php echo $value->datetime ?></td>
                                            <td><a class='delete' userid = '<?php echo $user[$key]->id ?>' href="#" title="Bỏ theo dõi"><img src="<?php echo public_url() ?>/icon/delete.png" alt=""></a></td>
                                          </tr>
                                          <?php
                                          $stt++;
                                        }
                                      ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>