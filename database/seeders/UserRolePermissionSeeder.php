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
        // $mahasiswa = User::create([
        //     'username' => '202004013',
        //     'name' => 'Rizky Abiyu Raksa',
        //     'email' => 'abiyu@pei.com',
        //     'password' => bcrypt('password'),
        // ]);
        // $mahasiswa->assignRole($mahasiswaRole);

        // $mahasiswa1 = User::create([
        //     'name' => 'Chandra Ardiansyah',
        //     'email' => 'chandra@pei.com',
        //     'username' => '202004001',
        //     'password' => bcrypt('password'),
        // ]);
        //  $mahasiswa1->assignRole($mahasiswaRole);

        $users = [
            ['202004001', 'Inayah Salsabillah', 'inayah@gmail.com', 'password'],
            ['202004002', 'Raza Alfianzy', 'raza@gmail.com', 'password'],
            ['202004003', 'Nurmawati', 'nurmawati@gmail.com', 'password'],
            ['202004006', 'Catur Anggraena', 'catur@gmail.com', 'password'],
            ['202004008', 'Alfina Fauzia Yusuf', 'alfina@gmail.com', 'password'],
            ['202004009', 'Yusuf Rizki Permana', 'yusuf@gmail.com', 'password'],
            ['202004010', 'Chandra Ardiansyah', 'chandra@gmail.com', 'password'],
            ['202004011', 'Aldian Filzah Daryanto', 'aldian@gmail.com', 'password'],
            ['202004012', 'Dinda Aprilia', 'dinda@gmail.com', 'password'],
            ['202004013', 'Rizky Abiyu Raksa', 'abiyu@pei.com', 'password'],
            ['202104001', 'Ardiyana Akmal', 'ardiyana akmal@gmail.com', 'password'],
            ['202104002', 'Taufik Rasyidin', 'taufik rasyidin@gmail.com', 'password'],
            ['202104003', 'Qoulan Adinda Melia', 'qoulan adinda melia@gmail.com', 'password'],
            ['202104006', 'Rizal Firmansyah', 'rizal firmansyah@gmail.com', 'password'],
            ['202104007', 'Emah Huzzaemah', 'emah huzzaemah@gmail.com', 'password'],
            ['202104008', 'Fadli Nurhidayat', 'fadli nurhidayat@gmail.com', 'password'],
            ['202104009', 'Afrian Muklis Al Hakim', 'afrian muklis al hakim@gmail.com', 'password'],
            ['202104010', 'Muhammad Daris Hafizh Permana', 'muhammad daris hafizh permana@gmail.com', 'password'],
            ['202104011', 'Dina Armei', 'dina armei@gmail.com', 'password'],
            ['202104013', 'Leo Pratama', 'leo pratama@gmail.com', 'password'],
            ['202104014', 'Muhammad Jaelani', 'muhammad jaelani@gmail.com', 'password'],
            ['202104015', 'Deni Ramdan', 'deni ramdan@gmail.com', 'password'],
            ['202204001', 'Muhammad Bentang Kusuma', 'muhammad bentang kusuma@gmail.com', 'password'],
            ['202204003', 'Moch Puji Noer Bakti', 'moch puji noer bakti@gmail.com', 'password'],
            ['202204005', 'Tarisa Salsabila', 'tarisa salsabila@gmail.com', 'password'],
            ['202204007', 'Muhammad Fathy Farhat', 'muhammad fathy farhat@gmail.com', 'password'],
            ['202204011', 'Remmy Ardian', 'remmy ardian@gmail.com', 'password'],
            ['202204012', 'Syalsabilla Azzahra Wibowo', 'syalsabilla azzahra wibowo@gmail.com', 'password'],
            ['202204013', 'Muhamad Rafli Kamal', 'muhamad rafli kamal@gmail.com', 'password'],
            ['202204017', 'Dimas Bagastian Wahyudi', 'dimas bagastian wahyudi@gmail.com', 'password'],
            ['202204018', 'Haidar Fatah', 'haidar fatah@gmail.com', 'password'],
            ['202204019', 'Rinaldi Idmana', 'rinaldi idmana@gmail.com', 'password'],
            ['202304024', 'Arya Maulana', 'arya maulana@gmail.com', 'password'],
            ['202304021', 'Nabil Amar Abiyyi', 'nabil amar abiyyi@gmail.com', 'password'],
            ['202304001', 'Zaenal Abidin', 'zaenal abidin@gmail.com', 'password'],
            ['202304002', 'Rafly Anugrah', 'rafly anugrah@gmail.com', 'password'],
            ['202304006', 'Satria Bintang Pratama', 'satria bintang pratama@gmail.com', 'password'],
            ['202304026', 'Adit Hidayat', 'adit hidayat@gmail.com', 'password'],
            ['202304020', 'M. Najwan Naufal Alfarid', 'm. najwan naufal alfarid@gmail.com', 'password'],
            ['202304019', 'Ilman Fadhilah Ahmad', 'ilman fadhilah ahmad@gmail.com', 'password'],
            ['202304023', 'M. Akmal Rizki', 'm. akmal rizki@gmail.com', 'password'],
            ['202304005', 'Putra Alzabar', 'putra alzabar@gmail.com', 'password'],
            ['202304018', 'Ditha Vania Putri', 'ditha vania putri@gmail.com', 'password'],
            ['202304015', 'Fadlan Maulana Rahman', 'fadlan maulana rahman@gmail.com', 'password'],
            ['202304004', 'Mochamad Rafly Saputra', 'mochamad rafly saputra@gmail.com', 'password'],
            ['202304003', 'Sahda Larisa Kalonica', 'sahda larisa kalonica@gmail.com', 'password'],
            ['202304009', 'Leksa eptia Ramadhani', 'leksa eptia ramadhani@gmail.com', 'password'],
            ['202304008', 'Risky Yanuar Firdaus', 'risky yanuar firdaus@gmail.com', 'password'],
            ['202304025', 'Naufal Putra Maulana Malik', 'naufal putra maulana malik@gmail.com', 'password'],
            ['202304013', 'Azis Abdurohman', 'azis abdurohman@gmail.com', 'password'],
            ['202304027', 'Zalfa Noor Rana Santoso', 'zalfa noor rana santoso@gmail.com', 'password'],
            ['202304011', 'Rakha Mayhakim', 'rakha mayhakim@gmail.com', 'password'],
            ['202304016', 'Ahmad Rizqi Muzaqi', 'ahmad rizqi muzaqi@gmail.com', 'password'],
            ['202304012', 'Wina Ambar Yustika', 'wina ambar yustika@gmail.com', 'password'],
        ];

        foreach ($users as $user) {
            $username = $user[0];
            $name = $user[1];
            $email = $user[2];
            $password = $user[3];

            // Buat pengguna baru dengan format yang diinginkan
            $mahasiswa = User::create([
                'username' => $username,
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
            ]);

            // Tetapkan peran ke pengguna
            $mahasiswa->assignRole($mahasiswaRole);
        }

        $dosen = User::create([
            'name' => 'Ricak Agus Setiawan, S.T., M.SI',
            'email' => 'ricak@pei.com',
            'username' => '123013',
            'password' => bcrypt('password'),
        ]);
        $dosen->assignRole($dosenRole);

        $dosen = User::create([
            'name' => 'Halimil Fathi, S.Kom, M.Kom',
            'email' => 'halimil@pei.com',
            'username' => '123014',
            'password' => bcrypt('password'),
        ]);
        $dosen->assignRole($dosenRole);

        $dosen = User::create([
            'name' => 'Musawarman S.Kom,M.M.S.I',
            'email' => 'musawarman@pei.com',
            'username' => '123015',
            'password' => bcrypt('password'),
        ]);
        $dosen->assignRole($dosenRole);

        $dosen = User::create([
            'name' => 'Muhammad Nugraha,S.T.,M.Eng',
            'email' => 'nugraha',
            'username' => '123016',
            'password' => bcrypt('password'),
        ]);
        $dosen->assignRole($dosenRole);

        $dosen = User::create([
            'name' => 'Heti Mulyani, S.T., M.Kom',
            'email' => 'heti',
            'username' => '123017',
            'password' => bcrypt('password'),
        ]);
        $dosen->assignRole($dosenRole);

        $dosen = User::create([
            'name' => 'Rahmi Darnis, S.Kom., M.Kom.',
            'email' => 'rahmi',
            'username' => '123018',
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
