<footer class="footer hed_logo">
      <div class="container">
          <div class="col-lg-12 footer_app">
              <ul>
                  <span>Download our free apps:</span>
                    <li><a href="#"><i class="fa fa-apple"></i>iPhone app</a></li>
                    <li><a href="#"><i class="fa fa-windows"></i>Windows Phone app</a></li>
                    <li><a href="#"><i class="fa fa-android"></i>Android app</a></li>
                </ul>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
              <ul class="list-inline">
                  <li><a href="#">About</a></li>
                    <li><a href="#">Mobile</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Quick links</a></li>
                    <li><a href="#">Cities</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
                <span class="copy">&copy; <script>document.write(new Date().getFullYear())</script> Swasthya Bandhav</span>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
              <ul class="social list-inline">
                    <li><a href="#"><img alt="" src="images/facebook.png"></a></li>
                    <li><a href="#"><img alt="" src="images/g+.png"></a></li>
                    <li><a href="#"><img alt="" src="images/twitter.png"></a></li>
                    <li><a href="#"><img alt="" src="images/in.png"></a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>
<!-- jQuery 2.2.3 -->
{!!Html::script("storage/admin/js/jquery-2.2.3.min.js")!!}
<!-- Bootstrap 3.3.6 -->
{!!Html::script("storage/admin/js/bootstrap.min.js")!!}
<!-- Select2 -->
{!!Html::script("storage/admin/js/select2.full.min.js")!!}
<!-- DataTables -->
{!!Html::script("storage/admin/js/jquery.dataTables.min.js")!!}
{!!Html::script("storage/admin/js/dataTables.bootstrap.min.js")!!}
<!-- SlimScroll 1.3.0 -->
{!!Html::script("storage/admin/js/jquery.slimscroll.min.js")!!}
<!-- FastClick -->
{!!Html::script("storage/admin/js/fastclick.js")!!}
<!-- AdminLTE App -->
{!!Html::script("storage/admin/js/app.min.js")!!}
<!-- Sparkline -->
{!!Html::script("storage/admin/js/jquery.sparkline.min.js")!!}
<!-- jvectormap -->
{!!Html::script("storage/admin/js/jquery-jvectormap-1.2.2.min.js")!!}
{!!Html::script("storage/admin/js/jquery-jvectormap-world-mill-en.js")!!}

<!-- ChartJS 1.0.1 -->
{!!Html::script("storage/admin/js/Chart.min.js")!!}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--- {!!Html::script("js/dashboard2.js")!!}-->
<!--- AdminLTE for demo purposes -->
{!!Html::script("storage/admin/js/demo.js")!!}

<<<<<<< HEAD:resources/views/element/footer.blade.php
@if(Request::segment(2) === 'package-types' && (Request::segment(3) === 'create' || Request::segment(3) === 'edit'))
  {!!Html::script("storage/admin/ckeditor/ckeditor.js")!!}
  <script type="text/javascript">
      CKEDITOR.replace( 'ckeditor' );
  </script>
@endif
=======
{!!Html::script("vendor/unisharp/laravel-ckeditor/ckeditor.js")!!}


>>>>>>> 2f9747d8f3d2df9d7a8b4f9949e66d766778f427:resources/views/admin/element/footer.blade.php
<script>
/*ckeditor implementation initialization*/ 
CKEDITOR.replace('textarea_id'); //id here

