<div class="col-md-4">
    <div  id="sticker">
        <div class="qtbox">
            <h3><img src="{!!URL::to('storage/frontend/images/ql.jpg')!!}" alt=""> REQUEST A <strong>QUOTE</strong> <img src="{!!URL::to('storage/frontend/images/qr.jpg')!!}" alt=""></h3>

            <select name="" class="listtypeleft">
                <option value="Specility">Specility</option>
                <option value="Specility">Specility</option>
                <option value="Specility">Specility</option>
            </select>

            <select name="" class="listtypeleft">
                <option value="Procedure">Procedure</option>
                <option value="Procedure">Procedure</option>
                <option value="Procedure">Procedure</option>
            </select>

            <select name="" class="listtypeleft">
                <option value="Location">Location</option>
                <option value="Location">Location</option>
                <option value="Location">Location</option>
            </select>

            <input type="text" name="" class="inputleft">  

            <button type="button"><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>

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