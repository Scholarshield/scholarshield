<?php

if(!isset($_SERVER['HTTP_X_PJAX'])){

    $content = basename($_SERVER['SCRIPT_NAME']);

    $_SERVER['HTTP_X_PJAX'] = true;
    require 'stilearn.base.template.php';
    die();
}
?>
                    <!-- STATIC TABLE
                    ================================================== -->
                    <!-- TABLE -->
                    <div class="page-header">
                    </div>

                    <div class="row">
                        <div class="col-sm-12">

                          <a href="table-basic.php"><button type="button" class="btn btn-primary" aria-label="Left Align">
                           <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back
                          </button>
                          </a>
                          <button type="button" id="addnew" data-toggle="modal" data-target="#modalLarge" class="btn btn-success" aria-label="Left Align" style="float:right">
                           <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add
                          </button>
                          <br><br>

                          <div class="alert alert-danger fade in emptywarn" style="display:none">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                             <strong>Oops!</strong> All the fields are required!!
                           </div>

                           <div class="alert alert-success fade in scalrt" style="display:none">
                             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Great!</strong> All changes are saved.
                            </div>
                            <!-- Table-->
                           <div class="table-responsive">
                            <div id="panel-tblbasic" class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-actions">
                                        <button data-expand="#panel-tblbasic" title="expand" class="btn-panel">
                                            <i class="fa fa-expand"></i>
                                        </button>
                                        <button data-collapse="#panel-tblbasic" title="collapse" class="btn-panel">
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                        <button data-close="#panel-tblbasic" title="close" class="btn-panel">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div><!-- /panel-actions -->
                                    <h3 class="panel-title">Rote Table</h3>
                                </div><!-- /panel-heading -->

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Stoopage Name</th>
                                            <th>Parent Name</th>
                                            <th>Parent Mobile</th>
                                            <th>Edit/Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                     $i=1;
                                     foreach($childres as $val)
                                      {
           echo '<tr>
              <td>'.$i++.'</td>
              <td><form role="form" class="chldname '.$val['C_ID'].'" style="display:none">
                    <div class="form-group">
                    <label></label>
                     <input class="cdname '.$val['C_ID'].' form-control" type="text" placeholder="Student Name">
                   </div>
                  </form><span class="shwname '.$val['C_ID'].'">'.$val['CHILD_NAME'].'</span></td>
                  <td><form role="form" class="clsname '.$val['C_ID'].'" style="display:none">
                    <div class="form-group">
                    <label></label>
                     <input class="clname '.$val['C_ID'].' form-control" type="text" placeholder="Class Name">
                   </div>
                  </form><span class="shwcl '.$val['C_ID'].'">'.$val['CLASS'].'</span></td>
                  <td><form role="form" class="secname '.$val['C_ID'].'" style="display:none">
                    <div class="form-group">
                    <label></label>
                     <input class="scname '.$val['C_ID'].' form-control" type="text" placeholder="Section Name">
                   </div>
                  </form><span class="shwsec '.$val['C_ID'].'">'.$val['SECTION'].'</span></td>
                  <td><form role="form" class="stopname '.$val['C_ID'].'" style="display:none">
                    <div class="form-group">
                    <label></label>
                     <input class="stpname '.$val['C_ID'].' form-control" type="text" placeholder="Stoppage_id">
                   </div>
                  </form><span class="shwstp '.$val['C_ID'].'">'.$val['STOPPAGE_NAME'].'</span></td>
                  <td><form role="form" class="parentname '.$val['C_ID'].'" style="display:none">
                    <div class="form-group">
                    <label></label>
                     <input class="prname '.$val['C_ID'].' form-control" type="text" placeholder="Parent Name">
                   </div>
                  </form><span class="shwprname '.$val['C_ID'].'">'.$val['PARENT_NAME'].'</span></td>
                  <td><form role="form" class="parnumb '.$val['C_ID'].'" style="display:none">
                    <div class="form-group">
                    <label></label>
                     <input class="prnumb '.$val['C_ID'].' form-control" type="text" placeholder="Parent Phone">
                   </div>
                  </form><span class="shwphn '.$val['C_ID'].'">'.$val['SMS_NUMBER'].'</span></td>
              <td><a href="#" class="btn btn-info edit '.$val['C_ID'].'" aria-label="Left Align">Edit</a>
              <button type="button" class="btn btn-danger delete '.$val['C_ID'].'" aria-label="Left Align">Delete</button>
              </td>
             </tr>';
                                }
                                 ?>
                                    </tbody>
                                </table><!-- /table -->
                         </div><!-- /panel-tblbasic -->
                         </div>
                         <!-- .modal start-->
                         <div class="modal fade" id="modalLarge" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="modalLargeLabel">Add a new Entry</h4>
                                        </div>
                                        <div class="modal-body">
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                      </div>
                     </div>
