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
  foreach($project_detail_data->result_array() as $i):
  $id=$i['id'];
  $project_name=$i['project_name'];
  $project_desc=$i['project_desc'];
  $start_date=$i['start_date'];
  $start_date=date('Y-m-d', strtotime($start_date));
  $end_date=$i['end_date'];
  $end_date=date('Y-m-d', strtotime($end_date));
  $duration=$i['duration'];
  $budget=$i['budget'];
  $project_manager=$i['project_manager'];
  endforeach;
  ?>
  

  <!-- page content -->
  <div class="right_col" role="main">


    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
       <h3><?php echo $project_name ?></h3>
       <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">


              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#initiating" id="tab1" role="tab" data-toggle="tab" aria-expanded="true">Initiating</a>
                  </li>
                  <li role="presentation" class=""><a href="#planning" id="tab2" role="tab" data-toggle="tab" aria-expanded="false">Planning</a>
                  </li>
                  <li role="presentation" class=""><a href="#excecuting" id="tab3" role="tab"  data-toggle="tab" aria-expanded="false">Excecuting</a>
                  </li>
                  <li role="presentation" class=""><a href="#monitoring" id="tab4" role="tab"  data-toggle="tab" aria-expanded="false">Monitoring & Controlling</a>
                  </li>
                  <li role="presentation" class=""><a href="#closing" id="tab4" role="tab"  data-toggle="tab" aria-expanded="false">Closing</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="initiating" aria-labelledby="home-tab">
                    <div class="x_content">
                     <ul class="list-unstyled timeline">
                       <li>
                        <div class="block">
                         <div class="tags">

                           <img src="<?php echo base_url('assets/i.png');?>">

                         </div>
                         <div class="block_content">
                          <h2 class="title">
                            Initiating Project
                          </h2>

                          <p class="excerpt"><?php echo $project_desc ?>
                          </p>
                        </div>

                      </div>
                    </li>
                    <li>
                      <div class="block">
                        <div class="tags">

                          <img src="<?php echo base_url('assets/man.png');?>">

                        </div>
                        <div class="block_content">
                          <h2 class="title">
                            Project Manager
                          </h2>
                          <p class="excerpt"><?php echo $project_manager ?>
                          </p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="block">
                        <div class="tags">

                          <img src="<?php echo base_url('assets/dollar.png');?>">

                        </div>
                        <div class="block_content">
                          <h2 class="title">
                            Budget
                          </h2>

                          <p class="excerpt">Rp. <?php echo number_format($budget,2,',','.') ?>
                          </p>
                        </div>
                      </div>
                    </li>
                    <li style="height: 650px;">
                      <div class="block">
                        <div class="tags">

                         <img src="<?php echo base_url('assets/document.png');?>">

                       </div>
                       <div class="block_content">
                         <div class="title"> 
                           <?php
                           foreach($init_data->result_array() as $i):
                           $id=$i['id'];
                           $scope_eef=$i['scope_eef'];
                           $scope_opa=$i['scope_opa'];
                           $time_eef=$i['time_eef'];
                           $time_opa=$i['time_opa'];
                           $cost_eef=$i['cost_eef'];
                           $cost_opa=$i['cost_opa'];
                           $risk_eef=$i['risk_eef'];
                           $risk_opa=$i['risk_opa'];
                           $stake_holder_eef=$i['stake_holder_eef'];
                           $stake_holder_opa=$i['stake_holder_opa'];
                           $communication_eef=$i['communication_eef'];
                           $communication_opa=$i['communication_opa'];
                           $human_resource_eef=$i['human_resource_eef'];
                           $human_resource_opa=$i['human_resource_opa'];
                           $quality_control_eef=$i['quality_control_eef'];
                           $quality_control_opa=$i['quality_control_opa'];
                           $procurement_eef=$i['procurement_eef'];
                           $procurement_opa=$i['procurement_opa'];

                           endforeach;
                           ?>
                           <table class="table table-bordered">
                            <thead>
                              <tr>
                               <th colspan="2">All Knowledge Areas</th>
                               
                               
                               <tr>
                                <th width="10%">EEF</th>
                                <th width="10%">OPA</th>
                                


                              </tr>


                            </tr>

                          </thead>
                          <tbody>
                            <tr>
                              <td><a href="/dicka/files/<?php echo $scope_eef ?>"><?php echo $scope_eef ?></a></td>
                              <td><a href="/dicka/files/<?php echo $scope_opa ?>"><?php echo $scope_opa ?></a></td>
                              
                            </tr>
                          </tbody>
                        </table>
                        
                      
                     <?php echo form_open_multipart('ProjectCharter/simpan_initiating');?>
                     <input type="hidden" value="<?php echo $id ?>" name="project_id" id="project_id" />
                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Pick Document Criteria</label>
                     <select class="form-control" name="opt1" id="opt1">
                      <option value="0">Choose option</option>
                      <option value="scope_">All Knowledge Area</option>
                   
                    </select>
                    <br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">EEF/OPA</label>
                    <select class="form-control" name="opt2" id="opt2">
                      <option value="0">Choose option</option>
                      <option value="eef">EEF</option>
                      <option value="opa">OPA</option>
                    </select>



                    <br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">File</label>

                    <input type="file" class="form-control-file" id="file_initiating" name="file_initiating">
                    <br>
                    <button type="submit" class="btn btn-success" onclick="CheckForm(); return false">Add Files</button>

                  </form>
                </div>
              </div>
            </div>
          </li>
        </ul>

      </div>
    </div>


    <div role="tabpanel" class="tab-pane fade" id="planning" aria-labelledby="profile-tab">

      <div class="x_panel">
        <div class="x_title">
          <h2> Scope &nbsp;
           <a href="<?php echo site_url('ProjectCharter/view_collect_requirement/');?><?php echo $id_project?>">
            <button type="button" class="btn btn-success" >Collect Requirement</button>
          </a></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="col-xs-3">
            <!-- required for floating -->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-left">
              <li class="active"><a href="#home" data-toggle="tab">Requirement</a>
              </li>
              <li><a href="#profile" data-toggle="tab">Scope</a>
              </li>
              <li><a href="#messages" data-toggle="tab">WBS</a>
              </li>
              <li><a href="#settings" data-toggle="tab">Resources</a>
              </li>
            </ul>
          </div>
          <div class="col-xs-9">
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="home">
               <a href="<?php echo site_url('ProjectCharter/view_planning_scope_requirement/');?><?php echo $id?>"><button class="btn btn-primary">Update</button></a>

               <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="30%" >Requirement Name</th>

                  </tr>


                </tr>

              </thead>
              <tbody>
               <?php foreach($planning_scope_requirement_data->result_array() as $i):
               $id=$i['id'];
               $requirement=$i['requirement'];
               $business_unit=$i['business_unit'];
               $role=$i['role'];
               $id_project=$i['id_project'];?>
               <tr>

                <td><?php echo $requirement?></td>

              </tr>

              <?php  endforeach;  ?>
            </tbody>
          </table>
        </div>
        <div class="tab-pane" id="profile"><a href="<?php echo site_url('ProjectCharter/view_planning_scope_scope/');?><?php echo $id_project?>"><button class="btn btn-primary">Update</button></a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th width="30%" >Scope Name</th>

              </tr>


            </tr>

          </thead>
          <tbody>
            <?php foreach($planning_scope_scope_data->result_array() as $i):
            $id=$i['id'];
            $name=$i['name'];
            $description=$i['description'];
            $deliverable=$i['deliverable'];
            $id_project=$i['id_project'];?>
            <tr>

              <td><?php echo $name?></td>

            </tr>

            <?php  endforeach;  ?>
          </tbody>
        </table>
      </div>
      <div class="tab-pane" id="messages"><a href="<?php echo site_url('ProjectCharter/view_planning_scope_wbs/');?><?php echo $id_project?>">
        <button class="btn btn-primary">Update</button></a>


        <table class="table table-bordered">
          <thead>

            <tr>
              <th>WBS ID</th>
              <th>Task Project</th>

            </tr>


          </tr>

        </thead>
        <tbody>

         <?php
         $sql ="SELECT id,name 'task_name' FROM activity_wbs_parent where id_project=".$id_project." order by sequence";
         $query = $this->db->query($sql);
         if ($query->num_rows() > 0) {
         foreach ($query->result() as $row => $rows) {?>
         <tr><td><?php echo $row+1;?></td><td><?php echo $rows->task_name;?></td></tr>

         <?php 
         $temp = $rows->id;
         $sql2 ="SELECT id,name 'task_name' FROM activity_wbs where id_parent=".$temp." order by sequence";
         $query2 = $this->db->query($sql2);
         if ($query2->num_rows() > 0) {
         foreach ($query2->result() as $row2 => $rows2) {
         ?>

         <tr><td><?php echo $row+1;?>.<?php echo $row2+1;?></td><td><?php echo $rows2->task_name;?></td></tr>

         <?php
       }}}
     }
     ?>

   </tbody>
 </table>
