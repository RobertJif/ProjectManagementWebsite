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
                <li>  
                <form method="post" action="<?php echo base_url().'index.php/projectcharter/view_project/'?><?php echo $id_proj?>">
              <button type="submit" class="btn btn-danger">Back</button>
            </form>
          </li>
                <li>    </li>
              

                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <!-- Small modal -->
        
              <form method="post" action="<?php echo base_url().'index.php/projectcharter/simpan_collect_requirement/'?><?php echo $id_proj?>">
            
              <input type="hidden" name="req_count" id="req_count" value="<?php echo $req_count-1?>">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Requirement Name</th>
                  <th>Scope</th>
                  <th width="5%">Status</th>
                </tr>
              </thead>


              <tbody>
            

    <?php
      foreach($planning_scope_requirement_data->result_array() as $is => $i):
        $id=$i['id'];
        $requirement=$i['requirement'];
        $scope=$i['id_scope'];
        $status=$i['status'];
       
        $id_project=$i['id_project'];?>
        <tr>
          <input type="hidden" name="id_req<?php echo $is?>" id="id_req<?php echo $is?>" value="<?php echo $id?>">

          <td><input readonly="readonly" style="width: 500px" class="form-control" type="text" name="requirement<?php echo $is?>" id="requirement<?php echo $is?>" value="<?php echo $requirement?>"></td>
          <td><select style="width: 500px" class="form-control" name="scope<?php echo $is?>" id="scope<?php echo $is?>">
            <option value="0" >--Scope--</option>
            <?php
            foreach($planning_scope_scope_data->result_array() as $js => $j):
            $id_scope=$j['id'];
            $name_scope=$j['name'];?>
            <option value="<?php echo $id_scope?>" <?php if ($id_scope==$scope) {
            echo "selected";
            }?>><?php echo $name_scope?></option>
            <?php  endforeach;  ?>
          </select></td>          <td><select class="form-control" name="status<?php echo $is?>" id="status<?php echo $is?>" >
            <option value="Tidak" >Tidak Aktif</option>
            <option value="Aktif" <?php
            if ($status=="Aktif") {
              echo "selected";
            }
            ?>>Aktif</option>
          </select></td>


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
        //alert("<?php echo site_url('projectcharter/hapus_planning_scope_requirement?id='); ?>"+id);
        window.location ="<?php echo site_url('projectcharter/hapus_planning_scope_requirement/'); ?>"+id+"/"+id_project;
      } else {
      }
    }


    function CheckForm(){

      var requirement = document.getElementById('requirement').value;
      var business_unit = document.getElementById('business_unit').value;
      var role = document.getElementById('role').value;

      if(requirement=="") {
        alert("Requirement Name tidak boleh kosong");
        document.getElementById('requirement').focus();
        return null;
      }
      if(business_unit=="") {
        alert("Business Unit tidak boleh kosong");
        document.getElementById('business_unit').focus();
        return null;
      }
      if(role=="") {
        alert("Role tidak boleh kosong");
        document.getElementById('role').focus();
        return null;
      }
 

      form.submit();
    }
    function CheckFormEdit(){
      var requirement = document.getElementById('requirement_edit').value;
      var business_unit = document.getElementById('business_unit_edit').value;
      var role = document.getElementById('role_edit').value;

      if(requirement=="") {
        alert("Requirement Name tidak boleh kosong");
        document.getElementById('requirement_edit').focus();
        return null;
      }
      if(business_unit=="") {
        alert("Business Unit tidak boleh kosong");
        document.getElementById('business_unit_edit').focus();
        return null;
      }
      if(role=="") {
        alert("Role tidak boleh kosong");
        document.getElementById('role_edit').focus();
        return null;
      }

      form.submit();
    }
  </script>
</body>
</html>