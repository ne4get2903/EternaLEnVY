<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('site/head'); ?>
</head>
<body>
	<div class="hide-show"></div>
	<!--Loader  -->
    <div class="loader"><i class="fa fa-refresh fa-spin"></i></div>
    <!--Loader end  -->
    <!--================= main start ================-->
        <div id="main">
            <!--=============== header ===============-->
            <header>
                <?php $this->load->view('site/header', $this->data); ?>
            </header>
            <!--header end -->
            <!--=============== wrapper ===============-->
            <div id="wrapper">
                <!--=============== content-holder ===============-->
                <div class="content-holder elem scale-bg2 transition3">
                    <!--page title -->
                    <div class="fixed-title"><span><?php echo $fixedtitle ?></span></div>
                     <!--page title end -->
                     <?php
                    if ($this->session->userdata('user_s'))
                    {
                    ?>
                    <div class="fixed-tool">
                        <ul>
                            <li class="add-photo"><a href="<?php echo base_url().'photo/upload' ?>" title="Thêm ảnh"><img src="<?php echo public_url() ?>/icon/photo.png" src-hover="<?php echo public_url() ?>/icon/photo-hover.png" alt="Thêm ảnh" ></a></li>
                            <li class="add-album"><a href="<?php echo base_url().'album/upload' ?>" title="Thêm album ảnh"><img src="<?php echo public_url() ?>/icon/album.png" src-hover="<?php echo public_url() ?>/icon/album-hover.png" alt="Thêm album ảnh"></a></li>
                        </ul>
                    </div>
                    <?php
                    }
                    ?>
                      <!--=============== content ===============-->
                      <?php
                        if ($this->session->flashdata('Errorflash')) {
                            ?>
                            <div class="flash_error bg-info">
                                <?php echo $this->session->flashdata('Errorflash') ?>
                            </div>
                            <?php
                        }
                      ?>
                      <?php $this->load->view($temp, $this->data); ?>
                      <!-- Content end  -->
                </div>
                <!-- content holder end -->
            </div>
            <!-- wrapper end -->
            <div class="left-decor"></div>
            <div class="right-decor"></div>
            <!--=============== Footer ===============-->
            <footer>
                <div class="policy-box">
                    <span>&#169; Outdoor 2015 </span>
                    <ul>
                        <li><a href="#">Đồ án Phát triển ứng dụng web</a></li>
                    </ul>
                </div>


            </footer>
            <!-- footer end -->
        </div>
    <!-- Main end -->
</body>
</html>