</div>




<div class="tab-pane" id="settings"><a href="<?php echo site_url('ProjectCharter/view_planning_scope_resource/');?><?php echo $id_project?>"><button class="btn btn-primary">Update</button></a>
 <table class="table table-bordered">
  <thead>
    <tr>
      <th>Job Position</th>
      <th>Salary (per day)</th>
      <th>Name</th>

    </tr>


  </tr>

</thead>
<tbody>
 <?php
 foreach($planning_scope_resource_data->result_array() as $i):
 $id=$i['id'];
 $position=$i['position'];
 $salary=$i['salary'];
 $name=$i['name'];
 $id_project=$i['id_project'];?>
 <tr>
  <td><?php echo $position?></td>
  <td>Rp. <?php echo number_format($salary,2,',','.') ?></td>
  <td><?php echo $name?></td>

</td>

</tr>


<?php  endforeach;  ?>

</tbody>
</table>
</div>

</div>
</div>
</div>
</div>


<div class="x_panel">
  <div class="x_title">
    <h2>  Time &nbsp;
      <a href="<?php echo site_url('ProjectCharter/view_activity_wbs/');?><?php echo $id_project?>">
        <button type="button" class="btn btn-info" style="display: none">Activity WBS </button>
      </a>
      <a href="<?php echo site_url('ProjectCharter/view_activity_holiday/');?><?php echo $id_project?>">
        <button type="button" class="btn btn-info">Holiday Date </button>
      </a>
      <a href="<?php echo site_url('ProjectCharter/view_activity_resource/');?><?php echo $id_project?>">
        <button type="button" class="btn btn-info">Estimate Activity Resource </button>
      </a>
      <a href="<?php echo site_url('ProjectCharter/view_activity_resource2/');?><?php echo $id_project?>">
        <button type="button" class="btn btn-info">Estimate Activity Duration & Develop Schedule</button>
      </a></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>

        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
     <p class="lead">Define Activites & Sequence Activities</p>


     <table class="table table-bordered">
      <thead>
        <tr>
          <th>Task Name</th>
          <th>Define Activity</th>
          <th>Sequence Activity</th>

        </tr>


      </tr>

    </thead>
    <tbody>
     <?php
     foreach($activity_define_sequence_data->result_array() as $i):
     $task_name_ds=$i['task_name_ds'];
     $define_activity=$i['define_activity'];
     $sequence_activity=$i['sequence_activity'];?>
     <tr>
      <td><?php echo $task_name_ds?></td>
      <td><?php echo $define_activity?></td>
      <td><?php echo $sequence_activity?></td>

    </td>

  </tr>


  <?php  endforeach;  ?>

