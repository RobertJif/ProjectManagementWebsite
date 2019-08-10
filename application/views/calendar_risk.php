<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <?php include 'include/header.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
             

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Calendar Events</h2>
                    <ul class="nav navbar-right panel_toolbox">
               <li>  
                <form method="post" action="<?php echo base_url().'index.php/projectcharter/view_project/'?><?php echo $id_proj?>">
              <button type="submit" class="btn btn-danger">Back</button>
            </form>

          </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                    <div id='calendar'></div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <?php
      foreach($activity_risk_data->result_array() as $is => $i):
        $id=$i['id'];
        $description=$i['description'];
        $category=$i['category'];
        $trigger_event=$i['trigger_event'];
        $backup=$i['backup'];
        $owner=$i['owner'];
        $date_entered=$i['date_entered'];
        $review=$i['review'];
        $end_date=$i['end_date'];
        $status=$i['status'];
        $color=$i['color'];?>

                <!-- Modal Edit Mahasiswa-->
                <div class="modal fade" id="myModal<?php echo $id; ?>" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Issue</h4>
                      </div>
                      <div class="modal-body">
                        
                       <?php echo form_open_multipart('ProjectCharter/edit_activity_risk_calendar');?>
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id?>">
                        <div class="form-group">
                            <label  class="control-label">Description</label>
                    
          <input class="form-control" type="text" name="description" id="description<?php echo $is?>" value="<?php echo $description?>">       </div>
                      <div class="form-group">
                            <label  class="control-label">Category</label>
                             <select class="form-control" name="category" id="category<?php echo $is?>">
                              <option value="">Select Category</option>
                              <option value="Low" <?php if ($category=='Low') {echo "selected";}?>>Low</option>
                              <option value="Mid" <?php if ($category=='Mid') {echo "selected";}?>>Mid</option>
                              <option value="High" <?php if ($category=='High') {echo "selected";}?>>High</option>
                            </select>  </div>
                          <div class="form-group">
                            <label  class="control-label">Trigger Event</label>
                    
          <input class="form-control" type="text" name="trigger_event" id="trigger_event<?php echo $is?>" value="<?php echo $trigger_event?>">       </div>
                          <div class="form-group">
                            <label  class="control-label">Backup Plan</label>
          <input class="form-control" type="text" name="backup" id="backup" value="<?php echo $backup?>">
                          </div>
                                   <div class="form-group">
                            <label  class="control-label">Review</label>
                    
          <input class="form-control" type="text" name="review" id="review<?php echo $is?>" value="<?php echo $review?>">       </div>
                    
                          <div class="form-group">
                            <label  class="control-label">Owner</label>
                       <select class="form-control" name="owner" id="owner">
                              <option value="">Select Owner</option>
                              <?php
                              foreach($planning_scope_resource_data->result_array() as $ks => $k):
                                $id_positions=$k['id'];
                                $resource_position=$k['position'];
                                $resource_name=$k['name'];
                               ?>
                               <option value="<?php echo $id_positions?>" <?php if ($id_positions==$owner) {echo "selected";}?>><?php echo $resource_name?> - <?php echo $resource_position?></option>
                              <?php  endforeach;  ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="start-date" class="control-label">Date</label>
            <input type='date' class="form-control" name="date_entered" id="date_entered<?php echo $is?>" value="<?php echo $date_entered;?>" > 
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Status</label><br>
             <select class="form-control" onchange="ToogleEndDate2(<?php echo $is?>)" name="status" id="status<?php echo $is?>">
                              <option value="">Select Status</option>
                              <option value="Pending" <?php if ($status=='Pending') {echo "selected";}?>>Pending</option>
                              <option value="Finished" <?php if ($status=='Finished') {echo "selected";}?>>Finished</option>
                            </select>
                          </div>
                           <div class="form-group">
                            <label  class="control-label">Date Ended</label>
            <input readonly="readonly" type='date' class="form-control" name="end_date" id="end_date<?php echo $is?>" value="<?php echo $end_date;?>" <?php if ($status=='Pending') {echo "readonly";} else {echo "";}?>> 
                            </div>
                          
                          
                        <div class="modal-footer">
                          <button class="btn btn-primary" onclick="CheckFormEdit(); return false">Update</button>
                        </div>
                      </form>

                      </div>
                    </div>

                  </div>
                </div>


              <?php  endforeach;  ?>
       
      </div>
    </div>

    <!-- /calendar modal -->
        
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js');?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/vendors/nprogress/nprogress.js');?>"></script>
    <!-- FullCalendar -->
    <script src="<?php echo base_url('assets/vendors/moment/min/moment.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/fullcalendar/dist/fullcalendar.min.js');?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/build/js/custom.min.js');?>"></script>
        <script type="text/javascript">

    var bla = $('#id_proj').val();
 $('#calendar').fullCalendar({
     eventSources: [
         {
             events: function(start, end, timezone, callback) {
                 $.ajax({
                 url: '<?php echo site_url() ?>/ProjectCharter/getEvents_risk/'+bla,
                 dataType: 'json',
                 success: function(msg) {
                     var events = msg.events;
                     callback(events);

                 }
                 });
             }
         },
     ],eventRender: function (event, element, view) {
    element.find('.fc-title').append('<div class="hr-line-solid-no-margin"></div><span style="font-size: 10px; color:black"><a href="" data-toggle="modal" data-target="#myModal'+event.modalid+'"><i class="fa fa-edit"  style="color:black"> Details</i></a><br>');

    element.find('.fc-title').append('</span></div>');

}

 });

    </script>
  </body>
</html>