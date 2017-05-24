<h2>Add a new message</h2>
<form action="{!!URL::to('/admin/messages/update',$thread->id)!!}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}
        
    <!-- Message Form Input -->
    <div class="form-group">
        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
    </div>

    @if($users->count() > 0)
        <div class="form-group">
            <label class="control-label">Patients:</label>
            <div class="checkbox">
                @foreach($users as $user)
                    <label title="{{ $user->first_name.' '.$user->last_name }}"><input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->first_name.' '.$user->last_name }}</label><br/>
                @endforeach
            </div>
        </div>  
    @endif

    @if($adminusers->count() > 0)
      <div class="form-group">
        <label class="control-label">Hospital Admin:</label>
        <div class="checkbox">
            @foreach($adminusers as $key=>$adminuser)
                <label title="{{ $adminuser->name }}"><input type="checkbox" name="recipients_admin[]" value="{{ $adminuser->id }}">{!! $adminuser->name !!}</label><br/>
            @endforeach
        </div>
      </div>
    @endif

    <!-- Submit Form Input -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </div>
</form>