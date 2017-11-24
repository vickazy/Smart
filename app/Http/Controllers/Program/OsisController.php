<?php
namespace App\Http\Controllers\Program;

use Illuminate\Http\Request;
use App\Models\Osis\Osis;
use DB, DataTables, Image, File;
use App\Http\Controllers\Controller;

class OsisController extends Controller
{
    public function osis() {
      $osis = Osis::get();
    	return view('smart.program.osis', compact('osis'));
    }

    public function adminOsis() {
    	return view('admin.osis.index');
    }

    public function getDataOsis() {
    	DB::statement(DB::raw('set @rownum=0'));
        $data = Osis::orderBy('created_at', 'desc')->get();

        $datatables = DataTables::of($data)
          ->editColumn('photo', function($photo) {
          	return '<img src="/upload/program/osis/'. $photo['photo'] .'" class="img-circle" width="100" height="100" />';
          })
          ->addColumn('action', function($data) {
            return '<a href="/admin/osis/'.$data->id.'/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';
          })
          ->rawColumns(['photo', 'action'])
          ->addIndexColumn();

        return $datatables->make(true);
    }

    public function postOsis(Request $request) {
      $this->validate($request, [
        'nama' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'jabatan'   =>  'required'
      ]);

      $data = new Osis;
      $data->nama = $request['nama'];
      $data->jabatan = $request['jabatan'];
      if ($request->hasFile('photo')) {
        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/program/osis/' . $newName));

        $data->photo = $newName;
      }

      $data->save();
      return redirect()->route('admin.osis')->with('success', 'Osis berhasil ditambahkan');
    }

    public function getEditOsis($id) {
      $data = Osis::findOrFail($id);
      return view('admin.osis.edit', ['data' => $data]);
    }

    public function postUpdateOsis(Request $request, $id) {
      $this->validate($request, [
        'nama' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'jabatan'   =>  'required'
      ]);

      $data = Osis::find($id);
      // dd($data);
      $data->nama = $request['nama'];
      $data->jabatan = $request['jabatan'];
      if ($request->hasFile('photo')) {
        // old file
        $oldPhoto = $data->photo;
        File::delete(public_path('upload/program/osis/'. $oldPhoto));

        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/program/osis/' . $newName));

        $data->photo = $newName;
      }
      // dd($data);
      $data->save();
      return redirect()->back()->with('success', 'Osis berhasil di update');
    }

    public function getDeleteOsis(Request $request) {
      $data = Osis::find($request->id);
      File::delete(public_path('upload/program/osis/'.$data['photo']));
      $data->delete();

      return response()->json($data);
    }
}
