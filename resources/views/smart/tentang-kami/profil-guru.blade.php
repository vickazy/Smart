@extends('smart.templates.app')

@section('content')

<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Profil Guru</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Profil Guru</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  </section><!--/#Page header-->

  <section class="container" style="min-height: 950px;margin-top: 90px;">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Daftar Guru</h3>
      </div>
      <div class="panel-body">
        <div class="col-lg-12 col-xs-12">
          <div class="table-responsive">
          <table id="datatables" class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Mata Pelajaran</th>
                <th>Detail</th>
              </tr>
            </thead>
          </table>
        </div>
        </div>
      </div>
    </div>

    {{-- Modal Detail --}}
    <div class="modal fade" id="modal-detail">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Detail Guru</h4>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="col-lg-3 col-xs-12">
              <img id="img" src="" class="img-responsive">
            </div>
            <div class="col-lg-9 col-xs-12">
              <table class="table">
                <tr>
                  <td>NIM</td>
                  <td>:</td>
                  <td id="nim"></td>
                </tr>
                <tr>
                  <td>Nama Guru</td>
                  <td>:</td>
                  <td id="nama-guru"></td>
                </tr>
                <tr>
                  <td>Mata Pelajaran</td>
                  <td>:</td>
                  <td id="mata-pelajaran"></td>
                </tr>
                <tr>
                  <td>Jam Mengajar</td>
                  <td>:</td>
                  <td id="jam-mengajar"></td>
                </tr>
                <tr>
                  <td>Status Golongan</td>
                  <td>:</td>
                  <td id="status-golongan"></td>
                </tr>
                <tr>
                  <td>Terhitung Mulai Tgl</td>
                  <td>:</td>
                  <td id="terhitung-mulai-tgl"></td>
                </tr>
              </table>
            </div>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>






    {{-- box theme --}}

    {{-- @foreach($data->chunk(3) as $guru)
    <div class="row" style="margin-top: 50px;margin-bottom: 50px">
      @foreach($guru as $value)
      <div class="col-lg-4 col-md-4 wow fadeInDown" data-wow-duration="1500ms">
        <div style="box-shadow: 2px 2px 5px #aaa; padding: 10px 2px;">
          <div style="text-align:center;" class="img-guru">
            <img src="{{URL::to('upload/tentang-kami/profil-guru/'. $value['photo'])}}" alt="" class="img-circle" width="200px" height="200px">
            <div style="width:100%;margin-top:20px">
              <h3>{{$value['nama']}}</h3>
            </div>
            <div style="margin-top:10px;text-align:center;" class="img-guru">
              <p style="font-size: 14px">{{$value['bidang']}}</p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @endforeach --}}

  </section>

@endsection

@section('customJs')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatables').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route('smart.getDataGuru')}}',
        columns: [
          {data: 'DT_Row_Index', orderable: false, searchable: false},
          {data: 'nama'},
          {data: 'mata_pelajaran'},
          {data: 'action'},
        ]
      });

      $('#datatables').on('click', '.detail', function() {
        const nim = $(this).data('nim');
        const nama = $(this).data('nama');
        const mata_pelajaran = $(this).data('bidang');
        const jam_mengajar = $(this).data('jam_mengajar');
        const status_golongan = $(this).data('status_golongan');
        const terhitung_mulai_tgl = $(this).data('terhitung_mulai_tgl');
        const img = $(this).data('img');
        // console.log(nim,nama,mata_pelajaran,jam_mengajar,status_golongan,terhitung_mulai_tgl);

        $('#nim').text(nim);
        $('#nama-guru').text(nama);
        $('#mata-pelajaran').text(mata_pelajaran);
        $('#jam-mengajar').text(jam_mengajar);
        $('#status-golongan').text(status_golongan);
        $('#terhitung-mulai-tgl').text(terhitung_mulai_tgl);
        $('#img').attr('src', '/upload/tentang-kami/profil-guru/'+img);
      });

    });
  </script>
@endsection
