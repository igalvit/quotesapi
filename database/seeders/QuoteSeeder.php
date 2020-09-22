<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class QuoteSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table ='quotes';
        $this->filename = base_path().'/database/seeds/quotes.csv';
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
