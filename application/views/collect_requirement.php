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
              <h2>Collect Requirement</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>

                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <!-- Small modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Add</button> <br><br>

              <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content" style="width: 40em;">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel2">Add Requirement</h4>
                    </div>
                    <div class="modal-body">
                     <form>
                      <div class="form-group">
                        <label  class="control-label">Requirement Name</label>
                        <input type="text" class="form-control" >
                      </div>
                      <div class="form-group">
                        <label class="control-label">Business Unit</label>
                        <input type="text" class="form-control"  >
                      </div>
                      <div class="form-group">
                        <label for="start-date" class="control-label">Role</label>

                        <input type='text' class="form-control"  > 
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary">Add</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Requirement Name</th>
                  <th>Business Unit</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>


              <tbody>


                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <a href="" data-toggle="modal" data-target="#myModals"><i class="fa fa-edit"> Edit</i></a>&nbsp&nbsp
                    <a href="" data-toggle="modal"> <i class="fa fa-trash"> Delete</i></a>

                  </td>

                </tr>

                <!-- Modal Edit Mahasiswa-->
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Project</h4>
                      </div>
                      <div class="modal-body">
                        <form >

                          <div class="form-group">
                            <label>Project Name</label>
                            <input type="text"  class="form-control"  >      
                          </div>

                          <div class="form-group">
                            <label>Project Description</label>
                            <input type="text" class="form-control"  >      
                          </div>

                          <div class="form-group">
                            <label for="start-date" class="control-label" >Start Date</label>

                            <input type='date' class="form-control"  > 
                          </div>
                          <div class="form-group">
                            <label for="end-date" class="control-label">End Date</label>

                            <input type='date' class="form-control" > 
                          </div>
                          <div class="form-group">
                            <label class="control-label">Duration</label>
                            <input type="text" class="form-control" >
                          </div>
                          <div class="form-group">
                            <label class="control-label">Budget</label>
                            <input type="text" class="form-control" >
                          </div>
                          <div class="form-group">
                            <label class="control-label">Project Manager</label>
                            <input type="text" class="form-control" >
                          </div>

                          <div class="modal-footer">  
                            <button type="submit" class="btn btn-primary">Update</button>

                          </div>


                        </form>

                      </div>
                    </div>

                  </div>
                </div>

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
</script>
</body>
</html>