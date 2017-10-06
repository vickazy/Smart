<?php
namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Models\Content\Event;
use App\Models\Kprodi\Kprodi;
use DB, DataTables, Image, File;
use App\Models\Content\KategoriEvent;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function event() {
      $event = Event::orderBy('created_at', 'desc')->paginate(5);
      $kategoriEvent = KategoriEvent::get()->toArray();
    	return view('smart.event.event', compact(['event', 'kategoriEvent']));
    }

    public function adminEvent() {
      $kategoriEvent = KategoriEvent::get()->toArray();
      $jurusan_id = auth()->guard('kprodi')->user()->jurusan_id;
      $kprodi = Kprodi::with('jurusan')->where('jurusan_id', $jurusan_id)->first();
    	return view('admin.event.index', ['kategoriEvent' => $kategoriEvent, 'kprodi' => $kprodi]);
    }

    public function getDataEvent() {
    	DB::statement(DB::raw('set @rownum=0'));
        $data = Event::with('kategoriEvent')->orderBy('created_at', 'desc')->get();

        $datatables = DataTables::of($data)
          ->editColumn('tgl_event', function($tgl_event) {
            return date('d-m-Y', strtotime($tgl_event->tgl_event));
          })
          ->addColumn('action', function($data) {
            return '<a href="/admin/event/'.$data->id.'/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';
          })
          ->addIndexColumn();

        return $datatables->make(true);
    }

    public function postEvent(Request $request) {
      // dd($request->all());
      $this->validate($request, [
        'judul' => 'required',
        'tgl_event' => 'required',
        'isi'   =>  'required',
        'tempat'   =>  'required'
      ]);

      $data = new Event;
      $data->judul = $request['judul'];
      $data->isi = $request['isi'];
      $data->tempat = $request['tempat'];
      $data->tgl_event = $request['tgl_event'];
      $data->kategori_event_id = $request['kategori_event_id'];
      $data->jurusan_id = $request['jurusan_id'];
      if ($request->hasFile('photo')) {
        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/event/' . $newName));

        $data->photo = $newName;
      }

      $data->save();
      return redirect()->route('admin.event')->with('success', 'Event berhasil ditambahkan');
    }

    public function getEditEvent($id) {
      $data = Event::findOrFail($id);
      $kategoriEvent = KategoriEvent::get()->toArray();
      // dd($data);
      return view('admin.event.edit', ['kategoriEvent' => $kategoriEvent, 'data' => $data]);
    }

    public function postUpdateEvent(Request $request, $id) {
      $this->validate($request, [
        'judul' => 'required',
        'tempat' => 'required',
        'tgl_event' => 'required',
        'isi'   =>  'required'
      ]);
      // dd($request->all())
      $data = Event::find($id);
      $data->judul = $request['judul'];
      $data->isi = $request['isi'];
      $data->tempat = $request['tempat'];
      $data->tgl_event = $request['tgl_event'];
      $data->kategori_event_id = $request['kategori_event_id'];
      $data->jurusan_id = $request['jurusan_id'];
      if ($request->hasFile('photo')) {
        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/kegiatan/' . $newName));

        $data->photo = $newName;
      }
      $data->save();
      return redirect()->back()->with('success', 'Berita berhasil di update');
    }

    public function getDeleteEvent(Request $request) {
      $data = Event::find($request->id);
      $data->delete();

      return response()->json($data);
    }

    public function postKategoriEvent(Request $request) {
      $data = KategoriEvent::create($request->all());
      return response()->json($data);
    }
}
