<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Models\User;

use Illuminate\Support\Str;
#Use for Authentication
use Illuminate\Support\Facades\Auth;

use Session;

#Using for Http Client
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
#Passport Client
use Laravel\Passport\Client as OClient;

//Use for Try Catch
use Exception;

use Redirect;

#Use for Validation
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    // User Registration
    public function userRegister(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Generate Passport token
        $token = $user->createToken('User Token', ['user'])->accessToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    // User login (app/Http/Controllers/AuthController.php)
    public function userLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('api')->attempt($credentials)) {
            $user = Auth::guard('api')->user();
            $token = $user->createToken('User Token', ['user'])->accessToken;
            return response()->json(['token' => $token]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    // Admin login (app/Http/Controllers/AuthController.php)
    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin-api')->attempt($credentials)) {
            $admin = Auth::guard('admin-api')->user();
            $token = $admin->createToken('Admin Token', ['admin'])->accessToken;
            return response()->json(['token' => $token]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
    
    // Admin Registration
    public function adminRegister(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admin_user',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create new admin user
        $admin = AdminUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Generate Passport token for admin
        $token = $admin->createToken('Admin Token', ['admin'])->accessToken;

        return response()->json([
            'admin' => $admin,
            'token' => $token
        ], 201);
    }
}
