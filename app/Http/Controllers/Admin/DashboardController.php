<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('admin.index', compact('users'));
    }

    public function destroyUser($id){
        $users=User::findorfail($id);
      
        $users->delete();
        return back()->with('status',"Category deleted Successfully");
    }
}
