<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['sender_id', 'receiver_id', 'roomUser_id', 'message'];




    /*** start relations ***/

    public function sender()
    {
        return $this->belongsTo(User::class,'sender_id');
    }


    public function receiver()
    {
        return $this->belongsTo(User::class,'receiver_id');
    }

    /*** end relations ***/


} //end of class
