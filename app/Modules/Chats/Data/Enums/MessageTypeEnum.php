<?php

namespace App\Modules\Chats\Data\Enums;

enum MessageTypeEnum: string
{
    case TEXT = 'text';
    case IMAGE = 'image';
    case FILE = 'file';
}
