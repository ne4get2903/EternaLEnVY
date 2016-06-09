<script type="text/javascript">
    // Biến dùng kiểm tra nếu đang gửi ajax thì ko thực hiện gửi thêm
var is_busy = false;

// Biến lưu trữ trang hiện tại
var page = 1;

// Biến lưu trữ rạng thái phân trang
var stopped = false;

$(document).ready(function()
{
    // Khi kéo scroll thì xử lý
    $(window).scroll(function()
    {
        // Element append nội dung
        $element = $('.timeline');

        // Nếu màn hình đang ở dưới cuối thẻ thì thực hiện ajax
        if($(window).scrollTop() + $(window).height() >= $element.height())
        {
            // Nếu đang gửi ajax thì ngưng
            if (is_busy == true){
                return false;
            }

            // Nếu hết dữ liệu thì ngưng
            if (stopped == true){
                return false;
            }

            // Thiết lập đang gửi ajax
            is_busy = true;

            // Tăng số trang lên 1
            page++;

            // Gửi Ajax
            $.ajax(
            {
                type        : 'get',
                url         : '<?php echo base_url() ?>/personal/timelinepersonal',
                data        : {
                    page : page,
                    id : '<?php echo $user->id ?>'
                },
                success     : function (result)
                {
                    //alert('still ok');
                    $element.append(result);
                }
            })
            .always(function()
            {
                is_busy = false;
            });
            return false;
        }
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#unfollow').click(function(event) {
            $.ajax({
                url: '<?php echo base_url() ?>personal/dounfollow',
                type: 'POST',
                data: {
                    user: "<?php echo $this->session->userdata('user_s')['id'] ?>",
                    userx : "<?php echo $user->id ?>"
                },
                success : function()
                {
                    window.location.reload();
                }
            });
        });
        $('#follow').click(function(event) {
            $.ajax({
                url: '<?php echo base_url() ?>personal/dofollow',
                type: 'POST',
                data: {
                    user: "<?php echo $this->session->userdata('user_s')['id'] ?>",
                    userx : "<?php echo $user->id ?>"
                },
                success : function()
                {
                    window.location.reload();
                }
            });
        });
        $('#block').click(function(event) {
            $.ajax({
                url: '<?php echo base_url() ?>personal/doblock',
                type: 'POST',
                data: {
                    user: "<?php echo $this->session->userdata('user_s')['id'] ?>",
                    userx : "<?php echo $user->id ?>"
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
                          <div class="info col-sm-2">
                            <div class="idname">
                                <a href="#" title=""><?php echo $user->name ?></a>
                                <h5>Điểm EE : <font style="font-style: italic;"><?php echo $user->eerate ?></font></h5>
                            </div>
                            <div class="avata">
                                <img class="img-thumbnail" src="<?php echo upload_url().'/avata/'.$user->avatalink ?>" width="100%" height="width" alt="">
                            </div>
                            <?php
                                if ($this->session->userdata('user_s')['id'] != $user->id && $this->session->userdata('user_s')) {
                                    ?>
                                    <?php
                                    if ($status == 1) {
                                    ?>
                                    <div class="unfollow col-sm-12">
                                    <button id='unfollow' type="button" class="btn btn-full trans-btn transition fl-l" style="padding: 15px 0">UnFollow</button>
                                    </div>
                                    <?php
                                    }
                                    if (!$status) {
                                    ?>
                                    <div class="follow col-sm-12">
                                    <button id='follow' type="button" class="btn btn-full trans-btn transition fl-l" style="padding: 15px 0">Follow</button>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="block col-sm-12">
                                    <button id='block' type="button" class="btn btn-full trans-btn transition fl-l" style="padding: 15px 0">Block</button>
                                    </div>
                                    <?php
                                }
                            ?>
                          </div>
                          <div  class="timeline col-sm-offset-2 col-sm-7" >
                            <?php
                                if ($news_error) {
                                    ?>
                                    <div class="flash_error bg-info">
                                        <?php echo $news_error; ?>
                                    </div>
                                    <?php
                                }
                            ?>
                            <?php
                                foreach ($timeline as $key => $value) {
                                    if ($value->type == 0) {
                                        ?>
                                        <!-- post content -->
                                        <div class="post-content row">
                                            <div class="option-menu">
                                                <span><img src="<?php echo public_url() ?>/icon/option-menu-icon.png" alt=""></span>
                                                <div class="hidden-setting hidden ">
                                                    <ul>
                                                        <li><a href="" title="">Tùy chỉnh</a></li>
                                                        <li><a href="" title="">Xóa</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                             <div class="[ panel panel-default ] panel-google-plus">
                                                <div class="panel-heading">
                                                    <img class="[ img-circle pull-left ]" src="<?php echo upload_url().'/avata/'.$timeline_ele[$key]['user']->avatalink ?>" alt=""  width=69 height=69 />
                                                    <h3><a href="#" title=""><?php echo $timeline_ele[$key]['user']->name ?></a> made a post</h3>
                                                    <h5><span><?php echo $timeline_ele[$key]['photo']->date ?></span> </h5>
                                                    <h5><span>Với 7.1 điểm EE từ 109 người  </span></h5>
                                                </div>
                                                <div class="panel-body">
                                                    <p><?php $timeline_ele[$key]['photo']->description ?></p>
                                                </div>
                                                <div class="rating">
                                                    <span class="starRating">
                                                        <label class="checked">7</label>

                                                        <label>6</label>

                                                        <label>5</label>

                                                        <label>4</label>

                                                        <label>3</label>

                                                        <label>2</label>

                                                        <label>1</label>
                                                    </span>
                                                </div>
                                                <div class="panel-photo">
                                                    <a href="<?php echo base_url().'photo/photoinfo/'.$timeline_ele[$key]['photo']->id ?>" title=""><img src="<?php echo upload_url().'/photo/'.$timeline_ele[$key]['photo']->link ?>" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end post content -->
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <div class="post-content row">
                                            <div class="option-menu">
                                                <span><img src="<?php echo public_url() ?>/icon/option-menu-icon.png" alt=""></span>
                                                <div class="hidden-setting hidden ">
                                                    <ul>
                                                        <li><a href="" title="">Tùy chỉnh</a></li>
                                                        <li><a href="" title="">Xóa</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="[ panel panel-default ] panel-google-plus">
                                                <div class="panel-heading">
                                                    <img class="[ img-circle pull-left ]" src="<?php echo upload_url().'/avata/'.$timeline_ele[$key]['user']->avatalink ?>" alt=""  width="69" height="69" />
                                                    <h3><a href="#" title=""><?php echo $timeline_ele[$key]['user']->name ?></a> made a post <a href="<?php echo base_url().'album/albumview/'.$timeline_ele[$key]['album']->id ?>" title=""><?php echo $timeline_ele[$key]['album']->name ?></a></h3>
                                                    <h5><span><?php echo $timeline_ele[$key]['album']->date ?></span></h5>
                                                    <h5><span>Với 7.1 điểm EE từ 109 người  </span></h5>
                                                </div>
                                                <div class="panel-body">
                                                    <p><?php echo $timeline_ele[$key]['album']->description ?></p>
                                                </div>
                                                <div class="rating">
                                                    <span class="starRating">
                                                        <label class="checked">7</label>

                                                        <label>6</label>

                                                        <label>5</label>

                                                        <label>4</label>

                                                        <label>3</label>

                                                        <label>2</label>

                                                        <label>1</label>
                                                    </span>
                                                </div>
                                                <div class="panel-photo">
                                                    <?php
                                                        foreach ($timeline_ele[$key]['listphoto'] as $key => $value) {
                                                            ?>
                                                            <a href="<?php echo base_url().'/photo/photoinfo/'.$value->id ?>" alt="" title=""><img src="<?php echo upload_url().'/photo/'.$value->link ?>" alt=""></a>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            ?>
                          </div>
                          </div>