<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <?php include 'include/header.php';?>
   <style type="text/css">
     .my-group .form-control{
    width:50%;
}
   </style>
   <script>
     if ( $.browser.webkit ) {
    $(".my-group-button").css("height","+=1px");
}
   </script>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">


      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Vendor List</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li>  
                <form method="post" action="<?php echo base_url().'index.php/projectcharter/view_project/'?><?php echo $id_proj?>">

              <button type="submit" class="btn btn-danger">Back</button>
            </form>

          </li>
                <li>        <button style="display: none" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Add Vendor</button>
                <!-- Small modal -->


                   <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content" style="width: 40em;">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">New Vendor</h4>
                        </div>
                        <div class="modal-body">
                         
                      <?php echo form_open_multipart('ProjectCharter/simpan_activity_vendor');?>
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">

                          <div class="form-group">
                            <label  class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                          </div>
                      <div class="form-group">
                            <label  class="control-label">Description</label>
                            <input type="text" class="form-control" name="description" id="description">
                          </div>
                          <div style="display: none" class="form-group">
                            <label  class="control-label">Product Quality</label>
                               <select class="form-control" name="product_quality" id="product_quality">
                              <option value="">Select Quality</option>
                              <option value="Low">Low</option>
                              <option value="Mid">Mid</option>
                              <option value="High">High</option>
                            </select>
                          </div>
                          <div style="display: none" class="form-group">
                            <label  class="control-label">On Time Delivery</label>
                               <select class="form-control" name="ontime_delivery" id="ontime_delivery">
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <div style="display: none" class="form-group">
                            <label  class="control-label">Development Cost</label>
                            <input type="number" class="form-control" name="cost" id="cost">
                          </div>
                          <div style="display: none" class="form-group">
                            <label  class="control-label">Development Time</label>
                            <input type="text" class="form-control" name="time" id="time">
                          </div>
                          <div style="display: none" class="form-group">
                            <label  class="control-label">Cost/Unit</label>
                            <input type="number" class="form-control" name="cost_unit" id="cost_unit">
                          </div>
                          <div style="display: none" class="form-group">
                            <label  class="control-label">Efficiency</label>
                            <input type="text" class="form-control" name="efficiency" id="efficiency">
                          </div>
                          <div style="display: none" class="form-group">
                            <label for="start-date" class="control-label">Order Date</label>
                            <input type='date' class="form-control" name="date" id="date"> 
                          </div>
                          <div style="display: none" class="form-group">
                            <label  class="control-label">Document</label><br>
                            <input type="file" class="btn btn-default" id="file_initiating" name="file_initiating">
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
        
            
              <input type="hidden" name="req_count" id="req_count" value="<?php echo $req_count-1?>">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th width="10%">Vendor</th>
                  <th width="15%">Description</th>
                  <th width="10%">Product Quality</th>
                  <th width="10%">On Time Delivery</th>
                  <th width="10%">Development Cost</th>
                  <th width="10%">Development Time</th>
                  <th width="10%">Cost(Unit)</th>
                  <th width="10%">Efficiency</th>
                  <th width="10%">Order Date</th>
                  <th width="10%">Document</th>
                  <th width="5%">Action</th>
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
          <td><?php echo $description?></td>
          <td><?php echo $product_quality?></td>
          <td><?php echo $ontime_delivery?></td>
          <td><?php echo $cost?></td>
          <td><?php echo $time?></td>
          <td><?php echo $cost_unit?></td>
          <td><?php echo $efficiency?></td>
          <td><?php echo $order_date?></td>
          <td>
            <?php if(UR_exists(base_url()."files/".$document)){?>
            <a href="/dicka/files/<?php echo $document ?>"><?php echo $document ?>
            <?php }
            ?>
          </td>
          <td>
            <a href="" data-toggle="modal" data-target="#myModal<?php echo $id; ?>"><i class="fa fa-edit"> Edit</i></a>&nbsp&nbsp
            <a href="#" onclick="hapusProject(<?php echo $id; ?>,<?php echo $id_project; ?>)"><i class="fa fa-trash"> Delete</i></a>

                  </td>

                </tr>

                <!-- Modal View Mahasiswa-->
                <div class="modal fade" id="myModal<?php echo $id; ?>" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Issue</h4>
                      </div>
                      <div class="modal-body">
                        
                       <?php echo form_open_multipart('ProjectCharter/edit_activity_vendor');?>
                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                      <input type="hidden" name="edit_file_name" id="edit_file_name" value="<?php echo $file?>">
                      <input type="hidden" name="hdeditfileid" id="hdeditfileid" value="file_initiating<?php echo $id; ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo $id?>">
                      <div class="form-group">
                            <label  class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo $name?>">
                          </div>
                      <div class="form-group">
                            <label  class="control-label">Description</label>
                            <input type="text" class="form-control" name="description" id="description" value="<?php echo $description?>">
                          </div>
                          <div  class="form-group">
                            <label  class="control-label">Product Quality</label>
                               <select class="form-control" name="product_quality" id="product_quality">
                              <option value="">Select Quality</option>
                              <option <?php if ($product_quality=="Low") {echo "selected";}?> value="Low">Low</option>
                              <option <?php if ($product_quality=="Mid") {echo "selected";}?> value="Mid">Mid</option>
                              <option <?php if ($product_quality=="High") {echo "selected";}?> value="High">High</option>
                            </select>
                          </div>
                          <div  class="form-group">
                            <label  class="control-label">On Time Delivery</label>
                               <select class="form-control" name="ontime_delivery" id="ontime_delivery">
                              <option <?php if ($ontime_delivery=="Yes") {echo "selected";}?> value="Yes">Yes</option>
                              <option <?php if ($ontime_delivery=="No") {echo "selected";}?> value="No">No</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label   class="control-label">Development Cost</label>
                            <input type="text" class="form-control" name="cost" id="cost" value="<?php echo $cost?>">
                          </div>
                          <div  class="form-group">
                            <label  class="control-label">Development Time</label>
                            <input type="text" class="form-control" name="time" id="time" value="<?php echo $time?>">
                          </div>
                          <div  class="form-group">
                            <label  class="control-label">Cost/Unit</label>
                            <input type="text" class="form-control" name="cost_unit" id="cost_unit" value="<?php echo $cost_unit?>">
                          </div>
                          <div  class="form-group">
                            <label  class="control-label">Efficiency</label>
                            <input type="text" class="form-control" name="efficiency" id="efficiency" value="<?php echo $efficiency?>">
                          </div>
                          <div  class="form-group">
                            <label for="start-date" class="control-label">Order Date</label>
                            <input type='date' class="form-control" name="date" id="date" value="<?php echo $order_date?>"> 
                          </div>
                          <div  class="form-group">
                            <label  class="control-label">Document</label><br>
                            <input type="file" class="btn btn-default" id="file_initiating<?php echo $id; ?>" name="file_initiating<?php echo $id; ?>" value="<?php echo $file?>">
                          </div>
                          
                          
                          
                        <div class="modal-footer">
                          <button class="btn btn-primary" onclick="CheckFormEdit(); return false">Update</button>
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

<script src="<?php echo base_url('assets/calendar/fullcalendar.min.js');?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url('assets/build/js/custom.min.js');?>"></script>

<?php   function UR_exists($url){
   $headers=get_headers($url);
   return stripos($headers[0],"200 OK")?true:false;
}?>
<script type="text/javascript">


  $(function () {
    $('#datetimepicker1').datetimepicker();
  });
    function hapusProject(id,id_project){
    var r = confirm("Are you sure want to delete the data ?");
    if (r == true) {
        //alert("<?php echo site_url('projectcharter/hapus_activity_vendor?id='); ?>"+id);
        window.location ="<?php echo site_url('projectcharter/hapus_activity_vendor/'); ?>"+id+"/"+id_project;
      } else {
      }
    }
    function viewProject(id,id_project){
        window.location ="<?php echo site_url('projectcharter/view_activity_stake_holder_owner/'); ?>"+id+"/"+id_project;
    }
    
  </script>
</body>
</html>