</tbody>
</table>
</div>
</div>

<div class="x_panel">
  <div class="x_title">
    <h2>Cost &nbsp;
      <a href="<?php echo site_url('ProjectCharter/view_activity_budget/');?><?php echo $id_project?>">
        <button type="button" class="btn btn-warning">Determine Budget </button>
      </a></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>

        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <p class="lead">Estimate Resource Cost & Determine Budget</p>


      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Resource</th>
            <th>Indirect Cost</th>
            <th>Direct Cost</th>

          </tr>


        </tr>

      </thead>
      <tbody>
        <?php
        foreach($activity_budget_detail_data->result_array() as $is => $i):
        $name=$i['name'];
        $unit=$i['indirect_cost'];
        $cost=$i['direct_cost'];
        ?>
        <tr>

          <td><?php echo $name?></td>
          <td><?php echo $unit?></td>
          <td><?php echo $cost?></td>

        </tr>

        <?php  endforeach;  ?>
      </tbody>
    </table>
  </div>
</div>

<div class="x_panel">
  <div class="x_title">
    <h2> Risk &nbsp;
      <a href="<?php echo site_url('ProjectCharter/view_activity_risk/');?><?php echo $id_project?>">
        <button type="button" class="btn btn-danger">Identify Risk</button>
      </a></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>

        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
     <p class="lead">Project Risk</p>


     <table class="table table-bordered">
      <thead>
       <tr>
        <th width="1%">No.</th>
        <th width="55%">Description</th>
        <th width="10%">Category</th>
        <th width="20%">Date Entered</th>
      </tr>


    </tr>

  </thead>
  <tbody>
   <?php

   foreach($activity_risk_data->result_array() as $is => $i):
   $id=$i['id'];
   $description=$i['description'];
   $category=$i['category'];
   $trigger_event=$i['trigger_event'];
   $backup=$i['backup'];
   $owner=$i['owner'];
   $date_entered=$i['date_entered'];
   $review=$i['review'];
   $end_date=$i['end_date'];
   $status=$i['status'];
   $id_project=$i['id_project'];
   ?>
   <tr>
    <input type="hidden" name="id<?php echo $is?>" id="id<?php echo $is?>" value="<?php echo $id?>">

    <td><?php echo $is+1?></td>
    <td>
      <?php echo $description?>
    </td>
    <td>
      <?php echo $category?>
    </td>
    <td>
      <?php echo $date_entered?>
    </td>

  </tr>


  <?php  endforeach;  ?>
</tbody>
</table>


</div>
</div>

