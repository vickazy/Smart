<?php

// Home
Route::get('/',['uses' => 'Home\HomeController@home', 'as' => 'home']);
// Tentang Kami
Route::get('/profil-sekolah', 'TentangKami\ProfilSekolahController@profilSekolah')->name('profil-sekolah');
Route::get('/profil-guru', 'TentangKami\ProfilGuruController@profilGuru')->name('profil-guru');
Route::get('/profil-guru/getDataGuru', 'TentangKami\ProfilGuruController@getDataGuru')->name('smart.getDataGuru');
Route::get('/prestasi', 'TentangKami\PrestasiController@prestasi')->name('prestasi');
Route::get('/sarana-dan-prasarana', 'TentangKami\SarprasController@sarpras')->name('sarpras');
Route::get('/tata-tertib', 'TentangKami\TataTertibController@tataTertib')->name('tertib');
Route::get('/pengumuman', 'Pengumuman\PengumumanController@pengumuman')->name('pengumuman');
Route::get('/pengumuman/id={id}&single', 'Pengumuman\PengumumanController@pengumumanSingle')->name('pengumumanSingle');

// Program
// Route::get('/osis', 'Program\OsisController@osis')->name('osis');
Route::get('/extra-kulikuler', 'Program\ExtraKulikulerController@extraKulikuler')->name('extra');
// Berita
Route::get('/berita', 'Berita\BeritaController@berita')->name('berita');
Route::get('/berita/single/title={title}&id={id}', 'Berita\BeritaController@beritaSingle')->name('berita.single');
// Event
// Route::get('/event', 'Event\EventController@event')->name('event');
// Galeri
Route::get('/galeri', 'Galeri\GaleriController@galeri')->name('galeri');
// Ebook
Route::get('/ebook', 'Ebook\EbookController@ebook')->name('ebook');
// Komite
Route::get('/komite-sekolah', 'Komite\KomiteController@komite')->name('komite');
// Kontak
Route::get('/kontak-kami', 'Kontak\KontakController@kontak')->name('kontak');
Route::post('/kontak-kami', 'Kontak\KontakController@sendEmail')->name('sendEmail');
// === Smart Jurusan === //
Route::get('/jurusan/{nama_jurusan}', 'Kprodi\JurusanController@jurusan')->name('jurusan');
Route::get('/jurusan/{nama_jurusan}/event', 'Kprodi\JurusanController@event')->name('event');
Route::get('/jurusan/{nama_jurusan}/kegiatan', 'Kprodi\JurusanController@kegiatan')->name('kegiatan');
Route::get('/jurusan/{nama_jurusan}/siswa', 'Kprodi\JurusanController@siswa')->name('siswa');
Route::get('/jurusan/{nama_jurusan}/absensi', 'Kprodi\JurusanController@absensi')->name('absensi');

Route::get('/jurusan/{nama_jurusan}/getDataAbsensi', 'Kprodi\JurusanController@getDataAbsensi')->name('getDataAbsensi');

Route::get('/jurusan/{nama_jurusan}/{tgl}/getAbsensiDetail', 'Kprodi\JurusanController@getAbsensiDetail')->name('getAbsensiDetail');

Route::get('/getSiswaJurusan/{jurusan_id}/kelas-12', 'Kprodi\JurusanController@getSiswaKelas12')->name('getSiswaKelas12');
Route::get('/getSiswaJurusan/{jurusan_id}/kelas-11', 'Kprodi\JurusanController@getSiswaKelas11')->name('getSiswaKelas11');
Route::get('/getSiswaJurusan/{jurusan_id}/kelas-10', 'Kprodi\JurusanController@getSiswaKelas10')->name('getSiswaKelas10');
// single event
Route::get('/jurusan/{nama_jurusan}/event/title={nama_event}&id={id}', 'Kprodi\JurusanController@singleEvent')->name('single-event');
Route::get('/jurusan/{nama_jurusan}/kegiatan/title={nama_kegiatan}&id={id}', 'Kprodi\JurusanController@singleKegiatan')->name('single-kegiatan');


