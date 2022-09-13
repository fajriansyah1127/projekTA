<?php

namespace Database\Seeders;

use App\Models\Asuransi;
use App\Models\Outlet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use WithFaker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'Nama' => 'Fajriansyah',
            'Email' => 'fajriansyah573@gmail.com',
            'Kontak' => '082350476227',
            'Alamat' => 'jln Mesjid Ar raudah rt 19 no 30 kelurahan damai bahagia ',
            'Role' => 'Admin',
            'Jabatan' => 'mahasiswa',
            'Password' => bcrypt('asdfghjklkjh'),
            'Foto' => 'user.jpg',
        ]);

        User::create([
            'Nama' => 'Nursinta',
            'Email' => 'nursinta@gmail.com',
            'Kontak' => '082350476227',
            'Alamat' => 'jln Mesjid Ar raudah rt 19 no 30 kelurahan damai bahagia ',
            'Role' => 'Satpam',
            'Jabatan' => 'Satpam',
            'Password' => bcrypt('asdfghjklkjh'),
            'Foto' => 'user.jpg',
        ]);

        User::create([
            'Nama' => 'Kemal',
            'Email' => 'kemal@gmail.com',
            'Kontak' => '082350476227',
            'Alamat' => 'jln Mesjid Ar raudah rt 19 no 30 kelurahan damai bahagia ',
            'Role' => 'Pegawai',
            'Jabatan' => 'Sales chanel',
            'Password' => bcrypt('asdfghjklkjh'),
            'Foto' => 'user.jpg',
        ]);

        User::create([
            'Nama' => 'Rijki P',
            'Email' => '11181063@student.itk.ac.id',
            'Kontak' => '082350476227',
            'Alamat' => 'jln Mesjid Ar raudah rt 19 no 30 kelurahan damai bahagia ',
            'Role' => 'Magang',
            'Jabatan' => 'mahasiswa',
            'Password' => bcrypt('asdfghjklkjh'),
            'Foto' => 'user.jpg',
        ]);

        User::create([
            'Nama' => 'Wahyu Satya Putra',
            'Email' => 'wahyu@gmail.com',
            'Kontak' => '082350476227',
            'Alamat' => 'jln Mesjid Ar raudah rt 19 no 30 kelurahan damai bahagia ',
            'Role' => 'Magang',
            'Jabatan' => 'mahasiswa',
            'Password' => bcrypt('asdfghjklkjh'),
            'Foto' => 'user.jpg',
        ]);

        Outlet::create([
            'nama' => 'CP Batu Ampar',
        ]);

        Outlet::create([
            'nama' => 'CP Gunung Kawi',
        ]);

        Outlet::create([
            'nama' => 'CP Damai',
        ]);

        Outlet::create([
            'nama' => 'CP Rapak',
        ]);

        Outlet::create([
            'nama' => 'CP Tanah Grogot',
        ]);

        Outlet::create([
            'nama' => 'CP Kampung Baru',
        ]);

        Outlet::create([
            'nama' => 'CP Manggar',
        ]);

        Outlet::create([
            'nama' => 'CP Penajam',
        ]);

        Outlet::create([
            'nama' => 'CP Balikpapan Baru',
        ]);

        Outlet::create([
            'nama' => 'CPS Gunung Sari',
        ]);

        Asuransi::create([
            'nama' => 'Jamsyar',
            'email' => 'indriany.jamsyar@gmail.com',
            'kontak' => '082350476227',
            'alamat' => 'Ki. Cikutra Barat No. 8, Administrasi Jakarta Pusat 89343, Sumsel',
            'status' => 'Berlaku',
        ]);

        Asuransi::create([
            'nama' => 'Jamkrindo',
            'email' => 'indriany.jamsyar@gmail.com',
            'kontak' => '082350476227',
            'alamat' => 'Ki. Cikutra Barat No. 8, Administrasi Jakarta Pusat 89343, Sumsel',
            'status' => 'Berlaku',
        ]);

        Asuransi::create([
            'nama' => 'Askrindo',
            'email' => 'indriany.jamsyar@gmail.com',
            'kontak' => '082350476227',
            'alamat' => 'Ki. Cikutra Barat No. 8, Administrasi Jakarta Pusat 89343, Sumsel',
            'status' => 'Berlaku',
        ]);

        Asuransi::create([
            'nama' => 'Jasa Raharja Putra',
            'email' => 'indriany.jamsyar@gmail.com',
            'kontak' => '082350476227',
            'alamat' => 'Ki. Cikutra Barat No. 8, Administrasi Jakarta Pusat 89343, Sumsel',
            'status' => 'Berlaku',
        ]);
    }
}