<div class="x_panel">
  <div class="x_title">
    <h2> Stake Holder &nbsp; <a href="<?php echo site_url('ProjectCharter/view_activity_stake_holder_plan/');?><?php echo $id_project?>"><button type="button" class="btn btn-primary">Planning Stake Holder</button></a>

    </h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>

      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
   <p class="lead">Stake Holder</p>


   <table class="table table-bordered">



    <thead>
      <tr>
        <th width="1%">No.</th>
        <th width="5%">Role</th>
        <th width="10%">Name</th>
        <th width="10%">Impact</th>
        <th width="10%">Needs</th>
        <th width="10%">Responsibility</th>
      </tr>
    </thead>


    <tbody>

      <?php
      $countStakeHolder = 0;
      foreach($activity_stake_holder_data->result_array() as $is => $i):
      $countStakeHolder = $countStakeHolder+1;
      $id=$i['id'];
      $resource_id=$i['resource_id'];
      $resource_name=$i['resource_name'];
      $role=$i['role'];
      $impact=$i['impact'];
      $needs=$i['needs'];
      $responsibility=$i['responsibility'];
      $id_project=$i['id_project'];?>
      <tr>
        <td><?php echo $is+1?></td>
        <td><?php if ($role=='internal') {echo "Internal";} else{echo "External";}?></td>
        <td><?php echo $resource_name?></td>
        <td><?php echo $impact?></td>
        <td><?php echo $needs?></td>
        <td><?php echo $responsibility?></td>

      </tr>



      <?php  endforeach;  ?>
    </tbody>
  </table>


</div>
</div>

<div class="x_panel">
  <div class="x_title">

    <a href="<?php echo site_url('ProjectCharter/view_activity_issue_log_planning/');?><?php echo $id_project?>">
      <h2>Communications &nbsp;<button type="button" class="btn btn-warning">Planning Communications</button>
      </a>

    </h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>

      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <p class="lead">Communication Log</p>


    <table class="table table-bordered">



     <thead>
      <tr>
        <th width="1%">No.</th>
        <th width="15%">Description</th>
        <th width="10%">Impact</th>
        <th width="10%">Actions Plan</th>
        <th width="10%">Owner</th>
        <th width="10%">Importance</th>
        <th width="10%">Date</th>
        <th width="10%">File</th>
      </tr>
    </thead>


    <tbody>

      <?php
      foreach($activity_issue_log_data->result_array() as $is => $i):
      $id=$i['id'];
      $description=$i['description'];
      $impact=$i['impact'];
      $action=$i['action'];
      $importance=$i['importance'];
      $date_entered=$i['date_entered'];
      $date_entered=date('Y-m-d', strtotime($date_entered));
      $file=$i['file'];
      $id_project=$i['id_project'];?>
      <tr>
        <td><?php echo $is+1?></td>
        <td><?php echo $description?></td>
        <td><?php echo $impact?></td>
        <td><?php echo $action?></td>
        <td><a href="" data-toggle="modal" data-target="#myModalo<?php echo $id; ?>">
          <button class="btn btn-default" onclick="return false">Owner List</button>
        </a></td>
        <td><?php echo $importance?></td>
        <td><?php echo $date_entered?></td>
        <td><a href="/dicka/files/<?php echo $file ?>"><?php echo $file ?></td>

        </tr>


        <!-- Modal View Owner-->
        <div class="modal fade" id="myModalo<?php echo $id; ?>" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Owner List</h4>
              </div>
              <div class="modal-body">

                <?php 
                $sql2 ="SELECT a.*,b.resource_name 'stake_holder_name' FROM issue_owner a left join planning_stake_holder b on a.stake_holder_id=b.id  where id_issue=".$id;
                $query2 = $this->db->query($sql2);
                if ($query2->num_rows() > 0) {
                foreach ($query2->result() as $row2 => $rows2) {
                ?>
                <div class="form-group">
                  <input disabled="disabled" type="text" class="form-control" value="<?php echo $rows2->stake_holder_name;?>">
                </div>

                <?php
              }}
              ?>

            </div>
          </div>

        </div>
      </div>


      <?php  endforeach;  ?>
    </tbody>
  </table>



</div>
</div>

