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
              <h2>Stake Holder List</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li>  
                <form method="post" action="<?php echo base_url().'index.php/projectcharter/view_project/'?><?php echo $id_proj?>">
              <button type="submit" class="btn btn-danger">Back</button>
            </form>

          </li>
                <li>        <button style="display: none" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Add Stake Holder</button>
                <!-- Small modal -->


                   <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content" style="width: 40em;">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">New Stake Holder</h4>
                        </div>
                        <div class="modal-body">
                         
                     <form method="post" action="<?php echo base_url().'index.php/projectcharter/simpan_activity_stake_holder'?>">
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                          <div class="form-group">
                            <label  class="control-label">Role</label>
                               <select class="form-control" name="role" id="role" onchange="ToogleRole()">
                              <option value="internal">Internal</option>
                              <option value="external">External</option>
                            </select>
                          </div>
                          <div class="form-group" id="external_opt"  style="display: none;">
                            <label  class="control-label">Stake Holder (External)</label>
                            <input type="text" class="form-control" name="stake_holder_external" id="stake_holder_external">
                          </div>
                          <div class="form-group" id="internal_opt"  style="display: ;">
                            <label  class="control-label">Stake Holder (Internal)</label>
                            <select class="form-control" name="stake_holder_internal" id="stake_holder_internal">
                              <option value="">Select Stake Holder</option>
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
                            <label  class="control-label">Impact</label>
                               <select class="form-control" name="impact" id="impact">
                              <option value="">Select Impact</option>
                              <option value="Low">Low</option>
                              <option value="Mid">Mid</option>
                              <option value="High">High</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Needs</label>
                            <input type="text" class="form-control" name="needs" id="needs">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Responsibility</label>
                            <input type="text" class="form-control" name="responsibility" id="responsibility">
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
        
              <form method="post" action="<?php echo base_url().'index.php/projectcharter/edit_activity_stake_holder/'?><?php echo $id_proj?>">
            
              <input type="hidden" name="req_count" id="req_count" value="<?php echo $req_count-1?>">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th width="5%">Role</th>
                  <th width="10%">Name</th>
                  <th width="10%">Impact</th>
                  <th width="10%">Needs</th>
                  <th width="10%">Responsibility</th>
                  <th width="5%">Action</th>
                </tr>
              </thead>


              <tbody>
              
    <?php
      foreach($activity_stake_holder_data->result_array() as $is => $i):
        $id=$i['id'];
        $resource_id=$i['resource_id'];
        $resource_name=$i['resource_name'];
        $role=$i['role'];
        $impact=$i['impact'];
        $needs=$i['needs'];
        $responsibility=$i['responsibility'];
        $id_project=$i['id_project'];?>
        <tr>
          <td><?php echo $is+1?></td>
          <td><?php if ($role=='internal') {echo "Internal";} else{echo "External";}?></td>
          <td><?php echo $resource_name?></td>
          <td><?php echo $impact?></td>
          <td><?php echo $needs?></td>
          <td><?php echo $responsibility?></td>
          <td>
            <a href="" data-toggle="modal" data-target="#myModal<?php echo $id; ?>"><i class="fa fa-edit"> Edit</i></a>&nbsp&nbsp
            <a href="#" onclick="hapusProject(<?php echo $id; ?>,<?php echo $id_project; ?>)"><i class="fa fa-trash"> Delete</i></a>

                  </td>

                </tr>
                <!-- Modal Edit Mahasiswa-->
                <div class="modal fade" id="myModal<?php echo $id; ?>" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Stake Holder</h4>
                      </div>
                      <div class="modal-body">
                        
                      <form method="post" action="<?php echo base_url().'index.php/projectcharter/edit_activity_stake_holder_plan'?>">
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id?>">
                          <div class="form-group">
                            <label  class="control-label">Role</label>
                               <select class="form-control" name="role" id="role_edit<?php echo $is?>" onchange="ToogleRoleEdit(<?php echo $is?>)">
                              <option value="internal" <?php if ($role=='internal') {echo "selected";}?>>Internal</option>
                              <option value="external" <?php if ($role=='external') {echo "selected";}?>>External</option>
                            </select>
                          </div>
                          <div class="form-group" id="external_opt_edit<?php echo $is?>"  style="display: <?php if ($role=='internal') {echo "none";}?>;">
                            <label  class="control-label">Stake Holder (External)</label>
                            <input type="text" class="form-control" name="stake_holder_external" id="stake_holder_external_edit" value="<?php if ($role=='external') {echo $resource_name;}?>">
                          </div>
                          <div class="form-group" id="internal_opt_edit<?php echo $is?>"  style="display:<?php if ($role=='external') {echo "none";}?> ;">
                            <label  class="control-label">Stake Holder (Internal)</label>
                            <select class="form-control" name="stake_holder_internal" id="stake_holder_internal_edit">
                              <option value="">Select Stake Holder</option>
                              <?php
                              foreach($planning_scope_resource_data->result_array() as $as => $a):
                                $id_positions=$a['id'];
                                $resource_position=$a['position'];
                                $resource_names=$a['name'];
                               ?>
                               <option value="<?php echo $id_positions?>" <?php if ($id_positions==$resource_id) {echo "selected";}?> ><?php echo $resource_names?> - <?php echo $resource_position?></option>
                              <?php  endforeach;  ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Impact</label>
                               <select class="form-control" name="impact" id="impact_edit">
                              <option value="">Select Impact</option>
                              <option value="Low" <?php if ($impact=="Low") {echo "selected";}?>>Low</option>
                              <option value="Mid" <?php if ($impact=="Mid") {echo "selected";}?>>Mid</option>
                              <option value="High" <?php if ($impact=="High") {echo "selected";}?>>High</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Needs</label>
                            <input type="text" class="form-control" name="needs" id="needs_edit" value="<?php echo $needs?>">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Responsibility</label>
                            <input type="text" class="form-control" name="responsibility" id="responsibility_edit" value="<?php echo $responsibility?>">
                          </div>
                          
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary" onclick="CheckFormEdit(); return false">Add</button>
                        </div>
                      </form>

                      </div>
                    </div>

                  </div>
                </div>


              <?php  endforeach;  ?>
              </tbody>
     
            </table>
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
        //alert("<?php echo site_url('projectcharter/hapus_activity_stake_holder?id='); ?>"+id);
        window.location ="<?php echo site_url('projectcharter/hapus_activity_stake_holder/'); ?>"+id+"/"+id_project;
      } else {
      }
    }

    function ToogleRole(){
      var role = document.getElementById('role').value;
      
      if(role=='internal'){
         document.getElementById('external_opt').style.display = "none";
         document.getElementById('internal_opt').style.display = "";
         document.getElementById('stake_holder_external').value = "";
      }else{
         document.getElementById('external_opt').style.display = "";
         document.getElementById('internal_opt').style.display = "none";
         document.getElementById('stake_holder_internal').value = "";

      }
    }
    function ToogleRoleEdit(id){
      var role = document.getElementById('role_edit'+id).value;
      
      if(role=='internal'){
         document.getElementById('external_opt_edit'+id).style.display = "none";
         document.getElementById('internal_opt_edit'+id).style.display = "";
         document.getElementById('stake_holder_external_edit'+id).value = "";
      }else{
         document.getElementById('external_opt_edit'+id).style.display = "";
         document.getElementById('internal_opt_edit'+id).style.display = "none";
         document.getElementById('stake_holder_internal_edit'+id).value = "";

      }
    }
    function CheckForm(){

      var id_activity = document.getElementById('role').value;
      var needs = document.getElementById('needs').value;
      var responsibility = document.getElementById('responsibility').value;
      var impact = document.getElementById('impact').value;
      var stake_holder_internal = document.getElementById('stake_holder_internal').value;
      var stake_holder_external = document.getElementById('stake_holder_external').value;
      if(id_activity=="internal") {
        if(stake_holder_internal=="") {
        alert("Stake Holder tidak boleh kosong");
        document.getElementById('stake_holder_internal').focus();
        return null;
      }
      }else{
        if(stake_holder_external=="") {
        alert("Stake Holder tidak boleh kosong");
        document.getElementById('stake_holder_external').focus();
        return null;
      }
      }
      if(impact=="") {
        alert("Impact tidak boleh kosong");
        document.getElementById('impact').focus();
        return null;
      }
      if(needs=="") {
        alert("Needs tidak boleh kosong");
        document.getElementById('needs').focus();
        return null;
      }
      if(responsibility=="") {
        alert("Responsibility tidak boleh kosong");
        document.getElementById('responsibility').focus();
        return null;
      }

      form.submit();
    }

    function CheckFormEdit(){

      var id_activity = document.getElementById('role_edit').value;
      var needs = document.getElementById('needs_edit').value;
      var responsibility = document.getElementById('responsibility_edit').value;
      var impact = document.getElementById('impact_edit').value;
      var stake_holder_internal = document.getElementById('stake_holder_internal_edit').value;
      var stake_holder_external = document.getElementById('stake_holder_external_edit').value;
      if(id_activity=="internal") {
        if(stake_holder_internal=="") {
        alert("Stake Holder tidak boleh kosong");
        document.getElementById('stake_holder_internal_edit').focus();
        return null;
      }
      }else{
        if(stake_holder_external=="") {
        alert("Stake Holder tidak boleh kosong");
        document.getElementById('stake_holder_external_edit').focus();
        return null;
      }
      }
      if(impact=="") {
        alert("Impact tidak boleh kosong");
        document.getElementById('impact_edit').focus();
        return null;
      }
      if(needs=="") {
        alert("Needs tidak boleh kosong");
        document.getElementById('needs_edit').focus();
        return null;
      }
      if(responsibility=="") {
        alert("Responsibility tidak boleh kosong");
        document.getElementById('responsibility_edit').focus();
        return null;
      }

      form.submit();
    }
  </script>
</body>
</html>