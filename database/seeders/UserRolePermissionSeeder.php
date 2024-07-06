<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserRolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'melakukan absensi']);
        Permission::create(['name' => 'memeriksa history absensi']);
        Permission::create(['name' => 'membuka matakuliah']);
        Permission::create(['name' => 'input dosen']);

        // create roles and assign existing permissions
        $mahasiswaRole = Role::create(['name' => 'mahasiswa']);
        $mahasiswaRole->givePermissionTo('melakukan absensi');
        $mahasiswaRole->givePermissionTo('memeriksa history absensi');

        $dosenRole = Role::create(['name' => 'dosen']);
        $dosenRole->givePermissionTo('membuka matakuliah');
        $dosenRole->givePermissionTo('memeriksa history absensi');

        $kaprodiRole = Role::create(['name' => 'kaprodi']);
        $kaprodiRole->givePermissionTo('input dosen');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        // create users and assign roles
        $mahasiswa = User::create([
            'username' => '202004013',
            'name' => 'Rizky Abiyu Raksa',
            'email' => 'abiyu@pei.com',
            'password' => bcrypt('password'),
        ]);
        $mahasiswa->assignRole($mahasiswaRole);

        $mahasiswa1 = User::create([
            'name' => 'Chandra Ardiansyah',
            'email' => 'chandra@pei.com',
            'username' => '202004001',
            'password' => bcrypt('password'),
        ]);
        $mahasiswa1->assignRole($mahasiswaRole);

        $dosen = User::create([
            'name' => 'Ricak Agus Setiawan',
            'email' => 'ricak@pei.com',
            'username' => '123013',
            'password' => bcrypt('password'),
        ]);
        $dosen->assignRole($dosenRole);

        $kaprodi = User::create([
            'name' => 'kaprodi',
            'email' => 'kaprodi@pei.com',
            'username' => 'kaprodi',
            'password' => bcrypt('password'),
        ]);
        $kaprodi->assignRole($kaprodiRole);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@pei.com',
            'username' => 'admin',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole($adminRole);
    }
}
