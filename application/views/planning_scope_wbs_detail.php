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
              <h2>WBS Details</h2>
              <ul class="nav navbar-right panel_toolbox">
                         <form method="post" action="<?php echo base_url().'index.php/projectcharter/view_planning_scope_wbs/'?><?php echo $id_proj?>">
              <button type="submit" class="btn btn-danger">Back</button>
            </form>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <!-- Small modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Add </button> <br><br>

              <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="myModal1">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content" style="width: 40em;">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel2">Add WBS</h4>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url().'index.php/projectcharter/simpan_planning_scope_wbs_detail'?>">
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                      <input type="hidden" name="id_wbs" id="id_wbs" value="<?php echo $id_wbs?>">
                      <div class="form-group">
                        <label  class="control-label">Task Name</label>
                        <input type="text" class="form-control"  id="task_name" name="task_name">
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" onclick="CheckForm(); return false">Add</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

              <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="myModal2">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content" style="width: 40em;">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title" id="myModal">Add WBS Detail</h4>
                    </div>
                    <div class="modal-body">
                     <form>
                          <div class="form-group">
                        <label  class="control-label">WBS ID</label>
                        <input type="text" class="form-control"  id="add_project_name">
                      </div>
                      <div class="form-group">
                        <label  class="control-label">Task Project</label>
                        <input type="text" class="form-control"  id="add_project_name">
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" onclick="CheckForm(); return false">Add</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>




            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="10%">No</th>
                  <th>Task Name</th>

                  <th width="20%">Action</th>
                </tr>
              </thead>


              <tbody>
      <?php
      foreach($planning_scope_wbs_data->result_array() as $is=>$i):
        $id=$i['id'];
        $task_name=$i['task_name'];
        $id_wbs=$i['id_wbs'];?>
        <tr>
          <td><?php echo $is+1?></td>
          <td><?php echo $task_name?></td>
          <td>
            <a href="" data-toggle="modal" data-target="#myModals<?php echo $id; ?>"><i class="fa fa-edit"> Edit</i></a>&nbsp&nbsp
            <a href="#" onclick="hapusProject(<?php echo $id; ?>,<?php echo $id_wbs; ?>),<?php echo $id_proj; ?>)"><i class="fa fa-trash"> Delete</i></a>

                  </td>

                </tr>
                <!-- Modal Edit Mahasiswa-->
                <div class="modal fade" id="myModals<?php echo $id; ?>" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Requirement</h4>
                      </div>
                      <div class="modal-body">
                        
                     <form method="post" action="<?php echo base_url().'index.php/projectcharter/edit_planning_scope_wbs_detail'?>">
                          <input type="hidden" name="id_proj_edit" id="id_proj_edit" value="<?php echo $id_proj?>">
                          <input type="hidden" name="id" id="id" value="<?php echo $id?>">
     
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="task_name_edit" name="task_name_edit" value="<?php echo $task_name?>" >      
                          </div>

                          <div class="modal-footer">  
                            <button type="submit" class="btn btn-primary" onclick="CheckFormEdit(); return false">Update</button>

                          </div>


                        </form>

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
<script src="<?php echo base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
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
    function hapusProject(id,id_wbs,id_project){
    var r = confirm("Are you sure want to delete the data ?");
    if (r == true) {
        window.location ="<?php echo site_url('projectcharter/hapus_planning_scope_wbs_detail/'); ?>"+id+"/"+id_wbs+"/"+id_project;
      } else {
      }
    }
    function CheckForm(){
      var vpname = document.getElementById('task_name').value;

      if(vpname=="") {
        alert("Task Name tidak boleh kosong");
        document.getElementById('task_name').focus();
        return null;
      }

      form.submit();
    }
    function CheckFormEdit(){
      var vpname = document.getElementById('task_name_edit').value;

      if(vpname=="") {
        alert("Task Name tidak boleh kosong");
        document.getElementById('task_name_edit').focus();
        return null;
      }

      form.submit();
    }
  </script>


</body>
</html>