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