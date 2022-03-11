<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class SkillMasterTableSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->table = 'skill_master';
        $this->filename = base_path().'/database/seeders/csvs/skill.csv';
    }

    public function run()
    {
        DB::disableQueryLog();
        DB::table($this->table)->truncate();
        parent::run();
    }
}
