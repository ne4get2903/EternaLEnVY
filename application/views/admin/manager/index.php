             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="datatable_wrapper">
                        <div class="row" id="content-manager">
                          <div class="col-sm-12 table-user">
                            <table class="table table-striped table-bordered dataTable no-footer" id="datatable" role="grid" aria-describedby="datatable_info">
                                  <thead>
                                    <tr role="row">
                                        <th tabindex="0" class="sorting_desc" aria-controls="datatable" style="width: 265px;" aria-label="ID: activate to sort column ascending" aria-sort="descending" rowspan="1" colspan="1">ID</th>
                                        <th tabindex="0" class="sorting" aria-controls="datatable" style="width: 161px;" aria-label="Rule: activate to sort column ascending" rowspan="1" colspan="1">Rule</th>
                                        <th tabindex="0" class="sorting" aria-controls="datatable" style="width: 161px;" aria-label="Rule: activate to sort column ascending" rowspan="1" colspan="1">Date join</th>
                                        <th tabindex="0" class="sorting" aria-controls="datatable" style="width: 119px;" aria-label="Status: activate to sort column ascending" rowspan="1" colspan="1">Status</th>
                                        <th tabindex="0" class="sorting" aria-controls="datatable" style="width: 61px;" aria-label="Edit: activate to sort column ascending" rowspan="1" colspan="1">Edit</th>
                                        <th tabindex="0" class="sorting" aria-controls="datatable" style="width: 61px;" aria-label="Delete: activate to sort column ascending" rowspan="1" colspan="1">Delete</th>
                                        <th tabindex="0" class="sorting" aria-controls="datatable" style="width: 61px;" aria-label="Block: activate to sort column ascending" rowspan="1" colspan="1">Block</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      foreach ($userlist as $key => $value) {
                                        ?>
                                        <tr class="odd" role="row">

                                          <td class="sorting_1"><?php echo $value->username ?></td>
                                          <td><?php echo ($value->role == 1)?'admin':'member' ?></td>
                                          <td><?php echo $value->birthday ?></td>
                                          <td><?php echo ($value->status == 0)?'Available':'Locked' ?></td>
                                          <td><i class="fa fa-pencil-square-o fa-2x edit" ></i></td>
                                          <td><i class="fa fa-times fa-2x delete"></i></td>
                                          <td><i class="fa fa-lock fa-2x block"></i></td>

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