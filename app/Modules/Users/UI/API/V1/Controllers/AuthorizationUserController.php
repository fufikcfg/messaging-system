<?php

namespace App\Modules\Users\UI\API\V1\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\Actions\DestroyUserToken;
use App\Modules\Users\Actions\GetAuthUserAction;
use App\Modules\Users\Actions\LoginUserAction;
use App\Modules\Users\Actions\RegistrationUserAction;
use App\Modules\Users\UI\API\V1\Requests\UserCreateRequest;
use App\Modules\Users\UI\API\V1\Requests\UserLoginRequest;
use App\Modules\Users\UI\API\V1\Resources\AuthorizationUserResource;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class AuthorizationUserController extends Controller
{
    public function __construct(
        readonly private RegistrationUserAction $registrationUserAction,
        readonly private GetAuthUserAction $getAuthUserAction,
        readonly private DestroyUserToken $destroyUserToken,
        readonly private LoginUserAction $loginUserAction
    ) {
    }

    public function registration(UserCreateRequest $request): AuthorizationUserResource
    {
        return new AuthorizationUserResource($this->registrationUserAction->run(
            $request->validated()
        ), true);
    }

    public function verify(): AuthorizationUserResource
    {
        return new AuthorizationUserResource(
            $this->getAuthUserAction->run()
        );
    }

    /**
     * @throws Exception
     */
    public function login(UserLoginRequest $request): AuthorizationUserResource
    {
        return new AuthorizationUserResource(
            $this->loginUserAction->run(
                $request->validated()
            ), true);
    }

    /**
     * @throws AuthorizationException
     */
    public function exit(): JsonResponse
    {
        $this->destroyUserToken->run();
        return new JsonResponse(status: 201);
    }
}
