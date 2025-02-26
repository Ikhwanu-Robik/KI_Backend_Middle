<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\JSONAPIResponse;

class UserLogin extends Controller
{
    use JSONAPIResponse;
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->validated();

	if(Auth::attempt($credentials)) {
		$user = $request->user();	

		$token = $user->createToken('user_token');	
		
		return $this->success(['token' => $token->plainTextToken]);
	}
	else {
		return "Login failed";
	}
    }
}
