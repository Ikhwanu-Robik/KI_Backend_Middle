<?php

namespace App\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserLoginAction
{
    /**
     * Create a new class instance.
     */
    public function __construct(Request $request)
    {
        $this->request = $request; 
    }

    public function execute($credentials) {
	    if(Auth::attempt($credentials)) {
		    $user = $this->request->user();

		    $token = $user->createToken('user_token');

		    return $token->plainTextToken;
	    }
	    else {
		    return false;
	    }
    }
}
