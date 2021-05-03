<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    /**
     * Show chats
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('chat');
    }

    /**
     * Fetch all messages
     *
     * @return JsonResponse
     */
    public function fetchMessages(): JsonResponse {
        $messages = Message::with('user')->get();
        return response()->json($messages);
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     *
     * @return JsonResponse
     */
    public function sendMessage(Request $request): JsonResponse {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return response()->json([
            'status' => 'Message Sent!',
            //'message' => $message
        ]);
    }
}
