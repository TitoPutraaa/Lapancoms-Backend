<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);
        $admin = Admin::where('username', $request->username)
                      ->where('status', '1')
                      ->first();
        if (! $admin) {
            return response()->json(['message' => 'Invalid login'], 401);
        }     
        // if (! Hash::check($request->password, $admin->password)) {
        if ($admin->password !== $request->password) {
             return response()->json(['message' => 'Invalid login'], 401);
        }
        $abilities = ['access'];
        if ($admin->role === 'super-admin') {
            $abilities = ['super-access'];
        }
        $token = $admin->createToken('access-token', $abilities)->plainTextToken;
        return response()->json([
            'message' => 'Login successful',
            'user' => $admin,
            'role' =>$admin->role,
            'abilities' => $abilities,
            'token' => $token
        ]);
    }
    public function logout(Request $request) {
        $admin = $request->user();
        $admin->tokens()->delete();
        return response()->json([
            'message' => 'Logged out'
        ]);
    }
}
