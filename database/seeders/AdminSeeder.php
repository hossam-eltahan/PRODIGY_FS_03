<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEventseder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Admin();
        $admin->image = "/Abdallh/admin";
        $admin->name = "Abdallh_Elzayat";
        $admin->email = "admin@gmail.com";
        // the password is  password
        $admin->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password;
        $admin->status = 1;
        $admin->save();
    }
}
