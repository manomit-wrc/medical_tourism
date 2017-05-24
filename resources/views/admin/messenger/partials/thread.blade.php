<?php $class = $thread->isUnread(Auth::guard('admin')->user()->id) ? 'alert-info' : ''; ?>

<div class="media alert {{ $class }}">
    <h4 class="media-heading">
        <a href="{!!URL::to('/admin/messages/show',$patient_id,$thread->id)!!}"  style="color: #3c8dbc !important">{{ $thread->subject }}</a>
        ({{ $thread->userUnreadMessagesCount(Auth::guard('admin')->user()->id) }} unread)</h4>
    <p>
        
        {{ $thread->latestMessage->body }}
    </p>
   
    <p>
        <small><strong>Creator:</strong> {{ (isset($thread->creator()->first_name)&&!empty($thread->creator()->first_name))?$thread->creator()->first_name:$thread->creator()->name }}</small>
    </p>
    <p>
    @php 
     //echo "<pre>"; print_r($thread->latestMessage); die;
    @endphp

        <small><strong>Participants:</strong>
        @if($thread->latestMessage->user_type=='P')
         {{ $thread->participantsString($thread->latestMessage->id,$thread->latestMessage->user_type,['first_name']) }}
        @elseif($thread->latestMessage->user_type=='A')
         {{ $thread->participantsString($thread->latestMessage->id,$thread->latestMessage->user_type,['name']) }}
        @endif 
       </small>
    </p>
</div>