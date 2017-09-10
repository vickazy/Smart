@extends('admin.templates.app')

@section('content')
  <div class="col-lg-12">
    <h3><i class="fa fa-angle-right"></i> Data Siswa Terdaftar</h3>
    <div class="content-panel" style="padding:10px 10px">
      <div class="menu_header" style="text-align:center">
              <a href="#modal-excel" class="btn btn-lg btn-flat btn-warning" data-toggle="modal" style="width:200px !important" title="Export Excel"><i class="fa fa-file-excel-o"></i></a>
                <a href="#modal-pdf" class="btn btn-lg btn btn-danger" data-toggle="modal" style="width:200px !important" title="download pdf"><i class="fa fa-file-pdf-o"></i></a>
      </div>
      <div class="row" style="margin-top:10px;">
        <div class="col-xs-12">
          <table id="datatables" class="table table-striped table-bordered">
            <thead>
              <th>No</th>
              <th>NISN</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Daftar Pada Tanggal</th>
              <th>Action</th>
            </thead>
            <tbody style="text-align:center">
              @foreach ($siswa as $key => $data)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$data['riwayat'][0]['nisn']}}</td>
                  <td>{{$data['nama']}}</td>
                  <td>{{$data['jenis_kelamin']}}</td>
                  <td>{{date('d-m-Y', strtotime($data['created_at']))}}</td>
                  <td>
                    <a href="#!" class="btn btn-info"><i class="fa fa-search"></i></a>
                    <a href="#!" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

{{-- Excel modal --}}
  <div class="modal fade" id="modal-excel" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="">Export data ke Excel</h4>
        </div>
        <div class="modal-body">
          <form action="#!" method="post">
              <div class="form-group">
                <input type="text" name="tanggal" value="" class="form-control daterange">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection
