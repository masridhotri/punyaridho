<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriModel;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriModel::create(['nama'=>'fiksi']);
        KategoriModel::create(['nama'=>'nonfiksi']);
        KategoriModel::create(['nama'=>'sains']);
    }
}
