<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Patient;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MessagesController extends Controller
{
     /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function index($patid)
    {  echo $patid; die;
        // All threads, ignore deleted/archived participants
        $threads = Thread::getAllLatest($patid)->get();
        //echo "<pre>"; print_r($threads); die;
        // All threads that user is participating in
        // $threads = Thread::forUser(Auth::id())->latest('updated_at')->get();

        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages(Auth::id())->latest('updated_at')->get();

        return view('admin.messenger.index', compact('threads'));
    }

    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');

            return redirect('messages');
        }

        // show current user in list if not a current participant
        // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();

        // don't show the current user in list
        $userId = Auth::guard('admin')->user()->id;
        //$users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
        $users=Patient::where('status', '!=', 2)->orderBy('id','desc')->get();
        //echo "<pre>"; print_r($users); die;
        $thread->markAsRead($userId);

        return view('admin.messenger.show', compact('thread', 'users'));
    }

    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        $adminusers = User::where('id', '!=', Auth::guard('admin')->user()->id)->get();
        //echo "<pre>"; print_r($adminusers); die;
        //$users = User::where('id', '!=', Auth::id())->get();
        $users=Patient::where('status', '!=', 2)->orderBy('id','desc')->get();
        //echo "<pre>"; print_r($users); die;
        return view('admin.messenger.create', compact('users','adminusers'));
    }

    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store()
    {
        $input = Input::all();

        $thread = Thread::create(
            [
                'subject' => $input['subject'],
            ]
        );

        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::guard('admin')->user()->id,
                'user_type' => 'A',
                'body'      => $input['message'],
            ]
        );

        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::guard('admin')->user()->id,
                'user_type' => 'A',
                'last_read' => new Carbon,
            ]
        );

        // Recipients is patient
        if (Input::has('recipients')) {
            $thread->addParticipant($input['recipients'],'P');
        }
        // Recipients is admin
        if (Input::has('recipients_admin')) {
            $thread->addParticipant($input['recipients'],'A');
        }

        return redirect('admin/messages');
    }

    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');

            return redirect('admin/messages');
        }

        $thread->activateAllParticipants();

        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::guard('admin')->user()->id,
                'user_type' => 'A',
                'body'      => Input::get('message'),
            ]
        );

        // Add replier as a participant
        $participant = Participant::firstOrCreate(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::guard('admin')->user()->id,
                'user_type' => 'A',
            ]
        );
        $participant->last_read = new Carbon;
        $participant->save();

        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant(Input::get('recipients'));
        }

        return redirect('admin/messages/show/' . $id);
    }
}
