<?php

// Guest Section
Route::get('/excel-reader', function(){
    return view('test.laravel-reader');
});

Route::get('/', function() {
	return redirect()->route('getLoginPage');
});
Route::get('/logout', 'Login\LoginController@getLogout')->name('getLogout');

// Auth Section

Route::group(['middleware' => ['guest']], function(){

    Route::get('/login', 'Login\LoginController@getLoginPage')->name('getLoginPage');
    Route::post('/login', 'Login\LoginController@postLoginPage')->name('postLoginPage');

});

// General Function

Route::group(['middleware' => ['auth']], function() {

    Route::get('/profil/ubah', 'General\ProfilController@getChangeProfilPage')->name('getChangeProfilPage');
    Route::put('/profil/ubah', 'General\ProfilController@putChangeProfil')->name('putChangeProfil');
    Route::get('/profil/foto', 'General\ProfilController@getChangeFotoPage')->name('getChangeFotoPage');
    Route::put('/profil/foto', 'General\ProfilController@putChangeFoto')->name('putChangeFoto');
    Route::get('/profil/{id}', 'General\ProfilController@getUserProfil')->name('getUserProfil');

    Route::get('/password/ubah', 'General\PasswordController@getChangePasswordPage')->name('getChangePasswordPage');
    Route::put('/password/ubah', 'General\PasswordController@putChangePassword')->name('putChangePassword');

    Route::get('/forum/list', 'General\ForumController@getForumListPage')->name('getForumListPage');
    Route::get('/forum/tambah', 'General\ForumController@getAddForumPage')->name('getAddForumPage');
    Route::post('/forum/tambah', 'General\ForumController@postAddForum')->name('postAddForum');
    // Edit & Delete
    Route::get('/forum/{id}', 'General\ForumController@getLihatForumPage')->name('getLihatForumPage');
    Route::post('/forum/komen/tambah', 'General\ForumController@postForumComment')->name('postForumComment');

    Route::get('/livechat', 'General\ChatController@getLiveChatPage')->name('getLiveChatPage');
    Route::get('/livechat/getuser', 'General\ChatController@getLiveChatUserData')->name('getLiveChatUserData');
    Route::get('/livechat/getdata', 'General\ChatController@getLiveChatData')->name('getLiveChatData');
    Route::post('/livechat/sendchat', 'General\ChatController@postSendChat')->name('postSendChat');


    // Route::post('/livechat/carikontak', 'General\ChatController@gpostCariKontak')->name('gpostCariKontak');
    // Route::post('/livechat/getchat', 'General\ChatController@postGetChat')->name('postGetChat');

});

// Staff Section

