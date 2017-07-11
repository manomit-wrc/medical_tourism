    
      
    {!! Html::style('storage/frontend/css/jquery-ui.min.css') !!}
    {!!Html::script("storage/frontend/js/jquery-ui.min.js")!!}
    {!!Html::script("storage/frontend/js/bootstrap.min.js")!!}
    {!!Html::script("storage/frontend/js/jquery.jcarousel.min.js")!!}
    {!!Html::script("storage/frontend/js/jcarousel.responsive.js")!!}
    {!!Html::script("storage/frontend/js/owl.carousel.min.js")!!}
    {!!Html::script("storage/frontend/js/custom-file-input.js")!!}
    {!! Html::style('storage/frontend/css/sweetalert.css') !!}
    {!!Html::script("storage/frontend/js/sweetalert-dev.js")!!}

    {!!Html::script("storage/frontend/js/jquery.validate.min.js")!!}
    {!!Html::script("storage/frontend/js/additional-methods.min.js")!!}

    {!! Html::style('storage/frontend/tag/dist/bootstrap-tagsinput.css') !!}
    {!! Html::style('storage/frontend/tag/app.css') !!}
    {!! Html::script("storage/frontend/tag/typeahead.bundle.min.js") !!}
    {!! Html::script("storage/frontend/tag/dist/bootstrap-tagsinput.min.js") !!}

    <!-- {!!Html::script("storage/frontend/js/jquery.do.scroll.js")!!}
    {!!Html::script("storage/frontend/js/script.js")!!} 
    {!!Html::script("storage/frontend/js/jquery.sticky.js")!!}-->

    {!!Html::script("storage/frontend/js/jquery.custom-scrollbar.js")!!}
    @if(Request::segment(1) == 'gallery')
      {!! Html::script("storage/frontend/js/gallery/plugins.js") !!}
      {!! Html::script("storage/frontend/js/gallery/scripts.js") !!}
      {!! Html::script("storage/frontend/js/gallery/scripts-single.js") !!}
    @endif
   
    @if(Request::segment(1) === 'enquirysend')
      {!! Html::script("vendor/unisharp/laravel-ckeditor/ckeditor.js")!!}
      <script type="text/javascript">
          CKEDITOR.replace('textarea_id');
      </script>
    @endif
    <script type="text/javascript">
       $(function () {$('[data-toggle="tooltip"]').tooltip()})
    </script>
    <script type="text/javascript">
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
    }
      function get_select_birthday() {
        var dob_days = "{{$dob_days}}";

        var monthStart = new Date(parseInt($("#dob_year").val()), parseInt($("#dob_month").val()), 1);
        var monthEnd = new Date(parseInt($("#dob_year").val()), parseInt($("#dob_month").val()) + 1, 1);
        var monthLength = (monthEnd - monthStart) / (1000 * 60 * 60 * 24);
        $("#dob_days").find('option').not(':first').remove();
        for(var i=1;i<=monthLength;i++) {
          $("#dob_days").append('<option value="'+i+'">'+i+'</option>');
        }
        $('#dob_days option[value="'+dob_days+'"]').attr('selected', true);
      }
      function signin(){
        $('#foggotPassModel').modal('hide');       
        $("#LoginModal").modal('show');
        $("#forgot_email_id").val('');
        $("#forgot_email_id-error").hide();
      }
      function forgotpassword(){
        $('#LoginModal').modal('hide');       
        $("#foggotPassModel").modal('show');
        $("#login_email_id").val('');
        $("#login_password").val('');
        $("#login_email_id-error").hide();
        $("#login_password-error").hide();
        $(".registration-error").hide(); 
      }
      $(document).ready(function(){
      <!--////////////////////Reply from login section start here/////////////////////////-->
      $("#btnReply").click(function(){ 
        $.ajax({
                  type: "POST",
                  url: "/reply",
                  data: {
                    pat_enq_id: $("#pat_enq_id").val(),
                    message: $("#message").val(),
                    _token: "{{csrf_token()}}"
                  },
                  beforeSend:function() {
                    $("#btnReply").prop('disabled', true);
                  },
                  success:function(response) { //alert(response.status);
                    if(response.status == 1)
                    {
                      $("#msgdisplay").html(response.msg);
                      setTimeout(function(){
                        $("#message").val('');
                        $("#rplysection").hide();
                        
                      },5000);
                      window.location.replace("/my-enquiry-details/"+response.pat_enq_id);
                    }
                    else {

                      $("#msgdisplay").html(response.msg);
                      /*$(".registration").addClass('registration-error');
                      $(".registration").removeClass('registration-success');*/
                      window.location.replace("/my-enquiry-details/"+response.pat_enq_id);
                    }
                  
                    $("#btnReply").prop('disabled', false);

                  },
                  error:function(xhr) {
                    $(".msgdisplay").html("Error occurred. Please try again");
                   /* $(".msgdisplay").addClass('registration-error');
                    $(".msgdisplay").removeClass('registration-success');*/
                    $("#btnReply").prop('disabled', false);
                  }
                });
    });
    
     <!--////////////////////Reply from login section end here/////////////////////////-->




          // Every time a modal is shown, if it has an autofocus element, focus on it.
          $('.modal').on('shown.bs.modal', function() {
            $(this).find('[autofocus]').focus();
          });
          
          get_select_birthday();
          setTimeout(function() {            
            $('#resultdocumentmsg').fadeOut('fast');
          }, 2000);
          $("#dob_year").change(function(e){

            if($(this).val() && $("#dob_month").val() !="") {

              var monthStart = new Date(parseInt($(this).val()), parseInt($("#dob_month").val()), 1);
              var monthEnd = new Date(parseInt($(this).val()), parseInt($("#dob_month").val()) + 1, 1);
              var monthLength = (monthEnd - monthStart) / (1000 * 60 * 60 * 24);
            }
            $("#dob_days").find('option').not(':first').remove();
            for(var i=1;i<=monthLength;i++) {
              $("#dob_days").append('<option value="'+i+'">'+i+'</option>');
            }
          });
          $("#dob_month").change(function(e){
            if($(this).val() && $("#dob_year").val() !="") {
              var monthStart = new Date(parseInt($("#dob_year").val()), parseInt($(this).val()), 1);
              var monthEnd = new Date(parseInt($("#dob_year").val()), parseInt($(this).val()) + 1, 1);
              var monthLength = (monthEnd - monthStart) / (1000 * 60 * 60 * 24);
            }
            $("#dob_days").find('option').not(':first').remove();
            for(var i=1;i<=monthLength;i++) {
              $("#dob_days").append('<option value="'+i+'">'+i+'</option>');
            }
          });
          $("#testimonial-slider").owlCarousel({
              items:1,
              itemsDesktop:[1000,1],
              itemsDesktopSmall:[979,1],
              itemsTablet:[768,1],
              pagination:true,
              //navigation:true,
              //navigationText:["<",">"],
              slideSpeed:1000,
              singleItem:true,
              autoPlay:true
          });

            /*Slider video start*/

           $(".youtubeModalclass").click(function () {
                var youtubeid =$(this).attr('data-id');
                var url='//www.youtube.com/embed/'+youtubeid;
               // alert(url);

                /* Assign empty url value to the iframe src attribute when modal hide, which stop the video playing */
                $("#VideoModal").on('hide.bs.modal', function(){
                   $("#iframeVideo").attr('src', '');
                });

                /* Assign the initially stored url back to the iframe src attribute when modal is displayed again */
                $("#VideoModal").on('show.bs.modal', function(){
                    $("#iframeVideo").attr('src', url);
                });

            });

            /*Slider video end*/

            $("#btnRegistration").click(function(e){
              $("#frmRegistration").submit();
            });
            $(document).ready(function() {
              $('#first_name').keydown(function(event) {
                if (event.keyCode == 13) {            
                  $("#frmRegistration").submit();                   
                }
              });
              $('#last_name').keydown(function(event) {
                if (event.keyCode == 13) {            
                  $("#frmRegistration").submit();                   
                }
              });
              $('#email_id').keydown(function(event) {
                if (event.keyCode == 13) {            
                  $("#frmRegistration").submit();                   
                }
              });
              $('#mobile_no').keydown(function(event) {
                if (event.keyCode == 13) {            
                  $("#frmRegistration").submit();                   
                }
              });
              $('#password').keydown(function(event) {
                if (event.keyCode == 13) {            
                  $("#frmRegistration").submit();                   
                }
              });  
            });
            $("#btnLogin").click(function(e){
              $("#frmLogin").submit();
            });
            $(document).ready(function() {
              $('#login_email_id').keydown(function(event) {
                if (event.keyCode == 13) {            
                  $("#frmLogin").submit();                   
                }
              });
              $('#login_password').keydown(function(event) {
                if (event.keyCode == 13) {            
                  $("#frmLogin").submit();                   
                }
              });  
            });
            $("#btnforgot").click(function(e){
              $("#frmForgot").submit();
            });
            $(document).ready(function() {
              $('#forgot_email_id').keydown(function(event) {
                if (event.keyCode == 13) {            
                  $("#frmForgot").submit();                   
                }
              });               
            });
            $.validator.addMethod("pwcheck", function(value) {
               return /[A-Z]/.test(value) // has a uppercase letter
                  && /[a-z]/.test(value) // has a lowercase letter
                  && /\d/.test(value) // has a digit
                  && /[!@#$%^&*]/.test(value) // has a special character
            },"Must have atleast one uppercase, one lowercase and one number,one special character");
            $("#frmRegistration").validate({
              rules: {
                first_name: {
                  required: true
                },
                last_name: {
                  required: true
                },
                email_id: {
                  required: true,
                  email: true,
                  remote: {
                    url: "/frontend/check_user_exist",
                    type: "GET"
                  }
                },
                mobile_no: {
                  required: true,
                  maxlength: 10,
                  minlength: 10,
                  remote: {
                    url: "/frontend/check_mobile_exist",
                    type: "GET"
                  }
                },
                password: {
                  required: true,
                  maxlength: 32,
                  minlength: 6,
                  pwcheck: true
                }
              },
              messages: {
                first_name: {
                  required: "Enter First Name"
                },
                last_name: {
                  required: "Enter Last Name"
                },
                email_id: {
                  required: "Enter Email ID",
                  email: "Enter Valid Email ID",
                  remote: $.validator.format("{0} is already in use")

                },
                mobile_no: {
                  required: "Enter Mobile No",
                  maxlength: "Mobile no must have 10 digits",
                  minlength: "Mobile no must have 10 digits",
                  remote: $.validator.format("{0} is already in use")
                },
                password: {
                  required: "Please Enter Password",
                  maxlength: "Password can't be more than 32 characters",
                  minlength: "Password can't be less than 6 characters"
                }
              },
              submitHandler:function(form) {
                $.ajax({
                  type: "POST",
                  url: "/patient-registration",
                  data: {
                    first_name: $("#first_name").val(),
                    last_name: $("#last_name").val(),
                    email_id: $("#email_id").val(),
                    mobile_no: $("#mobile_no").val(),
                    password: $("#password").val(),
                    _token: "{{csrf_token()}}"
                  },
                  beforeSend:function() {
                    $("#btnRegistration").prop('disabled', true);
                  },
                  success:function(response) {
                    if(response.status == 1)
                    {
                      $(".registration").html(response.msg);
                      setTimeout(function() {
                        $('.registration').fadeOut('fast');
                        $("#first_name").val('');
                        $("#last_name").val('');
                        $("#email_id").val('');
                        $("#mobile_no").val('');
                        $("#password").val('');
                        
                        $(".registration").addClass('registration-success');
                        $(".registration").removeClass('registration-error');
                        $("#RegModal").modal('hide');
                      }, 5000);
                    }
                    else {

                      $(".registration").html(response.msg);
                      $(".registration").addClass('registration-error');
                      $(".registration").removeClass('registration-success');
                    }
                    $(".registration").show();
                    $("#btnRegistration").prop('disabled', false);

                  },
                  error:function(xhr) {
                    $(".registration").html("Error occurred. Please try again");
                    $(".registration").addClass('registration-error');
                    $(".registration").removeClass('registration-success');
                    $("#btnRegistration").prop('disabled', false);
                  }
                });
              }
            });

            $("#frmLogin").validate({
              rules: {
                login_email_id: {
                  required: true
                },
                login_password: {
                  required: true
                }
              },
              messages: {
                login_email_id: {
                  required: "Please enter email id"
                },
                login_password: {
                  required: "Please enter password"
                }
              },
              submitHandler:function(form) {
                $.ajax({
                  type: "POST",
                  url: "/patient-login",
                  data: {
                    email_id: $("#login_email_id").val(),
                    password: $("#login_password").val(),
                    _token: "{{csrf_token()}}"
                  },
                  beforeSend:function() {
                    $("#btnLogin").prop('disabled', true);
                  },
                  success:function(response) {
                    if(response.status == 1)
                    {
                      $(".login").css("display","none");
                      $(".login").html(""); 
                      window.location.href="/profile";
                    }
                    else {
                      $(".login").show();
                      $(".login").css("display","block"); 
                      $(".login").html("Email ID or Password is invalid");
                      $(".login").addClass('registration-error');
                      $(".login").removeClass('registration-success');
                    }
                    /*$(".login").show();*/
                    $("#btnLogin").prop('disabled', false);

                  },
                  error:function(xhr) {
                    $(".login").html("Error occurred. Please try again");
                    $(".login").addClass('registration-error');
                    $(".login").removeClass('registration-success');
                    $("#btnLogin").prop('disabled', false);
                  }
                });
              }
            });

            $("#frmForgot").validate({
              rules: {
                forgot_email_id: {
                  required: true,
                  email: true
                }
              },
              messages: {
                forgot_email_id: {
                  required: "Please enter email id",
                  email: "Please enter valid email format"
                }
              },
              submitHandler:function(form) {
                $.ajax({
                  type: "POST",
                  url: "/patient-forgotpass",
                  data: {
                    email_id: $("#forgot_email_id").val(),                    
                    _token: "{{csrf_token()}}"
                  },
                  beforeSend:function() {
                    $("#btnforgot").prop('disabled', false);
                  },
                  success:function(response) {
                    var result = $.parseJSON(response);
                    if(result.status == 1) {                     
                      $("#result").css("display", "block");
                      $("#result").removeClass("alert-danger");
                      $("#result").addClass("alert-success");
                      $("#result").html(result.msg);
                      setTimeout(function() {
                        $("#forgot_email_id").val('') 
                        $('#result').fadeOut('fast');
                      }, 2000);
                    }else{
                      $("#result").css("display", "block");
                      $("#result").removeClass("alert-success");
                      $("#result").addClass("alert-danger");
                      $("#result").html(result.msg);
                      setTimeout(function() { 
                        $("#forgot_email_id").val('');                    
                        $('#result').fadeOut('fast');
                      }, 2000);
                    }

                  }
                });
              }
            });


            $("#country_id").change(function(e){
              var value = $(this).val();
              if(value) {
                $.ajax({
                  type:"POST",
                  url:"/get_state_list",
                  data: {country_id:value, _token:"{{csrf_token()}}"},
                  success:function(response) {
                    $('#state_id').find('option').not(':first').remove();
                    for (var key in response.state_list) {
                      $("#state_id").append('<option value="'+key+'">'+response.state_list[key]+'</option>');
                    }
                  },
                  error:function(xhr) {

                  }
                });
              }
              else {
                $('#state_id').find('option').not(':first').remove();
              }
            });

            $("#state_id").change(function(e){
              var value = $(this).val();
              if(value) {
                $.ajax({
                  type:"POST",
                  url:"/get_city_list",
                  data: {state_id:value, _token:"{{csrf_token()}}"},
                  success:function(response) {
                    $('#city_id').find('option').not(':first').remove();
                    for (var key in response.city_list) {
                      $("#city_id").append('<option value="'+key+'">'+response.city_list[key]+'</option>');
                    }
                  },
                  error:function(xhr) {

                  }
                });
              }
              else {
                $('#city_id').find('option').not(':first').remove();
              }
            });

            $(".plus-button").click(function(e){
              var val = $("#plus_count").val();
              var value = parseInt(val) + 1;
              $("#plus_count").val(value);
              $(".upload-field").append('<div class="col-sm-11"><label class="on768"><div class="upload_profile1"><input type="file" multiple="" name="upload_documents[]" id="file-'+value+'" class="inputfile on768"  /><label for="file-'+value+'" style="padding:12px;"><i class="fa fa-cloud-upload" aria-hidden="true"></i> <span>Choose a file&hellip;</span></label></div></label></div><div class="col-sm-1"><button type="button" class="plusbtn cross-button" style="margin-top:0;">x</button></div>');
            });
      });

      $(document).on('click','.cross-button',function(e){
        console.log($(this).find('.col-sm-11'));
        $(this).find('.col-sm-11').remove();
      });
    </script>
     <!--State/city/dropdown start-->
<script type="text/javascript">
    $('#country_id').change(function(){ 
    var countryID = $(this).val();
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('/api/get-state-list')}}?country_id="+countryID,
           success:function(res){ //alert(res);
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
           url:"{{url('/api/get-city-list')}}?state_id="+stateID,
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
    <script type="text/javascript">
      function BindControls() {
        var Countries = ['ARGENTINA', 
            'AUSTRALIA', 
            'BRAZIL', 
            'BELARUS', 
            'BHUTAN',
            'CHILE', 
            'CAMBODIA', 
            'CANADA', 
            'CHILE', 
            'DENMARK', 
            'DOMINICA'];

        $('#txt_search').autocomplete({
            minLength: 3,
            source: function(request, response) {
              if(request.term !=''){
                $.ajax({
                    url: "/search-place",
                    dataType: "json",
                    data: {
                        term : request.term
                    },
                    success: function(data) { //alert(data);
                        response(data);
                       
                    }
                });
              }
        },
            scroll: true,
            select: function(e, ui) {
              
              $(this).val(ui.item.value);
              e.preventDefault();
          }
        }).focus(function() {
            $(this).autocomplete("search", "");
        });
    }
      $(document).ready(function(e){
        BindControls();

        $("#select_procedure").change(function(e){
          var value = $(this).val();
          if(value) {
            $.ajax({
              type:"POST",
              url:"/search-treatment",
              data: {procedure_id:value, _token:"{{csrf_token()}}"},
              success:function(response) { //alert(response);
                $('#select_treatment').find('option').not(':first').remove();
                for (var key in response.treatment_list) {
                  $("#select_treatment").append('<option value="'+key+'">'+response.treatment_list[key]+'</option>');
                }
              },
              error:function(xhr) {

              }
            });
          }
          else {
            $('#select_treatment').find('option').not(':first').remove();
          }
        });

      });
    </script>

  
 <!-- {!!Html::script("storage/frontend/js/jquery.sticky.js")!!} -->
  <!---<script>
    $(window).load(function(){
      $("#sticker").sticky({ topSpacing: 0, center:true, className:"hey" });
    });
  </script>-->
  <script>    
    var docutag = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      prefetch: '/getattdocumenttags/'
    });

    elt = $(".example_markup >> input");
    docutag.clearPrefetchCache();
    docutag.initialize();
    elt.tagsinput({
      itemValue: 'value',
      itemText: 'text',      
      typeaheadjs: {
        name: 'docutag',
        displayKey: 'text',
        source: docutag.ttAdapter()
      }
    });
 

  
   $(function() {
      $('.pro_opt').on('change', function(event) {
      var $element = $(event.target),
      $container = $element.closest('.example');      
      if (!$element.data('tagsinput'))
      return;
      var val = $element.val();
     /* alert(val);*/      
      $("#existings_tag_name").val(val);
      if (val === null)
      val = "null";    
      }).trigger('change');
    });
    function addnewtag(){
      if(document.getElementById("add_new_tag").checked == true){        
        $("#new_tag_name").show();
      }else{
        $("#new_tag").val('');
        $("#new_tag_name").hide();
         $("#new_tag_error").hide();
      }
    }  
  </script>
 
  
