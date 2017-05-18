@extends('layouts.inner_layout')
@section('title', 'Change Password')
@section('content')   
    <!--Right panel start here-->
    <div class="col-md-8">
        <div class="rightP">
            <h3><b>Upload Documents</b></h3>
        <div class="qtbox">
            <h4><b>Upload Documents</b></h4>
            <div>&nbsp;</div>
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="row">
              <div class="loop_field">
                    <div class="col-sm-11" style="margin-top:45px;"><label>Upload Your Prescriptions</label></div>
                    <div class="col-sm-1">
                    <button type="button" class="plusbtn plus-button" style="margin-top: 25px;">+</button>
                    </div>
                </div>
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
                    <button type="submit" class="button">SAVE</button>
                </div>
            </div>
        </div>
    </div>

    <!--Right panel end-->                  

@stop
