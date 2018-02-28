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
            ],[
                'slug' => 'AK',
                'nama_pelajaran' => 'Akuntansi dan Keuangan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'slug' => 'BP',
                'nama_pelajaran' => 'Budaya Perusahaan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'slug' => 'SPP',
                'nama_pelajaran' => 'Standar Pelayanan Pegadaian',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'slug' => 'PD',
                'nama_pelajaran' => 'Personality Development',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'slug' => 'PMIS',
                'nama_pelajaran' => 'Pemasaran Market Inteligen & Sales',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

    }
}
