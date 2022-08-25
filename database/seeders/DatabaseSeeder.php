<?php

namespace Database\Seeders;

use App\Models\Asuransi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(2)->create();

        User::create([
            'Nama' => 'Fajriansyah',
            'Email' => 'fajriansyah573@gmail.com',
            'Kontak' => '082350476227',
            'Alamat' => 'jln Mesjid Ar raudah rt 19 no 30 kelurahan damai bahagia ',
            'Role' => 'Admin',
            'Jabatan' => 'mahasiswa',
            'Password' => bcrypt('asdfghjkl'),
            'Foto' => 'user.jpg',
        ]);

        User::create([
            'Nama' => 'Nursinta',
            'Email' => 'nursinta@gmail.com',
            'Kontak' => '082350476227',
            'Alamat' => 'jln Mesjid Ar raudah rt 19 no 30 kelurahan damai bahagia ',
            'Role' => 'Satpam',
            'Jabatan' => 'Satpam',
            'Password' => bcrypt('asdfghjkl'),
            'Foto' => 'user.jpg',
        ]);

        User::create([
            'Nama' => 'Kemal',
            'Email' => 'kemal@gmail.com',
            'Kontak' => '082350476227',
            'Alamat' => 'jln Mesjid Ar raudah rt 19 no 30 kelurahan damai bahagia ',
            'Role' => 'Pegawai',
            'Jabatan' => 'Sales chanel',
            'Password' => bcrypt('asdfghjkl'),
            'Foto' => 'user.jpg',
        ]);

        User::create([
            'Nama' => 'Rijki P',
            'Email' => '11181063@student.itk.ac.id',
            'Kontak' => '082350476227',
            'Alamat' => 'jln Mesjid Ar raudah rt 19 no 30 kelurahan damai bahagia ',
            'Role' => 'Magang',
            'Jabatan' => 'mahasiswa',
            'Password' => bcrypt('asdfghjkl'),
            'Foto' => 'user.jpg',
        ]);

        User::create([
            'Nama' => 'Wahyu Satya Putra',
            'Email' => 'wahyu@gmail.com',
            'Kontak' => '082350476227',
            'Alamat' => 'jln Mesjid Ar raudah rt 19 no 30 kelurahan damai bahagia ',
            'Role' => 'Magang',
            'Jabatan' => 'mahasiswa',
            'Password' => bcrypt('asdfghjkl'),
            'Foto' => 'user.jpg',
        ]);
    }
}
