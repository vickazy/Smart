@extends('ppdb.templates.app')

@section('content')
    	<section>
        <div class="wizard">
          <div class="page-header atas">
            <h2>Isi Data dengan benar</h2>
          </div>
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Data Siswa">
                            <span class="round-tab">
                                <i class="fa fa-file-text"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Riwayat pendidikan">
                            <span class="round-tab">
                                <i class="fa fa-graduation-cap"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Orang Tua">
                            <span class="round-tab">
                                <i class="fa fa-users"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Selesai">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form" class="form-horizontal" action="{{ route('postPpdb') }}" method="post" id="frm-register">
              {{ csrf_field() }}
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <div class="step1">
                          <div class="step_21">
                            <div class="row">
                              <div class="page-header" style="text-align:center">
                                <h4>Data Siswa</h4>
                              </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-lg-2 col-sm-12 control-label">Nama Siswa</label>
                              <div class="col-lg-8 col-sm-12">
                                  <input type="text" class="form-control" id="nama" name="siswa[nama]" placeholder="Nama Siswa" data-validation="required,length" data-validation-length="min3" >
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-12 col-lg-2 control-label">Nama Panggilan</label>
                              <div class="col-lg-8 col-sm-12">
                                  <input type="text" class="form-control" id="nama_panggilan" name="siswa[nama_panggilan]" placeholder="Nama Panggilan" data-validation="required,length" data-validation-length="min3" >
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1" class="col-sm-12 col-lg-2 control-label">Jenis Kelamin</label>
                              <div class="col-lg-8 col-sm-12">
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="siswa[jenis_kelamin]" id="jenis_kelamin1" value="pria" checked>
                                      Pria
                                    </label>
                                    <label>
                                      <input type="radio" name="siswa[jenis_kelamin]" id="jenis_kelamin1" value="wanita">
                                      Wanita
                                    </label>
                                  </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-12 col-lg-2 control-label">Tempat Tanggal Lahir</label>
                              <div class="col-sm-12 col-lg-3">
                                  <input type="text" class="form-control" id="tempat_lahir"  data-validation="required" name="siswa[tempat_lahir]" placeholder="Tempat Lahir">
                              </div>
                              <div class="col-sm-12 col-lg-3">
                                  <input type="text" class="form-control datepicker" id="tlg_lahir"  data-validation="required" name="siswa[tgl_lahir]" placeholder="03-10-1998">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-12 col-lg-2 control-label">Agama</label>
                              <div class="col-lg-8 col-sm-12">
                                  <select class="form-control" name="siswa[agama]" data-validation="required">
                                    <option disabled selected>- Pilih Agama -</option>
                                    <option value="islam">Islam</option>
                                    <option value="kristen katholik">Kristen Katholik</option>
                                    <option value="kristen protestan">Kristen Protestan</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="budha">Budha</option>
                                    <option value="konghucu">Konghucu</option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-12 col-lg-2 control-label">Anak Ke</label>
                              <div class="col-sm-12 col-lg-1">
                                  <input type="text" class="form-control" id="anak_ke"  data-validation="required,number" name="siswa[anak_ke]" data-validation-allowing="range[1;20]">
                              </div>
                              <label for="" class="col-sm-12 col-lg-1 control-label">Dari</label>
                              <div class="col-sm-12 col-lg-1">
                                  <input type="text" class="form-control" id="dari" name="siswa[jumlah_saudara]"  data-validation="required,number" data-validation-allowing="range[1;20]">
                              </div>
                              <label for="" class="col-sm-12 col-lg-1 control-label">Bersaudara</label>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-12 col-lg-2 control-label">Tinggal Bersama</label>
                              <div class="col-lg-8 col-sm-12">
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="tinggal_bersama" id="orang_tua" value="orang_tua" checked>
                                    Orang Tua
                                  </label>
                                  &nbsp;
                                  <label>
                                    <input type="radio" name="tinggal_bersama" id="wali" value="wali">
                                    Wali
                                  </label>
                                  &nbsp;
                                  <label>
                                    <input type="radio" name="tinggal_bersama" id="asrama" value="asrama">
                                    Asrama
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-12 col-lg-2 control-label">Alamat Lengkap</label>
                              <div class="col-lg-8 col-sm-12">
                                  <input type="text" class="form-control" id="alamat"  data-validation="required" name="siswa[alamat]" placeholder="Alamat Lengkap">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-12 col-lg-2 control-label">Kota/Kab</label>
                              <div class="col-lg-8 col-sm-12">
                                  <input type="text" class="form-control" id="kota" name="siswa[kota]"  data-validation="required" placeholder="Kota/Kab">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-12 col-lg-2 control-label">Kecamatan</label>
                              <div class="col-lg-8 col-sm-12">
                                  <input type="text" class="form-control" id="kecamatan"  data-validation="required" name="siswa[kecamatan]" placeholder="Kecamatan">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-12 col-lg-2 control-label">Kelurahan</label>
                              <div class="col-lg-8 col-sm-12">
                                  <input type="text" class="form-control" id="kelurahan"  data-validation="required" name="siswa[kelurahan]" placeholder="Kelurahan">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label">RT</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control" id="rt" name="siswa[rt]"  placeholder="" data-validation="number, required" data-validation-allowing="range[1;50]">
                              </div>
                              <label for="inputEmail3" class="col-sm-1 control-label">RW</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control" id="rw" name="siswa[rw]"  placeholder="" data-validation="number,required" data-validation-allowing="range[1;50]">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-12 col-lg-2 control-label">Kode Pos</label>
                              <div class="col-lg-8 col-sm-12">
                                  <input type="text" class="form-control" id="kode_pos"  data-validation="required,number" name="siswa[kode_pos]" placeholder="Kode Pos">
                              </div>
                            </div>
                        </div>
                        </div>
                      </div>
                        <ul class="list-inline pull-right" style="margin-top: 10px">
                            <li><button type="button" class="btn btn-primary next-step">Selanjutnya</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <div class="step2">
                            <div class="step_21">
                                <div class="row">
                                  <div class="page-header" style="text-align:center">
                                    <h4>Data Riwayat Pendidikan</h4>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-12 col-lg-2 control-label">Nama Asal Sekolah</label>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" class="form-control" id="asal_sekolah"  data-validation="required" name="riwayat[asal_sekolah]" placeholder="Nama Asal Sekolah" data-validation="required">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-12 col-lg-2 control-label">Alamat Sekolah</label>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" class="form-control" id="alamat_sekolah"  data-validation="required" name="riwayat[alamat_sekolah]" placeholder="Alamat Sekolah" data-validation="required">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-12 col-lg-2 control-label">NISN</label>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" class="form-control" id="nisn"  data-validation="required,number,length" name="riwayat[nisn]" placeholder="NISN" data-validation-length="max11,min10">
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Sebelumnya</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Selanjutnya</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <div class="step1">

                          {{-- Wali --}}
                          <div class="row" style="display: none;" id="wali_box">
                            <div class="col-lg-8 col-lg-offset-2 col-sm-12">
                              <div class="step_21">
                                <div class="page-header" style="text-align:center">
                                  <h4>Data Wali</h4>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Nama</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="nama"  data-validation="required" name="wali[nama]" placeholder="Nama" data-validation="required,length" data-validation-length="min3">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Tempat Lahir</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="tempat_lahir"  data-validation="required" name="wali[tempat_lahir]" placeholder="tempat lahir" data-validation="required">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Tanggal Lahir</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control datepicker"  data-validation="required" id="tanggal_lahir" name="wali[tgl_lahir]" placeholder="03-10-1998">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Alamat Lengkap</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="alamat"  data-validation="required" name="wali[alamat]" placeholder="Alamat Lengkap">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Pekerjaan</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="pekerjaan"  data-validation="required" name="wali[pekerjaan]" placeholder="Pekerjaan">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Instansi</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="instansi"  data-validation="required" name="wali[instansi]" placeholder="Instansi">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Penghasilan/Bulan</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="penghasilan"  data-validation="required" name="wali[penghasilan]" placeholder="Penghasilan/Bulan">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Pendidikan Terakhir</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="pendidikan_terakhir"  data-validation="required" name="wali[pendidikan_terakhir]" placeholder="Pendidikan Terakhir">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">NO. HP</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="no_hp"  data-validation="required,number" name="wali[no_hp]" placeholder="NO. HP">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Email</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="email" class="form-control" id="email" name="wali[email]" placeholder="Email" data-validation="email,required" >
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          {{-- Orang Tua --}}
                          <div class="row" id="ortu">
                            <div class="col-lg-6 col-sm-12">
                              <div class="step_21">
                                <div class="page-header" style="text-align:center">
                                  <h4>Data Orang Tua (Ayah)</h4>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Nama</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="nama"  data-validation="required" name="ayah[nama]" placeholder="Nama">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Tempat Lahir</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="tempat_lahir"  data-validation="required" name="ayah[tempat_lahir]" placeholder="tempat lahir">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Tanggal Lahir</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control datepicker"  data-validation="required" id="tanggal_lahir" name="ayah[tgl_lahir]" placeholder="03-10-1998">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Alamat Lengkap</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="alamat"  data-validation="required" name="ayah[alamat]" placeholder="Alamat Lengkap">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Pekerjaan</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="pekerjaan"  data-validation="required" name="ayah[pekerjaan]" placeholder="Pekerjaan">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Instansi</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="instansi"  data-validation="required" name="ayah[instansi]" placeholder="Instansi">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Penghasilan/Bulan</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="penghasilan"  data-validation="required" name="ayah[penghasilan]" placeholder="Penghasilan/Bulan">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Pendidikan Terakhir</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="pendidikan_terakhir"  data-validation="required" name="ayah[pendidikan_terakhir]" placeholder="Pendidikan Terakhir">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">NO. HP</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="no_hp"  data-validation="required,number" name="ayah[no_hp]" placeholder="NO. HP">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Email</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="email" class="form-control" id="email" name="ayah[email]" placeholder="Email" data-validation="email,required" >
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <div class="step_21">
                                <div class="page-header" style="text-align:center">
                                  <h4>Data Orang Tua (Ibu)</h4>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Nama</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="nama"  data-validation="required" name="ibu[nama]" placeholder="Nama">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Tempat Lahir</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="tempat_lahir"  data-validation="required" name="ibu[tempat_lahir]" placeholder="tempat lahir">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Tanggal Lahir</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control datepicker"  data-validation="required" id="tanggal_lahir" name="ibu[tgl_lahir]" placeholder="03-10-1998">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Alamat Lengkap</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="alamat"  data-validation="required" name="ibu[alamat]" placeholder="Alamat Lengkap">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Pekerjaan</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="pekerjaan"  data-validation="required" name="ibu[pekerjaan]" placeholder="Pekerjaan">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Instansi</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="instansi"  data-validation="required" name="ibu[instansi]" placeholder="Instansi">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Penghasilan/Bulan</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="penghasilan"  data-validation="required" name="ibu[penghasilan]" placeholder="Penghasilan/Bulan">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Pendidikan Terakhir</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="pendidikan_terakhir"  data-validation="required" name="ibu[pendidikan_terakhir]" placeholder="Pendidikan Terakhir">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">NO. HP</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="text" class="form-control" id="no_hp"  data-validation="required" name="ibu[no_hp]" placeholder="NO. HP">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-12 col-lg-4 control-label">Email</label>
                                  <div class="col-lg-8 col-sm-12">
                                      <input type="email" class="form-control" id="email" name="ibu[email]" placeholder="Email"  data-validation="required,email">
                                  </div>
                                </div>
                            </div>
                            </div>
                          </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Sebelumnya</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Selanjutnya</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <div class="step44">
                            <div class="selesai">
                              <h3>Selesai</h3>
                              <i class="fa fa-check-circle-o fa-5x" style="font-size: 200px;color: #009b4c;"></i>
                              <h4>Pastikan data yang anda isi sudah benar</h4>
                              <h4>Silahkan klik tombol Kirim</h4>
                              <div class="" style="width: 200px; margin:0 auto;">
                                <button type="submit" id="kirim" class="btn btn-flat btn-block btn-lg btn-primary">Kirim <i class="fa fa-send"></i></button>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
@endsection
