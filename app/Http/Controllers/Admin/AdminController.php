<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('home',[
            'users' => User::where('status', 'pending')->where('role', 'user')->get()
        ]);
    }

    public function approved($id_user)
    {
        $user = User::find($id_user);
        if ($user) {
            $user->update(['status' => 'approved']);
            return redirect()->route('admin.history')->with('message', 'Status User Telah Diapprove');
        } else {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }
    }

    public function cancel($id_user)
    {
        $user = User::find($id_user);
        if ($user) {
            $user->update(['status' => 'pending']);
            return redirect()->route('admin.index')->with('message', 'Status User Telah Pending');
        } else {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }
    }

    public function history()
    {
        return view('history',[
            'users' => User::where('status', 'approved')->where('role', 'user')->get()
        ]);
    }
}
