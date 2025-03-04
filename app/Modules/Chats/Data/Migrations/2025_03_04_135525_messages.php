<?php

use App\Modules\Chats\Data\Enums\MessageTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('chat_id')->constrained('chats');
            $table->enum('type', [MessageTypeEnum::TEXT->value, MessageTypeEnum::IMAGE->value, MessageTypeEnum::FILE->value]);
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
