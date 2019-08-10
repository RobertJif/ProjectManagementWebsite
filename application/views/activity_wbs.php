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
              <h2>Activity WBS</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li>  
                <form method="post" action="<?php echo base_url().'index.php/projectcharter/view_planning_scope_wbs/'?><?php echo $id_proj?>">
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
                         
                     <form method="post" action="<?php echo base_url().'index.php/projectcharter/simpan_activity_wbs'?>">
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                      <input type="hidden" name="id_parent" id="id_parent" value="<?php echo $id_parent?>">
                          <div class="form-group">
                            <label  class="control-label">Sequence</label>
                            <input type="number" class="form-control" name="sequence" id="sequence">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Activity</label>
                            <input type="text" class="form-control" name="activity" id="activity">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Description</label>
                            <input type="text" class="form-control" name="description" id="description">
                          </div>
                          <div class="form-group">
                            <label class="control-label">Responsibility</label>
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
        
              <form method="post" action="<?php echo base_url().'index.php/projectcharter/edit_activity_wbs/'?><?php echo $id_proj?>">
            
                      <input type="hidden" name="id_parent" id="id_parent" value="<?php echo $id_parent?>">
              <input type="hidden" name="req_count" id="req_count" value="<?php echo $req_count-1?>">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="5%">Sequence</th>
                  <th width="5%">Activity</th>
                  <th width="10%">Description</th>
                  <th width="20%">Responsibility</th>
                  <th width="5%">Action</th>
                </tr>
              </thead>


              <tbody>
            

    <?php
      foreach($activity_wbs_data->result_array() as $is => $i):
        $id=$i['id'];
        $sequence=$i['sequence'];
        $name=$i['name'];
        $description=$i['description'];
        $responsibility=$i['responsibility'];
        $id_project=$i['id_project'];
       ?>
        <tr>
          <input type="hidden" name="id<?php echo $is?>" id="id<?php echo $is?>" value="<?php echo $id?>">

          <td><input type="text" style="width: 80px" name="sequence<?php echo $is?>" id="sequence<?php echo $is?>" value="<?php echo $sequence?>" class="form-control"></td>
          <td><input style="width: 230px" type="text" name="name<?php echo $is?>" id="name<?php echo $is?>" value="<?php echo $name?>" class="form-control"></td>
          <td><input style="width: 350px" type="text" name="description<?php echo $is?>" id="description<?php echo $is?>" value="<?php echo $description?>" class="form-control"></td>
          <td><input  style="width: 350px" type="text" name="responsibility<?php echo $is?>" id="responsibility<?php echo $is?>" value="<?php echo $responsibility?>" class="form-control"></td>
          <td>
              <a href="#" onclick="hapusProject(<?php echo $id; ?>,<?php echo $id_project; ?>,<?php echo $id_parent; ?>)">
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


<!-- Custom Theme Scripts -->
<script src="<?php echo base_url('assets/build/js/custom.min.js');?>"></script>


<script type="text/javascript">
  $(function () {
    $('#datetimepicker1').datetimepicker();
  });
    function hapusProject(id,id_project,id_parent){
    var r = confirm("Are you sure want to delete the data ?");
    if (r == true) {
        //alert("<?php echo site_url('projectcharter/hapus_planning_scope_requirement?id='); ?>"+id);
        window.location ="<?php echo site_url('projectcharter/hapus_activity_wbs/'); ?>"+id+"/"+id_project+"/"+id_parent;
      } else {
      }
    }


    function CheckForm(){

      var sequence = document.getElementById('sequence').value;
      var activity = document.getElementById('activity').value;
      var description = document.getElementById('description').value;
      var responsibility = document.getElementById('responsibility').value;

      if(sequence=="") {
        alert("Sequence tidak boleh kosong");
        document.getElementById('sequence').focus();
        return null;
      }
      if(activity=="") {
        alert("Activity Name tidak boleh kosong");
        document.getElementById('activity').focus();
        return null;
      }
      if(description=="") {
        alert("Activity Description tidak boleh kosong");
        document.getElementById('description').focus();
        return null;
      }
      if(responsibility=="") {
        alert("Responsibility tidak boleh kosong");
        document.getElementById('responsibility').focus();
        return null;
      }
 

      form.submit();
    }
  </script>
</body>
</html>