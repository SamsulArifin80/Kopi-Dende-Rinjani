<?php

//namespace Database\Seeders;
use App\Models\User; //model table users

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserSeeder::class);
        //karena ada error di UserSeeder jadinya isi UserSeed dipindah kesini
        $inputan['name'] = 'Admin Kopi';
        $inputan['email'] = 'adminkopi@gmail.com';//ganti pake emailmu
        $inputan['password'] = Hash::make('kopikopi');//passwordnya 123258
        $inputan['phone'] = '083834797949';
        $inputan['alamat'] = 'Mataram';
        $inputan['role'] = 'admin';//kita akan membuat akun atau users in dengan role admin
        User::create($inputan);
    }
}
