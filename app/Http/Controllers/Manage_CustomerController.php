<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class Manage_CustomerController extends Controller
{
    public function index(){
        $users = User::all();
        return view('dashboard.manage_customer', compact('users'));
    }
    public function updateRole(Request $request){
        $user = User::find($request->user_id);
        $user->syncRoles($request->role);
        return redirect()->back()->with('success', 'User role updated successfully!');
    }
}
