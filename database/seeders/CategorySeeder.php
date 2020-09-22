<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table='categories';
        $this->filename = base_path().'/database/seeds/categories.csv';
        $this->timestamps = true;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        DB::table($this->table)->truncate();
        parent::run();
    }
}
