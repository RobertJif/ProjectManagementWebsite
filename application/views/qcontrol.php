<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <?php include 'include/header.php';?>
  <?php
        foreach($activity_quality_data->result_array() as $q):
         $blackbox=$q['blackbox'];
         $whitebox=$q['whitebox'];
         $uat=$q['uat'];
       endforeach;
         ?>
  <!-- page content -->
  <div class="right_col" role="main">
<input <?php if ($blackbox=="0") {echo "style='display:none'";}?> type="button" class="form-control" onclick="tgpanel('panel1')" style="display: " value="Blackbox">
<input <?php if ($whitebox=="0") {echo "style='display:none'";}?> type="button" class="form-control" onclick="tgpanel('panel2')" style="display: " value="Whitebox">
<input <?php if ($uat=="0") {echo "style='display:none'";}?> type="button" class="form-control" onclick="tgpanel('panel3')" style="display: " value="UAT">
    <div class="">


      <div class="clearfix"></div>

      <div class="row" id="panel1" style="display: none">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Activity Blackbox</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li>  
                <form method="post" action="<?php echo base_url().'index.php/projectcharter/view_project/'?><?php echo $id_proj?>">
              <button type="submit" class="btn btn-danger">Back</button>
            </form>

          </li>
                <li>        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal1-sm">Add Blackbox Activity</button>
                <!-- Small modal -->


                   <div class="modal fade bs-example-modal1-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content" style="width: 40em;">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Add Activity</h4>
                        </div>
                        <div class="modal-body">
                         
                     <form method="post" action="<?php echo base_url().'index.php/projectcharter/simpan_blackbox'?>">
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                          <div class="form-group">
                            <label  class="control-label">Test Case</label>
                            <input type="text" class="form-control" name="title" id="title_bb">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Input</label>
                            <input type="text" class="form-control" name="input" id="input_bb">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Expected</label>
                            <input type="text" class="form-control" name="expected" id="expected_bb">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Result</label>
                               <select class="form-control" name="result" id="result_bb">
                              <option value="Succeed">Succeed</option>
                             <option value="Fail">Fail</option>
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
        
              <form method="post" action="<?php echo base_url().'index.php/projectcharter/edit_blackbox/'?><?php echo $id_proj?>">
            
              <input type="hidden" name="req_count_bb" id="req_count_bb" value="<?php echo $req_count_bb-1?>">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                <th width="1%">No.</th>
                  <th width="5%">Test Case</th>
                  <th width="10%">Inputan</th>
                  <th width="10%">Expected Result</th>
                  <th width="10%">Result</th>
                  <th width="5%">Action</th>
                </tr>
              </thead>


              <tbody>
            

    <?php
      foreach($blackbox_data->result_array() as $is => $i):
        $id=$i['id'];
        $title=$i['title'];
        $input=$i['input'];
        $expected=$i['expected'];
        $result=$i['result'];
        $id_project=$i['id_project'];
       ?>
        <tr>
          <input type="hidden" name="id<?php echo $is?>" id="id<?php echo $is?>" value="<?php echo $id?>">

          <td><?php echo $is+1?></td>
          <td>
          <input class="form-control" type="text" name="title<?php echo $is?>" id="title<?php echo $is?>" value="<?php echo $title?>">
          </td>
          <td>
          <input class="form-control" type="text" name="input<?php echo $is?>" id="input<?php echo $is?>" value="<?php echo $input?>">
          </td>
          <td>
          <input class="form-control" type="text" name="expected<?php echo $is?>" id="expected<?php echo $is?>" value="<?php echo $expected?>">
          </td>
          <td>
             <select class="form-control" name="result<?php echo $is?>" id="result<?php echo $is?>">
                <option value="Succeed" <?php if ($result=="Succeed") {echo "selected";}?>>Succeed</option>
               <option value="Fail" <?php if ($result=="Fail") {echo "selected";}?>>Fail</option>
              </select>
          </td>
          <td>
              <a href="#" onclick="hapusProject1(<?php echo $id; ?>,<?php echo $id_project; ?>)">
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

      <div class="row" id="panel2" style="display: none">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Activity Whitebox</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li>  
                <form method="post" action="<?php echo base_url().'index.php/projectcharter/view_project/'?><?php echo $id_proj?>">
              <button type="submit" class="btn btn-danger">Back</button>
            </form>

          </li>
                <li>        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal2-sm">Add Whitebox Activity</button>
                <!-- Small modal -->


                   <div class="modal fade bs-example-modal2-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content" style="width: 40em;">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Add Activity</h4>
                        </div>
                        <div class="modal-body">
                         
                     <form method="post" action="<?php echo base_url().'index.php/projectcharter/simpan_whitebox'?>">
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                          <div class="form-group">
                            <label  class="control-label">Test Case</label>
                            <input type="text" class="form-control" name="title" id="title_wb">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Expected</label>
                            <input type="text" class="form-control" name="expected" id="expected_wb">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Test Result</label>
                            <input type="text" class="form-control" name="output" id="output_wb">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Result</label>
                               <select class="form-control" name="result" id="result_wb">
                              <option value="Succeed">Succeed</option>
                             <option value="Fail">Fail</option>
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
        
              <form method="post" action="<?php echo base_url().'index.php/projectcharter/edit_whitebox/'?><?php echo $id_proj?>">
            
              <input type="hidden" name="req_count_wb" id="req_count_wb" value="<?php echo $req_count_wb-1?>">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th width="5%">Test Case</th>
                  <th width="10%">Expected Result</th>
                  <th width="10%">Test Result</th>
                  <th width="10%">Result</th>
                  <th width="5%">Action</th>
                </tr>
              </thead>


              <tbody>
            

    <?php
      foreach($whitebox_data->result_array() as $is => $i):
        $id=$i['id'];
        $title=$i['title'];
        $output=$i['output'];
        $expected=$i['expected'];
        $result=$i['result'];
        $id_project=$i['id_project'];
       ?>
        <tr>
          <input type="hidden" name="id<?php echo $is?>" id="id<?php echo $is?>" value="<?php echo $id?>">

          <td><?php echo $is+1?></td>
          <td>
          <input class="form-control" type="text" name="title<?php echo $is?>" id="title<?php echo $is?>" value="<?php echo $title?>">
          </td>
          <td>
          <input class="form-control" type="text" name="output<?php echo $is?>" id="output<?php echo $is?>" value="<?php echo $output?>">
          </td>
          <td>
          <input class="form-control" type="text" name="expected<?php echo $is?>" id="expected<?php echo $is?>" value="<?php echo $expected?>">
          </td>
          <td>
             <select class="form-control" name="result<?php echo $is?>" id="result<?php echo $is?>">
                <option value="Succeed" <?php if ($result=="Succeed") {echo "selected";}?>>Succeed</option>
               <option value="Fail" <?php if ($result=="Fail") {echo "selected";}?>>Fail</option>
              </select>
          </td>
          <td>
              <a href="#" onclick="hapusProject2(<?php echo $id; ?>,<?php echo $id_project; ?>)">
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

      <div class="row" id="panel3" style="display: none">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Activity UAT</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li>  
                <form method="post" action="<?php echo base_url().'index.php/projectcharter/view_project/'?><?php echo $id_proj?>">
              <button type="submit" class="btn btn-danger">Back</button>
            </form>

          </li>
                <li>        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal3-sm">Add UAT Activity</button>
                <!-- Small modal -->


                   <div class="modal fade bs-example-modal3-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content" style="width: 40em;">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Add Activity</h4>
                        </div>
                        <div class="modal-body">
                         
                     <form method="post" action="<?php echo base_url().'index.php/projectcharter/simpan_uat'?>">
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                          <div class="form-group">
                            <label  class="control-label">Test Case</label>
                            <input type="text" class="form-control" name="title" id="title_uat">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Well Responses</label>
                            <input type="number" class="form-control" name="well" id="well_uat">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">Enough Responses</label>
                            <input type="number" class="form-control" name="enough" id="enough_uat">
                          </div>
                          <div class="form-group">
                            <label  class="control-label">No Good Responses</label>
                            <input type="number" class="form-control" name="notgood" id="notgood_uat">
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
        
              <form method="post" action="<?php echo base_url().'index.php/projectcharter/edit_uat/'?><?php echo $id_proj?>">
            
              <input type="hidden" name="req_count_uat" id="req_count_uat" value="<?php echo $req_count_uat-1?>">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th width="5%">Test Case</th>
                  <th width="10%">Well</th>
                  <th width="10%">Enough</th>
                  <th width="10%">No Good</th>
                  <th width="5%">Action</th>
                </tr>
              </thead>


              <tbody>
            

    <?php
      foreach($uat_data->result_array() as $is => $i):
        $id=$i['id'];
        $title=$i['title'];
        $enough=$i['enough'];
        $well=$i['well'];
        $notgood=$i['notgood'];
        $id_project=$i['id_project'];
       ?>
        <tr>
          <input type="hidden" name="id<?php echo $is?>" id="id<?php echo $is?>" value="<?php echo $id?>">

          <td><?php echo $is+1?></td>
          <td>
          <input class="form-control" type="text" name="title<?php echo $is?>" id="title<?php echo $is?>" value="<?php echo $title?>">
          </td>
          <td>
          <input class="form-control" type="text" name="enough<?php echo $is?>" id="enough<?php echo $is?>" value="<?php echo $enough?>">
          </td>
          <td>
          <input class="form-control" type="text" name="well<?php echo $is?>" id="well<?php echo $is?>" value="<?php echo $well?>">
          </td>
          <td>
          <input class="form-control" type="text" name="notgood<?php echo $is?>" id="notgood<?php echo $is?>" value="<?php echo $notgood?>">
          </td>
 
          <td>
              <a href="#" onclick="hapusProject3(<?php echo $id; ?>,<?php echo $id_project; ?>)">
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
        //alert("<?php echo site_url('projectcharter/hapus_blackbox?id='); ?>"+id);
        window.location ="<?php echo site_url('projectcharter/hapus_blackbox/'); ?>"+id+"/"+id_project;
      } else {
      }
    }
   function tgpanel(id){
    var status = document.getElementById(id).style.display;

     if (status.length>2) {
     document.getElementById(id).style.display = "";
     }
     else{
     document.getElementById(id).style.display = "none";
     }
     
    }

    function CheckForm(){

      var id_activity = document.getElementById('name').value;
      var id_position = document.getElementById('unit').value;
      var description = document.getElementById('amount').value;
      var prodecessor_id = document.getElementById('cost').value;
      var successor_id = document.getElementById('description').value;
      if(id_activity=="") {
        alert("Name tidak boleh kosong");
        document.getElementById('name').focus();
        return null;
      }
      if(id_position=="") {
        alert("Unit Name tidak boleh kosong");
        document.getElementById('unit').focus();
        return null;
      }
      if(description=="") {
        alert("Amount tidak boleh kosong");
        document.getElementById('amount').focus();
        return null;
      }
      if(prodecessor_id=="") {
        alert("Cost tidak boleh kosong");
        document.getElementById('cost').focus();
        return null;
      }
      if(successor_id=="") {
        alert("Description tidak boleh kosong");
        document.getElementById('description').focus();
        return null;
      }

      form.submit();
    }
  </script>
</body>
</html>