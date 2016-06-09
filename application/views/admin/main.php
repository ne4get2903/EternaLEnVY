<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/head'); ?>
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
                <?php $this->load->view('admin/header', $this->data); ?>
            </header>
            <!--header end -->
            <!--=============== wrapper ===============-->
            <div id="wrapper">
                <!--=============== content-holder ===============-->
                <div class="content-holder elem scale-bg2 transition3">
                    <!--page title -->
                    <div class="fixed-title"><span><?php echo $fixedtitle ?></span></div>
                     <!--page title end -->
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