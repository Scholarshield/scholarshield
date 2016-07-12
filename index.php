<?php

if(!isset($_SERVER['HTTP_X_PJAX'])){

    $content = basename($_SERVER['SCRIPT_NAME']);

    $_SERVER['HTTP_X_PJAX'] = true;
    require 'stilearn.base.template.php';
    require 'indexcore.php';
    die();
}

?>
                    <!-- DASHBOARD
                    ================================================== -->
                    <!-- Dashboard  -->
                    <div class="row margin-top">

                            <div id="system-stats" class="tab-pane fade active in">
                               <div class="col-md-4">
                                    <a href="#" style="text-decoration: none;"><div id="overall-bandwidth" data-toggle="tooltip" data-placement="top" title="Click To See All Buses!" class="panel panel-animated panel-primary bg-primary">
                                        <div class="panel-body">
                                             <p>
                                                <div class="easyPieChart" data-barColor="#232332" data-trackColor="#ecf0f1" data-scaleColor="#ecf0f1" data-percent="100" data-size="120">
                                                    <span>100%</span>
                                                </div>
                                                <p class="text-ellipsis text-center" style="font-size:20px;"><?php echo 'Total buses: '.$albusrslt; ?></p>
                                            </p>
                                        </div><!--/panel-body-->
                                    </div></a><!--/panel overal-bandwidth-->
                                </div><!--/cols-->

                                <div class="col-md-4">
                                     <a href="#" style="text-decoration: none;"><div id="overall-diskspace" data-toggle="tooltip" data-placement="top" title="Click To See Active Routes!" class="panel panel-animated panel-success bg-success">
                                        <div class="panel-body">
                                            <p>
                                                <div class="easyPieChart" data-barColor="#232332" data-trackColor="#ecf0f1" data-scaleColor="#ecf0f1" <?php echo 'data-percent="'.$actpercent.'"'; ?> data-size="120">
                                                    <span>100%</span>
                                                </div>
                                                <p class="text-ellipsis text-center" style="font-size:20px;"><?php echo 'Active Routes: '.count($actbusrslt); ?></p>
                                            </p>
                                        </div><!--/panel-body-->
                                    </div></a><!--/panel overal-diskspace-->
                                </div><!--/cols-->

                                <div class="col-md-4">
                                     <a href="#" style="text-decoration: none;"><div id="overall-phisicmem" data-toggle="tooltip" data-placement="top" title="Click To See Completed Routes!" class="panel panel-animated panel-warning bg-warning">
                                        <div class="panel-body">
                                            <p>
                                                <div class="easyPieChart" data-barColor="#232332" data-trackColor="#ecf0f1" data-scaleColor="#ecf0f1" data-size="120">
                                                    <span>100%</span>
                                                </div>
                                                <p class="text-ellipsis text-center" style="font-size:20px"><?php echo 'Completed Routes: '.count($cmprtres); ?></p>
                                            </p>
                                        </div><!--/panel-body-->
                                    </div></a><!--/panel overal-phisicmem-->
                                </div><!--/cols-->


                            </div><!--/#system-stats-->



                    </div><!--/row-->

                    <div class="row">
                        <div class="col-sm-12">

                            <!-- VMAP -->
                            <div id="panel-default" class="panel panel-animated panel-default">
                                <div class="panel-heading bg-white">
                            <div class="panel-actions">
                                <div class="btn-group">
                                    <button class="btn-panel dropdown-toggle selectbus" data-toggle="dropdown">
                                        Select Bus
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul id="changeMapRegion" class="dropdown-menu pull-right">
                                    </ul>
                                </div><!--/btn-group-->
                               </div><!-- /panel-actions -->
                                 <h4 class="panel-title" id="mapRegion">Bus Map</h4>
            			</div><!--panel-heading-->

                               <div class="panel-body">
                                <div id="map_canvas" style="height:450px;"></div>
                               </div><!--/panel-body-->
                            </div><!--/panel-->
                        </div><!--/cols-->

 <div class="modal fade" data-sound="off" id="myMapModal" tabindex="-1" role="dialog" aria-labelledby="modalAnimatedLabel" aria-hidden="true">
   <div class="modal-dialog animated bounceIn" style="width:85%;">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="resetpath close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Completed Path</h4>
        </div>
        <div class="modal-body">
           <div id="busmap" style="height:400px;"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="resetpath btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- end--Modal content-->

    </div>
  </div>


  <div class="col-sm-12">
  
  <div id="panel-tblbasic" class="panel panel-default" style="display:none;">
                                <div class="panel-heading">
                                    <div class="panel-actions">
                                        <button data-collapse="#panel-tblbasic" title="collapse" class="btn-panel">
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                    </div><!-- /panel-actions -->
                                    <h3 class="panel-title">Completed Routes </h3>
                                </div><!-- /panel-heading -->

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Route Name</th>
                                            <th>Route Type</th>
                                            <th>Driver Name</th>
                                            <th>Driver Number</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cmprtdet">
                                    </tbody>
                                </table><!-- /table -->
                            </div><!-- /panel-tblbasic -->
 </div>
</div><!--/row-->