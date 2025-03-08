<?php

namespace App\Modules\Users\UI\API\V1\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\Actions\RegistrationUserAction;
use App\Modules\Users\UI\API\V1\Requests\UserCreateRequest;
use App\Modules\Users\UI\API\V1\Resources\AuthorizationUserResource;

class AuthorizationUserController extends Controller
{
    public function __construct(
        readonly private RegistrationUserAction $registrationUserAction
    ) {
    }

    public function registration(UserCreateRequest $request): AuthorizationUserResource
    {
        return new AuthorizationUserResource($this->registrationUserAction->run(
            $request->validated()
        ));
    }

    public function login()
    {

    }

    public function exit()
    {

    }
}
