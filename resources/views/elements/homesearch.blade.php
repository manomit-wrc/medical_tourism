<div class="container-fluid">
    <div class="row">
        <div class="headerbottom">
            <form name="frmSearch" id="frmSearch" method="get" action="/search-data">
            {{csrf_field()}}
            <div class="container">
                <div class="row">
                  <div class="fieldbox">
                    <select name="select_treatment" onchange="getDepartment(this.value)" class="listtype" id="select_treatment">
                        <option value="">Specility</option>
                        @foreach($treatment_list as $key=>$value)
                          <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="fieldbox">
                    <select name="select_procedure" class="listtype" id="select_procedure">
                        <option value="">Department</option>
                        @foreach($procedure_list as $key=>$value)
                          <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="fieldbox">
                    <input type="text" name="txt_search" id="txt_search" class="listinput">
                  </div>                 
                  
                  <div class="fieldsearch">
                  <button type="submit" id="btn-search"><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
                  </div>
                </div>
            </div>
            </form>
            
        </div>
    </div>
  </div>

