<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{

  // Auth Admin
    public function getLoginAdmin() {
      return view('admin.login');
    }

    public function postLoginAdmin(Request $request) {
      $this->validate($request, [
        'username' => 'required',
        'password' => 'required'
      ]);

      $data = ['username' => $request->username, 'password' => $request->password];
      if (Auth::attempt($data)) {
        return redirect()->route('getAdmin');
      }
      return redirect()->back()->with('error', 'username dan password salah');
    }

    public function getLogout() {
      Auth::logout();
      return redirect()->route('login');
    }

    // Admin Dashboard
    public function index() {
      return view('admin.index');
    }
}
