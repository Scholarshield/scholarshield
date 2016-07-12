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

                           <ul class="nav nav-tabs">
                             <li class="active"><a data-toggle="tab" href="#stud">Students</a></li>
                             <li><a data-toggle="tab" href="#vech">Vechicle</a></li>
                             <li><a data-toggle="tab" href="#mang">Device Manager</a></li>
                           </ul>
                           <div class="tab-content">
                            <div id="stud" class="tab-pane fade in active">

                            <div class="form-group" style="float:right;margin-right:5px;margin-top:5px;">
                              <div class="fileinput fileinput-new" data-provides="fileinput">
                                <span class="btn btn-icon btn-icon-right btn-primary btn-file">
                                  <i class="fa fa-upload"></i>
                                    <span class="fileinput-new">Select file</span>
                                     <span class="fileinput-exists">Change</span>
                                      <input type="file" name="fileinput_inline" id="fileinput_inline">
                                     </span>
                                  <span class="fileinput-filename"></span>
                                <button class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</button>
                             </div><!-- /fileinput -->
                            </div><!-- /form-group -->

                              <button type="button" class="btn btn-info btn-md" style="float:right;margin-right:10px;margin-top:5px;">
                                <span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload
                              </button>

                            <br><br><br>
                            <!-- Table-->
                           <div class="table-responsive">
                            <div id="panel-tblbasic" class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-actions">
                                        <button data-refresh="#panel-tblbasic" title="refresh" class="btn-panel">
                                            <i class="fa fa-refresh"></i>
                                        </button>
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
                                    <h3 class="panel-title">Route Table</h3>
                                </div><!-- /panel-heading -->

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Route Name</th>
                                            <th>Download Template</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                     $i=1;
                                     $stdurl='showtable.php?chkdet=';
                                      foreach ($busrslt as $values)
                                       {
                                       echo'<tr>
                                             <td>'.$i++.'</td>
                                             <td><a href="'.htmlspecialchars($stdurl.''.$values["route_id"]).'" class="btn btn-primary">'.$values['route_name'].'</a></td>
                                             <td>
                                              <button type="button" class="download btn btn-success btn-md '.$values['route_id'].'">
                                              <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download</button>
                                             </td>
                                            </tr> ';
                                       }
                                     ?>
                                    </tbody>
                                </table><!-- /table -->
                         </div><!-- /panel-tblbasic -->
                         </div>
                        </div><!-- /end - Students tab-->

                        <div id="vech" class="tab-pane fade">
                        <h3>Vechicles</h3>
                         <p>Vechicles table will be shown here</p>
                        </div>
                        <div id="mang" class="tab-pane fade">
                         <h3>Managers</h3>
                         <p>Managers will be shown here</p>
                        </div>

                       </div> <!-- /end - tabcontent -->
                      </div>
                     </div>
                     


