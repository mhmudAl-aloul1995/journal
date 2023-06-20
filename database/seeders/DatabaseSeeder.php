<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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

         Role::insert([
            ['name' => 'باحث', 'guard_name' => 'admin',],
            ['name' => 'المشرف العام', 'guard_name' => 'admin',],
            ['name' => 'رئيس التحرير', 'guard_name' => 'admin',],
            ['name' => 'مدير التحرير', 'guard_name' => 'admin',],
            ['name' => 'هيئة التحرير', 'guard_name' => 'admin',],
            ['name' => 'سكرتير المجلة', 'guard_name' => 'admin',],
            ['name' => 'مدقق لغوي', 'guard_name' => 'admin',],
            ['name' => 'محكم', 'guard_name' => 'admin',]

        ]);
    }
}
