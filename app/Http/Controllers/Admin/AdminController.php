<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Models\Ppdb\Siswa;
use Auth;
use DB, Session;
use Illuminate\Http\Request;

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

      $data = ['username' => $request->username, 
               'password' => $request->password,
      ];
      $level = $request->level;

      switch ($level) {
        case 'admin':
            if(Auth::guard('admin')->attempt($data)) {
              return redirect()->route('admin.berita');
            }
            return redirect()->back()->with('error', 'username atau password salah !');
          break;
        case 'KProdi':
            if(Auth::guard('kprodi')->attempt($data)) {
              return redirect()->route('admin.event');
            }
            return redirect()->back()->with('error', 'username atau password salah !');
          break;
        case 'guru':
           if(Auth::guard('guru')->attempt($data)) {
              return redirect()->route('admin.ebook');
            }
            return redirect()->back()->with('error', 'username atau password salah !');
          break;
        case 'Berita':
           if(Auth::guard('berita')->attempt($data)) {
            // dd(auth()->guard('berita')->user());
              return redirect()->route('admin.berita');
            }
            return redirect()->back()->with('error', 'username atau password salah !');
          break;
        default:
          return redirect()->back()->with('error', 'username dan password salah');
          break;
      }
    }

    public function getLogout() {
      Session::flush();
      return redirect()->route('login');
    }

    public function getAkun() {
      $admin = User::first();
      return view('admin.akun.index', compact('admin'));
    }

    public function postAkun(Request $request) {
      $user = User::find($request->id);
      $user->username = $request['username'];
      $user->password = bcrypt($request['password']);
      $user->save();
      return redirect()->back()->with('success', 'Akun berhasil di perbarui !');
    }

    // // Admin Dashboard
    // public function index() {
    //   $siswa = Siswa::select(['id', 'created_at','nama'])->whereDate('created_at', date('Y-m-d'))->orderBy('created_at', 'desc')->take(6)->get()->toArray();
    //   // dd($siswa);
    //   $pria = Siswa::where('jenis_kelamin', 'pria')->get()->count();
    //   $wanita = Siswa::where('jenis_kelamin', 'wanita')->get()->count();
    //     // $data = array_column($siswa, 'count');
    //     //  dd(count($siswa));
    //     $totalSiswa = Siswa::select('id')->count();
    //     $siswaHariIni = Siswa::select(['id', 'created_at'])->whereDate('created_at', date('Y-m-d'))->count();
    //     $chartjs = app()->chartjs
    //      ->name('barChartTest')
    //      ->type('pie')
    //      ->size(['width' => 400, 'height' => 200])
    //      ->labels(['Laki - Laki', 'Perempuan'])
    //      ->datasets([
    //          [
    //              'backgroundColor' => ['rgba(30, 80, 231, 0.8)', 'rgba(224, 64, 199, 0.8)'],
    //              'data' => [$pria, $wanita],
    //          ],

    //      ])
    //      ->options([]);
    //   return view('admin.index', [
    //     'chartjs' => $chartjs,
    //     'totalSiswa' => $totalSiswa,
    //     'siswaHariIni' => $siswaHariIni,
    //     'siswa' => $siswa
    //   ]);
    // }
}
