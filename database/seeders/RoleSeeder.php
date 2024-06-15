<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['role' => 'Direktur'],
            ['role' => 'Manager Operasional'],
            ['role' => 'Manager Keuangan'],
            ['role' => 'Staf Operasional'],
            ['role' => 'Staf Keuangan']
        ]);
    }
}
