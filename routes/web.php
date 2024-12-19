<?php

use App\Models\BuktiPembayaran;
use App\Http\Controllers\beranda;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LominController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\metodeController;
use App\Http\Controllers\pembinController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HistoryController;

use App\Http\Controllers\IndabarController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\RincianController;
use App\Http\Controllers\tentangController;
use App\Http\Controllers\pembindatController;
use App\Http\Controllers\transaksiController;
use App\Http\Middleware\RedirectIfNotAnggota;
use App\Http\Controllers\admin\homecontroller;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\notifikasiController;
use App\Http\Controllers\rinciantabController;
use App\Http\Controllers\ImputAlamatController;

use App\Http\Controllers\SetadusrsetController;
use App\Http\Controllers\TabelGambarController;
use App\Http\Controllers\TabungankurController;
use App\Http\Controllers\ImputAnggotaController;
use App\Http\Controllers\searchprodukController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\admin\tabunganController;
use App\Http\Controllers\settingaccountController;
use App\Http\Controllers\TabunganInputsController;

use App\Http\Controllers\admin\InformasiController;
use App\Http\Controllers\Anggota\NotifWaController;


use App\Http\Controllers\settingUbahDataController;


use App\Http\Controllers\Anggota\HomepageController;
use App\Http\Controllers\Anggota\ValidasiController;
use App\Http\Controllers\admin\AlamatAdminController;


use App\Http\Controllers\admin\KontakAdminController;
use App\Http\Controllers\admin\produkhewancontroller;
use App\Http\Controllers\Auth\UbahPasswordController;
use App\Http\Controllers\SettingUbahAlamatController;



use App\Http\Controllers\admin\datatabunganController;
use App\Http\Controllers\admin\SettingAdminController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\SettingProfileUserController;

use App\Http\Controllers\admin\DataTransaksiController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\admin\PembagianAdminController;
use App\Http\Controllers\admin\tabungankurbanController;

use App\Http\Controllers\Anggota\AnggotaLoginController;


use App\Http\Controllers\settingaccountAlamatController;






use App\Http\Controllers\admin\HistorytabunganController;
use App\Http\Controllers\admin\UbahPasswordAdminController;
use App\Http\Controllers\Anggota\AnggotaRegisterController;
use App\Http\Controllers\Anggota\HistoriTabunganController;
use App\Http\Controllers\Anggota\InputUserAnggotaController;
use App\Http\Controllers\Anggota\SettingAkunAnggotaController;
use App\Http\Controllers\Anggota\InputTabunganEwalletController;
use App\Http\Controllers\Anggota\SettingAlamatAnggotaController;

use App\Http\Controllers\Anggota\SettingUbahPwAnggotaController;
use App\Http\Controllers\Anggota\SettingProfileAnggotaController;
use App\Http\Controllers\Anggota\HistoriImputUserAnggotaController;

use App\Http\Controllers\DataPemasukanController;
use Illuminate\Support\Facades\Artisan;


