<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogoutRequest;
use App\JSONAPIResponse;
use App\Actions\UserLogoutAction;

class UserLogout extends Controller
{
	use JSONAPIResponse;
    /**
     * Handle the incoming request.
     */
    public function __invoke(LogoutRequest $request, UserLogoutAction $action)
    {
	    $action->execute();
	   
	    return $this->success(message: 'Logged out');
    }
}
