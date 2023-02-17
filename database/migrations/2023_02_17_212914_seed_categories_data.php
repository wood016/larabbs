<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name' => '短视频',
                'description' => '精彩短视频分享、发现',
            ],
            [
                'name' => '长视频',
                'description' => '精彩长视频分享、发现',
            ],
            [
                'name' => '新资讯',
                'description' => '新资讯分享、发现',
            ],
            [
                'name' => '公告',
                'description' => '站内最新内容公告',
            ],
        ];
        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
};
