<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class CreateAdminUserSeeder extends Seeder
{
    /**php artisan db:seed --class=CreateAdminUserSeeder
     * Run the database seeds.
     */
    public function run(): void
    {/* $user = User::where([
            'name' => 'admin',

        ])->first();*/


        $user = User::where(['email' => 'mhmudaloul@gmail.com'])->first();
        $role = Role::find(10);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([10]);


        /* Role::where(['name' => 'سكرتير المجلة'])->first()->syncPermissions(Permission::whereIn('id',[1,2,3,4,5,6,7,8,14,15,16,17,18,19,20,21,22,23,24,25])->pluck('id', 'id')->all());
         Role::where(['name' => 'محكم'])->first()->syncPermissions(Permission::whereIn('id',[1,2,3,4])->pluck('id', 'id')->all());
         Role::where(['name' => 'باحث'])->first()->syncPermissions(Permission::whereIn('id',[9,10,11,12])->pluck('id', 'id')->all());
         Role::where(['name' => 'مدير التحرير'])->first()->syncPermissions(Permission::whereIn('id',[25,26,27,28])->pluck('id', 'id')->all());*/


    }
}
