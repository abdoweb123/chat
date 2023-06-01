<?php

namespace App\Http\Controllers;

use App\Models\ChatUser;
use App\Models\RoomUser;
use Illuminate\Http\Request;

class ChatUserController extends Controller
{

    /***** get chat between two users *****/
    public function getChats(Request $request){

        $other_user_id = $request->user_id;

        $authed_user = auth()->id();

        $chats = ChatUser::query()->whereIn('sender_id',[$other_user_id,$authed_user])
                                ->whereIn('receiver_id',[$other_user_id,$authed_user])
                                ->with(['sender','receiver'])->orderBy('created_at','desc')->get();


        $other_user = RoomUser::query()->where('sender_id','=',$other_user_id)
            ->where('receiver_id','=',$authed_user)->with(['sender','receiver'])->first();

        if (!$other_user){
            $other_user = RoomUser::query()->where('receiver_id','=',$other_user_id)
                ->where('sender_id','=',$authed_user)->with(['sender','receiver'])->first();
        }




        return response()->json([
            'chats'=>$chats,
            'other_user'=>$other_user,
        ]);
    }




    /***** send message from user to another *****/
    public function send_message(Request $request)
    {
        $room_user = RoomUser::query()->whereIn('sender_id',[$request->sender_id,$request->receiver_id])
            ->whereIn('receiver_id',[$request->sender_id,$request->receiver_id])->first();


        $new_message = ChatUser::create([
            'sender_id'=>$request->sender_id,
            'receiver_id'=>$request->receiver_id,
            'roomUser_id'=>$room_user->id,
            'message'=>$request->message,
        ]);

        return response()->json([
            'new_message'=>$new_message,
        ]);

    }



} //end of class
