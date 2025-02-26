<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LogoutRequest;
use Illuminate\Support\Facades\Auth;
use App\JSONAPIResponse;

class UserLogout extends Controller
{
	use JSONAPIResponse;
    /**
     * Handle the incoming request.
     */
    public function __invoke(LogoutRequest $request)
    {
	    $request->user()->currentAccessToken()->delete();
	   
	    return $this->success(message: 'Logged out');
    }
}
