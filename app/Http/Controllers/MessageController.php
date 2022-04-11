<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Conversation;use App\Models\Message;

class MessageController extends Controller
{
    public function messageSubmit(Request $req)
    {
        $rules = [
            'message' => 'required|string|max:255',
            'userId' => 'required|min:1|numeric',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $guard = get_guard();
            $user = Auth::guard($guard)->user();
            $request = new Request([
                'senderId'   => $user->id,
                'receiverId'   => $req->userId,
                'message'   => $req->message,
            ]);
            return $this->sendMessageUniversal($request);
        }
        return response()->json(['error'=>true,'message'=>'Something went wrong please try after some time']);
    }

    public function sendMessageUniversal(Request $req)
    {
        $rules = [
            'conversationId' => 'nullable|numeric|min:1',
            'senderId' => 'required|min:1|numeric',
            'receiverId' => 'required|min:1|numeric',
            'message' => 'required|string|max:255',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $conversation = Conversation::where('message_from',$req->senderId)->where('message_to',$req->receiverId)->first();
            if(!$conversation){
                $conversation = Conversation::where('message_to',$req->senderId)->where('message_from',$req->receiverId)->first();
                if(!$conversation){
                    $conversation = new Conversation();
                    $conversation->message_from = $req->senderId;
                    $conversation->message_to = $req->receiverId;
                    $conversation->save();
                }
            }
            $message = new Message();
            $message->message = $req->message;
            $message->conversation_id = $conversation->id;
            $message->from_id = $req->senderId;
            $message->save();
            return response()->json(['error'=>false,'message'=>'message Submitted Successfully','data'=>$message]);
        }
        return response()->json(['error'=>true,'message' => $validator->errors()->first()]);
    }

    public function showConversations(Request $req)
    {
        $guard = get_guard();
        $user = Auth::guard($guard)->user();
        $data = Conversation::where(function ($query) use (&$user) {
            $query->where('message_from', $user->id);
        })->orWhere(function($query) use (&$user) {
            $query->where('message_to', $user->id);
        })->get();
        foreach ($data as $key => $msg) {
            if($msg->message_from == $user->id) {
                $msg->opponent = User::where('id',$msg->message_to)->first();
            } elseif($msg->message_to == $user->id) {
                $msg->opponent= User::where('id',$msg->message_from)->first();
            }
        }
        // dd($data);
        return view('front.message.list',compact('data'));
    }

    public function getMessagesById(Request $req)
    {
        $data = Message::where('conversation_id', $req->conversation_id)->get();
        foreach ($data as $key => $value) {
            $value->time = $value->created_at->diffForHumans();
            $value->userDetails = User::where('id',$value->from_id)->first();
        }
        return response()->json(['error' => false, 'message' => 'Chats Data', 'data' => $data]);
    }
}
