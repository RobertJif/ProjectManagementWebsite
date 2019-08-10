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


      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Activity Risk</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li>  
                <form method="post" action="<?php echo base_url().'index.php/projectcharter/view_project/'?><?php echo $id_proj?>">
              <button type="submit" class="btn btn-danger">Back</button>
            </form>

          </li>
                <li>        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Add Activity</button>
                <!-- Small modal -->


                   <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content" style="width: 40em;">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Add Activity</h4>
                        </div>
                        <div class="modal-body">
                         
                     <form method="post" action="<?php echo base_url().'index.php/projectcharter/simpan_activity_risk'?>">
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                          <div class="form-group">
                            <label  class="control-label">Description</label>
                            <input type="text" class="form-control" name="description" id="description">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Category</label>
                               <select class="form-control" name="category" id="category">
                              <option value="">Select Category</option>
                              <option value="Low">Low</option>
                              <option value="Mid">Mid</option>
                              <option value="High">High</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Trigger Event</label>
                            <input type="text" class="form-control" name="trigger_event" id="trigger_event">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Backup Plan</label>
                            <input type="text" class="form-control" name="backup" id="backup">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Owner</label>
                            <select class="form-control" name="owner" id="owner">
                              <option value="">Select Owner</option>
                              <?php
                              foreach($planning_scope_resource_data->result_array() as $as => $a):
                                $id_positions=$a['id'];
                                $resource_position=$a['position'];
                                $resource_name=$a['name'];
                               ?>
                               <option value="<?php echo $id_positions?>"><?php echo $resource_name?> - <?php echo $resource_position?></option>
                              <?php  endforeach;  ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Date Entered</label>
                            <input type='date' class="form-control" name="date_entered" id="date_entered"  > 
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Review</label>
                            <input type="text" class="form-control" name="review" id="review">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Status</label>
                            <select class="form-control" name="status" id="status" onchange="ToogleEndDate()">
                              <option value="">Select Status</option>
                              <option value="Pending">Pending</option>
                              <option value="Finished">Finished</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label  class="control-label">End Date</label>
                            <input type='date' class="form-control" name="end_date" id="end_date" readonly="true"> 
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
        
              <form method="post" action="<?php echo base_url().'index.php/projectcharter/edit_activity_risk/'?><?php echo $id_proj?>">
            
              <input type="hidden" name="req_count" id="req_count" value="<?php echo $req_count-1?>">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th width="5%">Description</th>
                  <th width="10%">Category</th>
                  <th width="10%">Trigger Event</th>
                  <th width="10%">Backup Plan</th>
                  <th width="10%">Owner</th>
                  <th width="10%">Date Entered</th>
                  <th width="10%">Review</th>
                  <th width="10%">Status</th>
                  <th width="10%">End Date</th>
                  <th width="5%">Action</th>
                </tr>
              </thead>


              <tbody>
            

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
        $id_project=$i['id_project'];
       ?>
        <tr>
          <input type="hidden" name="id<?php echo $is?>" id="id<?php echo $is?>" value="<?php echo $id?>">

          <td><?php echo $is+1?></td>
          <td>
          <input class="form-control" type="text" name="description<?php echo $is?>" id="description<?php echo $is?>" value="<?php echo $description?>">
          </td>
          <td>
            <select class="form-control" name="category<?php echo $is?>" id="category<?php echo $is?>">
                              <option value="">Select Category</option>
                              <option value="Low" <?php if ($category=='Low') {echo "selected";}?>>Low</option>
                              <option value="Mid" <?php if ($category=='Mid') {echo "selected";}?>>Mid</option>
                              <option value="High" <?php if ($category=='High') {echo "selected";}?>>High</option>
                            </select>
          </td>
          
          <td>
          <input class="form-control" type="text" name="trigger_event<?php echo $is?>" id="trigger_event<?php echo $is?>" value="<?php echo $trigger_event?>">
          </td>
          <td>
          <input class="form-control" type="text" name="backup<?php echo $is?>" id="backup<?php echo $is?>" value="<?php echo $backup?>">
          </td>
          <td>
             <select class="form-control" name="owner<?php echo $is?>" id="owner<?php echo $is?>">
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
          </td>
          <td>
            <input type='date' class="form-control" name="date_entered<?php echo $is?>" id="date_entered<?php echo $is?>" value="<?php echo $date_entered;?>" > 
          </td>
          <td>
          <input class="form-control" type="text" name="review<?php echo $is?>" id="review<?php echo $is?>" value="<?php echo $review?>">
          </td>
          <td>
            <select class="form-control" onchange="ToogleEndDate2(<?php echo $is?>)" name="status<?php echo $is?>" id="status<?php echo $is?>">
                              <option value="">Select Status</option>
                              <option value="Pending" <?php if ($status=='Pending') {echo "selected";}?>>Pending</option>
                              <option value="Finished" <?php if ($status=='Finished') {echo "selected";}?>>Finished</option>
                            </select>
          </td>
          <td>
            <input type='date' class="form-control" name="end_date<?php echo $is?>" id="end_date<?php echo $is?>" value="<?php echo $end_date;?>" <?php if ($status=='Pending') {echo "readonly";} else {echo "";}?>> 
          </td>
          <td>
              <a href="#" onclick="hapusProject(<?php echo $id; ?>,<?php echo $id_project; ?>)">
                <button type="button" class="btn btn-danger">Delete</button></a>
          </td>
                </tr>
               

              <?php  endforeach;  ?>
 
              </tbody>
     
            </table>
       
                    <button type="submit" class="btn btn-success">Save</button>
              </form> 
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
        //alert("<?php echo site_url('projectcharter/hapus_activity_risk?id='); ?>"+id);
        window.location ="<?php echo site_url('projectcharter/hapus_activity_risk/'); ?>"+id+"/"+id_project;
      } else {
      }
    }

    function ToogleEndDate(){
      var status = document.getElementById('status').value;
      
      if(status=='Finished'){
         document.getElementById('end_date').readOnly = false;
      }else{
        document.getElementById('end_date').readOnly = true;
        document.getElementById('end_date').value = "";
      }
    }
    function ToogleEndDate2(id){
      var status = document.getElementById('status'+id).value;
      
      if(status=='Finished'){
         document.getElementById('end_date'+id).readOnly = false;
      }else{
        document.getElementById('end_date'+id).readOnly = true;
        document.getElementById('end_date'+id).value = "";
      }
    }
    function CheckForm(){

      var id_activity = document.getElementById('name').value;
      var id_position = document.getElementById('unit').value;
      var description = document.getElementById('amount').value;
      var prodecessor_id = document.getElementById('cost').value;
      var successor_id = document.getElementById('description').value;
      if(id_activity=="") {
        alert("Name tidak boleh kosong");
        document.getElementById('name').focus();
        return null;
      }
      if(id_position=="") {
        alert("Unit Name tidak boleh kosong");
        document.getElementById('unit').focus();
        return null;
      }
      if(description=="") {
        alert("Amount tidak boleh kosong");
        document.getElementById('amount').focus();
        return null;
      }
      if(prodecessor_id=="") {
        alert("Cost tidak boleh kosong");
        document.getElementById('cost').focus();
        return null;
      }
      if(successor_id=="") {
        alert("Description tidak boleh kosong");
        document.getElementById('description').focus();
        return null;
      }

      form.submit();
    }
  </script>
</body>
</html>