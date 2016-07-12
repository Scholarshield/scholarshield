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
                                    <h3 class="panel-title">Morning Route</h3>
                                </div><!-- /panel-heading -->

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Route Name</th>
                                            <th>Start Time</th>
                                            <th>Stop Time</th>
                                            <th>List of Stops</th>
                                            <th>Allocate Bus</th>
                                            <th>Edit/Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $i=1;
                                         foreach($routedetres as $values)
                                         {
                                           echo '
                                                <tr>
                                          <td>'.$i++.'</td>
                                          <td>'.$values['ROUTE_NAME'].'</td>
                                          <td><form role="form" class="sttime form-horizontal form-bordered '.$values['ROUTE_ID'].'" style="display:none">
                                                <div class="form-group">
                                                  <div class="col-sm-5">
                                                <input type="text" data-input="timepicker" data-template="dropdown" class="inpsttime form-control '.$values['ROUTE_ID'].'" placeholder="Start Route Time"/>
                                              </div>
                                             </div>
                                            </form>
                                           <span class="stt '.$values['ROUTE_ID'].'">'.$values['START_ROUTE_TIME'].'</span>
                                          </td>
                                          <td><form role="form" class="form-horizontal form-bordered '.$values['ROUTE_ID'].'" style="display:none">
                                                <div class="form-group">
                                                  <div class="col-sm-5">
                                                <input type="text" data-input="timepicker" data-template="dropdown" class="form-control '.$values['ROUTE_ID'].'" />
                                              </div>
                                             </div>
                                          </form><span class=" '.$values['ROUTE_ID'].'">'.$values['STOP_ROUTE_TIME'].'</td>
                                          <td>taj</td>
                                          <td><form role="form" class="busnumb '.$values['ROUTE_ID'].'" style="display:none">
                                            <div class="form-group">
                                             <label></label>
                                              <input class="bsnumb '.$values['ROUTE_ID'].' form-control" type="text" placeholder="Allocated Bus">
                                            </div>
                                           </form><span class=" '.$values['ROUTE_ID'].'">'.$values['BUS_NUMBER'].'</span></td>
                                          <td><button type="button" class="edrt btn btn-info '.$values['ROUTE_ID'].'" aria-label="Left Align">Edit</button>
                                           <button type="button" class="delrt btn btn-danger '.$values['ROUTE_ID'].'" aria-label="Left Align" style="margin-top:3px;">Delete</button>
                                          </td>
                                         </tr>
                                           ';
                                         }
                                        ?>
                                     </tbody>
                                    </table><!-- /table -->
                         </div><!-- /panel-tblbasic -->
                         </div>
                         <div class="table-responsive">
                            <div id="panel-tblbasic1" class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-actions">

                                        <button data-expand="#panel-tblbasic1" title="expand" class="btn-panel">
                                            <i class="fa fa-expand"></i>
                                        </button>
                                        <button data-collapse="#panel-tblbasic1" title="collapse" class="btn-panel">
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                        <button data-close="#panel-tblbasic1" title="close" class="btn-panel">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div><!-- /panel-actions -->
                                    <h3 class="panel-title">Evening Route</h3>
                                </div><!-- /panel-heading -->

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Route Name</th>
                                            <th>Start Time</th>
                                            <th>Stop Time</th>
                                            <th>List of Stops</th>
                                            <th>Allocate Bus</th>
                                            <th>Edit/Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $i=1;
                                         foreach($routedetreseve as $values)
                                         {
                                           echo '
                                                <tr>
                                          <td>'.$i++.'</td>
                                          <td>'.$values['ROUTE_NAME'].'</td>
                                          <td><form role="form" class="form-horizontal form-bordered" style="display:none">
                                                <div class="form-group">
                                                  <div class="col-sm-5">
                                                <input type="text" data-input="timepicker" data-template="dropdown" class="form-control" />
                                              </div>
                                             </div>
                                          </form>
                                           '.$values['START_ROUTE_TIME'].'
                                          </td>
                                          <td><form role="form" class="form-horizontal form-bordered" style="display:none">
                                                <div class="form-group">
                                                  <div class="col-sm-5">
                                                <input type="text" data-input="timepicker" data-template="dropdown" class="form-control" />
                                              </div>
                                             </div>
                                          </form>'.$values['STOP_ROUTE_TIME'].'</td>
                                          <td>taj</td>
                                          <td>'.$values['BUS_NUMBER'].'</td>
                                          <td><button type="button" class="btn btn-info" aria-label="Left Align">Edit</button>
                                           <button type="button" class="btn btn-danger" aria-label="Left Align" style="margin-top:3px;">Delete</button>
                                          </td>
                                         </tr>
                                           ';
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
                     


