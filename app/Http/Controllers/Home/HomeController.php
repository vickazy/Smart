<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Content\Berita;
use App\Models\Content\BgHome;
use App\Models\Content\Prestasi;
use App\Models\Content\Slider;
use App\Models\Content\VisiMisi;
use App\Models\Pengumuman\Pengumuman;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function home() {
      $visiMisi = VisiMisi::first();
      $bghome = BgHome::first();
      $berita = Berita::orderBy('created_at', 'desc')->take(4)->get()->toArray();
      $prestasi = Prestasi::get()->take(6);
      $slider = Slider::get()->toArray();
      $pengumuman = Pengumuman::orderBy('created_at', 'desc')->take(3)->get()->toArray();
      return view('smart.index', compact(['visiMisi', 'prestasi', 'berita', 'bghome', 'slider', 'pengumuman']));
    }
}
