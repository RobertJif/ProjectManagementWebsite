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
              <h2>Activity Resource</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li>  
                <form method="post" action="<?php echo base_url().'index.php/projectcharter/view_project/'?><?php echo $id_proj?>">
              <button type="submit" class="btn btn-danger">Back</button>
            </form>

                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <!-- Small modal -->
        
              <form method="post" action="<?php echo base_url().'index.php/projectcharter/edit_activity_resource2/'?><?php echo $id_proj?>">
            
              <input type="hidden" name="req_count" id="req_count" value="<?php echo $req_count-1?>">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th width="15%">Activity</th>
                  <th width="10%">Position</th>
                  <th width="5%">Optimistic</th>
                  <th width="5%">Most Likely</th>
                  <th width="5%">Pessimistic</th>
                  <th width="5%">Estimated Duration</th>
                  <th width="5%">Start Date</th>
                  <th width="5%">End Date</th>
                  <th width="5%">Workhours</th>
                </tr>
              </thead>


              <tbody>
            

    <?php
      foreach($activity_resource_data->result_array() as $is => $i):
        $id=$i['id'];
        $id_activity=$i['id_activity'];
        $id_resource=$i['id_resource'];
        $description=$i['description'];
        $predecessor_id=$i['predecessor_id'];
        $successor_id=$i['successor_id'];
        $location=$i['location'];
        $optimistic=$i['optimistic'];
        $most_likely=$i['most_likely'];
        $pessimistic=$i['pessimistic'];
        $estimated=$i['estimated'];
        $start_date=$i['start_date'];
        $start_date=date('Y-m-d', strtotime($start_date));
        $end_date=$i['end_date'];
        $end_date=date('Y-m-d', strtotime($end_date));
        $estimated_workhours=$i['estimated_workhours'];
        $id_project=$i['id_project'];
       ?>
        <tr>
          <input type="hidden" name="id<?php echo $is?>" id="id<?php echo $is?>" value="<?php echo $id?>">

          <td><?php echo $is+1?></td>
          <td>
            <select class="form-control" name="id_activity<?php echo $is?>" id="id_activity<?php echo $is?>" disabled>
                              <option value="">Select Activity</option>
                              <?php
                              foreach($activity_wbs_data->result_array() as $js => $j):
                                $id_wbs=$j['id'];
                                $name_wbs=$j['name'];
                               ?>
                               <option value="<?php echo $id_wbs?>" <?php if ($id_wbs==$id_activity) {echo "selected";}?>><?php echo $name_wbs?></option>
                              <?php  endforeach;  ?>
                            </select>
          </td>
          <td>
             <select class="form-control" name="id_resource<?php echo $is?>" id="id_resource<?php echo $is?>" disabled>
                              <option value="">Select Position</option>
                              <?php
                              foreach($planning_scope_resource_data->result_array() as $ks => $k):
                                $id_positions=$k['id'];
                                $resource_position=$k['position'];
                                $resource_name=$k['name'];
                               ?>
                               <option value="<?php echo $id_positions?>" <?php if ($id_positions==$id_resource) {echo "selected";}?>><?php echo $resource_name?> - <?php echo $resource_position?></option>
                              <?php  endforeach;  ?>
                            </select>
          </td>
          <td><input style="width: 100px" type="number" min="0" onchange="HitungDurasiAdd()" name="optimistic<?php echo $is?>" id="optimistic<?php echo $is?>" value="<?php echo $optimistic?>" class="form-control"></td>
          <td><input style="width: 100px" type="number" onchange="HitungDurasiAdd()" min="0" name="most_likely<?php echo $is?>" id="most_likely<?php echo $is?>" value="<?php echo $most_likely?>" class="form-control"></td>
          <td><input style="width: 100px" type="number" onchange="HitungDurasiAdd()" min="0" name="pessimistic<?php echo $is?>" id="pessimistic<?php echo $is?>" value="<?php echo $pessimistic?>" class="form-control"></td>
          
          <td><input  readonly="readonly" style="width: 150px" type="text" name="estimated<?php echo $is?>" id="estimated<?php echo $is?>" value="<?php echo $estimated?>" class="form-control"></td>
          <td>
          <input type='date' class="form-control" onchange="HitungDurasiAdd()" name="start_date<?php echo $is?>" id="start_date<?php echo $is?>" value="<?php echo $start_date;?>" > 
          </td>
          <td>
          <input readonly="readonly" type='date' class="form-control" name="end_date<?php echo $is?>" id="end_date<?php echo $is?>" value="<?php echo $end_date;?>"> 
          </td>
          <td><input style="width: 100px" type="number" onchange="HitungDurasiAdd()" min="0" name="estimated_workhours<?php echo $is?>" id="estimated_workhours<?php echo $is?>" value="<?php echo $estimated_workhours?>" class="form-control"></td>
                </tr>
               

              <?php  endforeach;  ?>
 
              </tbody>
     
            </table>
       
                    <button type="submit" class="btn btn-success" onclick="CheckForm(); return false">Save</button>
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
        window.location ="<?php echo site_url('projectcharter/hapus_activity_resource/'); ?>"+id+"/"+id_project;
      } else {
      }
    }

    function HitungDurasiAdd() {

      var aa = parseInt(document.getElementById('req_count').value);
      aa+=1;
      for (var i = 0; i <= aa; i++) {
       

      var vstartdate = new Date(document.getElementById('start_date'+i).value);
      var a = parseInt(document.getElementById('pessimistic'+i).value);
      var b = parseInt(document.getElementById('most_likely'+i).value)*4;
      var c = parseInt(document.getElementById('optimistic'+i).value);
      var vduration = Math.ceil((a+b+c)/6);

      var count = 0;
      var endDate = "";
      while(count < vduration){
          endDate = new Date(vstartdate.setDate(vstartdate.getDate() + 1));
          if(endDate.getDay() != 0 && endDate.getDay() != 6){
             count++;
          }
      }


     // vstartdate.setDate(vstartdate.getDate() + vduration); 
      //vstartdate.setDate(vstartdate.getDate() + vduration); 
      var dd = endDate.getDate(); 
      var mm = endDate.getMonth()+1;
      var yyyy = endDate.getFullYear(); 
      if(dd<10)
      {
          dd='0'+dd
      } 
      if(mm<10)
      {  
          mm='0'+mm 
      } 
      var vstartdate = yyyy+'-'+mm+'-'+dd; 
      document.getElementById('estimated'+i).value = vduration;
      document.getElementById('end_date'+i).value = vstartdate; 
      }
    }

    function CheckForm(){
      HitungDurasiAdd();
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