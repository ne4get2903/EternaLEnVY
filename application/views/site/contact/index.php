
                        <!--  Section contact form  -->
                        <section class="flat-form" id="sec3">
                            <div class="container">
                                <h2>Liên hệ với chúng tôi</h2>
                                <div id="contact-form">
                                    <form method="post" action="" name="" id="">
                                        <div class="clear error bg-danger" name="name_error"><?php echo form_error('name') ?></div>
                                        <input name="name" type="text" id="name"  class="inputForm2" value="<?php echo set_value('name') ?>" placeholder="Name">
                                        <div class="clear error bg-danger" name="name_error"><?php echo form_error('email') ?></div>
                                        <input name="email" type="text" id="email" class="inputForm2" value="<?php echo set_value('email') ?>" placeholder="Email">
                                        <div class="clear error bg-danger" name="name_error"><?php echo form_error('comments') ?></div>
                                        <textarea name="comments"  id="comments" placeholder="Message" value="<?php echo set_value('comments') ?>" ></textarea>
                                        <input name="ok" type="submit" class="send_message transition" id="submit" value="Gửi" />
                                    </form>
                                </div>
                            </div>
                        </section>
                        <!--  Section contact form end  -->