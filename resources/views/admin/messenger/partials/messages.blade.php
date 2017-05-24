<div class="media">
    <a class="pull-left" href="#">
        <img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64" alt="{{ $message->user->name }}" class="img-circle">
    </a>
    <div class="media-body">
       
        <h5 class="media-heading">
            @if($message->user_type =='P')
              
            @elseif($message->user_type =='A')
              {{ $message->user->name }}
            @endif
        </h5>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>