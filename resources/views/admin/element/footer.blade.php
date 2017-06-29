<!-- <footer class="footer hed_logo">
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
    </footer> -->
</div>

<!-- Bootstrap 3.3.6 -->
{!! Html::script("storage/admin/js/bootstrap.min.js") !!}
<!-- Select2 -->
{!! Html::script("storage/admin/js/select2.full.min.js") !!}
<!-- DataTables -->
{!! Html::script("storage/admin/js/jquery.dataTables.min.js") !!}
{!! Html::script("storage/admin/js/dataTables.bootstrap.min.js") !!}
<!-- SlimScroll 1.3.0 -->
{!! Html::script("storage/admin/js/jquery.slimscroll.min.js") !!}
<!-- FastClick -->
{!! Html::script("storage/admin/js/fastclick.js") !!}
<!-- AdminLTE App -->
{!! Html::script("storage/admin/js/app.min.js") !!}
<!-- Sparkline -->
{!! Html::script("storage/admin/js/jquery.sparkline.min.js") !!}
<!-- jvectormap -->
{!! Html::script("storage/admin/js/jquery-jvectormap-1.2.2.min.js") !!}
{!! Html::script("storage/admin/js/jquery-jvectormap-world-mill-en.js") !!}

<!-- ChartJS 1.0.1 -->
{!! Html::script("storage/admin/js/Chart.min.js") !!}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--- {!!Html::script("js/dashboard2.js")!!}-->
<!--- AdminLTE for demo purposes -->
{!! Html::script("storage/admin/js/demo.js") !!}
{!! Html::style('storage/admin/css/sweetalert.css') !!}
{!! Html::script("storage/admin/js/sweetalert-dev.js")!!}
{!! Html::style('storage/admin/css/bootstrap-toggle.min.css') !!}
{!! Html::script("storage/admin/js/bootstrap-toggle.min.js")!!}

@if((Request::segment(2) === 'package-types' && (Request::segment(3) === 'create' || Request::segment(3) === 'edit'))||(Request::segment(2) === 'successstories' && (Request::segment(3) === 'create' || Request::segment(3) === 'edit')) ||(Request::segment(2) === 'cmspagedetail' && (Request::segment(3) === 'create' || Request::segment(3) === 'edit')) ||(Request::segment(2) === 'doctors' && (Request::segment(3) === 'create' || Request::segment(3) === 'edit')))
  {!! Html::script("vendor/unisharp/laravel-ckeditor/ckeditor.js")!!}
  <script type="text/javascript">
      CKEDITOR.replace('textarea_id');
  </script>
@endif
<!---For Address autocomplete start in doctor page-->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB4eCXS81oEuOHH9BJ_vOVvqQL1qY90kIA&libraries=places"></script>
{!!Html::script("storage/admin/js/jquery.geocomplete.min.js")!!}
<!---For Address autocomplete end-->
<script>
/*ckeditor implementation initialization*/
 //id here
function deldata(url){
  swal({
    title: "Are you sure?",
    text: "You want to delete this record!",
    type: "error",
    showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: true,
        closeOnCancel: true
      }, function(isConfirm){
        if (isConfirm){
          window.location.href= url;
        }       
      });
   /* function(){
    swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });*/
}
  function changeStatus(url,id){
      var id = id;                               
      var status = $('#tog'+id).val();                              
      if(status == 1){
        var value= 0;
        $('#tog'+id).val('0');
      } else {
        var value= 1; 
        $('#tog'+id).val('1');
      }
      var datastring="id="+id+"&status="+value+"&_token="+'{{csrf_token()}}';
      $.ajax({
        type:"POST",
        url:url,
        data: datastring,
          success:function(response) {
            var result = $.parseJSON(response);            
                if(result.status == 1) {
                    $("#result77").css("display", "block");
                    $("#result77").removeClass("alert-danger");
                    $("#result77").addClass("alert-success");
                    $("#result77").html(result.msg);
                    setTimeout(function() {
                      $('#result77').fadeOut('fast');
                    }, 2000);
                } else{
                    $("#result77").css("display", "block");
                    $("#result77").removeClass("alert-success");
                    $("#result77").addClass("alert-danger");
                    $("#result77").html(result.msg);
                    setTimeout(function() {
                      $('#result77').fadeOut('fast');
                    }, 2000);
                }            
          }
      });
  }

