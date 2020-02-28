<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'Nguyễn Văn Bắc',
            'email' => 'bac.nguyen.71271@gmail.com',
            'permission' => 0,
            'password' => '$2y$12$K0qZgcSRR0YB.Y.S8DcOouj1bcKI17f5ZYwKV00IKQRDGkybBzQfq',
            'remember_token' => '',
            'active' => 1
        ]);


        DB::table('danhmucs')->insert([
            'loaihang' => 'Vàng',
            'tenhang' => 'Vàng SBJ 0.5 chỉ',
            'mahang' => 'SBJ9999-05',
            'dongia' => 2230000,
        ]);

        DB::table('danhmucs')->insert([
            'loaihang' => 'Giấy tờ có giá',
            'tenhang' => 'Voucher VinID',
            'mahang' => 'vinid-1000',
            'dongia' => 1000000,
        ]);

        // DB::table('warehouse_histories')->insert([
        //     'type' => 0,
        //     'warehouseId' => 0,
        //     'tenchuongtrinh' => 'Monthly contest tháng 9',
        //     'userid' => 1,
        //     'danhmucId' => 1,
        //     'soluong' => 10,
        //     'hansudung' => '2020-04-20',
        //     'thoigian' => '2020-02-22'
        // ]);

        DB::table('warehouses')->insert([
            'tenkho' => "Kho MB",
        ]);

        DB::table('warehouses')->insert([
            'tenkho' => "Kho HD",
        ]);
    }
}
