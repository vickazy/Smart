<?php

// Home
Route::get('/',['uses' => 'Home\HomeController@home', 'as' => 'home']);

// Tentang Kami
Route::get('/profil-sekolah', 'TentangKami\ProfilSekolahController@profilSekolah')->name('profil-sekolah');
Route::get('/profil-guru', 'TentangKami\ProfilGuruController@profilGuru')->name('profil-guru');
Route::get('/prestasi', 'TentangKami\PrestasiController@prestasi')->name('prestasi');
Route::get('/sarana-dan-prasarana', 'TentangKami\SarprasController@sarpras')->name('sarpras');
Route::get('/tata-tertib', 'TentangKami\TataTertibController@tataTertib')->name('tertib');
// Program
Route::get('/osis', 'Program\OsisController@osis')->name('osis');
Route::get('/extra-kulikuler', 'Program\ExtraKulikulerController@extraKulikuler')->name('extra');
// Berita
Route::get('/berita', 'Berita\BeritaController@berita')->name('berita');
Route::get('/berita/single/title={title}&id={id}', 'Berita\BeritaController@beritaSingle')->name('berita.single');
// Event
Route::get('/event', 'Event\EventController@event')->name('event');
// Galeri
Route::get('/galeri', 'Galeri\GaleriController@galeri')->name('galeri');
// Ebook
Route::get('/ebook', 'Ebook\EbookController@ebook')->name('ebook');
// Komite
Route::get('/komite-sekolah', 'Komite\KomiteController@komite')->name('komite');
// Kontak
Route::get('/kontak-kami', 'Kontak\KontakController@kontak')->name('kontak');


//==================//

