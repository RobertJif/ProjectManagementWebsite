<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <?php include 'include/header.php';?>
   <style type="text/css">
     .my-group .form-control{
    width:50%;
}
   </style>
   <script>
     if ( $.browser.webkit ) {
    $(".my-group-button").css("height","+=1px");
}
   </script>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">


      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Communication List</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li>  
                <form method="post" action="<?php echo base_url().'index.php/projectcharter/view_project/'?><?php echo $id_proj?>">

              <button type="submit" class="btn btn-danger">Back</button>
            </form>

          </li>
                <li>        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Add Communication</button>
                <!-- Small modal -->


                   <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content" style="width: 40em;">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">New Communication</h4>
                        </div>
                        <div class="modal-body">
                         
                      <?php echo form_open_multipart('ProjectCharter/simpan_activity_issue_log');?>
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                      <div class="form-group">
                            <label  class="control-label">Description</label>
                            <input type="text" class="form-control" name="description" id="description">
                          </div>

                          <div class="form-group">
                            <label for="start-date" class="control-label">Date</label>
                            <input type='date' class="form-control" name="date" id="date"> 
                          </div>

                          </div>
                          
                          
                          
                        <div class="modal-footer">
                          <button class="btn btn-primary" onclick="CheckForm(); return false">Add</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>  </li>
              

                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <!-- Small modal -->
        
            
              <input type="hidden" name="req_count" id="req_count" value="<?php echo $req_count-1?>">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th width="15%">Description</th>
                  <th width="10%">Date</th>
                  <th width="5%">Action</th>
                </tr>
              </thead>
              <tbody>
              
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
        <tr>
          <td><?php echo $is+1?></td>
          <td><?php echo $description?></td>
          <td><?php echo $date_entered?></td>
          <td>
            <a href="" data-toggle="modal" data-target="#myModal<?php echo $id; ?>"><i class="fa fa-edit"> Edit</i></a>&nbsp&nbsp
            <a href="#" onclick="hapusProject(<?php echo $id; ?>,<?php echo $id_project; ?>)"><i class="fa fa-trash"> Delete</i></a>

                  </td>

                </tr>

                <!-- Modal View Mahasiswa-->
                <div class="modal fade" id="myModal<?php echo $id; ?>" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Issue</h4>
                      </div>
                      <div class="modal-body">
                        
                       <?php echo form_open_multipart('ProjectCharter/edit_activity_issue_log_plan');?>
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                      <input type="hidden" name="edit_file_name" id="edit_file_name" value="<?php echo $file?>">
                      <input type="hidden" name="hdeditfileid" id="hdeditfileid" value="file_initiating<?php echo $id; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id?>">
                      <div class="form-group">
                            <label  class="control-label">Description</label>
                            <input type="text" class="form-control" name="description" id="description_edited" value="<?php echo $description?>">
                          </div>

                          <div class="form-group">
                            <label for="start-date" class="control-label">Date</label>
                            <input type='date' class="form-control" name="date" id="date_edited" value="<?php echo $date_entered?>"> 
                          </div>

                          
                          
                          
                        <div class="modal-footer">
                          <button class="btn btn-primary" onclick="CheckFormEdit(); return false">Update</button>
                        </div>
                      </form>

                      </div>
                    </div>

                  </div>
                </div>

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
              </tbody>
     
            </table>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>
<!-- /page content -->

<!-- footer content -->
<footer>

  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js');?>"></script>
<!-- NProgress -->
<script src="<?php echo base_url('assets/vendors/nprogress/nprogress.js');?>"></script>
<!-- bootstrap-datetimepicker -->    
<script src="<?php echo base_url('assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/vendors/iCheck/icheck.min.js');?>"></script>
<!-- Datatables -->
<script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js');?>"></script>
<script src=".<?php echo base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/jszip/dist/jszip.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/pdfmake/build/pdfmake.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/pdfmake/build/vfs_fonts.js');?>"></script>

<script src="<?php echo base_url('assets/calendar/fullcalendar.min.js');?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url('assets/build/js/custom.min.js');?>"></script>


<script type="text/javascript">
  $(function () {
    $('#datetimepicker1').datetimepicker();
  });
    function hapusProject(id,id_project){
    var r = confirm("Are you sure want to delete the data ?");
    if (r == true) {
        //alert("<?php echo site_url('projectcharter/hapus_activity_issue_log?id='); ?>"+id);
        window.location ="<?php echo site_url('projectcharter/hapus_activity_issue_log/'); ?>"+id+"/"+id_project;
      } else {
      }
    }
    function viewProject(id,id_project){
        window.location ="<?php echo site_url('projectcharter/view_activity_stake_holder_owner/'); ?>"+id+"/"+id_project;
    }
    
    function CheckForm(){

      var description = document.getElementById('description').value;
      var impact = document.getElementById('impact').value;
      var action = document.getElementById('action').value;
      var importance = document.getElementById('importance').value;

      if(description=="") {
        alert("Description tidak boleh kosong");
        document.getElementById('description').focus();
        return null;
      }
      if(impact=="") {
        alert("Impact tidak boleh kosong");
        document.getElementById('impact').focus();
        return null;
      }
      if(action=="") {
        alert("Action tidak boleh kosong");
        document.getElementById('action').focus();
        return null;
      }
      if(importance=="") {
        alert("Importance tidak boleh kosong");
        document.getElementById('importance').focus();
        return null;
      }

      form.submit();
    }

    function CheckFormEdit(){

      
      var description = document.getElementById('description_edited').value;
      var impact = document.getElementById('impact_edited').value;
      var action = document.getElementById('action_edited').value;
      var importance = document.getElementById('importance_edited').value;

      if(description=="") {
        alert("Description tidak boleh kosong");
        document.getElementById('description_edited').focus();
        return null;
      }
      if(impact=="") {
        alert("Impact tidak boleh kosong");
        document.getElementById('impact_edited').focus();
        return null;
      }
      if(action=="") {
        alert("Action tidak boleh kosong");
        document.getElementById('action_edited').focus();
        return null;
      }
      if(importance=="") {
        alert("Importance tidak boleh kosong");
        document.getElementById('importance_edited').focus();
        return null;
      }

      form.submit();
    }
  </script>
</body>
</html>