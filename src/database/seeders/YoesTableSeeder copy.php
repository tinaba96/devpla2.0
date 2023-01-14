<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class YoesTableSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->table = 'yoes';
        $this->filename = base_path().'/database/seeders/csvs/yoes.csv';
    }

    public function run()
    {
        DB::disableQueryLog();
        DB::table($this->table)->truncate();
        parent::run();
    }
}
