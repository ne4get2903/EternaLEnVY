                    <div class="content full-height">
                         <!--=============== description column  ===============-->
                        <div class="fixed-info-container">
                            <div class="option-menu">
                                    <span><img src="<?php echo public_url() ?>/icon/option-menu-icon.png" alt=""></span>
                                    <div class="hidden-setting hidden">
                                        <ul>
                                            <li><a href="" title="">Tùy chỉnh</a></li>
                                            <li><a href="" title="">Xóa</a></li>
                                        </ul>
                                    </div>
                                </div>
                            <h3><?php echo $album->name ?></h3>
                            <div class="separator"></div>
                            <div class="clearfix"></div>
                            <p><?php echo $album->description ?></p>
                            <h4>Thông tin chi tiết :</h4>
                            <ul class="project-details">
                            <li>
                                    <div class="pd-holder">
                                        <h5>Người đăng :  <a href="<?php echo base_url().'personal/home/'.$user->username ?>"><?php echo $user->name ?></a></h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="pd-holder">
                                        <h5>Ngày đăng :  <a><?php echo $album->date ?></a></h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="pd-holder">
                                        <h5>Điểm đánh giá :  <a><?php echo $album->eerate ?></a></h5>
                                    </div>
                                </li>
                            </ul>
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
                            <a href="<?php echo base_url() ?>album/gridview/<?php echo $album->id ?>" class=" btn btn-full trans-btn transition fl-l" target="_blank"><span>Xem Album dạng lưới</span></a>
                        </div>
                        <div class="resize-carousel-holder vis-info">
                            <div id="gallery_horizontal" class="gallery_horizontal owl_carousel demo-gallery">
                            <?php
                                foreach ($photolist as $key => $value) {
                                    ?>
                                    <!-- gallery Item-->
                                    <div class="horizontal_item">
                                        <img src="<?php echo upload_url('photo').'/'.$value->link ?>" alt="">
                                        <div class="show-info">
                                            <span><a href="<?php echo base_url() ?>photo/photoinfo/<?php echo $value->id ?>" title="" target="_blank">Xem chi tiết</a></span>
                                        </div>
                                    </div>
                                    <!-- gallery item end-->
                                    <?php
                                }
                            ?>
                            </div>

                        </div>
                        <!-- portfolio  Images  end-->
                    </div>