Route::domain('')->group(function () {

    Route::get('/admin/info/edit', [TabelGambarController::class, 'edit'])->name('info.edit');
    Route::put('/admin/info/update', [TabelGambarController::class, 'update'])->name('info.update');



    Route::get('/', function () {
        return redirect('/beranda');
    });
    Route::get('/input-tabungan', function () {
        return view('/user.pages.input-tabungan');
    });

    Route::get('/storage-link', function () {
        $target = storage_path('app/public');  // Target folder yang akan disimbolkan
        $link = $_SERVER['DOCUMENT_ROOT'] . '/storage';  // Lokasi link di public_html

        // Cek apakah link sudah ada
        if (file_exists($link)) {
            return 'The "storage" directory already exists!';
        }

        symlink($target, $link);  // Buat symlink manual

        return 'Storage link has been created successfully!';
    });



    // Login
    Route::get('login-index', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login-post');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('register-index', [RegisterController::class, 'index'])->name('register-index');
    Route::post('register', [RegisterController::class, 'register'])->name('register');

    // forgot password
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::get('mobile/password/reset', [ForgotPasswordController::class, 'showLinkRequestFormMobile'])->name('password.request.mobile');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::view('/beranda', 'layouts.beranda')->name('beranda');




    Route::get('/produkhewan', [produkhewancontroller::class, 'index'])->name('produkhewan.index');
    Route::get('/produkhewan/create', [produkhewancontroller::class, 'create'])->name('produkhewan.create');
    Route::post('/produkhewan', [produkhewancontroller::class, 'store'])->name('produkhewan.store');
    Route::get('/produhewan/{produkhewan}/edit', [produkhewancontroller::class, 'edit'])->name('produkhewan.edit');
    Route::put('/produkhewan/{produkhewan}', [produkhewancontroller::class, 'update'])->name('produkhewan.update');
    Route::delete('/produkhewan/{id}', [produkhewancontroller::class, 'destroy'])->name('produkhewan.destroy');
    Route::resource('produkhewan', produkhewancontroller::class);




    Route::view('/inputtabungan', 'tabungan.inputtabungan')->name('inputtabungan');
    Route::view('/tabungan', 'tabungan.tabungan')->name('tabungan');
    Route::view('/contact1', 'layouts.contact1')->name('contact1');
    Route::view('/tentang', 'layouts.tentang')->name('tentang');
    Route::view('/home', 'admin.home')->name('home');
    Route::view('/produkhewan', 'admin.produkhewan')->name('produkhewan');
    Route::view('/tabungan', 'admin.tabungan')->name('tabungan');
    Route::view('/tabungankurban', 'admin.tabungankurban')->name('tabungankurban');


    Route::get('tabungan/approve/{id}', [TabungankurController::class, 'approvePengajuan'])->name('tabungan.approve');
    Route::get('tabungan/reject/{id}', [TabungankurController::class, 'rejectPengajuan'])->name('tabungan.reject');



    Route::get('/inputtabungan/{id}', [TabungankurController::class, 'showTabungan'])->name('tabungan.show')->middleware('auth');
    Route::get('/datatabungan', [datatabunganController::class, 'index'])->name('datatabungan.index');
    Route::get('/datatabungan/create', [datatabunganController::class, 'create'])->name('datatabungan.create');
    Route::post('/datatabungan', [datatabunganController::class, 'store'])->name('datatabungan.store');
    Route::get('/input-tabungan', [TabungankurController::class, 'showInputForm'])->name('tabungan.inputtabungan');


    // Route untuk menyimpan data tabungan
    Route::post('/tabungan/store', [TabungankurController::class, 'store'])->name('tabungan.store');

    // Route untuk menampilkan semua data tabungan
    Route::get('/tabungan', [TabungankurController::class, 'index'])->name('tabungan.index');



    // Route untuk menampilkan halaman produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');

    // Route::middleware(['auth:userregisterrs'])->group(function () {



    Route::get('/beranda', [beranda::class, 'index'])->name('beranda');
    Route::get('/produk', [produkController::class, 'index'])->name('produk');
    Route::get('/tentang', [tentangController::class, 'index'])->name('tentang');
    Route::get('/home', [homecontroller::class, 'index'])->name('home');



    // Route::get('/produkhewan',[produkhewancontroller::class, 'index'])->name('produkhewan');



    Route::get('/contact', [ContactController::class, 'index'])->name('contact1');
    Route::get('/settingAkun', [settingaccountController::class, 'index'])->name('settingAkun');


    Route::get('/settingAlamat', [settingaccountAlamatController::class, 'index'])->name('settingAlamat');




    Route::get('/settingAkun', [settingUbahDataController::class, 'index'])->name('settingAkun');
    Route::post('/settingAkun/ubahData', [settingUbahDataController::class, 'updateData'])->name('ubahData');

    Route::get('imputalamatuser', [ImputAlamatController::class, 'form'])->name('imputalamat');
    Route::post('editimputalamatuser', [ImputAlamatController::class, 'storeUpdate'])->name('editimputalamat');
    // Route::post('settingaccount/store-or-update-alamat/{id_alamat?}', [ImputAlamatController::class, 'storeOrUpdate'])->name('storeOrUpdateAlamat');
    // Route untuk menampilkan form edit alamat
    Route::get('settingdatauser', [AlamatController::class, 'indexdata'])->name('indexdata');
    Route::get('settingalamatuser', [AlamatController::class, 'indexalamat'])->name('indexalamat');
    Route::get('settingpassworduser', [AlamatController::class, 'indexpassword'])->name('indexpassword');
    Route::get('settingaccount/edit-alamat', [AlamatController::class, 'form'])->name('editAlamat');
    // Route untuk menyimpan atau mengupdate alamat
    Route::post('settingaccount/store-or-update-alamat/{id_alamat?}', [AlamatController::class, 'storeOrUpdate'])->name('storeOrUpdateAlamat');

    Route::post('/upload-profile-user', [SettingProfileUserController::class, 'uploadProfileImage'])->name('upload.profile.user');

    Route::middleware(['auth'])->group(function () {
        Route::post('/ubah-password', [UbahPasswordController::class, 'ubahPassword'])->name('ubah.password');
    });





    Route::view('/reset', 'forgout.reset')->name('reset');
    Route::view('/passbaru', 'forgout.passbaru')->name('passbaru');


    Route::view('/rinciantab', 'tabungan.rinciantab')->name('rinciantab');



    // Route untuk menyimpan data tabungan
    Route::post('/tabungan/store', [TabungankurController::class, 'store'])->name('tabungan.store');

    // Route untuk menampilkan semua data tabungan
    Route::get('/tabungan', [TabungankurController::class, 'index'])->name('tabungan.index');
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');

    // Route::view('/settingadmin','admin.settingadmin')->name('settingadmin');
    Route::get('/settingadmin', [SettingAdminController::class, 'index'])->name('settingadmin');
    Route::get('/settingedit', [SettingAdminController::class, 'indexedit'])->name('settingedit');






    // Route::get('/alamatubah/{id}', [AlamatAdminController::class, 'indexubah'])->name('alamatubah');
    Route::get('/alamatadmin', [AlamatAdminController::class, 'index'])->name('alamatadmin');
    Route::get('/alamatubah', [AlamatAdminController::class, 'indexubah'])->name('alamatubah');
    // Route::get('/alamatubah/{id}', [AlamatAdminController::class, 'indexubah'])->name('alamatubah');
    Route::post('alamatadmin/storeOrUpdate', [AlamatAdminController::class, 'storeOrUpdate'])->name('alamatadmin.storeOrUpdate');
    // Route::post('/alamat', [AlamatAdminController::class, 'store'])->name('alamatadmin.store');
    // Route::put('/alamatubah/{id_alamatadmin}', [AlamatAdminController::class, 'update'])->name('alamatubah.update');
    // Route::post('/admin/alamatadmin/storeOrUpdate', [AlamatAdminController::class, 'storeOrUpdate'])->name('alamatadmin.storeOrUpdate');
    // Route::get('/alamatadmin/{id}/ubah', [AlamatAdminController::class, 'indexubah'])->name('alamatadmin.indexubah');
    // Route::get('/alamat/{id}', [AlamatAdminController::class, 'show'])->name('alamat.show');


    Route::post('setting', [SettingAdminController::class, 'store'])->name('setting.store');
    Route::put('setting', [SettingAdminController::class, 'update'])->name('setting.update');

    Route::view('/informasiadmin', 'admin.informasiadmin.edit')->name('informasiadmin');
    Route::view('/kontakadmin', 'admin.kontakadmin')->name('kontakadmin');
    Route::view('/profileadmin', 'admin.profileadmin')->name('profileadmin');

    //Route untuk menampilkan form edit alamat
    Route::get('settingaccount/edit-alamat', [AlamatController::class, 'form'])->name('editAlamat');

    // Route untuk menyimpan atau mengupdate alamat
    Route::post('settingaccount/store-or-update-alamat/{id_alamat?}', [AlamatController::class, 'storeOrUpdate'])->name('storeOrUpdateAlamat');



    Route::get('/loginanggota', [AnggotaLoginController::class, 'index'])->name('anggota.login');
    Route::post('loginanggota', [AnggotaLoginController::class, 'login'])->name('anggota.login.post');
    Route::get('/registeranggota', [AnggotaRegisterController::class, 'index'])->name('anggota.register');
    Route::post('/registeranggota', [AnggotaRegisterController::class, 'register'])->name('anggota.register.post');
    Route::post('/logoutanggota', [AnggotaLoginController::class, 'logout'])->name('anggota.logout');

    Route::middleware(RedirectIfNotAnggota::class)->group(function () {
        Route::get('/homepageanggota', [HomepageController::class, 'index'])->name('hompageAnggota');
        //Route ubah setting data anggota
        Route::get('/settingakunanggota', [SettingAkunAnggotaController::class, 'index'])->name('settingAkunAnggota');
        Route::get('/editakunanggota', [SettingAkunAnggotaController::class, 'indexedit'])->name('editAkunAnggota');
        Route::post('/updatakuneanggota', [SettingAkunAnggotaController::class, 'updatedataanggota'])->name('updateAkunAnggota');
        Route::post('/upload-profile-anggota', [SettingProfileAnggotaController::class, 'uploadProfileImageAnggota'])->name('uploadProfileAnggota');
        //Route untuk setting alamat anggota
        Route::get('/settingalamatanggota', [SettingAlamatAnggotaController::class, 'indexalamatanggota'])->name('settingAlamatAnggota');
        Route::get('/editalamatanggota', [SettingAlamatAnggotaController::class, 'editalamatanggota'])->name('editAlamatAnggota');
        Route::post('/createalamatanggota', [SettingAlamatAnggotaController::class, 'createalamatanggota'])->name('createAlamatAnggota');
        Route::put('/updatealamatanggota/{id}', [SettingAlamatAnggotaController::class, 'updatealamatanggota'])->name('updateAlamatAnggota');
        //Route reset password anggota
        Route::get('/ubahpasswordanggota', [SettingUbahPwAnggotaController::class, 'indexpwanggota'])->name('resetPwAnggota');
        Route::post('/ubahpasswordanggota', [SettingUbahPwAnggotaController::class, 'ubahPasswordAnggota'])->name('ubahPasswordAnggota');
        //Route histori imput user anggota
        Route::get('/historiimputuser', [HistoriImputUserAnggotaController::class, 'index'])->name('historiimputuser');
        Route::get('/imputuser', [HistoriImputUserAnggotaController::class, 'indeximput'])->name('imputuseranggota');
        Route::post('/update-status', [HistoriImputUserAnggotaController::class, 'updateStatus'])->name('update-status');
        Route::get('/list-penabung', [HistoriImputUserAnggotaController::class, 'showListPenabung'])->name('list.penabung');
        //Route input user anggota
        // Route::get('/input-tabungan', [InputUserAnggotaController::class, 'create'])->name('inputtabungan');
        Route::post('/input-tabungan/{user}/{tabunganKurId}', [InputUserAnggotaController::class, 'storeTabungan'])->name('storetabungan');
        Route::get('/input-tabungan/{user}/{tabunganKurId}', [InputUserAnggotaController::class, 'inputTabungan'])->name('input-tabungan');
        Route::get('/historitabungan', [HistoriTabunganController::class, 'index'])->name('historitabungan');
        Route::post('/kirim-notif-wa', [NotifWaController::class, 'index'])->name('kirim-notif-wa');
        Route::get('/validasi/{id}', [ValidasiController::class, 'showUploadForm'])->name('validasi');
        Route::post('/validasi/upload-foto', [ValidasiController::class, 'uploadFoto'])->name('validasi.uploadFoto');

    });

    Route::get('/admin/assign', [ImputAnggotaController::class, 'showAssignForm'])->name('admin.showAssignForm');
    Route::post('/admin/assign', [ImputAnggotaController::class, 'assignUserToAnggota'])->name('admin.assignUserToAnggota');


    Route::view('/resetpassadmin', 'admin.forgoutadmin.resetpassadmin')->name('resetpassadmin');
    Route::view('/registeradmin', 'admin.registeradmin')->name('registeradmin');
    Route::view('/lupapassadmin', 'admin.forgoutadmin.lupapassadmin')->name('lupapassadmin');





    Route::get('/lomin', [LominController::class, 'showLoginForm'])->name('lomin');
    Route::post('/lomin', [LominController::class, 'lomin'])->name('lomin-post');
    Route::post('/logout', [LominController::class, 'logout'])->name('logout');

    //lupa password
    Route::get('/lomin/forgot-password', [LominController::class, 'showForgotPasswordForm'])->name('lomin.forgot-password');
    Route::post('/lomin/forgot-password', [LominController::class, 'sendResetLink'])->name('lomin.send-reset-link');
    Route::get('/lomin/reset-password/{token}', [LominController::class, 'showResetPasswordForm'])->name('lomin.reset-password');
    Route::post('/lomin/reset-password', [LominController::class, 'resetPassword'])->name('lomin.reset-password.post');

    Route::get('/registeradmin', [LominController::class, 'showRegisterForm'])->name('registeradmin');
    Route::post('/registeradmin', [LominController::class, 'register']);


    // routes/web.php
    Route::get('/rinciantab', [TabungankurController::class, 'rincian'])->name('rinciantab');

    // Route::view('/pembin', 'admin.pembin')->name('pembin');
    Route::get('/pembin', [PembagianAdminController::class, 'index'])->name('pembin');
    Route::view('/metode', 'admin.damet')->name('metode');

    Route::get('/pembin', [PembagianAdminController::class, 'index'])->name('pembin');

    Route::get('/histori-data-transaksi', [DataTransaksiController::class, 'indexHistori'])->name('data-transaksi-histori');
    Route::get('/data-transaksi/{id}', [DataTransaksiController::class, 'index'])->name('data-transaksi');
    Route::get('/data/transaksi', [DataTransaksiController::class, 'Transaksi'])->name('data-transaksi-create');
    Route::post('/data-transaksi', [DataTransaksiController::class, 'store'])->name('data-transaksi-store');
    Route::put('/data-transaksi/{id}', [DataTransaksiController::class, 'update'])->name('data-transaksi-update');

    Route::get('/pembin', [PembagianAdminController::class, 'index'])->name('pembin');

    Route::view('/alamatadmin', 'admin.alamatadmin')->name('alamatadmin');


    Route::post('/upload-bukti', [transaksiController::class, 'uploadbukti']);



    // Route::view('/setadusr','admin.setadusrset')->name('setadusr');


    // Route::view('/setadusrset','admin.setadusrset')->name('metode');
    // Route::get('/setadusrset', [SetadusrsetController::class, 'show'])->name('setadusrset');

    Route::get('/setadusr/create', [SetadusrsetController::class, 'create'])->name('setadusr.create');
    Route::post('/setadusr/store', [SetadusrsetController::class, 'store'])->name('setadusr.store');
    Route::get('/setadusrset/show', [SetadusrsetController::class, 'show'])->name('setadusrset.show');
    Route::get('/main', [SetadusrsetController::class, 'main'])->name('main');
    // Route::get('/show', [SetadusrsetController::class, 'show'])->name('show');


    // Route::get('/setting/{id}/edit', [SetadursController::class, 'edit'])->name('setting.edit');
    // Route::put('/setting/{id}', [SetadursController::class, 'update'])->name('setting.update');


    Route::view('/ubahsetadusr', 'admin.ubahsetadusr')->name('ubahsetadusr');
    Route::view('/alamatsetadurs', 'admin.alamatsetadurs')->name('alamatsetadurs');
    // Route::patch('/tabungan/approve/{id}', [TabungankurController::class, 'approvePengajuan']);
    // Route::patch('/tabungan/reject/{id}', [TabungankurController::class, 'rejectPengajuan']);
    // Route::put('setting/{id}', [SettingAdminController::class, 'update'])->name('setting.update');
    // Route::post('/alamatadmin/storeOrUpdate', [AlamatAdminController::class, 'storeOrUpdate'])->name('alamatadmin.storeOrUpdate');
    // Route::put('/alamatubah/{id_alamatadmin}', [AlamatAdminController::class, 'update'])->name('alamatubah.update');


    Route::get('/transaksi/{id}', [transaksiController::class, 'index'])->name('transaksi')->middleware('auth');
    Route::post('/transaksi/upload/{id}', [transaksiController::class, 'uploadBukti'])->name('transaksi.layouts');
    Route::get('/transaksi/upload/{id}', [transaksiController::class, 'showUploadForm'])->name('transaksi.upload.form');
    Route::get('/transaksi/filter', [transaksiController::class, 'filter'])->name('transaksi.filter');
    Route::get('/tabungan-inputs', [TabunganInputsController::class, 'index']);
    Route::post('/transaksi/process-form', [transaksiController::class, 'processForm'])->name('transaksi.processForm');



    // Route to show the form
    Route::get('admin/kontakadmin', [KontakAdminController::class, 'index'])->name('kontakadmin.index');
    Route::post('admin/kontakadmin', [KontakAdminController::class, 'store'])->name('kontakadmin.store');
    Route::get('admin/informasi/edit', [InformasiController::class, 'edit'])->name('info.edit');
    Route::put('admin/informasi', [InformasiController::class, 'update'])->name('info.update');
    Route::get('admin/informasi', [InformasiController::class, 'index'])->name('info.index');

    Route::get('/metode', [metodeController::class, 'indexTadamet'])->name('metode.indexTadamet');
    Route::get('/metode/damet', [metodeController::class, 'damet'])->name('metode.damet');
    Route::post('/metode/store', [metodeController::class, 'store'])->name('metode.store');
    Route::put('/metode/update/{id}', [metodeController::class, 'update'])->name('metode.update');
    Route::delete('/metode/destroy/{id}', [metodeController::class, 'destroy'])->name('metode.destroy');
    Route::get('/tadamet', [metodeController::class, 'indexTadamet'])->name('tadamet');


    Route::post('/upload-bukti/{id}', [transaksiController::class, 'uploadbukti']);
    Route::get('/download-word', [App\Http\Controllers\DownloadController::class, 'downloadWord'])
        // ->middleware('auth')
        ->name('download.word');
    Route::get('/notifikasi', [App\Http\Controllers\notifikasiController::class, 'rincian'])->name('notifikasi.rincian');
    Route::get('/notifikasi/history', [App\Http\Controllers\notifikasiController::class, 'rincianHistory'])->name('notifikasi.rincian.history');
    Route::get('/rincian-notifikasi', [NotifikasiController::class, 'rincian'])->name('rincian.notifikasi');


    Route::get('/buktibayar', [TabunganInputsController::class,'BuktiBayar'])->name('buktibayar');
    // Route::get('/rincian/{id}/{tabunganKurId}', [RincianController::class, 'show'])->name('rincian.show');
    Route::get('/rincian/{id}', [RincianController::class, 'show'])->name('rincian.show');
    // Route::get('/history', [HistoryController::class, 'index'])->name('history');
    Route::get('/history/{id}', [HistoryController::class, 'index'])->name('history.index');
    Route::get('/admin/setting/ubah-password', [UbahPasswordAdminController::class, 'indexPasswordAdmin'])->name('admin.setting.ubahPasswordAdmin');
    Route::post('/admin/setting/ubah-password', [UbahPasswordAdminController::class, 'ubahPasswordAdmin'])->name('admin.setting.ubahPasswordAdmin.submit');

    Route::get('/historytabunganadmin', [HistorytabunganController::class, 'index'])->name('historytabungan');
    Route::get('/admin/historitabungan/download/{id}', [HistorytabunganController::class, 'downloadData'])->name('historitabungan.download');

    Route::get('/datapemasukan', [DataPemasukanController::class,'index'])->name('datapemasukan');
});

