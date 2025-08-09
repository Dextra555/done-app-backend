<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ResetAdminPassword extends Seeder
{
    public function run()
    {
        $admin = Admin::where('email', 'admin@example.com')->first();
        
        if ($admin) {
            $admin->password = Hash::make('password');
            $admin->save();
            $this->command->info('Admin password has been reset to: password');
        } else {
            $this->command->error('Admin user not found!');
        }
    }
}
