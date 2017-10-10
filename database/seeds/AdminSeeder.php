<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\User;
// use App\Models\Content\VisiMisi;
// use App\Models\Content\Sarpras;
// use App\Models\Content\Event;
// use App\Models\Osis\Osis;
// use App\Models\Content\TataTertib;
// use App\Models\Content\Ebook;
// use App\Models\Content\KategoriBerita;
// use App\Models\Content\KategoriEvent;
// use App\Models\Content\Galeri;
// use App\Models\Content\Berita;
// use App\Models\Content\EkstraKulikuler;
// use App\Models\Content\Kontak;
use App\Models\Guru\Guru;
use App\Models\KProdi\KProdi;
use App\Models\KProdi\Jurusan;
// use App\Models\Guru\Komite;
// use App\Models\Content\Prestasi;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        // For User 
        // ================================
        User::create([
          'username' => 'admin',
          'password' => bcrypt('admin')
        ]);
        
        $guru = new Guru;
        $guru->username = 'guru';
        $guru->password = bcrypt('guru');
        $guru->nama = 'guru';
        $guru->bidang = 'guru';
        $guru->photo = 'guru';
        $guru->save();

        $KProdi = new KProdi;
        $KProdi->username = 'kprodi';
        $KProdi->password = bcrypt('kprodi');
        $KProdi->nama = 'kprodi';
        $KProdi->jurusan_id = 1;
        $KProdi->photo = 'kprodi';
        $KProdi->save();
        // ================================
        

        // Jurusan
        $data = [
            'teknik kendaraan ringan', 
            'teknik elektronika industri',
            'multimedia',
            'kriya tekstil',
            'kriya kulit',
            'tata busana'
        ];
        for ($i=0; $i <6 ; $i++) { 
            $jurusan = new Jurusan;
            $jurusan->nama_jurusan = $data[$i];
            $jurusan->deskripsi = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit numquam blanditiis eaque accusamus esse consequuntur aspernatur deleniti enim facilis, tenetur odio nam nemo aperiam illum eligendi ullam atque, cum distinctio.';
            $jurusan->save();
        }


        // data visimisi
//         VisiMisi::create([
//             'nama' => 'Slamet',
//             'quote' => 'Bellajarlah dengan sungguh sunggu, gantungkan cita cita mu setinggi langit',
//             'photo' => 'kepala.jpg',
//             'visi' => '<h5>Mewujudkan&nbsp;SMK&nbsp;Negeri&nbsp;1&nbsp;Jabon&nbsp;yang&nbsp;mandiri&nbsp;dan&nbsp;berwawasan&nbsp;Global,&nbsp;mampu&nbsp;menghasilkan&nbsp;lulusan&nbsp;unggul&nbsp;dalam&nbsp;teknologi,&nbsp;profesional,&nbsp;berjiwa&nbsp;wirausaha,&nbsp;berbudaya,&nbsp;berwawasan&nbsp;lingkungan&nbsp;dan&nbsp;berakhlak&nbsp;mulia</h5>',
//             'misi' => '<ol>\r\n
//     <li>\r\n
//     <h5>Mengembangkan&nbsp;system&nbsp;pembelajaran&nbsp;yang&nbsp;berstandar&nbsp;dengan&nbsp;komptensi&nbsp;industri&nbsp;dan&nbsp;kewirausahaan</h5>\r\n
//     </li>\r\n
//     <li>\r\n
//     <h5>Melaksanakan&nbsp;pengelolaan&nbsp;lembaga&nbsp;sembagai&nbsp;pusat&nbsp;pendidikan&nbsp;untuk&nbsp;menghasilkan&nbsp;peserta&nbsp;diklat&nbsp;berperan&nbsp ▶
//     </li>\r\n
//     <li>\r\n
//     <h5>Mewujudkan&nbsp;lembaga&nbsp;pusat&nbsp;pengembangan&nbsp;budaya,&nbsp;ilmu&nbsp;pengetahuan&nbsp;dan&nbsp;teknologi&nbsp;serta&nbsp;keterampilan&nbsp;untuk ▶
//     </li>\r\n
//     <li>\r\n
//     <h5>Mewujudkan&nbsp;lembaga&nbsp;yang&nbsp;berperan&nbsp;sebagai&nbsp;pusat&nbsp;pelayanan&nbsp;masyarakat,&nbsp;bersikap&nbsp;fokus&nbsp;pada&nbsp;pelanggan&nb ▶
//     </li>\r\n
//     <li>\r\n
//     <h5>Mewujudkan&nbsp;lembaga&nbsp;pendidikan&nbsp;kejuruan&nbsp;lulusan&nbsp;siap&nbsp;kerja,&nbsp;mampu&nbsp;mengembangkan&nbsp;diri,&nbsp;berakhlak&nbsp;mulia, ▶
//     </li>\r\n
//     </ol>',
//         ]);

