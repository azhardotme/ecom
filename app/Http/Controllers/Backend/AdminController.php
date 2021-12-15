<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Redirect;

session_start();
class AdminController extends Controller
{
    public function index()
    {
        return view('backend.admin.admin_login');
    }

    public function show_dashboard(Request $request)

    {
        $validatedData = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $admin_email = $request->email;
        $admin_password = md5($request->password);

        $result = Admin::where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if ($result) {
            Session::put('admin_id', $result->admin_id);
            Session::put('admin_name', $result->admin_name);
            return  Redirect::to('/dashboard');
        } else {
            Session::put('message', 'Email or Password Invalid!');
            return Redirect::to('/adminLogin');
        }
    }
}
