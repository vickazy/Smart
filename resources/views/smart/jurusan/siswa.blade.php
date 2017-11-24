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
            <span><h4>Kelas XII</h4></span>
            <hr>
            @for($i = 0; $i < count($kelas12); $i++)
            <div class="table-responsive">
                <table  class="table table-striped table-bordered datatables" style="text-align:center">
                    <thead>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                    </thead>
                    <tbody>
                        @foreach($siswa12 as $key => $value)
                        @if($kelas12[$i]['kelas'] == $value['kelas'])
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$value['nama']}}</td>
                            <td>{{$value['kelas']}}</td>
                            <td>{{$value['jenis_kelamin']}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endfor
        </div>
    </div>
    <div class="container" style="background-color: white;margin:50px auto">
        <div class="col-xs-12 wow fadeInLeft" data-wow-duration="1500px">
            <span><h4>Kelas XI</h4></span>
            <hr>
            @for($i = 0; $i < count($kelas11); $i++)
            <div class="table-responsive">
                <table id="kelas11" class="table table-striped table-bordered datatables" style="text-align:center">
                    <thead>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                    </thead>
                    <tbody>
                        @foreach($siswa11 as $key => $value)
                        @if($kelas11[$i]['kelas'] == $value['kelas'])
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$value['nama']}}</td>
                            <td>{{$value['kelas']}}</td>
                            <td>{{$value['jenis_kelamin']}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endfor
        </div>
    </div>
    <div class="container" style="background-color: white;margin:50px auto">
        <div class="col-xs-12 wow fadeInLeft" data-wow-duration="1500px">
            <span><h4>Kelas X</h4></span>
            <hr>
            @for($i = 0; $i < count($kelas10); $i++)
            <div class="table-responsive">
                <table id="kelas10" class="table table-striped table-bordered datatables" style="text-align:center">
                    <thead>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                    </thead>
                    <tbody>
                        @foreach($siswa10 as $key => $value)
                        @if($kelas10[$i]['kelas'] == $value['kelas'])
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$value['nama']}}</td>
                            <td>{{$value['kelas']}}</td>
                            <td>{{$value['jenis_kelamin']}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endfor
        </div>
    </div>
    @endsection
    @section('customJs')
    <script src="{{URL::to('node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::to('admin/js/datatables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.datatables').dataTable();
        // $.get("{{--route('getSiswaKelas12', $data[0]['id'])--}}", function(data) {
        //     console.log(data);
        // });
    //     $('#kelas12').DataTable({
    // processing: true,
    // serverSide: true,
    // ajax: '{{--route('getSiswaKelas12', $data[0]['id'])--}}',
    // columns: [
    // {data: 'DT_Row_Index', orderable: false, searchable: false},
    // {data: 'nama'},
    // {data: 'kelas'},
    // {data: 'jenis_kelamin'},
    // ]
    // });
    // $('#kelas11').DataTable({
    // processing: true,
    // serverSide: true,
    // ajax: '{{--route('getSiswaKelas11', $data[0]['id'])--}}',
    // columns: [
    // {data: 'DT_Row_Index', orderable: false, searchable: false},
    // {data: 'nama'},
    // {data: 'kelas'},
    // {data: 'jenis_kelamin'},
    // ]
    // });
    // $('#kelas10').DataTable({
    // processing: true,
    // serverSide: true,
    // ajax: '{{--route('getSiswaKelas10', $data[0]['id'])--}}',
    // columns: [
    // {data: 'DT_Row_Index', orderable: false, searchable: false},
    // {data: 'nama'},
    // {data: 'kelas'},
    // {data: 'jenis_kelamin'},
    // ]
    // });
    })
    </script>
    @endsection