<?php

namespace App\Http\Controllers\Program;

use Illuminate\Http\Request;
use App\Models\Content\EkstraKulikuler;
use DB, DataTables, Image, File;
use App\Http\Controllers\Controller;

class ExtraKulikulerController extends Controller
{
    public function extraKulikuler() {
    	$data = EkstraKulikuler::get();
    	return view('smart.program.extra-kulikuler', compact('data'));
    }

    public function adminEkstra() {
    	return view('admin.ekstra-kulikuler.index');
    }

    public function getDataEkstra() {
    	DB::statement(DB::raw('set @rownum=0'));
        $data = EkstraKulikuler::orderBy('created_at', 'desc')->get();

        $datatables = DataTables::of($data)
          ->editColumn('photo', function($photo) {
          	return '<img src="/upload/program/ekstra/'. $photo['photo'] .'" class="img-thumbnail" width="100" height="100" />';
          })
          ->addColumn('action', function($data) {
            return '<a href="/admin/ekstra-kulikuler/'.$data->id.'/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';
          })
          ->rawColumns(['photo', 'action'])
          ->addIndexColumn();

        return $datatables->make(true);
    }

    public function postEkstra(Request $request) {
      $this->validate($request, [
        'nama' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'isi'   =>  'required'
      ]);

      $data = new EkstraKulikuler;
      $data->nama = $request['nama'];
      $data->isi = $request['isi'];
      if ($request->hasFile('photo')) {
        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/program/ekstra/' . $newName));

        $data->photo = $newName;
      }

      $data->save();
      return redirect()->route('admin.ekstra')->with('success', 'Ekstra berhasil ditambahkan');
    }

    public function getEditEkstra($id) {
      $data = EkstraKulikuler::findOrFail($id);
      return view('admin.ekstra-kulikuler.edit', ['data' => $data]);
    }

    public function postUpdateEkstra(Request $request, $id) {
      $this->validate($request, [
        'nama' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'isi'   =>  'required'
      ]);

      $data = EkstraKulikuler::find($id);
      // dd($data);
      $data->nama = $request['nama'];
      $data->isi = $request['isi'];
      if ($request->hasFile('photo')) {
        // old file
        $oldPhoto = $data->photo;
        File::delete(public_path('upload/program/ekstra/'. $oldPhoto));

        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/program/ekstra/' . $newName));

        $data->photo = $newName;
      }
      // dd($data);
      $data->save();
      return redirect()->back()->with('success', 'Ekstra berhasil di update');
    }

    public function getDeleteEkstra(Request $request) {
      $data = EkstraKulikuler::find($request->id);
      File::delete(public_path('upload/program/ekstra/'.$data['photo']));
      $data->delete();

      return response()->json($data);
    }
}