Route::group(['prefix' => 'staff', 'middleware' => ['auth', 'staff']], function() {

    Route::get('/', function() {
        return redirect()->route('getStaffHomePage');
    });

    Route::get('/home', 'Staff\MainController@getStaffHomePage')->name('getStaffHomePage');

    Route::get('/userakun', 'Staff\UserAkunController@getUserAkunPage')->name('getUserAkunPage');
    Route::get('/userakun/data', 'Staff\UserAkunController@getDataUserAkun')->name('getDataUserAkun');
    Route::get('/userakun/tambah', 'Staff\UserAkunController@getAddUserAkunPage')->name('getAddUserAkunPage');
    Route::post('/userakun/tambah', 'Staff\UserAkunController@postAddUserAkun')->name('postAddUserAkun');
    Route::get('/userakun/ubah/{id}', 'Staff\UserAkunController@getEditUserAkunPage')->name('getEditUserAkunPage');
    Route::put('/userakun/ubah/{id}', 'Staff\UserAkunController@putEditUserAkun')->name('putEditUserAkun');
    Route::get('/userakun/hapus/{id}', 'Staff\UserAkunController@getHapusUserAkunPage')->name('getHapusUserAkunPage');
    Route::delete('/userakun/hapus/{id}', 'Staff\UserAkunController@deleteHapusUserAkun')->name('deleteHapusUserAkun');
    Route::get('/userakun/blok/{id}', 'Staff\UserAkunController@getBlokUserAkunPage')->name('getBlokUserAkunPage');
    Route::put('/userakun/blok/{id}', 'Staff\UserAkunController@putBlokUserAkun')->name('putBlokUserAkun');
    Route::get('/userakun/unblok/{id}', 'Staff\UserAkunController@getUnblokUserAkunPage')->name('getUnblokUserAkunPage');
    Route::put('/userakun/unblok/{id}', 'Staff\UserAkunController@putUnblokUserAkun')->name('putUnblokUserAkun');
    Route::get('/userakun/reset/{id}', 'Staff\UserAkunController@getResetPasswordPage')->name('getResetPasswordPage');
    Route::put('/userakun/reset/{id}', 'Staff\UserAkunController@putResetPassword')->name('putResetPassword');

    Route::get('/angkatandiklat', 'Staff\AngkatanDiklatController@getAngkatanDiklatPage')->name('getAngkatanDiklatPage');
    Route::get('/angkatandiklat/data', 'Staff\AngkatanDiklatController@getDataAngkatanDiklat')->name('getDataAngkatanDiklat');
    Route::get('/angkatandiklat/tambah', 'Staff\AngkatanDiklatController@getAddAngkatanDiklatPage')->name('getAddAngkatanDiklatPage');
    Route::post('/angkatandiklat/tambah', 'Staff\AngkatanDiklatController@postAddAngkatanDiklat')->name('postAddAngkatanDiklat');
    Route::get('/angkatandiklat/ubah/{id}', 'Staff\AngkatanDiklatController@getEditAngkatanDiklatPage')->name('getEditAngkatanDiklatPage');
    Route::put('/angkatandiklat/ubah/{id}', 'Staff\AngkatanDiklatController@putEditAngkatanDiklat')->name('putEditAngkatanDiklat');
    Route::get('/angkatandiklat/hapus/{id}', 'Staff\AngkatanDiklatController@getHapusAngkatanDiklatPage')->name('getHapusAngkatanDiklatPage');
    Route::delete('/angkatandiklat/hapus/{id}', 'Staff\AngkatanDiklatController@deleteHapusAngkatanDiklat')->name('deleteHapusAngkatanDiklat');
    Route::get('/angkatandiklat/selesai/{id}', 'Staff\AngkatanDiklatController@getSelesaiPage')->name('getSelesaiPage');
    Route::put('/angkatandiklat/selesai/{id}', 'Staff\AngkatanDiklatController@putSelesaiAngkatanDiklat')->name('putSelesaiAngkatanDiklat');

    Route::get('/matapelajaran', 'Staff\MataPelajaranController@getMataPelajaranPage')->name('getMataPelajaranPage');
    Route::get('/matapelajaran/data', 'Staff\MataPelajaranController@getDataMataPelajaran')->name('getDataMataPelajaran');
    Route::get('/matapelajaran/tambah', 'Staff\MataPelajaranController@getAddMataPelajaranPage')->name('getAddMataPelajaranPage');
    Route::post('/matapelajaran/tambah', 'Staff\MataPelajaranController@postAddMataPelajaran')->name('postAddMataPelajaran');
    Route::get('/matapelajaran/ubah/{id}', 'Staff\MataPelajaranController@getEditMataPelajaranPage')->name('getEditMataPelajaranPage');
    Route::put('/matapelajaran/ubah/{id}', 'Staff\MataPelajaranController@putEditMataPelajaran')->name('putEditMataPelajaran');
    Route::get('/matapelajaran/hapus/{id}', 'Staff\MataPelajaranController@getHapusMataPelajaranPage')->name('getHapusMataPelajaranPage');
    Route::delete('/matapelajaran/hapus/{id}', 'Staff\MataPelajaranController@deleteHapusMataPelajaran')->name('deleteHapusMataPelajaran');

    Route::get('/virtualclass', 'Staff\VirtualClassController@getVirtualClassPage')->name('getVirtualClassPage');
    Route::get('/virtualclass/data', 'Staff\VirtualClassController@getDataVirtualClass')->name('getDataVirtualClass');
    Route::get('/virtualclass/tambah', 'Staff\VirtualClassController@getAddVirtualClassPage')->name('getAddVirtualClassPage');
    Route::post('/virtualclass/tambah', 'Staff\VirtualClassController@postAddVirtualClass')->name('postAddVirtualClass');
    Route::get('/virtualclass/ubah/{id}', 'Staff\VirtualClassController@getUbahVitualClassPage')->name('getUbahVitualClassPage');
    Route::put('/virtualclass/ubah/{id}', 'Staff\VirtualClassController@putUbahVirtualClass')->name('putUbahVirtualClass');
    Route::get('/virtualclass/hapus/{id}', 'Staff\VirtualClassController@getHapusVirtualClassPage')->name('getHapusVirtualClassPage');
    Route::delete('/virtualclass/hapus/{id}', 'Staff\VirtualClassController@deleteHapusVirtualClass')->name('deleteHapusVirtualClass');

    Route::get('/penghargaan', 'Staff\RewardController@getRewardPage')->name('getRewardPage');
    Route::get('/penghargaan/data', 'Staff\RewardController@getRewardData')->name('getRewardData');
    Route::get('/penghargaan/tambah', 'Staff\RewardController@getAddRewardPage')->name('getAddRewardPage');
    Route::post('/penghargaan/tambah', 'Staff\RewardController@postAddReward')->name('postAddReward');
    Route::get('/penghargaan/ubah/{id}', 'Staff\RewardController@getUbahRewardPage')->name('getUbahRewardPage');
    Route::put('/penghargaan/ubah/{id}', 'Staff\RewardController@putUbahReward')->name('putUbahReward');

});

