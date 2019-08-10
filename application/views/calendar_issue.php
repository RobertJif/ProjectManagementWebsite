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
      foreach($activity_issue_log_data->result_array() as $is => $i):
        $id=$i['id'];
        $description=$i['description'];
        $impact=$i['impact'];
        $action=$i['action'];
        $importance=$i['importance'];
        $date_entered=$i['date_entered'];
        $date_entered=date('Y-m-d', strtotime($date_entered));
        $file=$i['file'];
        $id_project=$i['id_project'];?>

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
                        
                       <?php echo form_open_multipart('ProjectCharter/edit_activity_issue_log');?>
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                      <input type="hidden" name="edit_file_name" id="edit_file_name" value="<?php echo $file?>">
                      <input type="hidden" name="hdeditfileid" id="hdeditfileid" value="file_initiating<?php echo $id; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id?>">
                      <div class="form-group">
                            <label  class="control-label">Description</label>
                            <input type="text" class="form-control" name="description" id="description_edited" value="<?php echo $description?>">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Impact</label>
                            <input type="text" class="form-control" name="impact" id="impact_edited" value="<?php echo $impact?>">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Action Plan</label>
                            <input type="text" class="form-control" name="action" id="action_edited" value="<?php echo $action?>">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Importance</label>
                               <select class="form-control" name="importance" id="importance_edited">
                              <option value="">Select Importance</option>
                              <option value="Low" <?php if ($importance=='Low') {echo "selected";}?>>Low</option>
                              <option value="Mid" <?php if ($importance=='Mid') {echo "selected";}?>>Mid</option>
                              <option value="High" <?php if ($importance=='High') {echo "selected";}?>>High</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="start-date" class="control-label">Date</label>
                            <input type='date' class="form-control" name="date" id="date_edited" value="<?php echo $date_entered?>"> 
                          </div>
                          <div class="form-group">
                            <label  class="control-label">File</label><br>
                            <input type="file" class="btn btn-default" id="file_initiating<?php echo $id; ?>" name="file_initiating<?php echo $id; ?>">
                          </div>
                          
                          
                          
                        <div class="modal-footer">
                          <button class="btn btn-primary" onclick="CheckFormEdit(); return false">Update</button>
                        </div>
                      </form>

                      </div>
                    </div>

                  </div>
                </div>

                <!-- Modal View Owner-->
                <div class="modal fade" id="myModalo<?php echo $id; ?>" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Owner List</h4>
                      </div>
                      <div class="modal-body">

                  <?php 
                  $sql2 ="SELECT a.*,b.resource_name 'stake_holder_name' FROM issue_owner a left join planning_stake_holder b on a.stake_holder_id=b.id  where id_issue=".$id;
                  $query2 = $this->db->query($sql2);
                  if ($query2->num_rows() > 0) {
                    foreach ($query2->result() as $row2 => $rows2) {
                  ?>
                    <div class="form-group">
                            <input disabled="disabled" type="text" class="form-control" value="<?php echo $rows2->stake_holder_name;?>">
                          </div>

                  <?php
                  }}
                  ?>

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
                 url: '<?php echo site_url() ?>/ProjectCharter/getEvents_issue/'+bla,
                 dataType: 'json',
                 success: function(msg) {
                     var events = msg.events;
                     callback(events);

                 }
                 });
             }
         },
     ],eventRender: function (event, element, view) {
    element.find('.fc-title').append('<div class="hr-line-solid-no-margin"></div><span style="font-size: 10px; color:black"><a href="/dicka/files/'+event.description+'"  style="color:black"><i class="fa fa-download"  style="color:black"> Download File</i></a><br>');

    element.find('.fc-title').append('<a href="" data-toggle="modal" data-target="#myModalo'+event.modalid+'"><i class="fa fa-search"  style="color:black"> Owner List</i></a><br>');
    element.find('.fc-title').append('<a href="" data-toggle="modal" data-target="#myModal'+event.modalid+'"><i class="fa fa-edit"  style="color:black"> Details</i></a>');

    element.find('.fc-title').append('</span></div>');

}

 });

    </script>
  </body>
</html>