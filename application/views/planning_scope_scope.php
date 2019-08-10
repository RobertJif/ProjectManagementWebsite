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
                <h2>Define Scope</h2>
                <ul class="nav navbar-right panel_toolbox">
                  
                <form method="post" action="<?php echo base_url().'index.php/projectcharter/view_project/'?><?php echo $id_proj?>">
              <button type="submit" class="btn btn-danger">Back</button>
            </form>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Add Scope</button>
                <!-- Small modal -->


                   <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content" style="width: 40em;">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Add Planning Scope</h4>
                        </div>
                        <div class="modal-body">
                         
                     <form method="post" action="<?php echo base_url().'index.php/projectcharter/simpan_planning_scope_scope'?>">
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                          <div class="form-group">
                            <label  class="control-label">Scope Name</label>
                            <input type="text" class="form-control" name="scope_name" id="scope_name">
                          </div>
                          <div class="form-group">
                            <label class="control-label">Scope Description</label>
                            <input type="text" class="form-control" name="scope_desc" id="scope_desc">
                          </div>

                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary" onclick="CheckForm(); return false">Add</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <br>
                <table id="datatable" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Scope Name</th>
                      <th>Scope Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>


                  <tbody>

 <?php
      foreach($planning_scope_scope_data->result_array() as $i):
        $id=$i['id'];
        $name=$i['name'];
        $description=$i['description'];
        $deliverable=$i['deliverable'];
        $id_project=$i['id_project'];?>
        <tr>
          <td><?php echo $name?></td>
          <td><?php echo $description?></td>
          <td>
            <a href="#" onclick="ReverseRemoveReadonly()" data-toggle="modal" data-target="#myModalz<?php echo $id; ?>"><i class="fa fa-edit"> Deliverable</i></a>&nbsp&nbsp
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
                        <h4 class="modal-title">Update Scope</h4>
                      </div>
                      <div class="modal-body">
                        
                     <form method="post" action="<?php echo base_url().'index.php/projectcharter/edit_planning_scope_scope'?>">
                          <input type="hidden" name="id_proj_edit" id="id_proj_edit" value="<?php echo $id_project?>">
                          <input type="hidden" name="id" id="id" value="<?php echo $id?>">
                          <input type="hidden" name="deliverable" id="deliverable" value="<?php echo $deliverable?>">
                          <div class="form-group">
                            <label>Scope Name</label>
                            <input type="text"  class="form-control" value="<?php echo $name?>" id="name_edit" name="name_edit">      
                          </div>

                          <div class="form-group">
                            <label>Scope Description</label>
                            <input type="text" class="form-control" id="description_edit" name="description_edit" value="<?php echo $description?>" >      
                          </div>

                          <div class="modal-footer">  
                            <button type="submit" class="btn btn-primary" onclick="CheckFormEdit(); return false">Update</button>

                          </div>


                        </form>

                      </div>
                    </div>

                  </div>
                </div>

                 <!-- Modal Edit Mahasiswa-->
                <div class="modal fade" id="myModalz<?php echo $id; ?>" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">View Scope</h4>
                      </div>
                      <div class="modal-body">
                        
                     <form method="post" action="<?php echo base_url().'index.php/projectcharter/edit_planning_scope_scope'?>">
                          <input type="hidden" name="id_proj_edit" id="id_proj_edit" value="<?php echo $id_project?>">
                          <input type="hidden" name="id" id="id" value="<?php echo $id?>">
                          <input type="hidden" name="description_edit" id="description_edit" value="<?php echo $description?>">
                          <input type="hidden" name="name_edit" id="name_edit" value="<?php echo $name?>">
              

                          <div class="form-group">
                            <label>Deliverable</label>
                            <textarea readonly="true" rows="15" cols="40" class="form-control" id="deliverable_view" name="deliverable" ><?php echo $deliverable?></textarea> 
                          </div>

                          <div class="modal-footer">  
                            <button class="btn btn-primary" id="btnEditDel" onclick="RemoveReadonly(); return false">Edit Note</button>
                            <button type="submit" class="btn btn-primary" style="display: none;" id="btnUpdate" onclick="CheckFormView(); return false">Update</button>

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
        //alert("<?php echo site_url('projectcharter/hapus_planning_scope_scope?id='); ?>"+id);
        window.location ="<?php echo site_url('projectcharter/hapus_planning_scope_scope/'); ?>"+id+"/"+id_project;
      } else {
      }
    }
    function ReverseRemoveReadonly(){
      document.getElementById('btnUpdate').style.display='none';
      document.getElementById('btnEditDel').style.display='';

      document.getElementById('deliverable_view').readOnly = true;
    }
    function RemoveReadonly(){
      document.getElementById('btnUpdate').style.display='';
      document.getElementById('btnEditDel').style.display='none';

      document.getElementById('deliverable_view').readOnly = false;
    }

    function CheckForm(){

      var scope_name = document.getElementById('scope_name').value;
      var scope_desc = document.getElementById('scope_desc').value;
      

      if(scope_name=="") {
        alert("Scope Name tidak boleh kosong");
        document.getElementById('scope_name').focus();
        return null;
      }
      if(scope_desc=="") {
        alert("Scope Description tidak boleh kosong");
        document.getElementById('scope_desc').focus();
        return null;
      }
 

      form.submit();
    }
    function CheckFormEdit(){
      
      var scope_name = document.getElementById('name_edit').value;
      var scope_desc = document.getElementById('description_edit').value;

      if(scope_name=="") {
        alert("Scope Name tidak boleh kosong");
        document.getElementById('name_edit').focus();
        return null;
      }
      if(scope_desc=="") {
        alert("Scope Description tidak boleh kosong");
        document.getElementById('description_edit').focus();
        return null;
      }

      form.submit();
    }

    function CheckFormView(){
      
      var scope_name = document.getElementById('deliverable').value;

      if(scope_name=="") {
        alert("Deliverable tidak boleh kosong");
        document.getElementById('name_edit').focus();
        return null;
      }

      form.submit();
    }
  </script>


</body>
</html>