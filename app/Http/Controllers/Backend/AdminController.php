<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function AccountSetting()
    {
        $id = Auth::User()->id;
        $EditUser = User::findOrFail($id);
        
        return view('backend.account.profile',compact('EditUser'));
    }
}