/* This showResult function is used as the callback function*/

function showResult(result) {
    document.getElementById('hosp_latitude').value = result.geometry.location.lat();
    document.getElementById('hosp_longitude').value = result.geometry.location.lng();
    //alert(result.geometry.location.lat());
    //alert(result.geometry.location.lng());
}

function getLatitudeLongitude(callback, address) {
    // If adress is not supplied, use default value 'Ferrol, Galicia, Spain'
    address = address || 'Ferrol, Galicia, Spain';
    // Initialize the Geocoder
    geocoder = new google.maps.Geocoder();
    if (geocoder) {
        geocoder.geocode({
            'address': address
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                callback(results[0]);
            }
        });
    }
}

var cityidd = document.getElementById('city_id');
if(cityidd){
cityidd.addEventListener("change", function () {  //alert("hi");
    var selectedAddText = document.getElementById("street_address").value;

    var selcityadd = document.getElementById("city_id");
    var selectedCityText = selcityadd.options[selcityadd.selectedIndex].text;

    var selstateadd = document.getElementById("state_id");
    var selectedStreetText = selstateadd.options[selstateadd.selectedIndex].text;

    var selcounadd = document.getElementById("country_id");
    var selectedCountryText = selcounadd.options[selcounadd.selectedIndex].text;

    var address = selectedAddText+' '+selectedCityText+' '+selectedStreetText+' '+selectedCountryText;
    //alert(address);
    getLatitudeLongitude(showResult,address)
});
}





$(function () {  
    //Initialize Select2 Elements
    $(".js-example-basic-multiple").select2();
    //$("#example1").DataTable();
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      /*"ordering": true,*/
      "info": true,
      "autoWidth": false
    });


     //<!---For Address autocomplete start in doctor page-->
     $(".srch_address")
     .geocomplete()
     .bind("geocode:result", function (event, result) {  
       //console.log(result); 
       //alert(result.address_components[0].long_name);          
        $("#hosp_latitude").val(result.geometry.location.lat());
        $("#hosp_longitude").val(result.geometry.location.lng());
        $("#street_address").val(result.address_components[0].long_name+','+result.address_components[1].long_name);
        $("#zipcode").val(result.address_components[6].long_name);

         var countryName=result.address_components[5].long_name;
         var stateName=result.address_components[4].long_name;
         var cityName=result.address_components[2].long_name;

         $.ajax({
             async: true,   // this will solve the problem
             type:"POST",
             url:"/admin/api/get-country-id",
             data: {country_name:countryName,_token:"{{csrf_token()}}"},
             beforeSend: function () {
                        $(".modalloader").show();
              },
              complete: function () {
                  $(".modalloader").hide();
              },
             success:function(res){ //alert(res);
              if(res){
                 $("#country_id").val(res);
              }else{
                   $("#country_id").val('');
              }
             }
          });

         $.ajax({
             async: true,   // this will solve the problem
             type:"POST",
             url:"/admin/api/get-state-id",
             data: {state_name:stateName,_token:"{{csrf_token()}}"},
             beforeSend: function () {
                        $(".modalloader").show();
              },
              complete: function () {
                  $(".modalloader").hide();
              },
             success:function(res){ //alert(res);
              if(res){
                 $("#state_id").val(res);
              }else{
                  $("#state_id").val('');
              }
             }
          });
         
         $.ajax({
             async: true,   // this will solve the problem
             type:"POST",
             url:"/admin/api/get-city-id",
             data: {city_name:cityName,_token:"{{csrf_token()}}"},
             beforeSend: function () {
                        $(".modalloader").show();
              },
              complete: function () {
                  $(".modalloader").hide();
              },
             success:function(res){ //alert(res);
              if(res){
                 $("#city_id").val(res);
              }else{
                   $("#city_id").val('');
              }
             }
          });

        
      });
     //<!---For Address autocomplete start in doctor page-->

  });
