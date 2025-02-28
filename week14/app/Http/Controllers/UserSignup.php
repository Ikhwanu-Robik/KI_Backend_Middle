<?php

namespace App\Http\Controllers;

use App\JSONAPIResponse;
use App\Http\Requests\SignupRequest;
use App\Actions\UserSignupAction;

class UserSignup extends Controller
{
    use JSONAPIResponse;

    public function __invoke(SignupRequest $request, UserSignupAction $action) {
        $action->execute($request->validated()); 
        return $this->success(message: "Successfully signed up");
    }
}