// Instruktur Section

Route::group(['prefix' => 'instruktur', 'middleware' => ['auth', 'instruktur']], function() {

    Route::get('/', function() {
        return redirect()->route('getInstrukturHomePage');
    });

    Route::get('/home', 'Instruktur\MainController@getInstrukturHomePage')->name('getInstrukturHomePage');

    Route::get('/materi', 'Instruktur\MateriController@getMateriPage')->name('getMateriPage');
    Route::get('/materi/data', 'Instruktur\MateriController@getDataMateri')->name('getDataMateri');
    Route::get('/materi/tambah', 'Instruktur\MateriController@getAddMateriPage')->name('getAddMateriPage');
    Route::post('/materi/tambah', 'Instruktur\MateriController@postAddMateri')->name('postAddMateri');
    Route::get('/materi/hapus/{id}', 'Instruktur\MateriController@getHapusMateriPage')->name('getHapusMateriPage');
    Route::delete('/materi/hapus/{id}', 'Instruktur\MateriController@deleteHapusMateri')->name('deleteHapusMateri');
    Route::get('/materi/download/{id}', 'Instruktur\MateriController@getDownloadMateri')->name('getDownloadMateri');

    Route::get('/virtualclass/list', 'Instruktur\VirtualClassController@getVirtualClassListPage')->name('getVirtualClassListPage');
    Route::get('/virtualclass/list/data', 'Instruktur\VirtualClassController@getDataVirtualClassList')->name('getDataVirtualClassList');
    Route::get('/virtualclass/main/{id}', 'Instruktur\VirtualClassController@getMainDataVirtualClassPage')->name('getMainDataVirtualClassPage');
    Route::post('/virtualclass/ubahstat', 'Instruktur\VirtualClassController@postStatusVirtualClass')->name('postStatusVirtualClass');
    Route::post('/virtualclass/post', 'Instruktur\VirtualClassController@postKelasPost')->name('postKelasPost');
    Route::post('/virtualclass/comment', 'Instruktur\VirtualClassController@postKelasComment')->name('postKelasComment');

    Route::post('/tugas/post', 'Instruktur\TugasController@postNewTugas')->name('postNewTugas');
    Route::get('/tugas/{id}', 'Instruktur\TugasController@getLihatDaftarJawaban')->name('getLihatDaftarJawaban');
    Route::get('/tugas/jawaban/{id}', 'Instruktur\TugasController@getFileJawabanTugas')->name('getFileJawabanTugas');
    Route::get('/tugas/nilai/{id}', 'Instruktur\TugasController@getBeriNilaiPage')->name('getBeriNilaiPage');
    Route::post('/tugas/nilai/{id}', 'Instruktur\TugasController@postBeriNilaiTugas')->name('postBeriNilaiTugas');

    Route::get('/reward/put/{id}/{kelas}', 'Instruktur\RewardController@getPutRewardBadge')->name('getPutRewardBadge');
    Route::post('/reward/put/{id}/{kelas}', 'Instruktur\RewardController@postPutReward')->name('postPutReward');

    Route::get('/pretest/tambah/{id}', 'Instruktur\PretestController@getTambahPretestPage')->name('getTambahPretestPage');
    Route::post('/pretest/tambah/{id}', 'Instruktur\PretestController@postTambahPretest')->name('postTambahPretest');
    Route::get('/pretest/jawaban/list/{id}', 'Instruktur\PretestController@getListJawabanPretest')->name('getListJawabanPretest');
    Route::get('/pretest/jawaban/detail/{kelas}/{user}', 'Instruktur\PretestController@getDetailJawabanPretest')->name('getDetailJawabanPretest');
    Route::post('/pretest/jawaban/detail/{kelas}/{user}', 'Instruktur\PretestController@postNilaiPretest')->name('postNilaiPretest');
    Route::get('/pretest/nilai/{id}', 'Instruktur\PretestController@getNilaiPretest')->name('getNilaiPretest');
    Route::get('/pretest/nilai/data/{id}', 'Instruktur\PretestController@getNilaiPretestData')->name('getNilaiPretestData');

    Route::get('/posttest/tambah/{id}', 'Instruktur\PosttestController@getTambahPosttestPage')->name('getTambahPosttestPage');
    Route::post('/posttest/tambah/{id}', 'Instruktur\PosttestController@postTambahPosttest')->name('postTambahPosttest');
    Route::get('/posttest/jawaban/list/{id}', 'Instruktur\PosttestController@getListJawabanPosttest')->name('getListJawabanPosttest');
    Route::get('/posttest/jawaban/detail/{kelas}/{user}', 'Instruktur\PosttestController@getDetailJawabanPosttest')->name('getDetailJawabanPosttest');
    Route::post('/posttest/jawaban/detail/{kelas}/{user}', 'Instruktur\PosttestController@postNilaiPosttest')->name('postNilaiPosttest');
    Route::get('/posttest/nilai/{id}', 'Instruktur\PosttestController@getNilaiPosttest')->name('getNilaiPosttest');
    Route::get('/posttest/nilai/data/{id}', 'Instruktur\PosttestController@getNilaiPosttestData')->name('getNilaiPosttestData');

    Route::get('/laporan/test/{id}', 'Instruktur\MainController@getLaporanTest')->name('getLaporanTest');
    Route::geT('/laporan/test/data/{id}', 'Instruktur\MainController@getLaporanTestData')->name('getLaporanTestData');

});

