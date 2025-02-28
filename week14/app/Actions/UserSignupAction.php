<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSignupAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute($user_data) {
	    $user_data['password'] = Hash::make($user_data['password']);

	    User::createOrFirst($user_data);
    }
}
