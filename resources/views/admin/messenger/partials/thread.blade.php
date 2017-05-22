<?php $class = $thread->isUnread(Auth::guard('admin')->user()->id) ? 'alert-info' : ''; ?>

<div class="media alert {{ $class }}">
    <h4 class="media-heading">
        <a href="{!!URL::to('/admin/messages/show',$thread->id)!!}"  style="color: #3c8dbc !important">{{ $thread->subject }}</a>
        ({{ $thread->userUnreadMessagesCount(Auth::guard('admin')->user()->id) }} unread)</h4>
    <p>
        {{ $thread->latestMessage->body }}
    </p>
    <p>
        <small><strong>Creator:</strong> {{ $thread->creator()->name }}</small>
    </p>
    <p>
        <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::guard('admin')->user()->id) }}</small>
    </p>
</div>