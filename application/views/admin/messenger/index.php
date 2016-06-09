                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-3 mail_list_column">
                        <a href="#">
                        <?php
                          foreach ($contactlist as $key => $value) {
                            ?>
                            <div class="mail_list">
                              <div class="left">
                                <i class="fa <?php echo ($value->status == 0) ? 'fa-circle' : 'fa-circle-o' ; ?>"></i> <i class="fa fa-edit"></i>
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
                        <div class="inbox-body">


                          <div class="mail_heading row">
                          <div class="col-xs-2">                              
                                <div class=" btn-group">
                                <button class="btn btn-sm btn-default" type="button" data-original-title="Forward" data-toggle="tooltip" data-placement="top"><i class="fa fa-share fa-2x"></i></button>
                                 </div>
                                <div class=" btn-group">
                                <button class="btn btn-sm btn-default" type="button" data-original-title="Print" data-toggle="tooltip" data-placement="top"><i class="fa fa-print fa-2x"></i></button>
                                 </div>
                                <div class=" btn-group">
                                <button class="btn btn-sm btn-default" type="button" data-original-title="Trash" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash-o fa-2x" ></i></button>
                              </div>
                            </div>
                            <div class="col-md-4  text-right">
                              <p class="date"> 8:02 PM 12 FEB 2014</p>
                            </div>

                            </div>


                            <div class="col-md-12">
                              <h4> LINH KUTE 628. SV LÀM THÊM LẦN ĐẦU LÊN SÓNG </h4>
                            </div>
                          </div>
                          <div class="sender-info">
                            <div class="row">
                              <div class="col-md-12">
                                <strong>Ella X</strong>
                                <span>(ella.x@gmail.com)</span> to
                                <strong>me</strong>
                                <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="view-mail">
                            <p>Tôi đã gặp em nó rất tình cờ.Em là 1 cô sinh viên trường Y đang thiếu thốn mọi thứ từ tình cảm đến vật chất.Tôi đã mủi lòng và ngỏ ý muốn giúp em nó trong giai đoạn khó khăn này.Em đã đồng ý để tôi mang đi sự trong trắng của em ở tuổi 18.Em nhẹ nhàng tình cảm.Tôi có cảm giác em coi tôi như một người tình thực sự.Những cơn đau nhẹ trong lần đầu ấy như làm tôi thương em hơn.Một chút máu đã ra và tôi hiểu rằng phải cần làm gì cho em.Tôi đã dạy em biết cách làm tình từ Hj, cho đến BJ…Tất cả mỏi thứ diễn ra suôn sẻ.Điều tôi thích nhất ở em đó chính là cặp vú của tuổi mới lớn.Dường như chưa từng ai động vào nó.Hồng hào và căng tròn sức sống.</p>
                            <p>Tôi đã lên đỉnh trong sự sung sướng tột đỉnh.Còn em cũng đã lần đầu nếm trải cảm giác được thăng hoa trong lần đầu quan hệ.</p>
                            <p>EM NÓ LÀ SV ĐI LÀM THÊM KIẾM THÊM THU NHẬP.CÒN RẤT NHIỀU BỠ NGỠ.MONG AE  TẬN TÌNH CHỈ BẢO VÀ ỦNG HỘ EM NÓ THÊM NHÉ.TÔI RẤT CẢM ƠN AE.</p>
                            <p>LINH KUTE MS 628 <br>
                                 Năm sx : 1997 <br>
                                 KHU VỰC : NKT <br>
                                 Giá : 300k / 1 slot N2 : 100k/ 2 tiếng đầu
                                 </p>
                          </div>
                          
                    <div class="form-group">
                        <label class="control-label col-xs-1">Trả lời</label>
                        <div class="col-xs-11">
                            <textarea type="reply" class="form-control" placeholder="Nội dung" rows="3"></textarea>
                        </div>
                        <div class="col-xs-offset-10 col-xs-2">    
                            <button type="submit" class="btn btn-primary"><i class="fa fa-reply"></i> Reply</button>
                        </div>
                    </div>   


                        </div>

                      </div>
                      <!-- /CONTENT MAIL -->
                    </div>
                  </div>