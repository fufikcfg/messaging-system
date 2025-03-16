<?php

namespace App\Modules\Users\Actions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class DestroyUserToken
{
    public function __construct(
        private readonly GetAuthUserAction $getAuthUserAction
    ) {
    }

    /**
     * @throws AuthorizationException
     */
    public function run(): void
    {
        $user = $this->getAuthUserAction->run();

        if (!$user)
        {
            $user->currentAccessToken()->delete();
        } else {
            throw new AuthorizationException('This action is unauthorized.', 401);
        }

    }
}
