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
            <div class="page-title">
             

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Calendar Events</h2>
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

                      <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $id_proj?>">
                    <div id='calendar'></div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

       
      </div>
    </div>

    <!-- /calendar modal -->
        
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

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/build/js/custom.min.js');?>"></script>
        <script type="text/javascript">

    var bla = $('#id_proj').val();
 $('#calendar').fullCalendar({
     eventSources: [
         {
             events: function(start, end, timezone, callback) {
                 $.ajax({
                 url: '<?php echo site_url() ?>/ProjectCharter/getEvents/'+bla,
                 dataType: 'json',
                 success: function(msg) {
                     var events = msg.events;
                     callback(events);

                 }
                 });
             }
         },
     ],eventRender: function (event, element, view) {
    element.find('.fc-title').append('<div class="hr-line-solid-no-margin"></div><span style="font-size: 10px"><marquee>'+event.description+'</marquee></span></div>');
}

 });
    </script>
  </body>
</html>