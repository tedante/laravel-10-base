<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\BaseController;

class AuthController extends BaseController
{
    /**
     * register new user
     */
    public function register(Request $request) {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => User::STATUS_INACTIVE
            ]);

            $response = [
                'email' => $user->email,
                'token' => $user->createToken('auth_token')->plainTextToken
            ];

            // send email confirmation token
            $this->generateEmailToken($user);

            return $this->success($response, 'User created successfully', 201);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), "INTERNAL_SERVER_ERROR");
        }
    }

    /**
     * generating email confirmation token
     */
    private function generateEmailToken($user) {
        $token = $user->createToken('email_confirmation')->plainTextToken;

        $user->email_token = $token;
        $user->email_token_expired_at = now()->addMinutes(5); // expired in 5 minutes
        $user->save();

        // send email
        $user->notify(new \App\Notifications\RegisterEmailVerification($user));

        return true;
    }
}
