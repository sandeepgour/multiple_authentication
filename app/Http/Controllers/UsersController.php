<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    public function index($subdomain){
        $user = User::where('subdomain',$subdomain)
                        ->first();
        return view('User.index',compact('user'));
    }
}
