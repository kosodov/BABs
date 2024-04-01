<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function register(RegisterRequest $request)
    {
        // Создание нового пользователя
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Возвращение ответа
        return response()->json(['message' => 'User registered successfully'], 201);
    }

    public function login(LoginRequest $request)
    {
        // Аутентификация пользователя
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Генерация токена доступа
        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        // Возвращение токена доступа
        return response()->json(['access_token' => $accessToken], 200);
    }

    public function getUser(Request $request)
    {
        // Получение текущего аутентифицированного пользователя
        $user = $request->user();

        // Возвращение данных пользователя
        return new UserResource($user);
    }



}
