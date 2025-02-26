<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\JSONAPIResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Hash;

class UserSignup extends Controller
{
    use JSONAPIResponse;

    public function __invoke(SignupRequest $request) {
        $validated = $request->validated();

	$validated['password'] = Hash::make($validated['password']);
       
        User::createOrFirst($validated);

        return $this->success(message: "Successfully signed up");
    }
}