<div class="x_panel">
  <div class="x_title">

    <h2>Human Resources &nbsp;<button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-sms">Planning Human Resources</button>

    </h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>

      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
   <?php
   $remainings_raci = 0;
   foreach($remaining_raci->result_array() as $i):
   $remainings_raci=$i['remaining'];
   endforeach;  
   if($remainings_raci>0){
   ?>


   <p class="lead" style="color: red">Organization Chart can only be seen after completing all the scoring!</p>
   <?php
 }
 else{


 ?>


 <p class="lead">Organization Chart</p>
 <table class="table table-bordered">
  <thead>
    <th></th>
    <?php
    foreach($planning_scope_resource_data2->result_array() as $i):
    $id=$i['id'];
    $position=$i['position'];
    $salary=$i['salary'];
    $name=$i['name'];
    $id_project=$i['id_project'];?>
    <th><?php echo $position?></th>
    <?php  endforeach;  ?>

  </tr>


</tr>

</thead>
<tbody>

  <?php
  $sql ="SELECT distinct (select name from activity_wbs b where b.id=a.id_wbs) activity_name,a.id_wbs FROM raci a where a.id_project=".$id_project;
  $query = $this->db->query($sql);
  if ($query->num_rows() > 0) {
  foreach ($query->result() as $row => $rows) {?>
  <tr><td><?php echo $rows->activity_name;?></td>

   <?php
   $sql2 ="SELECT ifnull(score,'-') score FROM raci a where a.id_wbs=".$rows->id_wbs." order by id_resource";
   $query2 = $this->db->query($sql2);
   if ($query2->num_rows() > 0) {
   foreach ($query2->result() as $row2 => $rows2) {?>
   <td><?php echo $rows2->score;?></td>

   <?php
 }
}
?>


</tr>
<?php
}
}

?>

</tbody>
</table>

<?php
}
?>

</div>
<?php
foreach($activity_quality_data->result_array() as $q):
$blackbox=$q['blackbox'];
$whitebox=$q['whitebox'];
$uat=$q['uat'];
endforeach;
?>
</div>
<div class="x_panel">
  <div class="x_title"><a href="" data-toggle="modal" data-target="#myModalQ">
    <h2>Quality &nbsp;</h2>
    <button class="btn btn-info" onclick="return false">Quality</button>
  </a>

  <!-- Modal View Owner-->
  <div class="modal fade" id="myModalQ" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Testing type list</h4>
        </div>
        <div class="modal-body">

          <form method="post" action="<?php echo base_url().'index.php/projectcharter/edit_quality/'?><?php echo $id_project?>">

           <table class="table table-bordered">
            <thead>
              <tr>
                <th>Blackbox</th>
                <th>Whitebox</th>
                <th>UAT</th>

              </tr>


            </tr>

          </thead>
          <tbody>
            <tr>
              <td><div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="cbbb" <?php if ($blackbox=="1") {echo "checked";}?>>

              </div></td>
              <td><div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="cbwb" <?php if ($whitebox=="1") {echo "checked";}?>>

              </div></td>
              <td><div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="cbuat" <?php if ($uat=="1") {echo "checked";}?>>

              </div></td>
            </tr>
          </tbody>
        </table>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>

</div>
</div>



</h2>
<ul class="nav navbar-right panel_toolbox">
  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
  </li>

  <li><a class="close-link"><i class="fa fa-close"></i></a>
  </li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">


  <p class="lead">Quality Testing</p>

  <table class="table table-bordered">



   <thead>
    <tr>
      <th width="1%">No.</th>
      <th width="15%">Type Testing</th>
      <th width="10%">Success</th>
      <th width="10%">Failed</th>
    </tr>
  </thead>


  <tbody>

    <?php
    foreach($blackbox_data->result_array() as $is => $i):
    $type=$i['type'];
    $succeed=$i['succeed'];
    $fail=$i['fail'];?>
    <tr>
      <td><?php echo $is+1?></td>
      <td><?php echo $type?></td>
      <td><?php echo $succeed?></td>
      <td><a href="" data-toggle="modal" data-target="#myModalbb<?php echo $id; ?>">
       <?php echo $fail?>
     </a></td>
   </tr>


   <!-- Modal View Owner-->
   <div class="modal fade" id="myModalbb<?php echo $id; ?>" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Owner List</h4>
        </div>
        <div class="modal-body">

          <?php 
          $sql2 ="SELECT * FROM blackbox where id_project='".$id_project."' and result='Fail'";
          $query2 = $this->db->query($sql2);
          if ($query2->num_rows() > 0) {
          foreach ($query2->result() as $row2 => $rows2) {
          ?>
          <div class="form-group">
            <input disabled="disabled" type="text" class="form-control" value="<?php echo $rows2->title;?>">
          </div>

          <?php
        }}
        ?>

      </div>
    </div>

  </div>
</div>


<?php  endforeach;  ?>
</tbody>
</table>
<table class="table table-bordered">



 <thead>
  <tr>
    <th width="1%">No.</th>
    <th width="15%">Type Testing</th>
    <th width="10%">Score</th>
    <th width="10%">Tag</th>
  </tr>
</thead>


<tbody>

  <?php
  foreach($uat_data->result_array() as $is => $i):
  $value=$i['value'];
  $tag=$i['tag'];?>
  <tr>
    <td><?php echo $is+1?></td>

    <td>UAT Testing</td>
    <td><?php echo $value?>%</td>
    <td><?php echo $tag?></td>
  </a></td>
</tr>


</div>


<?php  endforeach;  ?>
</tbody>
</table>
</div>
</div>


