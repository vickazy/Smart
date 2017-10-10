@extends("smart.templates.app")
@section('customCss')
<link rel="stylesheet" href="{{URL::to('admin/css/datatables.bootstrap.min.css')}}">
<style type="text/css">
    .menu li {
        display: inline-block;
        padding: 5px;
    }
</style>
@endsection
@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>{{ $nama }}</h2>
                    <ul class="menu">
                        <li><a href="{{route('event', strtolower(str_slug($nama)))}}" class="btn btn-default">Event</a></li>
                        <li><a href="{{route('kegiatan', strtolower(str_slug($nama)))}}" class="btn btn-default">Kegiatan</a></li>
                        <li><a href="{{route('siswa', strtolower(str_slug($nama)))}}" class="btn btn-default">Siswa</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->
    <div class="container" style="background-color: white;margin:50px auto">
        <div class="col-xs-12 wow fadeInLeft" data-wow-duration="1500px">
            <h3 style="text-align: center;margin-bottom: 30px">Daftar Siswa Jurusan {{$nama}}</h3>
            <table id="datatables" class="table table-striped table-bordered" style="text-align:center">
                <thead>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                </thead>
            </table>
        </div>
    </div>
    @endsection
    @section('customJs')
    <script src="{{URL::to('node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::to('admin/js/datatables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">
    $('#datatables').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{route('getSiswaJurusan', $data[0]['id'])}}',
    columns: [
    {data: 'DT_Row_Index', orderable: false, searchable: false},
    {data: 'nama'},
    {data: 'kelas'},
    {data: 'jenis_kelamin'},
    ]
    });
    </script>
    @endsection