</script>

{!! Html::style('storage/admin/css/jquery-confirm.min.css') !!}
{!! Html::script("storage/admin/js/jquery-confirm.min.js") !!}
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
          url:"/admin/permission/store_permission",
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

    $("#role").change(function(e){ //alert();
      var value = $(this).val();
      $(".chk-route-list").prop('checked',false);
      if(value) {
        $.ajax({
          type:"GET",
          url: "/admin/permission/get_permission",
          data: {role_id:value,_token:"{{csrf_token()}}"},
          success:function(response) { //alert(response);
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
          url:"/admin/store_treatment",
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

<!---hospital wise medical test start-->
  <script>
    function showproducts(val){
      $("#product_data_"+val).toggle();
      $('#select_allcatproduct'+val).on('click',function(){
        if($('.checkboxcatproduct'+val+':checked').length == $('.checkboxcatproduct'+val).length){
          $('#select_allcatproduct'+val).show();
        }
        if(this.checked){
          $('.checkboxcatproduct'+val).each(function(){
            this.checked = true;
          });
        }else{
          $('.checkboxcatproduct'+val).each(function(){
            this.checked = false;
          });
        }
      });

      $('.checkboxcatproduct'+val).on('click',function(){
        if($('.checkboxcatproduct'+val+':checked').length == $('.checkboxcatproduct'+val).length){
          $('#select_allcatproduct'+val).prop('checked',true);
        }else{
          $('#select_allcatproduct'+val).prop('checked',false);
        }
      });
    }
    function addnewmedicaltest(val){
      $("#hosmedtest").modal('show');
      $("#medicaltest_cat_id").val(val);
    }

    function submitmedicaltest(){
      var medicaltest_cat_id = $('#medicaltest_cat_id').val()
      var test_name = $("#test_name").val();
        if(test_name ==''){
          document.getElementById('test_name').style.border = '1px solid red !important';
          $("#test_name_error").css("display", "block");
          document.getElementById("test_name_error").innerHTML = "Please enter test name";
          document.getElementById('test_name').focus();
          return false
        }else{
          $.ajax({
            type:"POST",
            url:"/admin/hospitals/ajaxstoremedicaltest",
            data: {medicaltestcategories_id:$('#medicaltest_cat_id').val(),hospital_id:$('#hospital_id').val(),test_name:$('#test_name').val(),_token:"{{csrf_token()}}"},
              success:function(response) {
                var result = $.parseJSON(response);
                if(result.status == 1) {
                    $("#result").css("display", "block");
                    $("#result").removeClass("alert-danger");
                    $("#result").addClass("alert-success");
                    $("#result").html(result.msg);
                    setTimeout(function() {
                      $('#result').fadeOut('fast');
                      $("#hosmedtest").modal('hide');
                      var str ='<li><table width="100%"><tr><td width="90%"><input name="medicaltestArr[]" class="checkboxcatproduct'+ result.lastinsert_id+'" id="'+result.lastinsert_id+'" type="checkbox" value="'+result.lastinsert_id+'">'+ result.test_name+'</td><td style="padding:5px; 0"><input type="text" name="test_price'+result.lastinsert_id+'" placeholder="price" value=""></td></tr></table></li>';
                    // $("#product_data_"+medicaltest_cat_id).append(str);
                    $(".last-child"+medicaltest_cat_id).before(str);
                    $("#test_name").val('');
                  }, 200);
                } else{
                    $("#result").css("display", "block");
                    $("#result").removeClass("alert-success");
                    $("#result").addClass("alert-danger");
                    $("#result").html(result.msg);
                    setTimeout(function() {
                      $('#result').fadeOut('fast');
                    }, 2000);
                }
             }
          });
        }
    }

     function submitcentremedicaltest(){
      var medicaltest_cat_id = $('#medicaltest_cat_id').val()
      var test_name = $("#test_name").val();
        if(test_name ==''){
          document.getElementById('test_name').style.border = '1px solid red !important';
          $("#test_name_error").css("display", "block");
          document.getElementById("test_name_error").innerHTML = "Please enter test name";
          document.getElementById('test_name').focus();
          return false
        }else{
          $.ajax({
            type:"POST",
            url:"/admin/testcentre/ajaxstoremedicaltest",
            data: {medicaltestcategories_id:$('#medicaltest_cat_id').val(),testcentre_id:$('#testcentre_id').val(),test_name:$('#test_name').val(),_token:"{{csrf_token()}}"},
              success:function(response) {
                var result = $.parseJSON(response);
                if(result.status == 1) {
                    $("#result").css("display", "block");
                    $("#result").removeClass("alert-danger");
                    $("#result").addClass("alert-success");
                    $("#result").html(result.msg);
                    setTimeout(function() {
                      $('#result').fadeOut('fast');
                      $("#hosmedtest").modal('hide');
                      var str ='<li><table width="100%"><tr><td width="90%"><input name="medicaltestArr[]" class="checkboxcatproduct'+ result.lastinsert_id+'" id="'+result.lastinsert_id+'" type="checkbox" value="'+result.lastinsert_id+'">'+ result.test_name+'</td><td style="padding:5px; 0"><input type="text" name="test_price'+result.lastinsert_id+'" placeholder="price" value=""></td></tr></table></li>';
                    // $("#product_data_"+medicaltest_cat_id).append(str);
                    $(".last-child"+medicaltest_cat_id).before(str);
                    $("#test_name").val('');
                  }, 200);
                } else{
                    $("#result").css("display", "block");
                    $("#result").removeClass("alert-success");
                    $("#result").addClass("alert-danger");
                    $("#result").html(result.msg);
                    setTimeout(function() {
                      $('#result').fadeOut('fast');
                    }, 2000);
                }
             }
          });
        }
    }
    function resetmedicaltest(){
      $("#test_name_error").hide();
      $("#test_name").val('');
    }

    $(document).ready(function(){
      setTimeout(function() {
        $('#result7').fadeOut('fast');
        $('#result8').fadeOut('fast');
      }, 2000);
    });
  </script>
<!---hospital wise medical test end-->



<!-- hospital wise treatment start -->

<script>
    function showprocedure(val){
      $("#procedure_data_"+val).toggle();
      $('#select_allprocedure'+val).on('click',function(){
        if($('.checkboxprocedure'+val+':checked').length == $('.checkboxprocedure'+val).length){
          $('#select_allprocedure'+val).show();
        }
        if(this.checked){
          $('.checkboxprocedure'+val).each(function(){
            this.checked = true;
          });
        }else{
          $('.checkboxprocedure'+val).each(function(){
            this.checked = false;
          });
        }
      });

      $('.checkboxprocedure'+val).on('click',function(){
        if($('.checkboxprocedure'+val+':checked').length == $('.checkboxprocedure'+val).length){
          $('#select_allprocedure'+val).prop('checked',true);
        }else{
          $('#select_allprocedure'+val).prop('checked',false);
        }
      });
    }
    function addnewproceduretreatment(val){
      $("#proceduretreatment").modal('show');
      $("#procedure_id").val(val);
    }

    function submitproceduretreatment(){
      var procedure_id = $('#procedure_id').val()
      var name = $("#name").val();
        if(name ==''){
          document.getElementById('name').style.border = '1px solid red !important';
          $("#treatment_name_error").css("display", "block");
          document.getElementById("treatment_name_error").innerHTML = "Please enter treatment name";
          document.getElementById('name').focus();
          return false
        }else{
          $.ajax({
            type:"POST",
            url:"/admin/hospitals/ajaxstoretreatment",
            data: {procedure_id:$('#procedure_id').val(),hospital_id:$('#hospital_id').val(),name:$('#name').val(),_token:"{{csrf_token()}}"},
              success:function(response) {
                var result = $.parseJSON(response);
                if(result.status == 1) {
                    $("#result").css("display", "block");
                    $("#result").removeClass("alert-danger");
                    $("#result").addClass("alert-success");
                    $("#result").html(result.msg);
                    setTimeout(function() {
                      $('#result').fadeOut('fast');
                      $("#proceduretreatment").modal('hide');
                      var str ='<li><input name="proceduretreatmentArr[]" class="checkboxprocedure'+ result.lastinsert_id+'" id="'+result.lastinsert_id+'" type="checkbox" value="'+result.lastinsert_id+'">'+ result.name+'</li>';
                    // $("#product_data_"+medicaltest_cat_id).append(str);
                    $(".last-child"+procedure_id).before(str);
                    $("#name").val('');
                    $("#treatment_name_error").hide();
                  }, 200);
                } else{
                    $("#result").css("display", "block");
                    $("#result").removeClass("alert-success");
                    $("#result").addClass("alert-danger");
                    $("#result").html(result.msg);
                    setTimeout(function() {
                      $("#treatment_name_error").hide();
                      $('#result').fadeOut('fast');
                    }, 2000);
                }
             }
          });
        }
    }
    function resettreatment(){
      $("#treatment_name_error").hide();
      $("#name").val('');
    }


/*function last_seen_pin(address)
{
  
  dataString = "address=" + address;  
  $.ajax
  ({
    type: "POST",
    url: "/admin/hospitals/getLnt",
    data: {address:address,_token:"{{csrf_token()}}"},
    cache: false,
    success: function(html)
    {      
      var a = JSON.parse(html);
      if(a!='ZERO_RESULTS') {   
      var lat = a.lat;     
      var lng = a.lng;          
      $('#hosp_latitude').val(lat);
      $('#hosp_longitude').val(lng);
    }else{
      $('#hosp_latitude').val('');
      $('#hosp_longitude').val('');
    }
    }
  });
}*/
</script>
<!-- hospital wise treatment end -- >

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
              {!! Form::email('email', '',['class'=>'form-control','placeholder'=>'Enter email address','required'=>'required','id'=>'email'])!!}
            </div>
        </div>
        <div class="modal-body">

            <div class="form-group">
              <label>Text</label>
              {!! Form::textarea('subject','invite to friends',['class'=>'form-control','required'=>'required','id'=>'subject'])!!}
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           {!! Form::submit('Submit',["class"=>"btn btn-primary",'id'=>'invite_friends_button']) !!}
        </div>
      </div>

    </div>
  </div>
<!-- end modal  -->

<div class="modal fade" id="hospitalimport_modal" role="dialog">
    <div class="modal-dialog">            
      <form class="form-horizontal" action="" id="imageUploadForm" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="refresh()">&times;</button>
            <h4 style="text-align: center;">Upload Hospital FIle</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-success fade in alert-dismissable" id="resultimage" style="display:none"></div>
            <label class="fileContainer">
              <i class="fa fa-upload" aria-hidden="true"></i>
              <input name="avators" id="avators" type="file" value=""/>  
            </label>
            <br /><br /><span style="color:red; width: 100%; text-align: center; display: block;">Please upload bmp,gif,jpg,jpeg,png extension file</span> 
          </div>
          <div class="modal-footer">
            <input type="hidden" name="_token" value="{{csrf_token()}}">          
            <input class="viewmoreBTN" type="submit" onclick="return uploadimage();" value="Update"><div>&nbsp;</div>
          </div>
        </div>
      </form>
    </div>
  </div>


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