<div class="x_panel">
  <div class="x_title">
    <h2>
      Procurement &nbsp;
      <a href="<?php echo site_url('ProjectCharter/view_activity_vendor_planning/');?><?php echo $id_project?>">
        <button type="button" class="btn btn-success">Procurement </button>
      </a>

    </h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>

      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">


    <p class="lead">Procurement</p>

    <table id="datatable" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th width="1%">No.</th>
          <th width="10%">Vendor</th>
          <th width="15%">Description</th> 
        </tr>
      </thead>
      <tbody>

        <?php
        foreach($activity_vendor_data->result_array() as $is => $i):
        $id=$i['id'];
        $description=$i['description'];
        $name=$i['name'];
        $product_quality=$i['product_quality'];
        $order_date=$i['order_date'];
        $order_date=date('Y-m-d', strtotime($order_date));
        $document=$i['document'];
        $ontime_delivery=$i['ontime_delivery'];
        $file=$i['document'];
        $cost=$i['cost'];
        $time=$i['time'];
        $cost_unit=$i['cost_unit'];
        $efficiency=$i['efficiency'];
        $id_project=$i['id_project'];
        ?>
        <tr>
          <td><?php echo $is+1?></td>
          <td><?php echo $name?></td>
          <td><?php echo $description?></td>  </tr> 
          <?php  endforeach;  ?>
        </tbody>

      </table>
    </div>
  </div>
</div>

<div role="tabpanel" class="tab-pane fade" id="excecuting" aria-labelledby="profile-tab">
  <div class="row">

   <div class="col-md-6 col-sm-12 col-xs-12">
     <div class="x_panel">
       <div class="x_title">
         <h2>Human Resources</h2>
         <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <a href="<?php echo site_url('ProjectCharter/view_activity_raci/');?><?php echo $id_project?>">
          <button type="button" class="btn btn-info">Develop Project Team </button>
        </a>
        <a href="<?php echo site_url('projectcharter/project_staffing/');?><?php echo $id_project?>">
          <button type="button" class="btn btn-info">Manage Project Team</button>
        </a>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-sm-12 col-xs-12">
   <div class="x_panel">
     <div class="x_title">
      <h2>Stake Holder</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />
      <a href="<?php echo site_url('ProjectCharter/view_activity_stake_holder/');?><?php echo $id_project?>">
        <button type="button" class="btn btn-success">Manage Stake Holder</button>
      </a>  
    </div>
  </div>
</div>
</div>

<div class="row">

 <div class="col-md-6 col-sm-12 col-xs-12">
   <div class="x_panel">
     <div class="x_title">
      <h2>Communications</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />
      <a href="<?php echo site_url('ProjectCharter/view_activity_issue_log/');?><?php echo $id_project?>">
        <button type="button" class="btn btn-warning">Manage Communication</button>
      </a>
    </div>

  </div>
</div>

<div class="col-md-6 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Procurement</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />

      <a href="<?php echo site_url('ProjectCharter/view_activity_vendor/');?><?php echo $id_project?>">
        <button type="button" class="btn btn-danger">Conduct Procurement</button>
      </a>  
    </div>
  </div>
</div>

</div>

<div class="row">
 <div class="col-md-6 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Quality</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />
      <a href="<?php echo site_url('ProjectCharter/view_qcontrol/');?><?php echo $id_project?>">
        <button type="button" class="btn btn-dark">Perform Quality Assurance</button>
      </a>
    </div>
  </div>
</div>
</div>
</div>


<div role="tabpanel" class="tab-pane fade" id="monitoring" aria-labelledby="profile-tab">


  <br>
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Time</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
         <a href="<?php echo site_url('projectcharter/calendar/')?><?php echo $id_project?>">
          <button type="button" class="btn btn-info">Activity Calendar </button>
        </a>  

      </div>
    </div>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Risk</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <a href="<?php echo site_url('ProjectCharter/calendar_risk/');?><?php echo $id_project?>">
          <button type="button" class="btn btn-success">Control Risk</button>
        </a>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Scope</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">


       <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Control Scope</button>

       <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Scope & Time</h4>
            </div>
            <div class="modal-body">
             <table class="table table-bordered">
               <thead>
                <tr>
                  <th>Activity</th>
                  <th>Duration</th>
                  <th>Days Remaining</th>
                </tr>
              </thead>
              <tbody>
               <?php
               $days_remaining = $duration;
               foreach($activity_budget_report_data->result_array() as $i):
               $activity=$i['activity'];
               $estimated=$i['estimated'];
               $days_remaining -= $estimated;
               ?>
               <tr>
                <td><?php echo $activity?></td>
                <td><?php echo $estimated?></td>
                <td><?php echo $days_remaining?></td>

              </tr>

              <?php  endforeach;  ?>

            </tbody>
          </table> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div> 
