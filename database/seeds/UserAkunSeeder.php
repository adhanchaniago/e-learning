<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

use App\Models\UserAccount;
use App\Models\UserProfil;

class UserAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Insert Hak Akses

        DB::table('hak_akses')->insert([
            [
                'nama' => 'Staff',
                'slug' => 'staff',
                'deskripsi' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'nama' => 'Asisten Manager',
                'slug' => 'asmen',
                'deskripsi' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'nama' => 'Instruktur',
                'slug' => 'instruktur',
                'deskripsi' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'nama' => 'Peserta',
                'slug' => 'peserta',
                'deskripsi' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        // Insert Kantor Cabang

        DB::table('kantor_cabang')->insert([
            [
                'nama' => 'Kantor Wilayah Medan',
                'alamat' => 'Jl. Pegadaian No. 12 Medan - Sumatera Utara',
                'telepon' => '0614567247'
            ],[
                'nama' => 'Kantor Wilayah Pekanbaru',
                'alamat' => 'Jl. Jend. Sudirman No. 167 A-B Pekanbaru - Riau',
                'telepon' => '076139195'
            ],[
                'nama' => 'Kantor Wilayah Palembang',
                'alamat' => 'Jl. Merdeka No. 11 Palembang - Sumatera Selatan',
                'telepon' => '0711361529'
            ]
        ]);

        // Insert Staff Account

        $userStaff = new UserAccount([
            'username' => 'staff@e-learning.dev',
            'password' => bcrypt('staff1234'),
            'hak_akses_id' => '1',
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $userStaff->save();

        $staffProfil = new UserProfil([
            'nik' => 'P444262',
            'email' => 'adiraka8@gmail.com',
            'nama' => 'Adi Raka Siwi',
            'tempat_lahir' => 'Padang',
            'tanggal_lahir' => '1994-04-29',
            'jenis_kelamin' => 'Pria',
            'agama' => 'Islam',
            'alamat' => 'Komplek Filano Mandiri Tabing Padang',
            'telepon' => '081268280648',
            'photo' => '',
            'kantor_cabang_id' => '2'
        ]);

        $userStaff->user_profil()->save($staffProfil);

        // Insert Asmen Account

        $userAsmen = new UserAccount([
            'username' => 'asmen@e-learning.dev',
            'password' => bcrypt('asmen1234'),
            'hak_akses_id' => '2',
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $userAsmen->save();

        $asmenProfil = new UserProfil([
            'nik' => 'P444353',
            'email' => 'taslim.boy@gmail.com',
            'nama' => 'Boy Taslim',
            'tempat_lahir' => 'Padang',
            'tanggal_lahir' => '1990-01-12',
            'jenis_kelamin' => 'Pria',
            'agama' => 'Islam',
            'alamat' => 'Jl. Perintis Kemerdekaan No. 3 Padang',
            'telepon' => '081132424422',
            'photo' => '',
            'kantor_cabang_id' => '2'
        ]);

        $userAsmen->user_profil()->save($asmenProfil);

        // Insert Instruktur Account

        $userInstruktur = new UserAccount([
            'username' => 'instruktur@e-learning.dev',
            'password' => bcrypt('instruktur1234'),
            'hak_akses_id' => '3',
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $userInstruktur->save();

        $instruktruProfil = new UserProfil([
            'nik' => 'P441212',
            'email' => 'yes1234@gmail.com',
            'nama' => 'Yesmaidar',
            'tempat_lahir' => 'Pematang Siantar',
            'tanggal_lahir' => '1980-11-03',
            'jenis_kelamin' => 'Wanita',
            'agama' => 'Islam',
            'alamat' => 'Jl. Pemuda No. 1 Medan',
            'telepon' => '081112344321',
            'photo' => '',
            'kantor_cabang_id' => '1'
        ]);

        $userInstruktur->user_profil()->save($instruktruProfil);

        // Insert Peserta Account

        $userPeserta = new UserAccount([
            'username' => 'peserta@e-learning.dev',
            'password' => bcrypt('peserta1234'),
            'hak_akses_id' => '4',
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $userPeserta->save();

        $pesertaProfil = new UserProfil([
            'nik' => 'P449890',
            'email' => 'sibutar.butar12@gmail.com',
            'nama' => 'Jhon Sibutarbutar',
            'tempat_lahir' => 'Medan',
            'tanggal_lahir' => '1989-09-30',
            'jenis_kelamin' => 'Pria',
            'agama' => 'Islam',
            'alamat' => 'Jl. Jend. Sudirman No. 52 Padang',
            'telepon' => '085243551123',
            'photo' => '',
            'kantor_cabang_id' => '1'
        ]);

        $userPeserta->user_profil()->save($pesertaProfil);
        
    }
}
