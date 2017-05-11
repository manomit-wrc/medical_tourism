@extends('layouts.inner_layout')
@section('title', 'Enquiry')
@section('content')
<div class="container-fluid">
      <div class="row">
          <div class="category">
              <div class="container">
                  <div class="row">
                      <div class="col-md-8 col-md-offset-2">
                          <h2>Enquiry</h2>
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                      </div>
                      <br clear="all">
                      <div>&nbsp;</div>

                      <div class="col-md-6 col-md-offset-3">

                          <div class="qtbox">
                            <h3><img src="{!!URL::to('storage/frontend/images/ql.jpg')!!}" alt=""> REQUEST A <strong>QUOTE</strong> <img src="{!!URL::to('storage/frontend/images/qr.jpg')!!}" alt=""></h3>
                            
                            <label>
                            Full Name
                            <input type="text" name="" class="Iinput">
                            </label>
                            
                            <label>
                            Email
                            <input type="text" name="" class="Iinput">
                            </label>

                            <label>
                            Phone
                            <input type="text" name="" class="Iinput">
                            </label>
                            
                            <label>
                            Specility
                            <select name="" class="listtypeI">
                                <option value="Specility">Specility</option>
                                <option value="Specility">Specility</option>
                                <option value="Specility">Specility</option>
                            </select>
                            </label>
                            
                            <label>
                            Procedure
                            <select name="" class="listtypeI">
                                <option value="Procedure">Procedure</option>
                                <option value="Procedure">Procedure</option>
                                <option value="Procedure">Procedure</option>
                            </select>
                            </label>
                            
                            <label>
                            Location
                            <select name="" class="listtypeI">
                                <option value="Location">Location</option>
                                <option value="Location">Location</option>
                                <option value="Location">Location</option>
                            </select>
                            </label>
                            
                            <label>
                            Language
                            <select name="" class="listtypeI">
                                <option value="Language">Language</option>
                                <option value="Language">Language</option>
                                <option value="Language">Language</option>
                            </select>
                            </label>

                            <label>
                            Comments
                            <textarea name="" cols="" rows="5" class="Cinput"></textarea>
                            
                            </label>

                            <button type="button">ENQUIRY NOW</button>

                          </div>
                          
                          

                      </div>

                      

                  </div>
              </div>
          </div>
      </div>
  </div>
@stop