</div>
</div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Communication</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <a href="<?php echo site_url('ProjectCharter/calendar_issue/');?><?php echo $id_project?>">
        <button type="button" class="btn btn-warning">Control Communication</button>
      </a>

      
    </div>
  </div>
</div>
</div>

<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Cost</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">


        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg1">Control Cost</button>

        <div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Budget Rp. <?php echo number_format($budget,2,',','.') ?></h4>
              </div>
              <div class="modal-body">
               <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Activity</th>
                    <th>Resource</th>
                    <th>Salary</th>
                    <th>Amount</th>
                    <th>Duration</th>
                    <th>Total Cost</th>
                    <th>Remaining Budget</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                 $budget_remaining = $budget;
                 foreach($activity_budget_report_data->result_array() as $i):
                 $activity=$i['activity'];
                 $resource=$i['resource'];
                 $salary=$i['salary'];
                 $amount=$i['amount'];
                 $estimated=$i['estimated'];
                 $total_cost=$i['total_cost'];
                 $budget_remaining -= $total_cost;
                 ?>
                 <tr>
                  <td><?php echo $activity?></td>
                  <td><?php echo $resource?></td>
                  <td>Rp. <?php echo number_format($salary,2,',','.') ?></td>
                  <td><?php echo $amount?></td>
                  <td><?php echo $estimated?></td>
                  <td>Rp. <?php echo number_format($total_cost,2,',','.') ?></td>
                  <td>Rp. <?php echo number_format($budget_remaining,2,',','.') ?></td>

                </tr>


                <?php  endforeach;  ?>

              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div> 
  </div>
</div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Procurement</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <a href="<?php echo site_url('ProjectCharter/calendar_vendor/');?><?php echo $id_project?>">
        <button type="button" class="btn btn-primary">Control Procurement</button>
      </a>


    </div>
  </div>
</div>
</div>

<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Stake Holder</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">


        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg2">Control Stake Holder</button>

        <div class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Stake Holder</h4>
              </div>
              <div class="modal-body">
                <table class="table table-bordered">
                 <thead>
                  <tr>
                    <th>Stake Holder Total</th>
                    <th>Internal Stake Holder</th>
                    <th>External Stake Holder</th>


                  </tr>

                  <a href="" data-toggle="modal" data-target="#myModalin<?php echo $id; ?>"> </a>
                </thead>
                <tbody>
                  <td><?php echo $countStakeHolder?></td>
                  <td> <a href="" data-toggle="modal" data-target="#myModalin"><i class="fa fa-folder"></i> View Detail</a> 
                    <div class="modal fade" id="myModalin" role="dialog">
                     <div class="modal-dialog">
                       <div class="modal-content" >
                         <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Owner List</h4>
                        </div>
                        <div class="modal-body">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th width="1%">No.</th>
                                <th width="10%">Name</th>
                                <th width="10%">Impact</th>
                                <th width="10%">Needs</th>
                                <th width="10%">Responsibility</th>
                              </tr>
                            </thead>
                            <tbody>

                              <?php
                              foreach($activity_stake_holder_data->result_array() as $is => $i):
                              $id=$i['id'];
                              $resource_id=$i['resource_id'];
                              $resource_name=$i['resource_name'];
                              $role=$i['role'];
                              $impact=$i['impact'];
                              $needs=$i['needs'];
                              $responsibility=$i['responsibility'];
                              $id_project=$i['id_project'];
                              if ($role=='internal') {
                              ?>
                              <tr>
                                <td><?php echo $is+1?></td>
                                <td><?php echo $resource_name?></td>
                                <td><?php echo $impact?></td>
                                <td><?php echo $needs?></td>
                                <td><?php echo $responsibility?></td>

                              </tr>



                              <?php  
                            }
                            endforeach;  ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <td> <a href="" data-toggle="modal" data-target="#myModalex"><i class="fa fa-folder"></i> View Detail</a>
               <div class="modal fade" id="myModalex" role="dialog">
                <div class="modal-dialog">
                 <div class="modal-content" >
                   <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Owner List</h4>
                  </div>
                  <div class="modal-body">
                   <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th width="1%">No.</th>
                        <th width="10%">Name</th>
                        <th width="10%">Impact</th>
                        <th width="10%">Needs</th>
                        <th width="10%">Responsibility</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      foreach($activity_stake_holder_data->result_array() as $is => $i):
                      $id=$i['id'];
                      $resource_id=$i['resource_id'];
                      $resource_name=$i['resource_name'];
                      $role=$i['role'];
                      $impact=$i['impact'];
                      $needs=$i['needs'];
                      $responsibility=$i['responsibility'];
                      $id_project=$i['id_project'];
                      if ($role=='external') {
                      ?>
                      <tr>
                        <td><?php echo $is+1?></td>
                        <td><?php echo $resource_name?></td>
                        <td><?php echo $impact?></td>
                        <td><?php echo $needs?></td>
                        <td><?php echo $responsibility?></td>

                      </tr>



                      <?php  }
                      endforeach;  ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tbody>
    </table>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>

