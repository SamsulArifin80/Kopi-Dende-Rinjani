<?php

use Illuminate\Database\Seeder;
use App\Models\User; //model table users

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputan['name'] = 'Admin Kopi';
        $inputan['email'] = 'adminkopi@gmail.com';//ganti pake emailmu
        $inputan['password'] = Hash::make('kopikopi');//passwordnya 123258
        $inputan['phone'] = '083834797949';
        $inputan['alamat'] = 'Mataram';
        $inputan['role'] = 'admin';//kita akan membuat akun atau users in dengan role admin
        User::create($inputan);

    }
}
