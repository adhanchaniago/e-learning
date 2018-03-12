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
                'nama' => 'Pimpinan',
                'slug' => 'pimpinan',
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
                'nama' => 'KANWIL MEDAN',
                'alamat' => 'Jl. Pegadaian No. 112, Medan - Sumatera Utara',
                'telepon' => '0614567247'
            ],[
                'nama' => 'KANWIL BALIKPAPAN',
                'alamat' => 'Jl. Jenderal Sudirman Stalkuda, Balikpapan - Riau',
                'telepon' => '0542762002'
            ],[
                'nama' => 'KANWIL PEKANBARU',
                'alamat' => 'Jl. Jend. Sudirman No. 167 A-B, Pekanbaru - Riau',
                'telepon' => '076139195'
            ],[
                'nama' => 'KANWIL PALEMBANG',
                'alamat' => 'Jl. Merdeka No. 11, Palembang - Sumatera Selatan',
                'telepon' => '0711361529'
            ],[
                'nama' => 'KANWIL JAKARTA 1',
                'alamat' => 'Jl. Senen Raya No. 36, Jakarta Pusat - DKI Jakarta',
                'telepon' => '0213505151'
            ],[
                'nama' => 'KANWIL MAKASSAR',
                'alamat' => 'Ruko Kumala Raya A No. 76/78, Jl. Kumala Raya No. 76/78, Makassar - Sulawesi Selatan',
                'telepon' => '0411856613/14'
            ],[
                'nama' => 'KANWIL BANDUNG',
                'alamat' => 'Jl. Pugkur No. 125, Bandung - Jawa Barat',
                'telepon' => '0224262280'
            ],[
                'nama' => 'KANWIL SURABAYA',
                'alamat' => 'Jl. Dinoyotangsi, Surabaya - Jawa Timur',
                'telepon' => '0315675294'
            ],[
                'nama' => 'KANWIL MANADO',
                'alamat' => 'Jl. Dr.Soetomo No. 199, Manado - Sulawesi Utara',
                'telepon' => '0431869262'
            ],[
                'nama' => 'KANWIL DENPASAR',
                'alamat' => 'Jl. Raya Puputan No. 23.C, Denpasar - Bali',
                'telepon' => '0361242011'
            ],[
                'nama' => 'KANWIL JAKARTA 2',
                'alamat' => 'Jl. Pasar Senen, Jakarta Pusat - DKI Jakarta',
                'telepon' => '0213450759'
            ],[
                'nama' => 'KANWIL SEMARANG',
                'alamat' => 'Jl. Kimangun Sarkoro No. 7, Semarang - Jawa Tengah',
                'telepon' => '0248415896'
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
            'nik' => '444262423',
            'email' => 'adiraka8@gmail.com',
            'nama' => 'Adi Raka Siwi',
            'tempat_lahir' => 'Padang',
            'tanggal_lahir' => '1994-04-29',
            'jenis_kelamin' => 'Pria',
            'agama' => 'Islam',
            'alamat' => 'Komplek Filano Mandiri Tabing Padang',
            'telepon' => '081268280648',
            'photo' => 'admin.jpg',
            'kantor_cabang_id' => '2'
        ]);

        $userStaff->user_profil()->save($staffProfil);
        
    }
}
