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
        <script>
           function showhide()
           {
                 var div = document.getElementById("newpost");
          if (div.style.display !== "none") {
              div.style.display = "none";
          }
          else {
              div.style.display = "block";
          }
           }
        </script>

        <div class="row">
            <div class="col-md-12">
              <form name="myenq" id="myenq" method="post" action="/add-my-enquiry" enctype="multipart/form-data">
                 {{csrf_field()}}
                <div class="col-md-12">
                    <label>
                        Subject <span style="color:red;">* </span>
                             {!! Form::text('subject','',array('class'=>'Iinput','id'=>'subject','placeholder'=>'Enter subject')) !!}
                             {!! Html::decode('<span class="text-danger">'.$errors->first("subject").'</span>') !!}
                    </label>
                </div>

                <div class="col-md-12">
                    <label>
                         Message <span style="color:red;">* </span>
                            {!! Form::textarea('message','',array('class'=>'Cinput','id'=>'textarea_id','placeholder'=>'Enter message')) !!}
                            {!! Html::decode('<span class="text-danger">'.$errors->first("message").'</span>') !!}
                   </label>
                </div>
                <div class="col-md-12">                    
                    <label>
                         Attachment
                           <input type="file" name="avators[]" multiple />
                   </label>
                    <br />
                </div>

                <div class="col-sm-12">
                    <button type="submit" class="button" style="margin-top: 0;">SAVE</button>
                </div>
            
             </form>
            </div>
        </div>
    </div>
</div>
@stop