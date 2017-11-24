<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Data Siswa</title>
        <body>
            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
                .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
                .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
                .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
            </style>

            <div style="font-family:Arial; font-size:12px;">
                <center><h2>Data Siswa {{date('d-m-Y', strtotime($dari))}} sampai {{date('d-m-Y', strtotime($sampai))}}</h2></center>
            </div>
            <br>
            <table class="tg">
              <tr>
                <th class="tg-3wr7">No.<br></th>
                <th class="tg-3rwr7">NISN</th>
                <th class="tg-3rwr7">Nama Siswa</th>
                <th class="tg-3rwr7">Jenis Kelamin</th>
                <th class="tg-3rwr7">Tempt/Tgl Lahir</th>
                <th class="tg-3rwr7">Agama</th>
                <th class="tg-3rwr7">Anak Ke</th>
                <th class="tg-3rwr7">Alamat Lengkap</th>
                <th class="tg-3rwr7">Tinggal Bersama</th>
              </tr>
              <?php $no = 1; ?>
            @for ($i = 0; $i < count($siswa); $i++)
              <tr>
                <td class="tg-rv4w" width="2%">{{ $no++ }}.</td>
                <td class="tg-rv4w">{{$siswa[$i]['riwayat'][0]['nisn'] }}</td>
                <td class="tg-rv4w">{{ $siswa[$i]['nama'] }}</td>
                <td class="tg-rv4w">{{$siswa[$i]['jenis_kelamin'] }}</td>
                <td class="tg-rv4w">{{$siswa[$i]['tempat_lahir']. ', ' . date('d-m-Y', strtotime($siswa[$i]['tgl_lahir'])) }}</td>
                <td class="tg-rv4w">{{$siswa[$i]['agama'] }}</td>
                <td class="tg-rv4w">{{$siswa[$i]['anak_ke'] .' dari '. $siswa[$i]['jumlah_saudara'] . ' bersaudara'  }}</td>
                <td class="tg-rv4w">{{$siswa[$i]['alamat'] . ' kota/kab. ' .$siswa[$i]['kota'] . ' kec. '.$siswa[$i]['kecamatan'].' kel. '.$siswa[$i]['kelurahan'].' rt. ' . $siswa[$i]['rt']. ' rw. '. $siswa[$i]['rw'].' kode pos: ' .$siswa[$i]['kode_pos'] }}</td>
                <td class="tg-rv4w">{{$siswa[$i]['tinggal_bersama'] }}</td>
              </tr>
              @endfor
            </table>
        </body>
    </head>
</html>
