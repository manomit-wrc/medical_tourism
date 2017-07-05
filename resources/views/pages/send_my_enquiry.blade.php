@extends('layouts.inner_layout')
@section('title', 'My Enquiry')
@section('content')
<div class="col-md-8">
  
    <div class="qtbox">
        <h3>My <b>Enquiries</b></h3>
        @if (Session::has('message'))
                <div class="alert alert-info" id="resultdocumentmsg">{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('error_message'))
            <div class="alert alert-warning" id="resultdocumentmsg">{{ Session::get('error_message') }}</div>
        @endif      

        <div class="row">
            <div class="col-md-12">
              <form name="myenq" id="myenq" method="post" action="/add-my-enquiry" enctype="multipart/form-data" onsubmit="return validform()">
                 {{csrf_field()}}
                <div class="col-md-12">
                    <label>
                        Subject <span style="color:red;">* </span>
                             {!! Form::text('subject','',array('class'=>'Iinput','id'=>'subject','placeholder'=>'Enter subject')) !!}
                             <span class="text-danger" id="subject_error" style="display:none;"> </span>
                    </label>
                </div>

                <div class="col-md-12">
                    <label>
                         Message <span style="color:red;">* </span>
                            {!! Form::textarea('message','',array('class'=>'Cinput','id'=>'textarea_id','placeholder'=>'Enter message')) !!}
                            <span class="text-danger" id="textarea_id_error" style="display:none;"></span>
                   </label>
                </div>
                <div class="col-md-12">                    
                    <label>
                         Attachment
                           <input type="file" name="avators[]" multiple />
                   </label>
                    <br />
                </div>
                <div class="col-md-12">
                       <label>                           
                          <input type="checkbox" value="1" class="te_fr feild_right required" id="upload_document" onclick="adduploadocument()" name="upload_document"> Upload Document
                      </label>
                  </div>
                  <div class="col-md-12" style="display:none;" id="new_tag_name">
                      <label>                           
                          <div class = "table-responsive">                                       
                        <table class="table">
                            <thead>
                              <tr>
                                <th>Document Title</th>
                                <th>Documents</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                @if (count($documentdata) > 0)
                                @foreach($documentdata as $doc_data)                               
                                <tr>
                                    <td>{{ $doc_data->file_name }}</td>
                                    <td>{{ $doc_data->document }}</td>
                                    <td><input type="checkbox" value="{{ $doc_data->document }}"  class="te_fr feild_right required chkbx" name="document[]"></td>
                                </tr>
                                  @endforeach
                                  @else
                                <tr><td colspan="3" style="text-align:center;">No record found</td></tr>
                            @endif       
                            </tbody>
                        </table>
                    </div>
                      </label>
                       
                  </div>

                <div class="col-sm-12">
                    <button type="submit" class="button" style="margin-top: 0;">SAVE</button>
                </div>
            
             </form>
            </div>
        </div>
    </div>
</div>
<script>
    function validform(){
              var subject = $("#subject").val();                
              if(subject ==''){
                document.getElementById('subject').style.border = '1px solid red !important';
                $("#subject_error").css("display", "block");
                document.getElementById("subject_error").innerHTML = "Please enter subject";
                document.getElementById('subject').focus();
                return false
              }else{
                $("#subject_error").css("display", "none");     
                document.getElementById('subject').style.border = '';
                document.getElementById("subject_error").innerHTML = "";
              }
              
              var textarea_id = $("#textarea_id").val();                
              if(textarea_id ==''){
                document.getElementById('textarea_id').style.border = '1px solid red !important';
                $("#textarea_id_error").css("display", "block");
                document.getElementById("textarea_id_error").innerHTML = "Please enter message";
                document.getElementById('textarea_id').focus();
                return false
              }else{
                $("#textarea_id_error").css("display", "none");      
                document.getElementById('textarea_id').style.border = '';
                document.getElementById("textarea_id_error").innerHTML = "";
              }
    }
    function adduploadocument(){
      if(document.getElementById("upload_document").checked == true){        
        $("#new_tag_name").show();
      }else{ 
        $(".chkbx").attr('checked', false);      
        $("#new_tag_name").hide();        
      }
    }
  </script>
@stop