Route::group(['prefix' => 'admin'], function() {
	// Home
	Route::get('/home', ['uses' => 'Admin\AdminController@index', 'as' => 'getAdmin', 'middleware' => 'auth']);
	// Admin
	Route::get('/login', ['uses' => 'Admin\AdminController@getLoginAdmin', 'as' => 'login', 'middleware' => 'guest']);
	Route::post('/login', ['uses' => 'Admin\AdminController@postLoginAdmin', 'as' => 'postLoginAdmin']);
	Route::get('/logout', ['uses' => 'Admin\AdminController@getLogout', 'as' => 'getLogout']);

	// Siswa Terdaftar
	Route::get('/data/siswa', ['uses' => 'Siswa\SiswaController@getSiswa', 'as' => 'getSiswa']);
	Route::get('/data/getDataSiswa', ['uses' => 'Siswa\SiswaController@getDataSiswa', 'as' => 'getDataSiswa']);
	Route::get('/data/siswa/{id}/detail', ['uses' => 'Siswa\SiswaController@getSiswaDetail', 'as' => 'getSiswaDetail']);
	Route::get('/data/siswa/{id}/edit', ['uses' => 'Siswa\SiswaController@getSiswaEdit', 'as' => 'getSiswaEdit']);
	Route::post('/data/siswa/{id}/update', ['uses' => 'Siswa\SiswaController@postSiswaUpdate', 'as' => 'postSiswaUpdate']);
	Route::get('/data/siswa/delete', ['uses' => 'Siswa\SiswaController@getSiswaDelete', 'as' => 'getSiswaDelete']);
	Route::post('/data/siswa/export/{type}', ['uses' => 'Siswa\SiswaController@exportExcelSiswa', 'as' => 'exportExcelSiswa']);
	Route::post('/data/siswa/pdf/export', ['uses' => 'Siswa\SiswaController@exportPDFSiswa', 'as' => 'exportPDFSiswa']);
	// ==== Berita ==== //
	Route::get('/berita', 'Berita\BeritaController@adminBerita')->name('admin.berita');
	Route::post('/berita', 'Berita\BeritaController@postBerita')->name('admin.postBerita');
	Route::get('/berita/getDataBerita', 'Berita\BeritaController@getDataBerita')->name('admin.getDataBerita');
	Route::get('/berita/{id}/edit', 'Berita\BeritaController@getEditBerita')->name('admin.getEditBerita');
	Route::post('/berita/{id}/update', 'Berita\BeritaController@postUpdateBerita')->name('admin.postUpdateBerita');
	Route::get('/berita/delete', 'Berita\BeritaController@getDeleteBerita')->name('admin.getDeleteBerita');
	Route::post('/berita/addKategoriBerita', 'Berita\BeritaController@postKategoriBerita')->name('admin.postKategoriBerita');
	// ==== event === //
	Route::get('/event', 'Event\EventController@adminEvent')->name('admin.event');
	Route::post('/event', 'Event\EventController@postEvent')->name('admin.postEvent');
	Route::get('/event/getDataEvent', 'Event\EventController@getDataEvent')->name('admin.getDataEvent');
	Route::get('/event/{id}/edit', 'Event\EventController@getEditEvent')->name('admin.getEditEvent');
	Route::post('/event/{id}/update', 'Event\EventController@postUpdateEvent')->name('admin.postUpdateEvent');
	Route::get('/event/delete', 'Event\EventController@getDeleteEvent')->name('admin.getDeleteEvent');
	Route::post('/berita/addKategoriEvent', 'Event\EventController@postKategoriEvent')->name('admin.postKategoriEvent');
	// ==== profil sekolah ===/
	Route::get('/profil-sekolah', 'TentangKami\ProfilSekolahController@adminProfilSekolah')->name('admin.ProfilSekolah');
	Route::post('/profil-sekolah', 'TentangKami\ProfilSekolahController@postProfilSekolah')->name('admin.postProfilSekolah');
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
	// === ekstra kulikuler ==//
	Route::get('/ekstra-kulikuler', 'Program\ExtraKulikulerController@adminEkstra')->name('admin.ekstra');
	Route::post('/ekstra-kulikuler', 'Program\ExtraKulikulerController@postEkstra')->name('admin.postEkstra');
	Route::get('/ekstra-kulikuler/getDataEkstra', 'Program\ExtraKulikulerController@getDataEkstra')->name('admin.getDataEkstra');
	Route::get('/ekstra-kulikuler/{id}/edit', 'Program\ExtraKulikulerController@getEditEkstra')->name('admin.getEditEkstra');
	Route::post('/ekstra-kulikuler/{id}/update', 'Program\ExtraKulikulerController@postUpdateEkstra')->name('admin.postUpdateEkstra');
	Route::get('/ekstra-kulikuler/delete', 'Program\ExtraKulikulerController@getDeleteEkstra')->name('admin.getDeleteEkstra');
	// === Osis ==//
	Route::get('/osis', 'Program\OsisController@adminOsis')->name('admin.osis');
	Route::post('/osis', 'Program\OsisController@postOsis')->name('admin.postOsis');
	Route::get('/osis/getDataOsis', 'Program\OsisController@getDataOsis')->name('admin.getDataOsis');
	Route::get('/osis/{id}/edit', 'Program\OsisController@getEditOsis')->name('admin.getEditOsis');
	Route::post('/osis/{id}/update', 'Program\OsisController@postUpdateOsis')->name('admin.postUpdateOsis');
	Route::get('/osis/delete', 'Program\OsisController@getDeleteOsis')->name('admin.getDeleteOsis');
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
	//=== Prestasi ===//
	Route::get('/prestasi', 'TentangKami\PrestasiController@adminPrestasi')->name('admin.prestasi');
	Route::post('/prestasi', 'TentangKami\PrestasiController@postPrestasi')->name('admin.postPrestasi');
	Route::get('/prestasi/getDataPrestasi', 'TentangKami\PrestasiController@getDataPrestasi')->name('admin.getDataPrestasi');
	Route::get('/prestasi/{id}/edit', 'TentangKami\PrestasiController@getEditPrestasi')->name('admin.getEditPrestasi');
	Route::post('/prestasi/{id}/update', 'TentangKami\PrestasiController@postUpdatePrestasi')->name('admin.postUpdatePrestasi');
	Route::get('/prestasi/delete', 'TentangKami\PrestasiController@getDeletePrestasi')->name('admin.getDeletePrestasi');
	//=== Ebook ===//
	Route::get('/ebook', 'Ebook\EbookController@adminEbook')->name('admin.ebook');
	Route::post('/ebook', 'Ebook\EbookController@postEbook')->name('admin.postEbook');
	Route::get('/ebook/delete', 'Ebook\EbookController@getDeleteEbook')->name('admin.getDeleteEbook');
	Route::get('/ebook/getDataEbook', 'Ebook\EbookController@getDataEbook')->name('admin.getDataEbook');
	//=== Galeri ===//
	Route::get('/setting-home', 'BgHome\BgHomeController@adminBgHome')->name('admin.setting-home');
	Route::post('/setting-home', 'BgHome\BgHomeController@postBgHome')->name('admin.postBgHome');

});


// PPDB
Route::get('/ppdb/register', ['uses' => 'Ppdb\PpdbController@getRegister', 'as' => 'getPpdb']);
Route::post('/ppdb/register', ['uses' => 'Ppdb\PpdbController@postRegister', 'as' => 'postPpdb']);
Route::get('/ppdb/download/', ['uses' => 'Ppdb\PpdbController@downloadRegister', 'as' => 'downloadRegister']);
Route::get('/ppdb/download/peserta/{id}', ['uses' => 'Ppdb\PpdbController@downloadPdf', 'as' => 'downloadPdf']);
// ppdb kota
Route::get('/ppdb/register/getKecamatan', ['uses' => 'Siswa\SiswaController@getKecamatan', 'as' => 'getKecamatan']);

