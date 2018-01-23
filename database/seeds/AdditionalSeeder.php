<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class AdditionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	DB::table('angkatan_diklat')->insert([
            [
                'nama_diklat' => 'DIKLAT PENAKSIR & ANALIS KREDIT MUDA ANGKATAN XI TAHUN 2017',
                'tanggal_mulai' => '2017-03-07',
                'tanggal_selesai' => '2017-04-29',
                'keterangan' => '-',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'nama_diklat' => 'PENDIDIKAN DAN PELATIHAN GADAI SYARIAH',
                'tanggal_mulai' => '2017-07-13',
                'tanggal_selesai' => '2017-07-22',
                'keterangan' => '-',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'nama_diklat' => 'DIKLAT PENAKSIR & ANALIS KREDIT MADYA ANGKATAN II TAHUN 2017',
                'tanggal_mulai' => '2015-04-27',
                'tanggal_selesai' => '2015-05-21',
                'keterangan' => '-',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        DB::table('mata_pelajaran')->insert([
            [
                'slug' => 'HJF',
                'nama_pelajaran' => 'Hukum Jaminan Fidusia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'slug' => 'MTLP',
                'nama_pelajaran' => 'Metode Teknik Menaksir Logam Perhiasan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'slug' => 'DPP',
                'nama_pelajaran' => 'Dasar-dasar Pembiayaan dan Perkreditan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'slug' => 'MTPI',
                'nama_pelajaran' => 'Metode dan Teknik Menaksir Permata Intan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'slug' => 'MTBG',
                'nama_pelajaran' => 'Metode dan Teknik Menaksir Barang Gudang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'slug' => 'POBF',
                'nama_pelajaran' => 'Pedoman Operasional Bisnis Fidusia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'slug' => 'PKP',
                'nama_pelajaran' => 'Proses Kerja Penaksir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'slug' => 'PAS',
                'nama_pelajaran' => 'Pegadaian Sistem Informasi Online',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

    }
}
