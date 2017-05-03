<div class="col-md-4">
        <div class="qtbox">
            <h3><img src="images/ql.jpg" alt=""> REQUEST A <strong>QUOTE</strong> <img src="images/qr.jpg" alt=""></h3>

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

            <select name="" class="listtypeleft">
                <option value="Language">Language</option>
                <option value="Language">Language</option>
                <option value="Language">Language</option>
            </select>

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