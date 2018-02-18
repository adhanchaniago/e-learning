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
            $table->string('nik')->unique();
            $table->string('email')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
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
            $table->boolean('sisipan')->default(0);
            $table->string('lokasi_sisipan')->nullable();
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
    }
}
