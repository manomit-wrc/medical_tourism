<h2>Add a new message</h2>
<form action="{!!URL::to('/admin/messages/update',$thread->id)!!}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}
        
    <!-- Message Form Input -->
    <div class="form-group">
        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
    </div>

    @if($users->count() > 0)
        <div class="checkbox">
            @foreach($users as $user)
                <label title="{{ $user->first_name.' '.$user->last_name }}">
                    <input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->first_name.' '.$user->last_name }}
                </label>
            @endforeach
        </div>
    @endif

    <!-- Submit Form Input -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </div>
</form>