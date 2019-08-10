<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Sistem Informasi Manajemen</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url('assets/vendors/nprogress/nprogress.css');?>" rel="stylesheet">
  <!-- FullCalendar -->
  <link href="<?php echo base_url('assets/vendors/fullcalendar/dist/fullcalendar.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendors/fullcalendar/dist/fullcalendar.print.css');?>" rel="stylesheet" media="print">
  <!-- bootstrap-datetimepicker -->
  <link href="<?php echo base_url('assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css');?>" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo base_url('assets/vendors/iCheck/skins/flat/green.css');?>" rel="stylesheet">

  <!-- Datatables -->
  <link href="<?php echo base_url('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css');?>" rel="stylesheet">

  <link href="<?php echo base_url('assets/vendors/cropper/dist/cropper.min.css');?>" rel="stylesheet">

  
  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('assets/build/css/custom.min.css');?>" rel="stylesheet"></head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">


            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
               <img src="<?php echo base_url('assets/production/images/img.jpg');?>" alt="..." class="img-circle profile_img">
             </div>
             <div class="profile_info">
              <span>Welcome,</span>
              <h2>John Doe</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Menu</h3>
                <ul class="nav side-menu">
                <li><a href="<?php echo site_url('welcome/home')?>"><i class="fa fa-home"></i> Home </a>
                </li>

                 <li><a href="<?php echo site_url('progress/progress_view')?>"><i class="fa fa-spinner"></i>Progress</a></li>
                <li><a><i class="fa fa-edit"></i> Initiating <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">

                    <li><a href="<?php echo site_url('projectcharter/project_charter')?>">Daftar Project</a></li>
                    <li><a href="<?php echo site_url('monitoringcontrolling/monitoring_controlling')?>">Monitoring & Controlling</a></li>
                    

                  </ul>
                </li>

                <li><a><i class="fa fa-edit"></i> Planning Scope <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo site_url('definescope/define_scope')?>">Define Scope</a></li>
                    <li><a href="<?php echo site_url('wbs/wbs_view')?>">WBS</a></li>
                    <li><a href="<?php echo site_url('Resources/resources_view')?>">Resources</a></li>
                    <li><a href="">Planning Time</a></li>
                    <li><a href="<?php echo site_url('planningcost/planning_cost')?>">Planning Cost</a></li>

                  </a></li>


                </ul>
              </li>


                   
            </ul>
        </div>
        

      </div>
      <!-- /sidebar menu -->

      
    </div>
  </div>

  <!-- top navigation -->
  <div class="top_nav">
    <div class="nav_menu">
      <nav>
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="images/img.jpg" alt="">John Doe
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
             
              <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
            </ul>
          </li>

          
        </ul>
      </nav>
    </div>
  </div>
  <!-- /top navigation -->

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Monitoring & Controlling</h3>
        </div>


      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Scope & Time</h2>
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


            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Activity</th>
                  <th>Time</th>
                  <th>Remark</th>
                  
                </tr>
              </thead>


              <tbody>


                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>


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
<!-- FullCalendar -->
<script src="<?php echo base_url('assets/vendors/moment/min/moment.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/fullcalendar/dist/fullcalendar.min.js');?>"></script>
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