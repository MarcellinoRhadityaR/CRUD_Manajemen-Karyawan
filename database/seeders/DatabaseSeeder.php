<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\karyawan;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

            Karyawan::create([
                'nama' => 'marcellino',
                'alamat' => 'jalan raya',
                'no_telp' => '08976631',
                'jabatan' => 'karyawan',
                'gaji' => '1000000',
                'jenis_kelamin' => 'laki laki',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
    }
}
