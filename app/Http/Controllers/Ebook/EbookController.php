<?php

namespace App\Http\Controllers\Ebook;

use Illuminate\Http\Request;
use App\Models\Content\Ebook;
use File, Storage, DB, DataTables;
use App\Http\Controllers\Controller;

class EbookController extends Controller
{
    public function ebook() {
    	$ebook = Ebook::paginate(5);
    	return view('smart.ebook.ebook', compact('ebook'));
    }

    public function adminEbook() {
    	return view('admin.ebook.index');
    }

     public function getDataEbook() {
    	DB::statement(DB::raw('set @rownum=0'));
        $data = Ebook::orderBy('created_at', 'desc')->get();

        $datatables = DataTables::of($data)
          ->addColumn('action', function($data) {
            return '<a href="#!" class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';
          })
          ->addIndexColumn();

        return $datatables->make(true);
    }

    public function postEbook(Request $request) {
    	// dd($request->all());
      $this->validate($request, [
        'file_path' => 'required',
      ]);

      $data = new Ebook;
      	$data->nama = $request['nama'];
        $name = $request->file('file_path');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        // dd($newName);
        $request->file('file_path')->move(public_path('upload/ebook/'), $newName);
        $data->file_path = $newName;
      $data->save();
      return redirect()->route('admin.ebook')->with('success', 'Ebook berhasil ditambahkan');
    }

    public function getDeleteEbook(Request $request) {
      $data = Ebook::find($request->id);
      File::delete(public_path('upload/ebook/'.$data['file_path']));
      $data->delete();

      return response()->json($data);
    }
}