// Peserta Section

Route::group(['prefix' => 'peserta', 'middleware' => ['auth', 'peserta']], function() {

    Route::get('/', function() {
        return redirect()->route('getPesertaHomePage');
    });

    route::get('/home', 'Peserta\MainController@getPesertaHomePage')->name('getPesertaHomePage');

    Route::get('/virtualclass/list', 'Peserta\VirtualClassController@getPVClassList')->name('getPVClassList');
    Route::get('/virtualclass/main/{id}', 'Peserta\VirtualClassController@getMainPvClassList')->name('getMainPvClassList');
    Route::post('/virtualclass/post', 'Peserta\VirtualClassController@postVClassPost')->name('postVClassPost');
    Route::post('/virtualclass/comment', 'Peserta\VirtualClassController@postVClassComment')->name('postVClassComment');

    Route::get('/materi', 'Peserta\MateriController@getListPMateriPage')->name('getListPMateriPage');
    Route::get('/materi/data', 'Peserta\MateriController@GetDataListPMateri')->name('GetDataListPMateri');
    Route::get('/materi/download/{id}', 'Peserta\MateriController@getDownloadPMateri')->name('getDownloadPMateri');

    Route::post('/tugas/jawaban', 'Peserta\TugasController@postTugasJawaban')->name('postTugasJawaban');

    Route::get('/nilai', 'Peserta\NilaiController@getNilaiPage')->name('getNilaiPage');
    Route::get('/nilai/pdf', 'Peserta\NilaiController@getPDFNilai')->name('getPDFPNilai');

    Route::get('/posttest/list', 'Peserta\PosttestController@getPostTestList')->name('getPostTestList');
    Route::get('/posttest/soal/{id}', 'Peserta\PosttestController@getPosttestSoal')->name('getPosttestSoal');
    Route::post('/posttest/soal/{id}', 'Peserta\PosttestController@postPosttestSoal')->name('postPosttestSoal');

});