//         // Guru
//         for ($i=0; $i < 6; $i++) { 
//             $guru = new Guru;
//             $guru->nama = 'Pak Budi '.$i;
//             $guru->bidang = 'TIK';
//             $guru->photo = 'guru.jpg';
//             $guru->save();
//         }

//         // Prestasi
//         for ($i=0; $i < 6; $i++) { 
//             $prestasi = new Prestasi;
//             $prestasi->judul = 'Juara 1 Web Design ' .$i;   
//             $prestasi->isi = 'Juara 1 Web Design Tingkat Nasional';   
//             $prestasi->photo = 'prestasi.jpg';     
//             $prestasi->save();
//         }

//         // Sarpras
//         for ($i=0; $i < 10; $i++) { 
//             $sarpras = new Sarpras;
//             $sarpras->nama = 'Gedung Sekolah '. $i;   
//             $sarpras->isi = 'Gedung sekolah yang nyaman dan bagus full fasilitas untuk belajar mengajar yang lebih efektif';   
//             $sarpras->photo = 'sarpras.jpg';     
//             $sarpras->save();
//         }     

//         // TataTertib
//         $TataTertib = new TataTertib;
//         $TataTertib->isi = '<ol>\r\n
// <ol>\r\n
// <ol>\r\n
// <li>\r\n
// <h3>Sepuluh menit sebelum jam pertama siswa sudah hadir di sekolah</h3>\r\n
// </li>\r\n
// <li>\r\n
// <h3>Keterlambatan hadir kurang dari 10 menit diperbolehkan masuk klas / mengikuti pelajaran seijin guru Piket.</h3>\r\n
// </li>\r\n
// <li>\r\n
// <h3>Keterlambatan lebih dari 10 menit tidak diperbolehkan masuk / mengikuti pelajaran dan akan diberikan ijin masuk pada jam berikutnya setelah mendapat surat ijin dari guru Piket dan Petugas STKS ; sambil menunggu pergantian jam, siswa mendapat tugas khusus oleh tim STKS dan BK.</h3>\r\n
// </li>\r\n
// <li>\r\n
// <h3>Apabila siswa tidak masuk sekolah karena sakit , atau ijin harus mengirimkan surat ijin yang sah dari orang tua / wali murid pada hari itu juga atau lewat telpon sekolah.</h3>\r\n 
// </li>\r\n
// <li>\r\n
// <h3>Jumlah hari hadir selama satu Semester sekurang-kurangnya 95% hari efektif sekolah , dan apabila tidak terpenuhi maka dinyatakan tidak memenuhi syarat untuk penentuan kenaikan klas.</h3>\r\n
// </li>\r\n
// <li>\r\n
// <h3>Apabila siswa akan meninggalkan sekolah sebelum jam belajar sekolah berakhir oleh karena sakit atau ijin keperluan lain, harus minta ijin kepada semua guru Bidang Studi yang ditinggalkan, dan baru boleh meninggalkan sekolah setelah mendapat surat ijin meninggalkan sekolah dari guru Piket dan Petugas STKS.</h3>\r\n
// </li>\r\n
// <li>\r\n
// <h3>Apabila siswa akan meninggalkan klas atau jam pelajaran harus minta ijin kepada guru yang mengajar di kelas yang bersangkutan dan surat ijin ditinggalkan di klas.</h3>\r\n 
// </li>\r\n
// <li>\r\n
// <h3>Wajib mengikuti semua kegiatan belajar mengajar sejak jam pertama hingga jam terakhir , serta pulang secara bersama-sama setelah tanda bel pelajaran terakhir dibunyikan.</h3>\r\n
// </li>\r\n
// <li>\r\n
// <h3>Berada di dalam klas pada jam-jam kegiatan belajar mengajar dan tetap berada dilingkungan halaman sekolah pada saat jam istirahat.</h3>\r\n
// </li>\r\n
// <li>\r\n
// <h3>Wajib mengikuti Upacara yang ditentukan oleh sekolah.</h3>\r\n
// </li>\r\n
// </ol>\r\n
// </ol>\r\n
// </ol>\r\n
// <h3>&nbsp;</h3>';      
//         $TataTertib->save();   

