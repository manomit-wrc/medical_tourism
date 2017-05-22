@extends('layouts.inner_layout')
@section('title', 'Change Password')
@section('content') 
<!--  <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>  --> 
    <!--Right panel start here-->
    <div class="col-md-8">                  
        <div class="qtbox">
            <h3><b>Upload Documents</b></h3>            
            <div>&nbsp;</div>
             @if (Session::has('message'))
                <div class="alert alert-info" id="resultdocumentmsg">{{ Session::get('message') }}</div>
            @endif            
            <div class="row">
                <div class="col-md-12">                                       
                {!! Form::open(array('method' => 'POST','role'=>'form','files' => true,'url'=>'documentupload', 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload')) !!}                    
                    {!! Form::close() !!}
                </div>
                
                <div class="col-md-4 col-md-offset-4">
                <input id="exact-submit-button" class="button" onclick="reload()" type="submit" value="UPDATE">
                </div>
                <br clear="all">
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div class="col-md-12">
                    @if (count($documentdata) > 0)
                        @foreach($documentdata as $doc_data) 
                        @php                        
                        $arr = explode('.',$doc_data->document);
                        $end = end($arr);
                        if($end=='jpeg' || $end=='jpg' || $end=='png' || $end=='gif' || $end=='bmp'){
                            $imgfile = $doc_data->document;
                        }else{
                            $imgfile = 'default.jpg';
                        }
                        @endphp
                        <div class="afterimgbox">
                            <span><a href="{!!URL::to('/document-delete',$doc_data->id)!!}" >x</a></span>
                            <a href="{!!URL::to('/document-download',$doc_data->id)!!}" ><img alt="{{ $doc_data->file_name }}" data-toggle="tooltip" data-placement="top" title="{{ $doc_data->file_name }}" src="http://localhost:8000/uploads/drop/{{ $imgfile }}"></a>
                        </div>


                      @endforeach
                  @endif                    
                </div>
            </div>
            <!-- <div class="row">
               <div class="loop_field">
                     <div class="col-sm-11" style="margin-top:45px;"><label>Upload Your Prescriptions</label></div>
                     <div class="col-sm-1">
                     <button type="button" class="plusbtn plus-button" style="margin-top: 25px;">+</button>
                     <input type="hidden" id="plus_count" value="2">
                     </div>
                 </div>
                 <form class="form-horizontal" action="/documentupload" id="documentUploadForm" method="post" enctype="multipart/form-data">
                     {{csrf_field()}}
                     <div class="loop_field upload-field">                                                         
                         <div class="col-sm-11">
                             <label class="on768">
                                                                          
                                 <div class="upload_profile1">
                                   <input type="file" name="upload_documents[]" id="file-1" class="inputfile on768"  />
                                   <label for="file-1" style="padding:12px;"><i class="fa fa-cloud-upload" aria-hidden="true"></i> <span>Choose a file&hellip;</span></label>
                                 </div>
                             </label>
                         </div>                  
                        {{-- <div class="col-sm-1">
                         <button type="button" class="plusbtn">x</button>
                         </div> --}}
                     </div>                
                     <br clear="all">
                     <div class="col-sm-3">
                         <button type="submit" value="upload" class="button">SAVE</button>
                     </div>
                 </form>
             </div> --> 
        </div>
    

    <!--Right panel end-->                  

@stop
