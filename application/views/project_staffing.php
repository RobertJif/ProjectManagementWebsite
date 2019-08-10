<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


</head>


<?php include ('include/header.php');?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Histogram</h3>
      </div>


    </div>

    <div class="clearfix"></div>

    <div class="row">


    
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Project Staffing Estimates</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li>  <form method="post" action="<?php echo base_url().'index.php/projectcharter/view_project/'?><?php echo $id_project?>">
              <button type="submit" class="btn btn-danger">Back</button>
            </form>
              </li>
             
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <table id="datatable" class="table table-striped table-bordered">
                <a href="<?php echo site_url('projectcharter/histogram/');?><?php echo $id_project?>">
    <button type="button" class="btn btn-warning">Human Resource Histogram</button>
  </a>
  <br><br>
              <thead>
                <tr>
                 <th width="5%">No.</th>
                 <th>Name</th>
                 <th>Position</th>
                 <th>Activity Count</th>
                 <th>Work Days</th>
               
               </tr>
             </thead>


             <tbody>
          <?php
          foreach($project_staffing_estimates_data->result_array() as $is => $i):

            $name=$i['name'];
            $position=$i['position'];
            $activity=$i['activity'];
            $workday=$i['workday'];
            ?>

              <tr>
                <td><?php echo $is+1?></td>
                <td><?php echo $name?></td>
                <td><?php echo $position?></td>
                <td><?php echo $activity?></td>
                <td><?php echo $workday?></td>
               
              </tr>

              <?php  endforeach;  ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



</div>
</div>
<!-- page content -->

<!-- footer content -->
<footer>
  <div class="pull-right">
    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
  </div>
  <div class="clearfix"></div>
</footer>
<!-- footer content -->
</div>
</div>

<?php include ('include/footer.php');?>

</body>
</html>