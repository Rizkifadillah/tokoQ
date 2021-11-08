<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            'id_setting' => 1,
            'nama_toko' => 'Toko Ku',
            'alamat' => 'Jl. Rawamangun Condet Jakarta Timur',
            'telpon' => '089765433241',
            'tipe_nota' => 1,
            'diskon' => 5,
            'path_logo' => '/images/logo.png',
            'path_kartu_member' => '/images/member.jpg',
        ]);
    }
}
