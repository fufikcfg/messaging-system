<?php

namespace App\Modules\Users\Actions;

use App\Modules\Users\Tasks\CreateUserTask;

class RegistrationUserAction
{
    public function __construct(
      readonly private CreateUserTask $createUserTask
    ) {
    }

    public function run(array $data): array
    {
        return [
            'token' => $this->createUserTask->run($data)->createToken($data['email'])->plainTextToken
        ];
    }
}
