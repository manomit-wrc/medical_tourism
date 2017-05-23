@extends('layouts.inner_layout')
@section('title', 'Change Password')
@section('content') 
    <!--Right panel start here-->
    <div class="col-md-8">                  
        <div class="qtbox">
            <h3><b>Upload Documents</b></h3>            
            <div>&nbsp;</div>
             @if (Session::has('message'))
                <div class="alert alert-info" id="resultdocumentmsg">{{ Session::get('message') }}</div>
            @endif            
            <div class="row">
            <div class="col-md-10"> </div>
            <div class="col-md-2"> 
            <div><a href="javascript:void(0)" data-toggle="modal" data-target="#uploaddocument_modal"><button type="button" class="btn bg-purple">ADD</button></a></div></div>
                <div class="col-md-12">
                <div class = "table-responsive">                                       
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Prescription</th>
                            <th>Documents</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if (count($documentdata) > 0)
                        @foreach($documentdata as $doc_data) 
                        @php                        
                        $arr = explode('.',$doc_data->document);
                        $end = end($arr);
                        if($end=='jpeg' || $end=='jpg' || $end=='png' || $end=='gif' || $end=='bmp' || $end=='mp4' || $end=='flv' || $end=='avi' || $end=='wmv' || $end=='asf' || $end=='webm' || $end=='ogv'){
                            $imgfile = $doc_data->document;
                        }else{
                            $imgfile = 'default.jpg';
                        }
                        @endphp
                          <tr>
                            <td>{{ $doc_data->file_name }}</td>
                            <td><a href="{!!URL::to('/document-download',$doc_data->id)!!}" >
                            @php
                            if($end=='mp4' || $end=='flv' || $end=='avi' || $end=='wmv' || $end=='asf' || $end=='ogv' || $end=='webm'){
                            @endphp
                                <video height="40" width="40" controls data-toggle="tooltip" data-placement="top" title="{{ $doc_data->file_name }}">
                                      <source src="http://localhost:8000/uploads/drop/{{ $imgfile }}"  type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                            @php
                            }else { 
                            @endphp
                            <img height="40" width="40" alt="{{ $doc_data->file_name }}" data-toggle="tooltip" data-placement="top" title="{{ $doc_data->file_name }}" src="http://localhost:8000/uploads/drop/{{ $imgfile }}">
                            @php
                            }
                            @endphp
                            </a></td>
                            <td><a href="{!!URL::to('/document-delete',$doc_data->id)!!}" ><i class="fa fa-times" style="color:red;" aria-hidden="true"></i></a></td>
                          </tr>
                              @endforeach
                  @endif       
                        </tbody>
                    </table>
                </div>
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
