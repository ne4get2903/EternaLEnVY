<!-- Header inner  -->
<script type="text/javascript">
$(document).ready(function() {
    // login script
    $('#login').click(function(event) {
        $('.hide-show').show();
         $.ajax({
           url: '<?php echo base_url() ?>user/login',
           type: 'POST',
           dataType: 'html',
           success : function (result){
                    $('.hide-show').html(result);
                }
         })
   });
    // regist script
    $('#regist').click(function(event) {
        $('.hide-show').show();
         $.ajax({
           url: '<?php echo base_url() ?>user/regist',
           type: 'POST',
           dataType: 'html',
           success : function (result){
                    $('.hide-show').html(result);
                }
         })
   });
    // seach script
    $('.cntr input').keyup(function(event) {
      $.ajax({
        url: '<?php echo base_url() ?>/home/seach',
        type: 'POST',
        data: {
          key: $('#inpt_search').val()
        },
        success : function (result)
        {
          $('.result-search').html(result);
        }
      });
      if ($('.cntr input').val() != '')
      {
        $('.result-search').fadeIn();
      }
      else
      {
        $('.result-search').fadeOut();
      }
      });
      $('.cntr input').focusout(function(event) {
          $('.result-search').fadeOut();
      });
      $('.result-member').hover(function() {
          $(this).css('backgroundColor', '#f9f9f9');
      }, function() {
          $(this).css('backgroundColor', '#ffffff');
      });
    });
function logout(){
    $.ajax({
        url: '<?php echo base_url() ?>user/logout',
        type: 'POST',
        success : function(result)
        {
            window.location.reload();
        }
    })
}
</script>
                <div class="header-inner">
                    <!-- Logo  -->
                    <div class="logo-holder">
                        <a href="<?php echo base_url() ?>"><font style="color: red"><img src="<?php echo public_url() ?>/icon/logokieumau.png" alt=""></font></a>
                    </div>
                    <div class="seach-holder">
                        <div class="cntr">
                            <div class="cntr-innr">
                              <form role="form" method="post" action="">
                                <label class="search" for="inpt_search">
                                  <input id="inpt_search" name="timkiem" class="" type="text" value="" />
                                </label>
                              </form>
                            </div>
                          </div>
                          <div class="result-search">
                        </div>
                    </div>

                    <!--Logo end  -->
                    <!--Navigation  -->
                    <div class="nav-holder">
                        <nav>
                            <ul>
<?php
    if ($this->session->userdata('user_s')) {
?>
                                <li><a href="<?php echo base_url().'personal/home/'.$this->session->userdata('user_s')['username']; ?>" title="" style="padding: 0 22px"><img src="<?php echo upload_url().'/avata/'.$this->session->userdata('user_s')['link']; ?>" height="31" width="31" alt=""> &nbsp; <?php echo $this->session->userdata('user_s')['name']; ?></a></li>
<?php
    }
?>
<?php
    if ($this->session->userdata('user_s')) {
?>
                                <li><a href="<?php echo base_url() ?>home/newfeed">Bảng tin</a></li>
<?php
    }
?>
                                <li>
                                    <a id="contact" href="<?php echo base_url() ?>contact" title="">Liên Hệ</a>
                                </li>
<?php
    if (!$this->session->userdata('user_s')) {
?>
                                <li>
                                    <a id="login" href="#" title="">Đăng nhập</a>
                                </li>
<?php
    }
?>
<?php
    if (!$this->session->userdata('user_s')) {
?>
                                <li>
                                    <a id="regist" href="#" title="">Đăng ký</a>
                                </li>
<?php
    }
?>
<?php
    if ($this->session->userdata('user_s')) {
?>
                                <li>
                                <a href="#" title="">Tùy Chỉnh</a>
                                <ul>
                                    <li><a href="<?php echo base_url() ?>user/block" title="">Danh sách chặn</a></li>
                                    <li><a href="<?php echo base_url() ?>user/follow" title="">Danh sách theo dõi</a></li>
                                    <li><a href="<?php echo base_url() ?>user" title="">Sửa thông tin</a></li>
                                    <li><a href="<?php echo base_url() ?>user/changepassword" title="">Đổi mật khẩu</a></li>
                                    <li><a href="#" title="" onclick="logout()">Đăng xuất</a></li>
                                </ul>
                                </li>
<?php
    }
?>
                            </ul>
                        </nav>
                      </div>
                    <!--navigation end -->
                </div>
                <!--Header inner end  -->