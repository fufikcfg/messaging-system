<?php

namespace App\Modules\Chats\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';

    protected $fillable = [
        'type',
        'name',
        'description',
    ];
}