Route::group(['prefix' => 'pretest', 'middleware' => ['auth']], function() {

    Route::get('/list', 'Peserta\PretestController@getPreTestList')->name('getPreTestList');
    Route::get('/soal/{id}', 'Peserta\PretestController@getPretestSoal')->name('getPretestSoal');
    Route::post('/soal/{id}', 'Peserta\PretestController@postPretestSoal')->name('postPretestSoal');

});

// Pimpinan Section

Route::group(['prefix' => 'pimpinan', 'middleware' => ['auth', 'pimpinan']], function() {

    Route::get('/', function() {
        return redirect()->route('getPimpinanHomePage');
    });

    Route::get('/home', 'Pimpinan\MainController@getPimpinanHomePage')->name('getPimpinanHomePage');

    Route::get('/data/instruktur', 'Pimpinan\LaporanController@getDataInstrukturPage')->name('getDataInstrukturPage');
    Route::get('/data/instruktur/get', 'Pimpinan\LaporanController@getDataInstruktur')->name('getDataInstruktur');
    Route::get('/data/instruktur/pdf', 'Pimpinan\LaporanController@getPDFInstruktur')->name('getPDFInstruktur');

    Route::get('/data/angkatandiklat', 'Pimpinan\LaporanController@getListAngkatanDiklatPage')->name('getListAngkatanDiklatPage');

    Route::get('/data/peserta/{id}', 'Pimpinan\LaporanController@getDataPesertaPage')->name('getDataPesertaPage');
    Route::get('/data/peserta/{id}/get', 'Pimpinan\LaporanController@getDataPeserta')->name('getDataPeserta');
    Route::get('/data/peserta/{id}/pdf', 'Pimpinan\LaporanController@getPDFPeserta')->name('getPDFPeserta');

    Route::get('/nilai/peserta/{id}', 'Pimpinan\LaporanController@getDataNilaiPage')->name('getDataNilaiPage');
    Route::get('/nilai/peserta/{id}/pdf', 'Pimpinan\LaporanController@getPDFNilai')->name('getPDFNilai');

    Route::get('/virtualclass/angkatan', 'Pimpinan\VirtualClassController@getAngkatanList')->name('getAngkatanList');
    Route::get('/virtualclass/list/{id}', 'Pimpinan\VirtualClassController@getListKelas')->name('getListKelas');
    Route::get('/virtualclass/{id}', 'Pimpinan\VirtualClassController@getKelas')->name('getKelas');

    Route::get('/laporan/test/{id}', 'Pimpinan\MainController@getTestLaporan')->name('getTestLaporan');
    Route::get('/laporan/test/data/{id}', 'Pimpinan\MainController@getTestLaporanData')->name('getTestLaporanData');

});
