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
              <h2>Project Charter</h2>
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Add </button> 
              <br><br>

              <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content" style="width: 40em;">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel2">Add Project</h4>
                    </div>
                    <div class="modal-body">
                     <form method="post" action="<?php echo base_url().'index.php/projectcharter/simpan_project'?>">
                      <div class="form-group">
                        <label  class="control-label">Project Name</label>
                        <input type="text" class="form-control" name="project_name" id="add_project_name">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Project Description</label>
                        <input type="text" class="form-control" name="project_desc" id="add_project_desc">
                      </div>
                      <div class="form-group">
                        <label for="start-date" class="control-label">Start Date</label>

                        <input type='date' class="form-control" onchange="ClearEndDate()" name="start_date" id="add_start_date"> 
                      </div>
                      <div class="form-group">
                        <label for="end-date" class="control-label">End Date</label>

                        <input type='date' class="form-control" onchange="HitungDurasiAdd()" name="end_date" id="add_end_date"> 
                      </div>
                      <div class="form-group">
                        <label class="control-label">Duration</label>
                        <input type="text" class="form-control" name="duration" readonly id="add_duration">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Budget</label>
                        <input type="text" class="form-control" name="budget" id="add_budget">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Project Manager</label>
                        <input type="text" class="form-control" name="project_manager" id="add_project_manager">
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" onclick="CheckForm(); return false">Add</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>


            <div class="modal fade bs-example-modal-sms" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content" style="width: 40em;">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel3">Detail System Process</h4>
                  </div>
                  <div class="modal-body">
                   <form method="post" action="<?php echo base_url().'index.php/projectcharter/simpan_project'?>">

                    <div class="form-group">
                      <label class="control-label">Duration</label>
                      <input type="text" class="form-control" name="duration" readonly id="add_duration">
                    </div>

                  </div>

                </form>
              </div>
            </div>
          </div>

          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Project Name</th>
                <th>Project Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Duration</th>
                <th>Budget</th>
                <th>Project Manager</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>


            <tbody>

              <?php
              foreach($data->result_array() as $i):
                $id=$i['id'];
                $project_name=$i['project_name'];
                $project_desc=$i['project_desc'];
                $start_date=$i['start_date'];
                $start_date=date('Y-m-d', strtotime($start_date));
                $end_date=$i['end_date'];
                $end_date=date('Y-m-d', strtotime($end_date));
                $duration=$i['duration'];
                $holidayduration=$i['holidayduration'];
                $budget=$i['budget'];
                $status=$i['status'];
                $project_manager=$i['project_manager'];
                ?>
                <tr>

                  <td><?php echo $project_name;?></td>
                  <td><?php echo $project_desc;?></td>
                  <td><?php echo $start_date;?></td>
                  <td><?php echo $end_date;?></td>
                  <td><?php echo $duration-$holidayduration;?></td>
                  <td>Rp. <?php echo number_format($budget,2,',','.') ?></td>
                  <td><?php echo $project_manager;?></td>
                  <td><?php echo $status;?></td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs"  onclick="viewProject(<?php echo $id; ?>)"><i class="fa fa-folder"></i> View Detail Project</a>
                    <br>
                    <a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModals<?php echo $id; ?>"><i class="fa fa-pencil"></i> Edit </a>
                    <a href="#" class="btn btn-danger btn-xs" onclick="hapusProject(<?php echo $id; ?>)"><i class="fa fa-trash-o"></i> Delete </a>
                   
                  </td>
                </tr>


                <!-- Modal Edit Mahasiswa-->
                <div class="modal fade" id="myModals<?php echo $id; ?>" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Project</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form"  method="post" action="<?php echo base_url().'index.php/projectcharter/edit_project'?>">

                          <input type="hidden"  name="id" value="<?php echo $id;?>">

                          <div class="form-group">
                            <label>Project Name</label>
                            <input type="text" name="project_name" class="form-control" id="edit_project_name" value="<?php echo $project_desc;?>" >      
                          </div>

                          <div class="form-group">
                            <label>Project Description</label>
                            <input type="text" name="project_desc" class="form-control" id="edit_project_desc" value="<?php echo $project_desc;?>" >      
                          </div>

                          <div class="form-group">
                            <label for="start-date" class="control-label" >Start Date</label>

                            <input type='date' class="form-control" onchange="ClearEndDate()" name="start_date" id="edit_start_date" value="<?php echo $start_date;?>" > 
                          </div>
                          <div class="form-group">
                            <label for="end-date" class="control-label">End Date</label>

                            <input type='date' onchange="HitungDurasiEdit()" class="form-control" name="end_date" id="edit_end_date" value="<?php echo $end_date;?>"> 
                          </div>
                          <div class="form-group">
                            <label class="control-label">Duration</label>
                            <input type="text" class="form-control" id="edit_duration" name="duration" readonly value="<?php echo $duration;?>">
                          </div>
                          <div class="form-group">
                            <label class="control-label">Budget</label>
                            <input type="text" class="form-control" name="budget" id="edit_budget" value="<?php echo $budget;?>">
                          </div>
                          <div class="form-group">
                            <label class="control-label">Project Manager</label>
                            <input type="text" class="form-control" name="project_manager" value="<?php echo $project_manager;?>" id="edit_project_manager">
                          </div>

                          <div class="modal-footer">  
                            <button type="submit" class="btn btn-primary" onclick="CheckFormEdit(); return false">Update</button>

                          </div>


                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach;?>
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
      window.location ="<?php echo site_url('projectcharter/view_project/'); ?>"+id;
    }

    function HitungDurasiEdit() {
      var vstartdate = new Date(document.getElementById('edit_start_date').value);
      var venddate = new Date(document.getElementById('edit_end_date').value);

      

      var duration = Math.round((venddate-vstartdate)/(1000*60*60*24));
      document.getElementById('edit_duration').value = getDays(vstartdate,venddate);
    }
    function HitungDurasiAdd() {
      var vstartdate = new Date(document.getElementById('add_start_date').value);
      var venddate = new Date(document.getElementById('add_end_date').value);
      var duration = Math.round((venddate-vstartdate)/(1000*60*60*24));
      document.getElementById('add_duration').value = getDays(vstartdate,venddate);
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

    function getDays(d1, d2) {
    var one_day=1000*60*60*24;
    var d1_days = parseInt(d1.getTime()/one_day) - 1;
    var d2_days = parseInt(d2.getTime()/one_day);
    var days = (d2_days - d1_days);
    var weeks = (d2_days - d1_days) / 7;
    var day1 = d1.getDay();
    var day2 = d2.getDay();
    if (day1 == 0) {
        days--;
    } else if (day1 == 6) {
        days-=2;
    }
    if (day2 == 0) {
       days-=2;
    } else if (day2 == 6) {
       days--;
    }
    days -= parseInt(weeks) * 2;
    return days;
}
  </script>


</body>
</html>