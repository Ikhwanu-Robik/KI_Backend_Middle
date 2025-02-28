<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\JSONAPIResponse;
use App\Actions\UserLoginAction;

class UserLogin extends Controller
{
    use JSONAPIResponse;
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request, UserLoginAction $action)
    {
	    $token = $action->execute($request->validated());
	    if($token) {
		    return $this->success($token, "login succesful");
	    }
	    else {
		    return $this->error("login failed");
	    }
    }
}