//         // Osis
//         for ($i=0; $i < 6; $i++) { 
//             $osis = new Osis;
//             $osis->nama = 'Osis '. $i;   
//             $osis->jabatan = 'anggota '. $i;   
//             $osis->photo = 'osis.jpg';     
//             $osis->save();
//         }  

//         // Ekstra
//         for ($i=0; $i < 6; $i++) { 
//             $ekstra = new EkstraKulikuler;
//             $ekstra->nama = 'Ekstra '. $i;   
//             $ekstra->isi = 'Kegiatan ekstra '. $i;   
//             $ekstra->photo = 'ekstra.png';     
//             $ekstra->save();
//         }

//         // Kategori Berita
//         $kategoriBerita = new KategoriBerita;
//         $kategoriBerita->nama = 'lomba';
//         $kategoriBerita->save();

//         // Berita
//         for ($i=0; $i < 10; $i++) { 
//             $ekstra = new Berita;
//             $ekstra->id =  $faker->uuid;
//             $ekstra->judul = 'Berita '. $i;   
//             $ekstra->kategori_berita_id = 1;     
//             $ekstra->isi = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
//           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
//           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
//           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
//           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
//           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
//           Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
//           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
//           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
//           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
//           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
//           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

//           Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
//           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
//           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
//           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
//           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
//           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';     
//             $ekstra->photo = 'berita.jpg';     
//             $ekstra->save();
//         }

//         // Kategori Event
//         $KategoriEvent = new KategoriEvent;
//         $KategoriEvent->nama = 'Kemerdekaan';
//         $KategoriEvent->save();

//         // Event
//         for ($i=0; $i < 6; $i++) { 
//             $ekstra = new Event;
//             $ekstra->judul = 'Event '. $i;   
//             $ekstra->isi = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
//           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
//           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea';   
//             $ekstra->tempat = 'SMKN 1 Jabon Sidoarjo';     
//             $ekstra->tgl_event = date('d-m-Y');     
//             $ekstra->kategori_event_id = 1;      
//             $ekstra->save();
//         }

//         // Galeri
//         for ($i=0; $i < 6; $i++) { 
//             $galeri = new Galeri;
//             $galeri->photo = 'galeri.jpg';
//             $galeri->save();
//         }

//         // Ebook
//         for ($i=0; $i < 10; $i++) { 
//             $ebook = new Ebook;
//             $ebook->nama = 'Jadwal pelajaran';
//             $ebook->file_path = 'ebook.pdf';
//             $ebook->save();
//         }

//         // Komite
//         for ($i=0; $i < 10; $i++) { 
//             $komite = new Komite;
//             $komite->nama = 'Bu Budi';
//             $komite->bidang = 'Staf Tu';
//             $komite->photo = 'komite.jpg';
//             $komite->save();
//         }

//         // Kontak
//         $kontak = new Kontak;
//          $kontak->alamat = 'RT. 2 RW. 5, Panggreh, Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61276';
//          $kontak->email = 'smkn1jabon@gmail.com';
//          $kontak->no_telpon = '(0343) 656413';
//          $kontak->save();

    }
}
