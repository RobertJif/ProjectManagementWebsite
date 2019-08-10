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
              <h2>Communication Activity</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li>  
                <form method="post" action="<?php echo base_url().'index.php/projectcharter/view_activity_issue_log/'?><?php echo $id_proj?>">
              <button type="submit" class="btn btn-danger">Back</button>
            </form>

          </li>
                <li>        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Add Stakeholder</button>
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
                         
                     <form method="post" action="<?php echo base_url().'index.php/projectcharter/simpan_activity_stake_holder_owner'?>">
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                 <input type="hidden" name="issue_id" id="issue_id" value="<?php echo $issue_id?>">
                          <div class="form-group">
                            <label  class="control-label">Owner Name</label>
                             <select class="form-control" name="stake_holder_id" id="stake_holder_id">
                              <option value="">Select Owner</option>
                              <?php
                              foreach($activity_stake_holder_data->result_array() as $ksz => $kz):
                                $id_stake_holder=$kz['id'];
                                $name_stake_holder=$kz['resource_name'];
                               ?>
                               <option value="<?php echo $id_stake_holder?>"><?php echo $name_stake_holder?></option>
                              <?php  endforeach;  ?>
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
        
              <form method="post" action="<?php echo base_url().'index.php/projectcharter/edit_activity_stake_holder_owner/'?><?php echo $id_proj?>">
            
              <input type="hidden" name="req_count" id="req_count" value="<?php echo $req_count-1?>">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th width="55%">Stake Holder Name</th>
                  <th width="5%">Action</th>
                </tr>
              </thead>


              <tbody>
            

    <?php
      foreach($activity_stake_holder_owner_data->result_array() as $is => $i):
        $id=$i['id'];
        $stake_holder_id=$i['stake_holder_id'];
        $id_issue=$i['id_issue'];
       ?>
        <tr>

          <input type="hidden" name="id<?php echo $is?>" id="id<?php echo $is?>" value="<?php echo $id?>">
          <input type="hidden" name="id_issue<?php echo $is?>" id="id_issue<?php echo $is?>" value="<?php echo $id_issue?>">
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
          <td><?php echo $is+1?></td>
          
          <td>
             <select class="form-control" style="width: 700px" name="stake_holder_id<?php echo $is?>" id="stake_holder_id<?php echo $is?>">
                              <option value="">Select Owner</option>
                              <?php
                              foreach($activity_stake_holder_data->result_array() as $ks => $k):
                                $id_stake_holder=$k['id'];
                                $name_stake_holder=$k['resource_name'];
                               ?>
                               <option value="<?php echo $id_stake_holder?>" <?php if ($id_stake_holder==$stake_holder_id) {echo "selected";}?>><?php echo $name_stake_holder?></option>
                              <?php  endforeach;  ?>
                            </select>
          </td>
          
          <td>
              <a href="#" onclick="hapusProject(<?php echo $id; ?>,<?php echo $id_proj; ?>,<?php echo $id_issue?>)">
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
    function hapusProject(id,id_project,issue_id){
    var r = confirm("Are you sure want to delete the data ?");
    if (r == true) {
        //alert("<?php echo site_url('projectcharter/hapus_activity_stake_holder_owner?id='); ?>"+id);
        window.location ="<?php echo site_url('projectcharter/hapus_activity_stake_holder_owner/'); ?>"+id+"/"+id_project+"/"+issue_id;
      } else {
      }
    }

    function CheckForm(){

      var id_activity = document.getElementById('stake_holder_id').value;
      if(id_activity=="") {
        alert("Stake Holder tidak boleh kosong");
        document.getElementById('stake_holder_id').focus();
        return null;
      }

      form.submit();
    }
  </script>
</body>
</html>