$(function () {
    //Initialize Select2 Elements
    $(".js-example-basic-multiple").select2();
    //$("#example1").DataTable();
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css" >
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(e){
    var permissionArr = new Array();
    $("#btn_check_all").click(function(e){

      $(".chk-route-list").prop('checked',true);
    });
    $("#btn_uncheck_all").click(function(e){
      $(".chk-route-list").prop('checked',false);
    });
    
    $(".exact-submit-button").click(function(e){
      if(!$("#role").val()) {
        jconfirm({
            title: 'Alert!',
            content: "Please select role"
        });
      }
      else if(!$('.chk-route-list').is(':checked')) {
        jconfirm({
            title: 'Alert!',
            content: "Please select role"
        });
      }
      else {
        $('.chk-route-list').each(function(){
          if($(this).is(":checked")) {
            permissionArr.push({permission_id:$(this).attr('id'),permission_name:$(this).val()});
          }
        });

        $.ajax({
          type:"POST",
          url:"/admin/store_permission/",
          data: {role:$("#role").val(),permissionArr:permissionArr,_token:"{{csrf_token()}}"},
          success:function(response) {
            if(response.status == 1) {
              jconfirm({
                  title: 'Confirm!',
                  content: "Permission addedd successfully",
                  buttons: {
                    OK: function () {
                      window.location.reload();
                     }
                  }
              });
            }
            else {
              jconfirm({
                  title: 'Alert!',
                  content: "Please try again"
              });
            }
          }
        });
      }

    });

    $("#role").change(function(e){
      var value = $(this).val();
      $(".chk-route-list").prop('checked',false);
      if(value) {
        $.ajax({
          type:"POST",
          url: "/admin/get_permission/",
          data: {role_id:value,_token:"{{csrf_token()}}"},
          success:function(response) {
            if(response.status == 1) {
              for(var i=0;i<response.data.length;i++) {
                $("#"+response.data[i].permission_id).prop('checked',true);
              }
            }
            else {
              $(".chk-route-list").prop('checked',false);
            }
          }
        });
      }
    });

    /*add treatment from hospital*/
    var treatmentArr = new Array();
    $("#hptl_tmt_add_btn").click(function(e){
      if(!$('.chk-route-list').is(':checked')) {
        jconfirm({
            title: 'Alert!',
            content: "Please select treatment"
        });
      }
      else {
        $('.chk-route-list').each(function(){
          if($(this).is(":checked")) {
            treatmentArr.push({treatment_id:$(this).val()});
          }
        });

        $.ajax({ 
          type:"POST",
          url:"/admin/store_treatment/",
          data: {hospital_id:$('#hospital_id').val(),treatmentArr:treatmentArr,_token:"{{csrf_token()}}"},
          success:function(response) { //alert(response);
            if(response.status == 1) {
              jconfirm({
                  title: 'Confirm!',
                  content: "treatment addedd successfully",
                  buttons: {
                    OK: function () {
                      window.location.reload();
                     }
                  }
              });
            }
            else {
              jconfirm({
                  title: 'Alert!',
                  content: "Please try again"
              });
            }
          }
        });
      }

    });

  });
</script>

<!--State/city/dropdown start-->
<script type="text/javascript">
    $('#country_id').change(function(){
    var countryID = $(this).val();
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('/admin/api/get-state-list')}}?country_id="+countryID,
           success:function(res){
            if(res){
                $("#state_id").empty();
                $("#state_id").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#state_id").append('<option value="'+key+'">'+value+'</option>');
                });

            }else{
               $("#state_id").empty();
            }
           }
        });
    }else{
        $("#state_id").empty();
        $("#city_id").empty();
    }
   });
    $('#state_id').on('change',function(){
    var stateID = $(this).val();
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('/admin/api/get-city-list')}}?state_id="+stateID,
           success:function(res){
            if(res){
                $("#city_id").empty();
                $.each(res,function(key,value){
                    $("#city_id").append('<option value="'+key+'">'+value+'</option>');
                });

            }else{
               $("#city_id").empty();
            }
           }
        });
    }else{
        $("#city_id").empty();
    }

   });
</script>
<!--State/city/dropdown end-->

<!-- page script -->

<!-- modal  -->
<div class="modal fade" id="inviteFriend" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Invite Friends</h4>
        </div>
        <div id="invite_friends_msg"></div>
        {!! Form::open(['url'=>URL::to('invite_friends'),'role'=>'form','id'=>'invite_friends_form'])!!}
        <input type="hidden" name="affilate_id" id="affilate_id" value="{!!Session::get('user_id')!!}">
        <div class="modal-body">
            <div class="form-group">
              <label>Email</label>
              {!!Form::email('email', '',['class'=>'form-control','placeholder'=>'Enter email address','required'=>'required','id'=>'email'])!!}
            </div>
        </div>
        <div class="modal-body">

            <div class="form-group">
              <label>Text</label>
              {!!Form::textarea('subject','invite to friends',['class'=>'form-control','required'=>'required','id'=>'subject'])!!}
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           {!!Form::submit('Submit',["class"=>"btn btn-primary",'id'=>'invite_friends_button'])!!}
        </div>
      </div>

    </div>
  </div>
<!-- end modal  -->


<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Swasthya Bandhav</a>.</strong> All rights
    reserved.
</footer>


<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  </div>
<!-- ./wrapper -->
