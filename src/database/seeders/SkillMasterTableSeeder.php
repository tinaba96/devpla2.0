<?php

use Flynsarmy\CsvSeeder\CsvSeeder;

class SkillMasterTableSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->table = 'skill_master';
        $this->filename = base_path().'/database/seeds/csvs/skill.csv';
    }

    public function run()
    {
        DB::disableQueryLog();
        DB::table($this->table)->truncate();
        parent::run();
    }
}
