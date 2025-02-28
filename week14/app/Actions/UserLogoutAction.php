<?php

namespace App\Actions;

use App\Http\Requests\LogoutRequest;

class UserLogoutAction
{
    /**
     * Create a new class instance.
     */
    public function __construct(LogoutRequest $request)
    {
	    $this->request = $request;
    }
    
    public function execute() {
	    $this->request->user()->currentAccessToken()->delete();
    }
}
