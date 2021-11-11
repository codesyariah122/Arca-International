<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $administrator = new User;
        $administrator->name = 'Arca Backend';
        $administrator->email = 'arca_admin@email.com';
        $administrator->password = \Hash::make('admin123654');
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->avatar = 'https://www.vhv.rs/dpng/d/276-2761771_transparent-avatar-png-vector-avatar-icon-png-png.png';
        $administrator->status = "ACTIVE";
        $administrator->save();

       	$this->command->info("User Admin Berhasil Di Tambahkan");
    }
}
