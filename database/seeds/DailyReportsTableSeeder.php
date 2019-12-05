<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DailyReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daily_reports')->truncate();
        DB::table('daily_reports')->insert([
            [
                'user_id'        => 'yoshiki.saimura',
                'title'          => 'テスト',
                'content'        => 'テスト本文',
                'reporting_time' => date('2019-07-01')
            ],
            [
                'user_id'        => 'test',
                'title'          => 'テスト2',
                'content'        => 'テスト本文2',
                'reporting_time' => date('2019-02-05')
            ],
            [
                'user_id'        => 'test',
                'title'          => 'テスト3',
                'content'        => 'テスト本文3',
                'reporting_time' => date('2019-05-10')
            ]
        ]);
    }
}
