<?php

namespace App\Modules\Chats\Data\Models;

use Illuminate\Database\Eloquent\Model;

class ChatParticipant extends Model
{
    protected $table = 'chat_participants';

    public $timestamps = false;

    protected $fillable = [
        'joined_at'
    ];
}
