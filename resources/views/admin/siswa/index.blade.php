@extends('admin.templates.app')

@section('content')
  <div class="col-lg-12" style="margin-bottom: 110px">
    <h3><i class="fa fa-angle-right"></i> Data Siswa</h3>
    <div class="content-panel" style="padding:10px 10px;margin-bottom:100px">
      <div>
        <a href="#modal-excel" class="btn btn-flat btn-warning" data-toggle="modal"  title="Export Excel"><i class="fa fa-file-excel-o"></i> Import Data</a>
        <a href="{{URL::to('upload/excel/Format.xls')}}" class="btn btn-flat btn-primary"><i class="fa fa-download"></i> Download Format Data</a>
        {{-- <a href="#modal-pdf" class="btn btn btn-danger" data-toggle="modal"  title="download pdf"><i class="fa fa-file-pdf-o"></i> PDF</a> --}}
      </div>
      <hr>
      <div class="row" style="margin-top:10px;">
        <div class="col-xs-12">
          <table id="datatables" class="table table-striped table-bordered" style="text-align:center">
            <thead>
              <th>No</th>
              <th>NISN</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Tanggal Lahir</th>
              <th>Action</th>
            </thead>
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
          <h4 class="modal-title" id="">Import Data Siswa</h4>
        </div>
        <div class="modal-body">
          <form action="{{route('ImportSiswa')}}" method="post" id="frm-excel" enctype="multipart/form-data">
            {{csrf_field()}}
              <div class="form-group">
                <input type="file" name="import_file" id="" class="form-control">
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
  </div>
  
@endsection

@section('customJs')
  <script type="text/javascript">
    $('#datatables').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route('getDataSiswa')}}',
        columns: [
            {data: 'DT_Row_Index', orderable: false, searchable: false},
            {data: 'nisn'},
            {data: 'nama'},
            {data: 'jenis_kelamin'},
            {data: 'tgl_lahir'},
            {data: 'action', name: 'detail', orderable: false, searchable: false},
        ]
    });

    $(document).ready(function() {
      $('#datatables').on('click', '.delete', function() {
        var id = $(this).data('id');
        $.confirm({
              closeAnimation: 'bottom',
              icon: 'fa fa-warning',
              title: 'Alert !',
              content: 'Apakah anda ingin menghapus data ini ?',
              type: 'red',
              typeAnimated: true,
              buttons: {
              hapus: function () {
                    $.get("{{ route('getSiswaDelete') }}", {id: id}, function (data) {
                    toastr.success('Success !', 'Data berhasil di hapus');
                    location.reload();
                  });
                },
              batal: function () {

            },
          }
        });
      });
    })
  </script>
@endsection
