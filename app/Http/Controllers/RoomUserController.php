<?php

namespace App\Http\Controllers;

use App\Models\ChatUser;
use App\Models\RoomUser;
use Illuminate\Http\Request;

class RoomUserController extends Controller
{

    public function index()
    {
        return view('room.index');
    }



    public function check_room($user_id)
    {
//        return $user_id;

        $authed = auth()->id();

       $room_user = RoomUser::query()->whereIn('sender_id',[$user_id,$authed])->whereIn('receiver_id',[$user_id,$authed])->first();


      if ($room_user)
      {
          $chats = ChatUser::query()->whereIn('sender_id',[$user_id,$authed])->whereIn('receiver_id',[$user_id,$authed])->orderBy('created_at','ASC')->get();


          return view('room.chat',compact('room_user','chats','user_id'));
      }
      else{
          $room_user = RoomUser::create([
              'sender_id'=>$user_id,
              'receiver_id'=>$authed,
          ]);

          $chats = ChatUser::query()->whereIn('sender_id',[$user_id,$authed])->whereIn('receiver_id',[$user_id,$authed])->orderBy('created_at','ASC')->get();

          return view('room.chat',compact('room_user','chats','user_id'));

      }


    }










    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomUser  $roomUser
     * @return \Illuminate\Http\Response
     */
    public function show(RoomUser $roomUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomUser  $roomUser
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomUser $roomUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomUser  $roomUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomUser $roomUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomUser  $roomUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomUser $roomUser)
    {
        //
    }
}
