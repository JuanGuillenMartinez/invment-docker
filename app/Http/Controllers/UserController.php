<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\user\UserRequest;
use App\Http\Requests\user\LoginRequest;

class UserController extends Controller
{

    public function register(UserRequest $request)
    {
        $data = array(
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email
        );
        $user = new User($data);
        if ($user->save()) {
            $response = array(
                'name' => $user->name
            );
            return $this->sendResponse($response, 'User registered successfully');
        }
        return $this->sendError('Error while registering');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if (Auth::attempt($credentials)) {
            $authUser = Auth::user();
            $response = array(
                'token' => $authUser->createToken('auth')->plainTextToken,
                'user' => $authUser
            );
            return $this->sendResponse($response, 'Login successful');
        }
        return $this->sendError('Wrong username or password');
    }

    public function logout(Request $request)
    {
        if ($request->user()->currentAccessToken()->delete()) {
            return $this->sendResponse(['status' => 'Session has been closed']);
        } else {
            return $this->sendError();
        }
    }
}
