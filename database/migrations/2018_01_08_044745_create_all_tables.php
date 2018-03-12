<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hak_akses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('deskripsi');
            $table->timestamps();
        });

        Schema::create('users_account', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->integer('hak_akses_id')->unsigned();
            $table->boolean('status');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('hak_akses_id')->references('id')->on('hak_akses')->onDelete('cascade');
        });

        Schema::create('users_profil', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nik')->unique();
            $table->string('email')->unique();
            $table->string('nama');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->enum('agama', ['Islam', 'Katolik', 'Protestan', 'Hindu', 'Buddha'])->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('photo')->nullable();
            $table->integer('kantor_cabang_id')->unsigned();
            $table->timestamps();

            $table->foreign('id')->references('id')->on('users_account')->onDelete('cascade');
        });

        Schema::create('kantor_cabang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->timestamps();
        });

        Schema::create('angkatan_diklat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_diklat');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('keterangan')->nullable();
            $table->boolean('status');
            $table->timestamps();
        });

        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('nama_pelajaran');
            $table->timestamps();
        });

        Schema::create('angkatan_peserta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('angkatan_diklat_id')->unsigned();
            $table->integer('users_account_id')->unsigned(); //user dengan hak akses peserta
            $table->timestamps();

            $table->foreign('angkatan_diklat_id')->references('id')->on('angkatan_diklat')->onDelete('cascade');
            $table->foreign('users_account_id')->references('id')->on('users_account')->onDelete('cascade');
        });

        Schema::create('kelas_virtual', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kelas');
            $table->string('keterangan')->nullable();
            $table->enum('status', [0, 1, 5]);
            $table->integer('angkatan_diklat_id')->unsigned();
            $table->integer('mata_pelajaran_id')->unsigned();
            $table->integer('users_account_id')->unsigned(); //user dengan hak akses instruktur
            $table->timestamps();

            $table->foreign('angkatan_diklat_id')->references('id')->on('angkatan_diklat')->onDelete('cascade');
            $table->foreign('mata_pelajaran_id')->references('id')->on('mata_pelajaran')->onDelete('cascade');
            $table->foreign('users_account_id')->references('id')->on('users_account')->onDelete('cascade');
        });

        Schema::create('materi_pelajaran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul_materi');
            $table->string('keterangan')->nullable();
            $table->integer('users_account_id')->unsigned(); //user dengan hak akses instruktur
            $table->integer('mata_pelajaran_id')->unsigned();
            $table->enum('jenis_file', ['pdf', 'ppt', 'video']);
            $table->string('lokasi');
            $table->timestamps();

            $table->foreign('users_account_id')->references('id')->on('users_account')->onDelete('cascade');
            $table->foreign('mata_pelajaran_id')->references('id')->on('mata_pelajaran')->onDelete('cascade');
        });

        Schema::create('kelas_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_account_id')->unsigned();
            $table->integer('kelas_virtual_id')->unsigned();
            $table->text('konten');
            $table->timestamps();

            $table->foreign('users_account_id')->references('id')->on('users_account')->onDelete('cascade');
            $table->foreign('kelas_virtual_id')->references('id')->on('kelas_virtual')->onDelete('cascade');
        });

        Schema::create('kelas_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kelas_post_id')->unsigned();
            $table->integer('users_account_id')->unsigned();
            $table->text('konten');
            $table->timestamps();

            $table->foreign('kelas_post_id')->references('id')->on('kelas_post')->onDelete('cascade');
            $table->foreign('users_account_id')->references('id')->on('users_account')->onDelete('cascade');
        });

        Schema::create('forum_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_account_id')->unsigned();
            $table->string('judul');
            $table->text('konten');
            $table->timestamps();

            $table->foreign('users_account_id')->references('id')->on('users_account')->onDelete('cascade');
        });

        Schema::create('forum_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('forum_post_id')->unsigned();
            $table->integer('users_account_id')->unsigned();
            $table->text('konten');
            $table->timestamps();

            $table->foreign('forum_post_id')->references('id')->on('forum_post')->onDelete('cascade');
            $table->foreign('users_account_id')->references('id')->on('users_account')->onDelete('cascade');
        });

        Schema::create('tugas_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kelas_virtual_id')->unsigned();
            $table->string('judul');
            $table->text('deskripsi');
            $table->timestamps();

            $table->foreign('kelas_virtual_id')->references('id')->on('kelas_virtual')->onDelete('cascade');
        });

        Schema::create('tugas_jawaban', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tugas_post_id')->unsigned();
            $table->integer('users_account_id')->unsigned();
            $table->string('file_tugas');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('tugas_post_id')->references('id')->on('tugas_post')->onDelete('cascade');
            $table->foreign('users_account_id')->references('id')->on('users_account')->onDelete('cascade');
        });

        Schema::create('tugas_nilai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tugas_jawaban_id')->unsigned();
            $table->integer('nilai');
            $table->timestamps();

            $table->foreign('tugas_jawaban_id')->references('id')->on('tugas_jawaban')->onDelete('cascade');
        });

        Schema::create('polling_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_account_id')->unsigned();
            $table->string('judul');
            $table->string('deskripsi');
            $table->timestamps();

            $table->foreign('users_account_id')->references('id')->on('users_account')->onDelete('cascade');
        });

        Schema::create('polling_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('polling_post_id')->unsigned();
            $table->string('deskripsi');
            $table->timestamps();

            $table->foreign('polling_post_id')->references('id')->on('polling_post')->onDelete('cascade');
        });

        Schema::create('polling_hasil', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('polling_detail_id')->unsigned();
            $table->integer('users_account_id')->unsigned();
            $table->timestamps();

            $table->foreign('polling_detail_id')->references('id')->on('polling_detail')->onDelete('cascade');
            $table->foreign('users_account_id')->references('id')->on('users_account')->onDelete('cascade');
        });

        Schema::create('reward_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('keterangan');
            $table->string('gambar');
            $table->timestamps();
        });

        Schema::create('reward_to', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kelas_virtual_id')->unsigned();
            $table->integer('users_account_id')->unsigned();
            $table->integer('reward_list_id')->unsigned();
            $table->timestamps();

            $table->foreign('kelas_virtual_id')->references('id')->on('kelas_virtual')->onDelete('cascade');
            $table->foreign('users_account_id')->references('id')->on('users_account')->onDelete('cascade');
            $table->foreign('reward_list_id')->references('id')->on('reward_list')->onDelete('cascade');
        });

        Schema::create('chat_room', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_one_id')->unsigned();
            $table->integer('users_two_id')->unsigned();
            $table->timestamps();

            $table->foreign('users_one_id')->references('id')->on('users_account')->onDelete('cascade');
            $table->foreign('users_two_id')->references('id')->on('users_account')->onDelete('cascade');
        });

        Schema::create('chat_message', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chat_room_id')->unsigned();
            $table->integer('users_account_id')->unsigned();
            $table->string('message');
            $table->timestamps();

            $table->foreign('chat_room_id')->references('id')->on('chat_room')->onDelete('cascade');
            $table->foreign('users_account_id')->references('id')->on('users_account')->onDelete('cascade');
        });

        Schema::create('test_counter', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_account_id')->unsigned();
            $table->integer('pre_test_count');
            $table->integer('pos_test_count');
            $table->timestamps();

            $table->foreign('users_account_id')->references('id')->on('users_account')->onDelete('cascade');
        });

        Schema::create('pre_test', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kelas_virtual_id')->unsigned();
            $table->timestamps();

            $table->foreign('kelas_virtual_id')->references('id')->on('kelas_virtual')->onDelete('cascade');
        });

        Schema::create('pretest_soal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pre_test_id')->unsigned();
            $table->enum('jenis_soal', ['objektif', 'essay']);
            $table->string('soal');
            $table->string('opsi_a')->nullable();
            $table->string('opsi_b')->nullable();
            $table->string('opsi_c')->nullable();
            $table->string('opsi_d')->nullable();
            $table->timestamps();

            $table->foreign('pre_test_id')->references('id')->on('pre_test')->onDelete('cascade');
        });

        Schema::create('pretest_jawaban', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('users_account_id')->unsigned();
            $table->integer('pretest_soal_id')->unsigned();
            $table->string('jawaban');
            $table->integer('nilai');
        });

        Schema::create('post_test', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kelas_virtual_id')->unsigned();
            $table->timestamps();

            $table->foreign('kelas_virtual_id')->references('id')->on('kelas_virtual')->onDelete('cascade');
        });

        Schema::create('posttest_soal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_test_id')->unsigned();
            $table->enum('jenis_soal', ['objektif', 'essay']);
            $table->string('soal');
            $table->string('opsi_a')->nullable();
            $table->string('opsi_b')->nullable();
            $table->string('opsi_c')->nullable();
            $table->string('opsi_d')->nullable();
            $table->timestamps();

            $table->foreign('post_test_id')->references('id')->on('post_test')->onDelete('cascade');
        });

        Schema::create('posttest_jawaban', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('users_account_id')->unsigned();
            $table->integer('posttest_soal_id')->unsigned();
            $table->string('jawaban');
            $table->integer('nilai');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hak_akses');
        Schema::dropIfExists('users_account');
        Schema::dropIfExists('users_profil');
        Schema::dropIfExists('kantor_cabang');
        Schema::dropIfExists('angkatan_diklat');
        Schema::dropIfExists('mata_pelajaran');
        Schema::dropIfExists('angkatan_peserta');
        Schema::dropIfExists('kelas_virtual');
        Schema::dropIfExists('materi_pelajaran');
        Schema::dropIfExists('kelas_post');
        Schema::dropIfExists('kelas_comment');
        Schema::dropIfExists('forum_post');
        Schema::dropIfExists('forum_comment');
        Schema::dropIfExists('tugas_post');
        Schema::dropIfExists('tugas_jawaban');
        Schema::dropIfExists('tugas_nilai');
        Schema::dropIfExists('polling_post');
        Schema::dropIfExists('polling_detail');
        Schema::dropIfExists('polling_hasil');
        Schema::dropIfExists('reward_list');
        Schema::dropIfExists('reward_to');
        Schema::dropIfExists('chat_room');
        Schema::dropIfExists('chat_message');
    }
}