</div>
</div>
</div> 
</div>
</div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Quality</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">


      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg3">Control Quality</button>

      <div class="modal fade bs-example-modal-lg3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Quality Testing</h4>
            </div>
            <div class="modal-body">
             <table class="table table-bordered">

               <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th width="15%">Type Testing</th>
                  <th width="10%">Success</th>
                  <th width="10%">Failed</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($blackbox_data->result_array() as $is => $i):
                $type=$i['type'];
                $succeed=$i['succeed'];
                $fail=$i['fail'];?>
                <tr>
                  <td><?php echo $is+1?></td>
                  <td><?php echo $type?></td>
                  <td><?php echo $succeed?></td>
                  <td><a href="" data-toggle="modal" data-target="#myModalbb<?php echo $id; ?>">
                   <?php echo $fail?>
                 </a></td>
               </tr>


               <!-- Modal View Owner-->
               <div class="modal fade" id="myModalbb<?php echo $id; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content" >
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Owner List</h4>
                    </div>
                    <div class="modal-body">

                      <?php 
                      $sql2 ="SELECT * FROM blackbox where id_project='".$id_project."' and result='Fail'";
                      $query2 = $this->db->query($sql2);
                      if ($query2->num_rows() > 0) {
                      foreach ($query2->result() as $row2 => $rows2) {
                      ?>
                      <div class="form-group">
                        <input disabled="disabled" type="text" class="form-control" value="<?php echo $rows2->title;?>">
                      </div>

                      <?php
                    }}
                    ?>

                  </div>
                </div>

              </div>
            </div>


            <?php  endforeach;  ?>
          </tbody>
        </table>

        <table class="table table-bordered">

         <thead>
          <tr>
            <th width="1%">No.</th>
            <th width="15%">Type Testing</th>
            <th width="10%">Score</th>
            <th width="10%">Tag</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($uat_data->result_array() as $is => $i):
          $value=$i['value'];
          $tag=$i['tag'];?>
          <tr>
            <td><?php echo $is+1?></td>

            <td>UAT Testing</td>
            <td><?php echo $value?>%</td>
            <td><?php echo $tag?></td>
          </a></td>
        </tr>


      </div>


      <?php  endforeach;  ?>
    </tbody>
  </table>


</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>

</div>
</div>
</div> 
</div>
</div>
</div>

</div>


</div>


<div role="tabpanel" class="tab-pane fade" id="closing" aria-labelledby="profile-tab">
  <button onclick="closeProject(<?php echo $id_project?>)" type="button" class="btn btn-info">Closing Project</button>
  <a href="<?php echo site_url('projectcharter/view_activity_vendor_status/')?><?php echo $id_project?>">
    <button type="button" class="btn btn-info">Closing Procurement</button>
  </a> 
</div>

<div class="modal fade bs-example-modal-sms" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="width: 40em;">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel3">Planning Human Resource</h4>
      </div>
      <div class="modal-body">
       <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

          <div class="x_content">

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Position</th>
                  <th>Name</th>

                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>

          </div>
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
  <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
  </ul>
  <div class="clearfix"></div>
  <div id="notif-group" class="tabbed_notifications"></div>
</div>



</div>

</div>



</div>
<!-- /page content -->



<!-- jQuery -->
<script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js');?>"></script>
<!-- NProgress -->
<script src="<?php echo base_url('assets/vendors/nprogress/nprogress.js');?>"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/vendors/iCheck/icheck.min.js');?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url('assets/build/js/custom.min.js');?>"></script>

<script type="text/javascript">
  function closeProject(id_project){
    var r = confirm("are you sure want to finish this project ?");
    if (r == true) {
        //alert("<?php echo site_url('projectcharter/hapus_activity_vendor?id='); ?>"+id);
        window.location ="<?php echo site_url('projectcharter/close_project/'); ?>"+id_project;
      } else {
      }
    }

    function CheckForm(){

      var vopt1 = document.getElementById('opt1').value;
      var vopt2 = document.getElementById('opt2').value;
      var vfile_initiating = document.getElementById('file_initiating').value;


      if(vopt1=="0") {
        alert("Document Criteria tidak boleh kosong");
        document.getElementById('opt1').focus();
        return null;
      }
      if(vopt2=="0") {
        alert("EEF/OPA tidak boleh kosong");
        document.getElementById('opt2').focus();
        return null;
      }
      if(vfile_initiating==""){
        alert("File tidak boleh kosong");
        document.getElementById('opt1').focus();
        return null;
      }

      form.submit();
    }
  </script>

  <script type="text/javascript">

    document.getElementById('tab5').click();

  </script>
</body>
</html>