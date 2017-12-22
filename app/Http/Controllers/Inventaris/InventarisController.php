<?php

namespace App\Http\Controllers\Inventaris;

use App\Http\Controllers\Controller;
use App\Models\Inventaris\Inventaris;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InventarisController extends Controller
{
    public function index() {
    	return view('admin.inventaris.index');
    }

    public function postInventaris(Request $request) {
    	$inventaris = Inventaris::create($request->all());
    	return response()->json($inventaris);
    }

    public function getDataInventaris() {
    	$inventaris = Inventaris::orderBy('created_at', 'desc')->get()->toArray();
    	$datatables = DataTables::of($inventaris)
    		->editColumn('nama', function($inventaris) {
    			return $inventaris['nama'];
    		})
    		->editColumn('no_registrasi', function($inventaris) {
    			return $inventaris['no_registrasi'];
    		})
    		->addColumn('action', function($inventaris) {
    			return '<a href="#modal-edit" class="btn btn-warning btn-edit" data-toggle="modal" data-nama="'.$inventaris['nama'].'" data-no_registrasi="'.$inventaris['no_registrasi'].'" data-jumlah="'.$inventaris['jumlah'].'" data-tempat="'.$inventaris['tempat'].'"><i class="fa fa-edit"></i></a>&nbsp;<a href="#!delete" class="btn btn-danger btn-delete" data-id="'.$inventaris['id'].'"><i class="fa fa-trash"></i></a>';
    		})
    		->addIndexColumn();

    	return $datatables->make(true);
    }

    public function postInventarisUpdate(Request $request) {
    	$inventaris = Inventaris::update($request->all());
    	return response()->json($inventaris);
    }

    public function getInventarisDelete(Request $request) {
        $inventaris = Inventaris::find($request['id'])->delete();
        return response()->json($inventaris);
    }
}
