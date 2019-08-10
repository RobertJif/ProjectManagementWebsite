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

 <?php
      foreach($resource_data->result_array() as $c):
        $res_pos=$c['position'];
        $res_name=$c['name'];


       ?><?php  endforeach;  ?>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Activity Resource</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li>  
                <form method="post" action="<?php echo base_url().'index.php/projectcharter/view_activity_raci/'?><?php echo $id_proj?>">
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
                         
                     <form method="post" action="<?php echo base_url().'index.php/projectcharter/simpan_raci_scores'?>">
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                      <input type="hidden" name="id_resource" id="id_resource" value="<?php echo $id_resource?>">
                           <div class="form-group">
                        <label  class="control-label">Name</label>
                        <input readonly="readonly" type="text" class="form-control" value="<?php echo $res_name?>">
                      </div>
                          <div class="form-group">
                              <label  class="control-label">Activity</label><br>
                            <select class="form-control" name="id_wbs" id="id_wbs">
                              <option value="">Select Activity</option>
                              <?php
                              foreach($activity_wbs_data->result_array() as $is => $i):
                                $id_wbs=$i['id'];
                                $name_wbs=$i['name'];
                               ?>
                               <option value="<?php echo $id_wbs?>"><?php echo $name_wbs?></option>
                              <?php  endforeach;  ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Description</label>
                                 <select class="form-control" name="score" id="score">
                                    <option value="">Select Activity</option>
                                  <option value="R">R</option>
                                  <option value="A">A</option>
                                  <option value="C">C</option>
                                  <option value="I">I</option>
                                  </select> 
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
        
              <form method="post" action="<?php echo base_url().'index.php/projectcharter/edit_raci_scores/'?><?php echo $id_proj."/"?><?php echo $id_resource?>">
            
              <input type="hidden" name="req_count" id="req_count" value="<?php echo $req_count-1?>">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th width="30%">Position</th>
                  <th width="30%">Activity</th>
                  <th width="10%">Score</th>
                </tr>
              </thead>


              <tbody>
            

    <?php
      foreach($raci_data->result_array() as $is => $i):
        $id=$i['id'];
        $id_activity=$i['id_wbs'];
        $id_resource=$i['id_resource'];
        $score=$i['score'];
        $activity_name=$i['activity_name'];
        $position_name=$i['position_name'];
        $id_project=$i['id_project'];
       ?>
        <tr>
          <input type="hidden" name="id<?php echo $is?>" id="id<?php echo $is?>" value="<?php echo $id?>">

          <td><?php echo $is+1?></td>
          <td><?php echo $activity_name?></td>
          <td><?php echo $position_name?></td>
        
          <td>
            <select class="form-control" name="score<?php echo $is?>" id="score<?php echo $is?>">
              <option value="">Select Score</option>
            <option value="R" <?php if ($score=="R") { echo "selected";}?>>R</option>
            <option value="A" <?php if ($score=="A") { echo "selected";}?>>A</option>
            <option value="C" <?php if ($score=="C") { echo "selected";}?>>C</option>
            <option value="I" <?php if ($score=="I") { echo "selected";}?>>I</option>
            </select> 
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
    function hapusProject(id,id_project){
    var r = confirm("Are you sure want to delete the data ?");
    if (r == true) {
        //alert("<?php echo site_url('projectcharter/hapus_activity_resource?id='); ?>"+id);
        window.location ="<?php echo site_url('projectcharter/hapus_activity_resource/'); ?>"+id+"/"+id_project;
      } else {
      }
    }


    function CheckForm(){

      var id_activity = document.getElementById('id_activity').value;
      var id_position = document.getElementById('id_position').value;
      var description = document.getElementById('description').value;
      var prodecessor_id = document.getElementById('predecessor_id').value;
      var successor_id = document.getElementById('successor_id').value;
      var location = document.getElementById('location').value;
      if(id_activity=="") {
        alert("Activity tidak boleh kosong");
        document.getElementById('id_activity').focus();
        return null;
      }
      if(id_position=="") {
        alert("Position Name tidak boleh kosong");
        document.getElementById('id_position').focus();
        return null;
      }
      if(description=="") {
        alert("Description tidak boleh kosong");
        document.getElementById('description').focus();
        return null;
      }
      /*
      if(prodecessor_id=="") {
        alert("Predecessor tidak boleh kosong");
        document.getElementById('predecessor_id').focus();
        return null;
      }
      if(successor_id=="") {
        alert("Successor tidak boleh kosong");
        document.getElementById('successor_id').focus();
        return null;
      }
      */
      if(location=="") {
        alert("Location tidak boleh kosong");
        document.getElementById('location').focus();
        return null;
      }

 

      form.submit();
    }
  </script>
</body>
</html>