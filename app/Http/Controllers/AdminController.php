<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show the admin approval page
    public function approve()
    {
        $pendingAdmins = User::where('role', 'admin')->where('approved', false)->get();
        return view('admin.approve', compact('pendingAdmins'));
    }

    // Approve an admin
    public function postApprove($id)
    {
        $admin = User::findOrFail($id);
        $admin->approved = true;
        $admin->save();

        return redirect()->route('admin.approve')->with('success', 'Admin approved successfully');
    }
}
