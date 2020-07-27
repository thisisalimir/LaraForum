<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Reply;
use App\Thread;
use Illuminate\Http\Request;

/**
 * Class RepliesController
 * @package App\Http\Controllers
 */
class RepliesController extends Controller {

    /**
     * RepliesController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }


    /**
     * @param Channel $channel
     * @param Thread $thread
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Channel $channel, Thread $thread) {
        $this->validate(\request(), [
            'body' => 'required'
        ]);
        $thread->addReply([
            'body' => \request('body'),
            'user_id' => auth()->id(),
        ]);

        return back()->with('flash', 'Your Reply Post');
    }

    public function update(Reply $reply) {
        $this->authorize('update', $reply);

        $reply->update(\request(['body']));
    }

    public function destroy(Reply $reply) {
        $this->authorize('update', $reply);
        $reply->delete();

        if (\request()->expectsJson()) {
            return response(['status' => 'Reply Deleted']);
        }

        return back();
    }
}
