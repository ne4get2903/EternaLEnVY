             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="datatable_wrapper">
                        <div class="row">
                          <div class="col-sm-12 table-user">
                            <table class="table table-striped table-bordered dataTable no-footer" id="datatable" role="grid" aria-describedby="datatable_info" >
                                  <thead>
                                    <tr role="row">
                                        <th tabindex="0" class="sorting_desc" aria-controls="datatable" style="width: 300px;" aria-label="ID: activate to sort column ascending" aria-sort="descending" rowspan="1" colspan="1">User upload</th>
                                        <th tabindex="0" class="sorting" aria-controls="datatable" style="width: 150px;" aria-label="Rule: activate to sort column ascending" rowspan="1" colspan="1">Ảnh</th>
                                        <th tabindex="0" class="sorting" aria-controls="datatable"  aria-label="Rule: activate to sort column ascending" rowspan="1" colspan="1">Caption</th>
                                        <th tabindex="0" class="sorting" aria-controls="datatable" style="width: 119px;" aria-label="Status: activate to sort column ascending" rowspan="1" colspan="1">Số report</th>
                                        <th tabindex="0" class="sorting" aria-controls="datatable" style="width: 61px;" aria-label="Edit: activate to sort column ascending" rowspan="1" colspan="1">Edit</th>
                                        <th tabindex="0" class="sorting" aria-controls="datatable" style="width: 61px;" aria-label="Delete: activate to sort column ascending" rowspan="1" colspan="1">Delete</th>
                                    </tr>
                                  </thead>


                                  <tbody>
                                  <?php
                                  foreach ($list as $key => $value) {
                                    ?>
                                    <tr class="odd" role="row">
                                      <td align="center" valign="middle" class="sorting_1"><?php echo $value->username ?></td>
                                      <td align="center"><a href="#"><img alt="ID ảnh" src="<?php echo upload_url().'/photo/'.$value->link ?>" width="100"></a></td>
                                      <td><?php echo $value->description ?></td>
                                      <td style="line-height:"100px""><a href="#" "Xem nội dung vi phạm"><?php echo $value->count_report ?></a></td>
                                      <td><i class="fa fa-pencil-square-o fa-2x edit" ></i></td>
                                      <td><i class="fa fa-times fa-2x delete"></i></td>
                                    </tr>
                                    <?php
                                  }
                                  ?>
                                  </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>