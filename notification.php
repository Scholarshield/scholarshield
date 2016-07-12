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

                    <div style="text-align:center;font: bold 30px Georgia;">Send Notification</div>
                    <div id="panel-inpselect" class="panel panel-default sortable-widget-item">
                        <div class="panel-heading">
                            <div class="panel-actions">
                                <button data-expand="#panel-inpselect" title="expand" class="btn-panel">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button data-collapse="#panel-inpselect" title="collapse" class="btn-panel">
                                    <i class="fa fa-caret-down"></i>
                                </button>
                                <button data-close="#panel-inpselect" title="close" class="btn-panel">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div><!-- /panel-actions -->
                            <h3 class="panel-title">Bulk Notifications</h3>
                        </div><!-- /panel-heading -->

                        <div class="panel-body">
                             <form role="form" class="form-inline form-bordered">
                             <div class="form-group">
                                    <label class="control-label" for="select2"></label>
                                      <select style="width:100%" data-input="select2" placeholder="Select Class" multiple>
                                            <optgroup label="Route Names">
                                                <option value="AZ">Delhi</option>
                                                <option value="CO">Mumbai</option>
                                                <option value="ID">Bhopal</option>
                                                <option value="MT">Indore</option>
                                                <option value="NE">Dewas</option>
                                                <option value="NM">New York</option>
                                                <option value="ND">North Dakota</option>
                                                <option value="UT">Uttar Pradesh</option>
                                                <option value="WY">Chennai</option>
                                            </optgroup>
                                        </select>
                                    </div><!--/form-group-->
                                <div class="form-group">
                                    <label class="control-label" for="select2"></label>
                                      <select style="width:100%" data-input="select2" placeholder="Select " multiple>
                                            <optgroup label="Route Names">
                                                <option value="AZ">Delhi</option>
                                                <option value="CO">Mumbai</option>
                                                <option value="ID">Bhopal</option>
                                                <option value="MT">Indore</option>
                                                <option value="NE">Dewas</option>
                                                <option value="NM">New York</option>
                                                <option value="ND">North Dakota</option>
                                                <option value="UT">Uttar Pradesh</option>
                                                <option value="WY">Chennai</option>
                                            </optgroup>
                                        </select>
                                    </div><!--/form-group--> &nbsp OR &nbsp
                                    <div class="form-group">
                                      <label class="control-label" for="select2"></label>
                                       <select style="width:100%" data-input="select2" placeholder="Select Routes" multiple>
                                            <optgroup label="Route Names">
                                                <option value="AZ">Delhi</option>
                                                <option value="CO">Mumbai</option>
                                                <option value="ID">Bhopal</option>
                                                <option value="MT">Indore</option>
                                                <option value="NE">Dewas</option>
                                                <option value="NM">New York</option>
                                                <option value="ND">North Dakota</option>
                                                <option value="UT">Uttar Pradesh</option>
                                                <option value="WY">Chennai</option>
                                            </optgroup>
                                        </select>
                                </div><!--/form-group-->
                            </form><!--/form-->
                        </div><!-- /panel-body -->
                    </div><!-- /panel-inpselect -->