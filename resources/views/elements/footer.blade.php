<div class="container-fluid">
      <div class="row">
          <div class="ssbg">
              <div class="container">
                  <div class="row">
                      <div class="col-md-7 col-md-offset-5">
                          <h2><strong>Success</strong> stories</h2>
                          <div class="successbox">
                              <div id="testimonial-slider" class="owl-carousel">
                              
                                 @if (count($successstory_lists) > 0)
                                        @foreach($successstory_lists as $successstory_lists)
                                          <div class="testimonial">
                                              <div class="pic">
                                                <a href="{!!URL::to('/successstory_details/'.$successstory_lists->id)!!}">
                                                  <img src="{{url('/uploads/successstories/thumb_200_200/'.$successstory_lists->story_image)}}" alt="" class="img-responsive">
                                                </a>
                                              </div>

                                              <p class="description">
                                              <b><a href="{!!URL::to('/successstory_details/'.$successstory_lists->id)!!}">{!! \Illuminate\Support\Str::words($successstory_lists->title, 5,'....')  !!}</a></b><br>
                                              {!! \Illuminate\Support\Str::words(strip_tags($successstory_lists->description), 10,'....')  !!}
                                              <br>
                                              <span>WRC Technologies</span>
                                              </p>
                                          </div>
                                        @endforeach
                                  @endif


                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>


