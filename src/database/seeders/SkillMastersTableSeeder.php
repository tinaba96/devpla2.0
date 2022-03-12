<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class SkillMastersTableSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->table = 'skill_masters';
        $this->filename = base_path().'/database/seeders/csvs/skill.csv';
    }

    public function run()
    {
        DB::disableQueryLog();
        DB::table($this->table)->truncate();
        parent::run();
    }
}
