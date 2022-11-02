<?php

namespace Database\Seeders;
use App\Models\Stok;
use App\Models\Satuan;
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
            'Nama' => 'Aris Bobby Gunadhi',
            'Email' => 'bobbygunadhi1975@gmail.com',
            'Kontak' => '085347031080',
            'Alamat' => 'jln Mesjid Ar raudah rt 19 no 30 kelurahan damai bahagia ',
            'Role' => 'Admin',
            'Jabatan' => 'Kepala Departemen Gadai',
            'Password' => bcrypt('asdfghjklkjh'),
            'Foto' => 'user.jpg',
        ]);
        
        
        User::create([
            'Nama' => 'Eko Cahyanto',
            'Email' => 'eko@gmail.com',
            'Kontak' => '082350476227',
            'Alamat' => 'jln Mesjid Ar raudah rt 19 no 30 kelurahan damai bahagia ',
            'Role' => 'Admin',
            'Jabatan' => 'Kepala Departemen Non Gadai',
            'Password' => bcrypt('asdfghjklkjh'),
            'Foto' => 'user.jpg',
        ]);
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
            'Nama' => 'Andri',
            'Email' => 'andri@gmail.com',
            'Kontak' => '082350476227',
            'Alamat' => 'jln Mesjid Ar raudah rt 19 no 30 kelurahan damai bahagia ',
            'Role' => 'Pegawai',
            'Jabatan' => 'Opertional Support Area Balikpapan',
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
            'Email' => 'wahyusatyaputra@gmail.com',
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

        Satuan::create([
            'nama' => 'KG',
            'jenis' => 'Berat',
            'detail' => 'Barang',
        ]);

        Satuan::create([
            'nama' => 'PCS',
            'jenis' => 'Barang',
            'detail' => 'Barang',
        ]);

        Satuan::create([
            'nama' => 'Lembar',
            'jenis' => 'Lembar',
            'detail' => 'Lembar',
        ]);

        Satuan::create([
            'nama' => 'Kotak',
            'jenis' => 'Kotak',
            'detail' => 'Kotak',
        ]);

        Satuan::create([
            'nama' => 'Kantong',
            'jenis' => 'Kantong',
            'detail' => 'Kantong',
        ]);

        Satuan::create([
            'nama' => 'Karung',
            'jenis' => 'Karung',
            'detail' => 'Karung',
        ]);

        // Stok::create([
        //     'nama_barang' => 'Buku KCA',
        //     'jenis_barang' => 'Barang Cetak',
        //     'jumlah' => '0',
        //     'satuan_id' => '2',
        // ]);

        // Stok::create([
        //     'nama_barang' => 'Buku Agenda',
        //     'jenis_barang' => 'Barang Cetak',
        //     'jumlah' => '0',
        //     'satuan_id' => '2',
        // ]);

        // Stok::create([
        //     'nama_barang' => 'Brosur Amanah',
        //     'jenis_barang' => 'Promosi',
        //     'jumlah' => '0',
        //     'satuan_id' => '2',
        // ]);

        // Stok::create([
        //     'nama_barang' => 'Formulir Transfer Tabungan Emas',
        //     'jenis_barang' => 'Barang Cetak',
        //     'jumlah' => '0',
        //     'satuan_id' => '2',
        // ]);

        // Stok::create([
        //     'nama_barang' => 'Formulir Pembukaan Tabungan Emas',
        //     'jenis_barang' => 'Barang Cetak',
        //     'jumlah' => '0',
        //     'satuan_id' => '2',
        // ]);

        // Stok::create([
        //     'nama_barang' => 'Formulir Pemasar',
        //     'jenis_barang' => 'Barang Cetak',
        //     'jumlah' => '0',
        //     'satuan_id' => '2',
        // ]);

        // Stok::create([
        //     'nama_barang' => 'Karungi',
        //     'jenis_barang' => 'Karung',
        //     'jumlah' => '0',
        //     'satuan_id' => '1',
        // ]);

       
    }
}
