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
              <h2>Determine Budget</h2>
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Add </button> <br><br>

              <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content" style="width: 40em;">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel2">Add Project</h4>
                    </div>
                    <div class="modal-body">
                     <form>
                      <div class="form-group">
                        <label  class="control-label">Name</label>
                        <input type="text" class="form-control" " id="add_project_name">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Amount</label>
                        <input type="text" class="form-control"  id="add_project_desc">
                      </div>
                      <div class="form-group">
                        <label for="start-date" class="control-label">Unit</label>

                        <input type='text' class="form-control" > 
                      </div>
                      <div class="form-group">
                        <label for="end-date" class="control-label">Description</label>

                        <input type='text' class="form-control" > 
                      </div>
                      <div class="form-group">
                        <label class="control-label">Cost</label>
                        <input type="text" class="form-control" >
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
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Unit</th>
                  <th>Description</th>
                  <th>Cost</th>
                  
                  <th>Action</th>
                </tr>
              </thead>


              <tbody>


                <tr>

                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  
                  <td>
                    <a href="#" onclick=""><i class="fa fa-search"> View</i></a>&nbsp&nbsp
                    <a href="" data-toggle="modal" data-target="#myModals"><i class="fa fa-edit"> Edit</i></a>&nbsp&nbsp
                    <a href="#" onclick=""><i class="fa fa-trash"> Delete</i></a>

                  </td>
                </tr>


                <!-- Modal Edit Mahasiswa-->
                <div class="modal fade" id="myModals" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Project</h4>
                      </div>
                      <div class="modal-body">
                        <form>

                          <input type="hidden"  name="id" value="<?php echo $id;?>">

                          <div class="form-group">
                            <label>Project Name</label>
                            <input type="text"  class="form-control" id="edit_project_name"  >      
                          </div>

                          <div class="form-group">
                            <label>Project Description</label>
                            <input type="text"  class="form-control" id="edit_project_desc"  >      
                          </div>

                          <div class="form-group">
                            <label for="start-date" class="control-label" >Start Date</label>

                            <input type='date' class="form-control" onchange="ClearEndDate()"  id="edit_start_date"  > 
                          </div>
                          <div class="form-group">
                            <label for="end-date" class="control-label">End Date</label>

                            <input type='date' onchange="HitungDurasiEdit()" class="form-control"  id="edit_end_date" > 
                          </div>
                          <div class="form-group">
                            <label class="control-label">Duration</label>
                            <input type="text" class="form-control" id="edit_duration"  readonly value=">
                          </div>
                          <div class="form-group">
                            <label class="control-label">Budget</label>
                            <input type="text" class="form-control"  id="edit_budget" >
                          </div>
                          <div class="form-group">
                            <label class="control-label">Project Manager</label>
                            <input type="text" class="form-control"   id="edit_project_manager">
                          </div>

                          <div class="modal-footer">  
                            <button type="submit" class="btn btn-primary" onclick="CheckFormEdit(); return false">Update</button>

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
<?php include 'include/footer.php';?>


<script type="text/javascript">
  $(function () {
    $('#datetimepicker1').datetimepicker();
  });
  function hapusProject(id){

    var r = confirm("Are you sure want to delete the data ?");
    if (r == true) {
        //alert("<?php echo site_url('projectcharter/hapus_project?id='); ?>"+id);
        window.location ="<?php echo site_url('projectcharter/hapus_project?id='); ?>"+id;
      } else {
      }
    }
    function viewProject(id){
      window.location ="<?php echo site_url('projectcharter/view_project?id='); ?>"+id;
    }

    function HitungDurasiEdit() {
      var vstartdate = new Date(document.getElementById('edit_start_date').value);
      var venddate = new Date(document.getElementById('edit_end_date').value);
      var duration = Math.round((venddate-vstartdate)/(1000*60*60*24));
      document.getElementById('edit_duration').value = duration;
    }
    function HitungDurasiAdd() {
      var vstartdate = new Date(document.getElementById('add_start_date').value);
      var venddate = new Date(document.getElementById('add_end_date').value);
      var duration = Math.round((venddate-vstartdate)/(1000*60*60*24));
      document.getElementById('add_duration').value = duration;
    }
    function ClearEndDate(){
      document.getElementById('add_end_date').value = "";
      document.getElementById('edit_end_date').value = "";
    }
    function CheckForm(){

      var vpname = document.getElementById('add_project_name').value;
      var vpdesc = document.getElementById('add_project_desc').value;
      var vstartdate = document.getElementById('add_start_date').value;
      var venddate = document.getElementById('add_end_date').value;
      var budget = document.getElementById('add_budget').value;
      var pmanager = document.getElementById('add_project_manager').value;

      if(vpname=="") {
        alert("Project name tidak boleh kosong");
        return null;
      }
      if(vpdesc=="") {
        alert("Project description tidak boleh kosong");
        return null;
      }
      if(vstartdate=="") {
        alert("Start date tidak boleh kosong");
        return null;
      }
      if(venddate=="") {
        alert("End date tidak boleh kosong");
        return null;
      }
      if(budget=="") {
        alert("Budget tidak boleh kosong");
        return null;
      }
      if(pmanager=="") {
        alert("Project Manager tidak boleh kosong");
        return null;
      }

      form.submit();
    }
    function CheckFormEdit(){
      var vpname = document.getElementById('edit_project_name').value;
      var vpdesc = document.getElementById('edit_project_desc').value;
      var vstartdate = document.getElementById('edit_start_date').value;
      var venddate = document.getElementById('edit_end_date').value;
      var budget = document.getElementById('edit_budget').value;
      var pmanager = document.getElementById('edit_project_manager').value;

      if(vpname=="") {
        alert("Project name tidak boleh kosong");
        return null;
      }
      if(vpdesc=="") {
        alert("Project description tidak boleh kosong");
        return null;
      }
      if(vstartdate=="") {
        alert("Start date tidak boleh kosong");
        return null;
      }
      if(venddate=="") {
        alert("End date tidak boleh kosong");
        return null;
      }
      if(budget=="") {
        alert("Budget tidak boleh kosong");
        return null;
      }
      if(pmanager=="") {
        alert("Project Manager tidak boleh kosong");
        return null;
      }

      form.submit();
    }
  </script>


</body>
</html>