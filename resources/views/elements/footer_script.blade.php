    {!!Html::script("storage/frontend/js/jquery.min.js")!!}
    {!!Html::script("storage/frontend/js/bootstrap.min.js")!!}
    {!!Html::script("storage/frontend/js/jquery.jcarousel.min.js")!!}
    {!!Html::script("storage/frontend/js/jcarousel.responsive.js")!!}
    {!!Html::script("storage/frontend/js/owl.carousel.min.js")!!}
    {!!Html::script("storage/frontend/js/custom-file-input.js")!!}

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
    <script type="text/javascript">
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
      $(document).ready(function(){
          get_select_birthday();
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
            $("#btnLogin").click(function(e){
              $("#frmLogin").submit();
            });
            $.validator.addMethod("pwcheck", function(value) {
               return /[A-Z]/.test(value) // has a uppercase letter
                   && /[a-z]/.test(value) // has a lowercase letter
                   && /\d/.test(value) // has a digit
            },"Must have atleast one uppercase, one lowercase and one number");
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
                  minlength: 10
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
                  minlength: "Mobile no must have 10 digits"
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
                      $(".registration").addClass('registration-success');
                      $(".registration").removeClass('registration-error');
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
                  required: true,
                  email: true
                },
                login_password: {
                  required: true
                }
              },
              messages: {
                login_email_id: {
                  required: "Please enter email id",
                  email: "Please enter valid email format"
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
                      $(".login").html("");
                      window.location.href="/profile";
                    }
                    else {

                      $(".login").html("Email ID or Password is invalid");
                      $(".login").addClass('registration-error');
                      $(".login").removeClass('registration-success');
                    }
                    $(".login").show();
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
      });
    </script>
