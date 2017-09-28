<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Content\VisiMisi;
use App\Models\Content\Prestasi;
use App\Models\Content\BgHome;
use App\Models\Content\Berita;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function home() {
      $visiMisi = VisiMisi::first();
      $bghome = BgHome::first();
      $berita = Berita::orderBy('created_at', 'desc')->take(4)->get();
      $prestasi = Prestasi::get()->take(6);
      return view('smart.index', compact(['visiMisi', 'prestasi', 'berita', 'bghome']));
    }
}
