<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $data = $request->input('data.attributes');
        $email = $data['email'];
        $user = User::whereEmail($email)->first();
        // Esto es para ir disparando balas trazadoras.
        info('LoginCOntroller @ login looking for -$user-');

        if (!$user) {
            return response()->json([
                'errors' => [
                    'status' => 422,
                    'title' => 'Resource not found',
                    'detail' => 'The user was not found :('
                ]
            ], 422);
        }

        $password = $data['password'];

        if (!Hash::check($password, $user->password)) {
            return response()->json([
                'errors' => [
                    'status' => 422,
                    'title' => 'Resource not found',
                    'detail' => 'Incorrect login data'
                ]
            ], 422);
        }

        $device_name = $data['device_name'];
        $token = $user->createToken($device_name, ['*'])->plainTextToken->plainTextToken;

        $return = (new UserResource($user))
            ->additional(['meta' => ['token' => $token]])
            ->resource()->setStatusCode(201);

        return $return;

    }

    public function register(RegisterUserRequest $request)
    {
        $user = new User($request->input('data.attributes'));
        $user->save();
        $device_name = ($request->input('data.attributes.device_name'));
        // Aquí creo el token, con '*' le digo que le concedo todos los permisos al usuario. 
        $token = $user->createToken($device_name, ['*'])->plainTextToken;

        $return = (new UserResource($user))
            ->additional(['meta' => ['token' => $token]])
            ->resource()->setStatusCode(201);

        return $return;
    }
}
