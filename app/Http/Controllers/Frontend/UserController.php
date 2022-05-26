<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myorder()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.myorder', compact('orders'));
    }

    public function viewOrder($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.vieworder', compact('orders'));
    }

    public function profile()
    {
        $users = User::where('id', Auth::id())->first();
        return view('frontend.userprofile', compact('users'));
    }
}