<div class="container-fluid">
      <div class="row">
          <div class="footer">
              <div class="container">
                  <div class="row">
                      <div class="col-md-2">
                          <h3>Swasthya Bandhav</h3>
                          <ul>
                              <li><a href="{!!URL::to('/')!!}">Home</a></li>
                              <li><a href="{!!URL::to('/about')!!}">About Swasthya Bandhav</a></li>
                              <li><a href="{!!URL::to('/services')!!}">Services</a></li>
                              <li><a href="{!!URL::to('/enquiry')!!}">Enquiry</a></li>
                              <li><a href="{!!URL::to('/news')!!}">News</a></li>
                              <li><a href="{!!URL::to('/contact')!!}">Contact Us</a></li>
                              <li><a href="{!!URL::to('/faqs')!!}">FAQ</a></li>
                          </ul>
                      </div>
                      
                      <div class="col-md-3">
                          <h3>Medical Providers</h3>
                          <ul>
                            @if (count($providertype_lists) > 0)
                              @foreach($providertype_lists as $providertype_lists)
                              <li><a href="#">{{ $providertype_lists->name }}</a></li>
                              @endforeach
                            @endif
                          </ul>
                      </div>

                      <div class="col-md-2">
                          <h3>Medical Treatment</h3>
                          <ul>
                            @if (count($treatment_lists) > 0)
                              @foreach($treatment_lists as $treatment_lists)
                              <li><a href="#">{{ ucfirst(strtolower($treatment_lists->name)) }}</a></li>
                              @endforeach
                            @endif
                          </ul>
                      </div>
                      <div class="col-md-2">
                          <h3>Facility Locations</h3>
                          <ul>
                              @if (count($city_lists) > 0)
                              @foreach($city_lists as $city_lists)
                              <li><a href="#">{{ ucfirst(strtolower($city_lists->name)) }}</a></li>
                              @endforeach
                            @endif
                          </ul>
                      </div>
                      <div class="col-md-3">
                          <h3>Connect With Us</h3>
                          <a href="javascript:void(0)" class="socialF"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                          <a href="javascript:void(0)" class="socialF"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                          <a href="javascript:void(0)" class="socialF"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                          <a href="javascript:void(0)" class="socialF"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                          <a href="javascript:void(0)" class="socialF"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="footerdown">
                              <div class="row">
                              <div class="col-md-4 col-sm-6">
                                  <div class="copy">
                                  Copyright <script>document.write(new Date().getFullYear())</script>. All rights reserved
                                  </div>
                              </div>

                              <div class="col-md-4 col-sm-6">
                                  <div class="copy">
                                   <a href="{!!URL::to('/disclaimer/')!!}">Disclaimer </a> | <a href="{!!URL::to('/privacypolicy/')!!}">Privacy Policy </a> | <a href="{!!URL::to('/sitemap/')!!}">Site Map </a>
                                  </div>
                              </div>
                              <div class="col-md-4  col-sm-6">
                                  <div class="designby">
                                  Powered by<a href="http://www.wrctechnologies.com/" target="_blank"> WRC Technologies</a>
                                  </div>
                              </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="modal fade" id="profileimage_modal" role="dialog">
    <div class="modal-dialog">            
      <form class="form-horizontal" action="" id="imageUploadForm" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="refresh()">&times;</button>
            <h4 style="text-align: center;">Upload Profile Image</h4>
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
  <script>
          function uploadimage(){   
            $("#imageUploadForm").unbind('submit').submit(function (event) {
              event.preventDefault();   
              var formData = new FormData($("#imageUploadForm")[0]);
              $.ajax({
                url: "/profile_image_upload",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (return_data) 
                { 
                  console.log(return_data);
                var result = $.parseJSON(return_data);
                  if(result.status == 1) {
                    $('#profileimage_modal').modal('hide');    
                    $("#upload").html('<img src="{!!URL::to('uploads/patients/')!!}'+ '/'+result.image_name +'"  alt="">');
                    $("#profileheaderimg").html('<img src="{!!URL::to('uploads/patients/thumb/')!!}'+ '/'+result.image_name +'"  alt="">');
                    $("#avators").val('');  
                    
                  }else{
                    $("#resultimage").css("display", "block");
                    $("#resultimage").removeClass("alert-success");
                    $("#resultimage").addClass("alert-danger");
                    $("#resultimage").html(result.msg);
                    setTimeout(function() {
                      $("#avators").val('');
                      $('#resultimage').fadeOut('fast');
                    }, 2000);
                }
                }                
              });
            });
          } 
          function refresh(){
            $("#avators").val('');
          }
          function signuprefresh(){
            $("#first_name-error").hide();
            $("#last_name-error").hide();
            $("#email_id-error").hide();
            $("#mobile_no-error").hide();
            $("#password-error").hide();
          } 
          function loginrefresh(){
            $("#login_email_id-error").hide();
            $("#login_password-error").hide();
            $(".registration-error").hide();                        
          }
          function forgotrefresh(){
            $("#forgot_email_id").val('');
            $("#forgot_email_id-error").hide();
          }           
        </script>

        <div class="modal fade" id="uploaddocument_modal" role="dialog">
          <div class="modal-dialog">            
            <form class="form-horizontal" action="" id="documentUploadForm" method="post" enctype="multipart/form-data">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" onclick="refreshdocument()">&times;</button>
                  <h4 style="font-family: Open Sans,sans-serif; font-size:18px; color: #78A100;">
                  <strong>Upload Document</strong></h4>
                </div>
                <div class="modal-body">
                  <div class="alert alert-success fade in alert-dismissable" id="resultdocument" style="display:none"></div>
                  <div class="col-md-12">
                      <label>
                          Document Title :<span style="color:red;">*</span>
                          <input type="test" name="file_name" id="file_name" class="Cinput" onkeyup="return documentname(this.value)" value="">
                          <div class="alert alert-danger fade in alert-dismissable" id="file_name_error" style="display:none; margin-top:5px;">
                          </div>
                      </label>
                  </div>
                  
                  <div class="col-md-12">
                       <label>
                          Existing Tags :
                          <div class="example example_markup">
                            <div class="bs-example">
                              <input type="text" class="Cinput pro_opt" placeholder="Tag_name" value="" />
                            </div>    
                          </div>
                      </label>
                  </div>
                  
                  <div class="col-md-12">
                       <label>                           
                          <input type="checkbox" value="Customer" class="te_fr feild_right required" id="add_new_tag" onclick="addnewtag()" name="user_type"> Add New Tags
                      </label>
                  </div>
                  <div class="col-md-12" style="display:none;" id="new_tag_name">
                       <label>
                          New Tags Name:<span style="color:red;">*</span>
                          <input type="test" name="new_tag" id="new_tag" class="Cinput" onkeyup="return newtagname(this.value)" value="">
                          <div class="alert alert-danger fade in alert-dismissable" id="new_tag_error" style="display:none; margin-top:5px;">
                          </div>
                      </label>
                  </div>
                  <div class="col-md-12">
                    <label>
                      Document :<span style="color:red;">*</span>
                      <input name="document" id="document" style="margin-top:10px;" type="file" value=""/>
                      <div style="margin-top:10px;"><span style="color:red;">Note : </span>Please upload bmp, gif, jpg, jpeg, png, mp4, flv, avi, wmv, asf, webm, ogv, txt, pdf, psd, doc, rtf, ppt, docx extension file.
                      </div>   
                    </label>                
                  </div> 
                </div>
                <div class="modal-footer">
                   <input type="hidden" name="_token" value="{{csrf_token()}}">
                   <input type="hidden" name="existings_tag_name" id="existings_tag_name" value="">
                   <input class="viewmoreBTN" type="submit" onclick="return uploaddocument();" value="Update"><div>&nbsp;</div>                  
                </div>
              </div>
            </form>
          </div>
      </div>
      <script>
          function uploaddocument(){
            var file_name = $("#file_name").val();                
              if(file_name ==''){
                document.getElementById('file_name').style.border = '1px solid red !important';
                $("#file_name_error").css("display", "block");
                document.getElementById("file_name_error").innerHTML = "Please enter document title";
                document.getElementById('file_name').focus();
                return false
              }else{
                $("#file_name_error").css("display", "none");     
                document.getElementById('file_name').style.border = '';
                document.getElementById("file_name_error").innerHTML = "";
              }
              if(document.getElementById("add_new_tag").checked == true){
                var new_tag = $("#new_tag").val();                
                if(new_tag ==''){
                  document.getElementById('new_tag').style.border = '1px solid red !important';
                  $("#new_tag_error").css("display", "block");
                  document.getElementById("new_tag_error").innerHTML = "Please enter new tag";
                  document.getElementById('new_tag').focus();
                  return false
                }else{
                  $("#new_tag_error").css("display", "none");     
                  document.getElementById('new_tag').style.border = '';
                  document.getElementById("new_tag_error").innerHTML = "";
                }
              }else{
                $("#new_tag").val('');
                $("#new_tag_error").css("display", "none");     
                document.getElementById('new_tag').style.border = '';
                document.getElementById("new_tag_error").innerHTML = "";
              }

            $("#documentUploadForm").unbind('submit').submit(function (event) {
              event.preventDefault();   
              var formData = new FormData($(this)[0]);
              $.ajax({
                url: "/documentupload",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (return_data) 
                { 
                var result = $.parseJSON(return_data);
                  if(result.status == 1) {
                    $("#resultdocument").css("display", "block");
                      $("#resultdocument").removeClass("alert-danger");
                      $("#resultdocument").addClass("alert-success");
                      $("#resultdocument").html(result.msg);
                    setTimeout(function() {
                      $('#uploaddocument_modal').modal('hide');  
                      $("#document").val('');
                      $("#file_name").val('');
                      $("#new_tag").val(''); 
                      $("#existings_tag_name").val('');
                      if(document.getElementById("add_new_tag").checked == true){
                        $('#add_new_tag').prop('checked',false);
                      }                      
                      location.reload();
                    }, 2000); 
                  }else{
                      $("#resultdocument").css("display", "block");
                      $("#resultdocument").removeClass("alert-success");
                      $("#resultdocument").addClass("alert-danger");
                      $("#resultdocument").html(result.msg);
                      setTimeout(function() {
                        $("#document").val('');
                        $("#file_name").val('');
                        $("#new_tag").val('');
                        $('#resultdocument').fadeOut('fast');
                      }, 2000);
                  }
                }                
              });
            });
          }
          function refreshdocument(){
            $("#document").val('');
            $("#file_name").val('');
            $("#file_name_error").hide();
          }
          function documentname(val)
          {                                       
            if(val == '')
            {
              $("#file_name_error").show();
              $("#file_name_error").html("Please enter prescription title");
            }
            else
            {                     
              $("#file_name_error").hide();
            }                     
          }
          function newtagname(val)
          {                                       
            if(val == '')
            {
              $("#new_tag_error").show();
              $("#new_tag_error").html("Please enter new tag");
            }
            else
            {                     
              $("#new_tag_error").hide();
            }                     
          } 
          </script> 
                 
