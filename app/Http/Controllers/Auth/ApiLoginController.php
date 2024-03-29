<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ApiLoginController extends Controller
{
    public function login(Request $request)
    {
    	return User::findOrFail($request->user()->id);
    }
}
