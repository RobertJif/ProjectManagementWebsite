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
              <h2>Detail System Process</h2>
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
             <div class="col-md-12 col-sm-12 col-xs-12">



          <table class="table table-bordered">
            <thead>
              <tr>
                <th rowspan="2">Knowledge Area</th>
                <th colspan="5" style="text-align: center;">Project Management Process Groups</th>
              </tr>
              <tr>
                <th>Initiating</th>
                <th>Planning</th>
                <th>Excecuting</th>
                <th>Monitoring & Controlling</th>
                <th>Closing</th>
                
              </tr>
            </thead>


            <tbody>
              <tr>
                 <td>Project Integration Management</td>
              <td>Develop Project Charter</td>
              <td>Develop Project Management Plan</td>
              <td>Direct and Manage Project Work</td>
              <td>1. Monitor and Control Project Work <br>
                  2. Perform Integrated Change</td>
                  <td>Close Project or Phase</td>

              </tr>
              <tr>
                <td>Project Scope Management</td>
                <td></td>
                <td>1. Plan Scope Management <br>
                  2. Collect Requirements <br>
                  3. Define Scope <br>
                4. Create WBS</td>
                <td></td>
                <td>1. Validate Scope <br>
                2. Control Scope</td>
                <td></td>
              </tr>
             
               <tr>
                <td>Project Time Management</td>
                <td></td>
                <td>1. Plan Schedule Management <br>
                  2. Define Activities <br>
                  3. Sequence Aktivities <br>
                4. Estimate Activity Resource
                <br>
                5. Estimate Activity Duration <br>
              6. Develop Schedule</td>
                <td></td>
                <td>Control Schedule</td>
                <td></td>
              </tr>

                  <tr>
                <td>Project Cost Management</td>
                <td></td>
                <td>1. Plan Cost Management <br>
                  2. Estimate Costs <br>
                3. Determine Budget</td>
                <td></td>
                <td>Control Costs</td>
                <td></td>
              </tr>

                 <tr>
                <td>Project Human Resource Management</td>
                <td></td>
                <td>Plan Human Resource Management</td>
                <td>1. Develop Project Team <br>
                2. Manage Project Team</td>
                <td></td>
                <td></td>
              </tr>

               <tr>
                <td>Project Communication Management</td>
                <td></td>
                <td>Plan Communication Management</td>
                <td>Manage Communication</td>
                <td>Control Communication</td>
                <td></td>
              </tr>
			  
			  <tr>
                <td>Project Risk Management</td>
                <td></td>
                <td>Identify Risk</td>
                <td></td>
                <td>Control Communication</td>
                <td></td>
              </tr>

                <tr>
                <td>Project Stakeholder Management</td>
                <td></td>
                <td>Plan Stakeholder Management</td>
                <td>Manage Stakeholder Engagement</td>
                <td>Control Stakeholder Engagement</td>
                <td></td>
              </tr>

                <tr>
                <td>Project Procurement Management</td>
                <td></td>
                <td>Plan Procurement Management</td>
                <td>Conduct Procurement</td>
                <td>Conduct Procurement</td>
                <td>Close Procurement</td>
              </tr>
             
               <tr>
                <td>Project Quality Management</td>
                <td></td>
                <td>Plan Quality Management</td>
                <td>Perform Quality Assurance</td>
                <td>Control Quality</td>
                <td></td>
              </tr>


            </tbody>
          </table>

          </div>



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