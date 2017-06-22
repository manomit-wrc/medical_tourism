<div class="col-md-4">
    <div  id="sticker">
        <div class="qtbox">
            <h3><img src="{!!URL::to('storage/frontend/images/ql.jpg')!!}" alt=""> REQUEST A <strong>QUOTE</strong> <img src="{!!URL::to('storage/frontend/images/qr.jpg')!!}" alt=""></h3>
            @php
              if (app('request')->input('txt_search') !='' && !empty(app('request')->input('txt_search'))){
                  $txt_search = app('request')->input('txt_search');
              }else{
                  $txt_search ='';
              }
              if (app('request')->input('select_treatment') !='' && !empty(app('request')->input('select_treatment'))){
                  $select_treatment = app('request')->input('select_treatment');
              }else{
                  $select_treatment ='';
              }
              if (app('request')->input('select_procedure') !='' && !empty(app('request')->input('select_procedure'))){
                  $select_procedure = app('request')->input('select_procedure');
              }else{
                  $select_procedure ='';
              }                  
              @endphp
            <form name="frmSearch1" id="frmSearch1" method="get" action="/search-data">
                {{csrf_field()}}
                 <select name="select_procedure" class="listtypeleft" id="select_procedure">
                    <option value="">Speciality</option>
                    @foreach($procedure_list as $key=>$value)
                      <option value="{{$key}}" {{ ($select_procedure == $key)? 'selected':'' }}>{{$value}}</option>
                    @endforeach
                </select>

                <select name="select_treatment" class="listtypeleft" id="select_treatment">
                    <option value="">Procedure</option>
                    @foreach($treatment_list as $key=>$value)
                        <option value="{{$key}}" {{ ($select_treatment == $key)? 'selected':'' }}>{{$value}}</option>
                    @endforeach
                </select>

               

               <!--  <select name="" class="listtypeleft">
                   <option value="Location">Location</option>
                   <option value="Location">Location</option>
                   <option value="Location">Location</option>
               </select> -->

                <input type="text" name="txt_search" value="{{ $txt_search }}" id="txt_search" class="inputleft">
                <button type="submit" id="btn-search"><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
            </form>
        </div>
        @if(Request::segment(1) != 'contact')
            <div class="qc">
                <a href="{!!URL::to('/contact')!!}">
                <img src="{!!URL::to('storage/frontend/images/mail.png')!!}" alt=""><br>
                quick <strong>contact</strong>
                </a>
            </div>
        @endif
    </div>
</div>