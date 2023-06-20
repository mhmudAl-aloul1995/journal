<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            'evaluator-list',
            'evaluator-create',
            'evaluator-edit',
            'evaluator-delete',
            'folder-list',
            'folder-create',
            'folder-edit',
            'folder-delete',
            'researchApplication-list',
            'researchApplication-create',
            'researchApplication-edit',
            'researchApplication-delete',
            'research-list',
            'research-create',
            'research-edit',
            'research-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'version-list',
            'version-create',
            'version-edit',
            'version-delete',
            'publicationManagement-list',
            'publicationManagement-create',
            'publicationManagement-edit',
            'publicationManagement-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