//==================//

Route::group(['prefix' => 'admin'], function() {
	// Home
	// Route::get('/home', ['uses' => 'Admin\AdminController@index', 'as' => 'getAdmin', 'middleware' => 'auth']);

	// Admin
	Route::get('/page/login', ['uses' => 'Admin\AdminController@getLoginAdmin', 'as' => 'login'])->middleware('IfAuth');
	Route::post('/page/login', ['uses' => 'Admin\AdminController@postLoginAdmin', 'as' => 'postLoginAdmin'])->middleware('IfAuth');
	Route::get('/page/logout', ['uses' => 'Admin\AdminController@getLogout', 'as' => 'getLogout']);

Route::group(['middleware' => 'NotAuth'], function() {
	// Admin Account
		Route::get('/akun', 'Admin\AdminController@getAkun')->name('getAkun');
		Route::post('/akun', 'Admin\AdminController@postAkun')->name('postAkun');
	// Siswa Terdaftar
	Route::get('/data/siswa', ['uses' => 'Siswa\SiswaController@getSiswa', 'as' => 'getSiswa']);
	Route::get('/data/getDataSiswa', ['uses' => 'Siswa\SiswaController@getDataSiswa', 'as' => 'getDataSiswa']);
	Route::get('/data/siswa/{id}/detail', ['uses' => 'Siswa\SiswaController@getSiswaDetail', 'as' => 'getSiswaDetail']);
	Route::get('/data/siswa/{id}/edit', ['uses' => 'Siswa\SiswaController@getSiswaEdit', 'as' => 'getSiswaEdit']);
	Route::post('/data/siswa/{id}/update', ['uses' => 'Siswa\SiswaController@postSiswaUpdate', 'as' => 'postSiswaUpdate']);
	Route::get('/data/siswa/delete', ['uses' => 'Siswa\SiswaController@getSiswaDelete', 'as' => 'getSiswaDelete']);
	Route::post('/data/siswa/import', ['uses' => 'Siswa\SiswaController@ImportSiswa', 'as' => 'ImportSiswa']);
	// Route::get('/data/siswa/export/{type}', ['uses' => 'Siswa\SiswaController@exportExcelSiswa', 'as' => 'exportExcelSiswa']);
	// Route::post('/data/siswa/pdf/export', ['uses' => 'Siswa\SiswaController@exportPDFSiswa', 'as' => 'exportPDFSiswa']);
	// ==== Berita ==== //
	Route::group(['middleware' => 'berita'], function() {
		Route::get('/berita', 'Berita\BeritaController@adminBerita')->name('admin.berita');
		Route::post('/berita', 'Berita\BeritaController@postBerita')->name('admin.postBerita');
		Route::get('/berita/getDataBerita', 'Berita\BeritaController@getDataBerita')->name('admin.getDataBerita');
		Route::get('/berita/{id}/edit', 'Berita\BeritaController@getEditBerita')->name('admin.getEditBerita');
		Route::post('/berita/{id}/update', 'Berita\BeritaController@postUpdateBerita')->name('admin.postUpdateBerita');
		Route::get('/berita/delete', 'Berita\BeritaController@getDeleteBerita')->name('admin.getDeleteBerita');
		Route::post('/berita/addKategoriBerita', 'Berita\BeritaController@postKategoriBerita')->name('admin.postKategoriBerita');
		Route::get('/berita/akun', 'Berita\BeritaController@getViewBeritaAkun')->name('admin.berita.akun');
		Route::post('/berita/akun', 'Berita\BeritaController@postAkunBerita')->name('postAkunBerita');
	});
	Route::group(['middleware' => 'admin'], function() {
		// ==== profil sekolah ===/
		Route::get('/profil-sekolah', 'TentangKami\ProfilSekolahController@adminProfilSekolah')->name('admin.ProfilSekolah');
		Route::post('/profil-sekolah', 'TentangKami\ProfilSekolahController@postProfilSekolah')->name('admin.postProfilSekolah');
		Route::post('/profil-sekolah/upload-file', 'TentangKami\ProfilSekolahController@galeriProfile')->name('admin.uploadFile');
		Route::get('/profil-sekolah/delete-file', 'TentangKami\ProfilSekolahController@deleteFile')->name('admin.deleteFile');
		//=== profil guru ===//
		Route::get('/profil-guru', 'TentangKami\ProfilGuruController@adminProfilGuru')->name('admin.ProfilGuru');
		Route::post('/profil-guru', 'TentangKami\ProfilGuruController@postProfilGuru')->name('admin.postProfilGuru');
		Route::get('/profil-guru/getDataGuru', 'TentangKami\ProfilGuruController@getDataProfilGuru')->name('admin.getDataProfilGuru');
		Route::get('/profil-guru/{id}/edit', 'TentangKami\ProfilGuruController@getEditProfilGuru')->name('admin.getEditProfilGuru');
		Route::post('/profil-guru/{id}/update', 'TentangKami\ProfilGuruController@postUpdateProfilGuru')->name('admin.postUpdateProfilGuru');
		Route::get('/profil-guru/delete', 'TentangKami\ProfilGuruController@getDeleteProfilGuru')->name('admin.getDeleteProfilGuru');
		//=== komite ===//
		Route::get('/komite', 'Komite\KomiteController@adminKomite')->name('admin.komite');
		Route::post('/komite', 'Komite\KomiteController@postKomite')->name('admin.postKomite');
		Route::get('/komite/getDataKomite', 'Komite\KomiteController@getDataKomite')->name('admin.getDataKomite');
		Route::get('/komite/{id}/edit', 'Komite\KomiteController@getEditKomite')->name('admin.getEditKomite');
		Route::post('/komite/{id}/update', 'Komite\KomiteController@postUpdateKomite')->name('admin.postUpdateKomite');
		Route::get('/komite/delete', 'Komite\KomiteController@getDeleteKomite')->name('admin.getDeleteKomite');
		//=== profil Sarpras ===//
		Route::get('/sarpras', 'TentangKami\SarprasController@adminSarpras')->name('admin.sarpras');
		Route::post('/sarpras', 'TentangKami\SarprasController@postSarpras')->name('admin.postSarpras');
		Route::get('/sarpras/getDataSarpras', 'TentangKami\SarprasController@getDataSarpras')->name('admin.getDataSarpras');
		Route::get('/sarpras/{id}/edit', 'TentangKami\SarprasController@getEditSarpras')->name('admin.getEditSarpras');
		Route::post('/sarpras/{id}/update', 'TentangKami\SarprasController@postUpdateSarpras')->name('admin.postUpdateSarpras');
		Route::get('/sarpras/delete', 'TentangKami\SarprasController@getDeleteSarpras')->name('admin.getDeleteSarpras');
		// === tata Tertib ==//
		Route::get('/tata-tertib', 'TentangKami\TataTertibController@adminTataTertib')->name('admin.tataTertib');
		Route::post('/tata-tertib', 'TentangKami\TataTertibController@postTataTertib')->name('admin.postTataTertib');
		// === Kontak ==//
		Route::get('/kontak', 'Kontak\KontakController@adminKontak')->name('admin.kontak');
		Route::post('/kontak', 'Kontak\KontakController@postKontak')->name('admin.postKontak');
		//=== Galeri ===//
		Route::get('/galeri', 'Galeri\GaleriController@adminGaleri')->name('admin.galeri');
		Route::post('/galeri', 'Galeri\GaleriController@postGaleri')->name('admin.postGaleri');
		Route::get('/galeri/delete', 'Galeri\GaleriController@getDeleteGaleri')->name('admin.getDeleteGaleri');
		//=== Slider ===//
		Route::get('/slider', 'Slider\SliderController@adminSlider')->name('admin.slider');
		Route::post('/slider', 'Slider\SliderController@postSlider')->name('admin.postSlider');
		Route::get('/slider/delete', 'Slider\SliderController@getDeleteSlider')->name('admin.getDeleteSlider');
		//=== Prestasi ===//
		Route::get('/prestasi', 'TentangKami\PrestasiController@adminPrestasi')->name('admin.prestasi');
		Route::post('/prestasi', 'TentangKami\PrestasiController@postPrestasi')->name('admin.postPrestasi');
		Route::get('/prestasi/getDataPrestasi', 'TentangKami\PrestasiController@getDataPrestasi')->name('admin.getDataPrestasi');
		Route::get('/prestasi/{id}/edit', 'TentangKami\PrestasiController@getEditPrestasi')->name('admin.getEditPrestasi');
		Route::post('/prestasi/{id}/update', 'TentangKami\PrestasiController@postUpdatePrestasi')->name('admin.postUpdatePrestasi');
		Route::get('/prestasi/delete', 'TentangKami\PrestasiController@getDeletePrestasi')->name('admin.getDeletePrestasi');
		//=== Galeri ===//
		Route::get('/setting-home', 'BgHome\BgHomeController@adminBgHome')->name('admin.setting-home');
		Route::post('/setting-home', 'BgHome\BgHomeController@postBgHome')->name('admin.postBgHome');
		// === Ketua Prodi === //
		Route::get('/kprodi', 'Kprodi\KprodiController@adminKprodi')->name('admin.kprodi');
		Route::post('/kprodi', 'Kprodi\KprodiController@postKprodi')->name('admin.postKprodi');
		Route::get('/kprodi/getDataGuru', 'Kprodi\KprodiController@getDataKprodi')->name('admin.getDataKprodi');
		Route::get('/kprodi/{id}/edit', 'Kprodi\KprodiController@getEditKprodi')->name('admin.getEditKprodi');
		Route::post('/kprodi/{id}/update', 'Kprodi\KprodiController@postUpdateKprodi')->name('admin.postUpdateKprodi');
		Route::get('/kprodi/delete', 'Kprodi\KprodiController@getDeleteKprodi')->name('admin.getDeleteKprodi');

		// === Jurusan === //
		Route::get('/jurusan', 'Kprodi\JurusanController@adminJurusan')->name('admin.jurusan');
		Route::post('/jurusan', 'Kprodi\JurusanController@postJurusan')->name('admin.postJurusan');
		Route::get('/jurusan/getDataGuru', 'Kprodi\JurusanController@getDataJurusan')->name('admin.getDataJurusan');
		Route::get('/jurusan/{id}/edit', 'Kprodi\JurusanController@getEditJurusan')->name('admin.getEditJurusan');
		Route::post('/jurusan/{id}/update', 'Kprodi\JurusanController@postUpdateJurusan')->name('admin.postUpdateJurusan');
		Route::get('/jurusan/delete', 'Kprodi\JurusanController@getDeleteJurusan')->name('admin.getDeleteJurusan');

		// === ekstra kulikuler ==//
		Route::get('/ekstra-kulikuler', 'Program\ExtraKulikulerController@adminEkstra')->name('admin.ekstra');
		Route::post('/ekstra-kulikuler', 'Program\ExtraKulikulerController@postEkstra')->name('admin.postEkstra');
		Route::get('/ekstra-kulikuler/getDataEkstra', 'Program\ExtraKulikulerController@getDataEkstra')->name('admin.getDataEkstra');
		Route::get('/ekstra-kulikuler/{id}/edit', 'Program\ExtraKulikulerController@getEditEkstra')->name('admin.getEditEkstra');
		Route::post('/ekstra-kulikuler/{id}/update', 'Program\ExtraKulikulerController@postUpdateEkstra')->name('admin.postUpdateEkstra');
		Route::get('/ekstra-kulikuler/delete', 'Program\ExtraKulikulerController@getDeleteEkstra')->name('admin.getDeleteEkstra');
		// ==== Inventaris ==== //
		Route::get('/inventaris', 'Inventaris\InventarisController@index')->name('admin.inventaris');
		Route::post('/inventaris/create', 'Inventaris\InventarisController@postInventaris')->name('admin.postInventaris');
		Route::get('/inventaris/getDataInventaris', 'Inventaris\InventarisController@getDataInventaris')->name('admin.getDataInventaris');
		Route::post('/inventaris/postInventarisUpdate', 'Inventaris\InventarisController@postInventarisUpdate')->name('admin.postInventarisUpdate');
		Route::get('/inventaris/getInventarisDelete', 'Inventaris\InventarisController@getInventarisDelete')->name('admin.getInventarisDelete');
		// === Pengumuman === //
		Route::get('/pengumuman', 'Pengumuman\PengumumanController@index')->name('admin.pengumuman');
		Route::get('/pengumuman/getDataPengumuman', 'Pengumuman\PengumumanController@getDataPengumuman')->name('admin.getDataPengumuman');
		Route::post('/pengumuman/create', 'Pengumuman\PengumumanController@postPengumuman')->name('admin.postPengumuman');
		Route::get('/pengumuman/id={id}&edit', 'Pengumuman\PengumumanController@getPengumumanEdit')->name('admin.getPengumumanEdit');
		Route::post('/pengumuman/id={id}&update', 'Pengumuman\PengumumanController@postPengumumanUpdate')->name('admin.postPengumumanUpdate');
		Route::get('/pengumuman/delete', 'Pengumuman\PengumumanController@getPengumumanDelete')->name('admin.getPengumumanDelete');
	});

	// ==== event === //
	Route::group(['middleware' => 'kprodi'], function() {
		Route::get('/event', 'Event\EventController@adminEvent')->name('admin.event');
		Route::post('/event', 'Event\EventController@postEvent')->name('admin.postEvent');
		Route::get('/event/getDataEvent', 'Event\EventController@getDataEvent')->name('admin.getDataEvent');
		Route::get('/event/{id}/edit', 'Event\EventController@getEditEvent')->name('admin.getEditEvent');
		Route::post('/event/{id}/update', 'Event\EventController@postUpdateEvent')->name('admin.postUpdateEvent');
		Route::get('/event/delete', 'Event\EventController@getDeleteEvent')->name('admin.getDeleteEvent');
		Route::post('/event/addKategoriEvent', 'Event\EventController@postKategoriEvent')->name('admin.postKategoriEvent');
		// === Kegiatan Jurusan === //
		Route::get('/kegiatan', 'Kprodi\KegiatanController@adminKegiatan')->name('admin.kegiatan');
		Route::post('/kegiatan', 'Kprodi\KegiatanController@postKegiatan')->name('admin.postKegiatan');
		Route::get('/kegiatan/getDataGuru', 'Kprodi\KegiatanController@getDataKegiatan')->name('admin.getDataKegiatan');
		Route::get('/kegiatan/{id}/edit', 'Kprodi\KegiatanController@getEditKegiatan')->name('admin.getEditKegiatan');
		Route::post('/kegiatan/{id}/update', 'Kprodi\KegiatanController@postUpdateKegiatan')->name('admin.postUpdateKegiatan');
		Route::get('/kegiatan/delete', 'Kprodi\KegiatanController@getDeleteKegiatan')->name('admin.getDeleteKegiatan');
		//=== Photo Jurusan ===//
		Route::get('/photo-jurusan', 'Kprodi\PhotoJurusanController@adminPhotoJurusan')->name('admin.PhotoJurusan');
		Route::post('/photo-jurusan', 'Kprodi\PhotoJurusanController@postPhotoJurusan')->name('admin.postPhotoJurusan');
		Route::get('/photo-jurusan/delete', 'Kprodi\PhotoJurusanController@getDeletePhotoJurusan')->name('admin.getDeletePhotoJurusan');
		// === Absensi === //
		Route::get('/absensi', 'AbsensiController@index')->name('absensi.index');
		Route::get('/absensi/dataAbsensi', 'AbsensiController@getDataAbsensi')->name('absensi.getDataAbsensi');
		Route::post('/absensi', 'AbsensiController@postAbsensi')->name('admin.postAbsensi');
		Route::get('/absensi/{tgl}/detail', 'AbsensiController@getAbsensiDetail')->name('absensi.getAbsensiDetail');
		Route::get('/absensi/{tgl}/getDataAbsensiDetail', 'AbsensiController@getDataAbsensiDetail')->name('absensi.getDataAbsensiDetail');
		Route::get('/absensi/{tgl}/detail/getDeleteAbsensiSiswa', 'AbsensiController@getDeleteAbsensiSiswa')->name('absensi.getDeleteAbsensiSiswa');
		Route::post('/absensi/{tgl}/update', 'AbsensiController@postAbsensiUpdate')->name('absensi.postAbsensiUpdate');
		Route::post('/absensi/importAbsensi', 'AbsensiController@importAbsensi')->name('absensi.importAbsensi');
		Route::get('/absensi/getDeleteAbsensi', 'AbsensiController@getDeleteAbsensi')->name('absensi.getDeleteAbsensi');
		Route::get('/absensi/getDeleteAbsensiAll', 'AbsensiController@getDeleteAbsensiAll')->name('absensi.getDeleteAbsensiAll');
		// -- history absensi -- //
		Route::get('/absensi/history', 'AbsensiController@history')->name('absensi.history');
		Route::get('/absensi/getDataHistory', 'AbsensiController@getDataHistory')->name('absensi.getDataHistory');
		Route::get('/absensi/history/id={siswa_id}&detail', 'AbsensiController@getDetailHistoryAbsensi')->name('absensi.getDetailHistoryAbsensi');
	});


	// // === Osis ==//
	// Route::get('/osis', 'Program\OsisController@adminOsis')->name('admin.osis');
	// Route::post('/osis', 'Program\OsisController@postOsis')->name('admin.postOsis');
	// Route::get('/osis/getDataOsis', 'Program\OsisController@getDataOsis')->name('admin.getDataOsis');
	// Route::get('/osis/{id}/edit', 'Program\OsisController@getEditOsis')->name('admin.getEditOsis');
	// Route::post('/osis/{id}/update', 'Program\OsisController@postUpdateOsis')->name('admin.postUpdateOsis');
	// Route::get('/osis/delete', 'Program\OsisController@getDeleteOsis')->name('admin.getDeleteOsis');

	//=== Ebook ===//
	Route::group(['middleware' => 'guru'], function() {
		Route::get('/ebook', 'Ebook\EbookController@adminEbook')->name('admin.ebook');
		Route::post('/ebook', 'Ebook\EbookController@postEbook')->name('admin.postEbook');
		Route::get('/ebook/delete', 'Ebook\EbookController@getDeleteEbook')->name('admin.getDeleteEbook');
		Route::get('/ebook/getDataEbook', 'Ebook\EbookController@getDataEbook')->name('admin.getDataEbook');
	});

 });
});


// // PPDB
Route::get('/ppdb/register', ['uses' => 'Ppdb\PpdbController@getRegister', 'as' => 'getPpdb']);
Route::post('/ppdb/register', ['uses' => 'Ppdb\PpdbController@postRegister', 'as' => 'postPpdb']);
// Route::get('/ppdb/download/', ['uses' => 'Ppdb\PpdbController@downloadRegister', 'as' => 'downloadRegister']);
// Route::get('/ppdb/download/peserta/{id}', ['uses' => 'Ppdb\PpdbController@downloadPdf', 'as' => 'downloadPdf']);
// // ppdb kota
// Route::get('/ppdb/register/getKecamatan', ['uses' => 'Siswa\SiswaController@getKecamatan', 'as' => 'getKecamatan']);

