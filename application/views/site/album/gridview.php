                        <div class="content">
                            <div class="photo-grid" style="padding-top: 40px">
                                <a href="<?php echo base_url() ?>album/albumview/<?php echo $album->id ?>" class=" btn btn-full trans-btn transition fl-l" target="_blank"><span>Xem Album dạng View</span></a>
                                <div id="rating">
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
                                <?php
                                    foreach ($photolist as $key => $value) {
                                        ?>
                                        <a href="<?php echo base_url() ?>photo/photoinfo/<?php echo $value->id ?>" title="">
                                             <img src="<?php echo upload_url('photo').'/'.$value->link ?>" alt="">
                                        </a>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-sm-offset-2 col-sm-8 panel post">
                                            <div class="post-heading">
                                                <div class="pull-left image">
                                                    <img src="
                                                    <?php
                                                            if ($user->avatalink) {
                                                                echo upload_url('avata').'/'.$user->avatalink;
                                                            } else {
                                                                echo upload_url('avata').'/avata.png';
                                                            }

                                                        ?>
                                                    " class="img-circle avatar" alt="user profile image">
                                                </div>
                                                <div class="pull-left meta">
                                                    <div class="title">
                                                        <a href="#">
                                                        <b>
                                                            <?php
                                                                if ($user->name) {
                                                                    echo $user->name;
                                                                }
                                                                else
                                                                {
                                                                    echo $user->username;
                                                                }
                                                            ?>
                                                        </b></a>
                                                        made a post.
                                                        <b>
                                                            <?php echo $album->name ?>
                                                        </b>
                                                    </div>
                                                    <h4 class="text-muted time"><?php echo $album->date ?></h4>
                                                </div>
                                            </div>
                                            <div class="post-description">
                                                <p><?php echo $album->description ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="comment">
                                <h2>Bình luận</h2>
                                <div id="write-comment">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="panel panel-google-plus">
                                                <div class="panel-footer">
                                                    <div class="input-placeholder">Add a comment...</div>
                                                </div>
                                                <div class="panel-google-plus-comment">
                                                    <img class="img-circle" src="
                                                        <?php
                                                            if ($this->session->userdata('user_s')['link']) {
                                                                echo upload_url('avata').'/'.$this->session->userdata('user_s')['link'];
                                                            } else {
                                                                echo upload_url('avata').'/avata.png';
                                                            }

                                                        ?>
                                                    " alt="User Image"  height = '48'/>
                                                    <div class="panel-google-plus-textarea">
                                                        <textarea rows="4"></textarea>
                                                        <button type="submit" class="[ btn btn-success disabled ]">Post comment</button>
                                                        <button type="reset" class="[ btn btn-default ]">Cancel</button>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="comment-list">
                                <!-- comment row -->
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="thumbnail">
                                                <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                            </div><!-- /thumbnail -->
                                        </div><!-- /col-sm-1 -->

                                        <div class="col-sm-10">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <strong>myusername</strong> <span class="text-muted">commented 5 days ago</span>
                                                </div>
                                                <div class="panel-body">
                                                Panel content
                                                </div><!-- /panel-body -->
                                            </div><!-- /panel panel-default -->
                                        </div><!-- /col-sm-5 -->
                                    </div>
                                    <!-- end comment row -->
                                    <!-- comment row -->
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="thumbnail">
                                                <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                            </div><!-- /thumbnail -->
                                        </div><!-- /col-sm-1 -->

                                        <div class="col-sm-10">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <strong>myusername</strong> <span class="text-muted">commented 5 days ago</span>
                                                </div>
                                                <div class="panel-body">
                                                Panel content
                                                </div><!-- /panel-body -->
                                            </div><!-- /panel panel-default -->
                                        </div><!-- /col-sm-5 -->
                                    </div>
                                    <!-- end comment row -->
                                    <!-- comment row -->
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="thumbnail">
                                                <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                            </div><!-- /thumbnail -->
                                        </div><!-- /col-sm-1 -->

                                        <div class="col-sm-10">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <strong>myusername</strong> <span class="text-muted">commented 5 days ago</span>
                                                </div>
                                                <div class="panel-body">
                                                Panel content
                                                </div><!-- /panel-body -->
                                            </div><!-- /panel panel-default -->
                                        </div><!-- /col-sm-5 -->
                                    </div>
                                    <!-- end comment row -->
                                </div>
                            </div>
                        </div>