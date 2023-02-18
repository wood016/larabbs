<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 生成数据集合
        User::factory()->count(10)->create();

        // 设定ID=1的配置项
        $user = User::find(1);
        $user->name = 'tomcat';
        $user->email = 'tomcat@localhost.com';
        $user->avatar = 'http://singlebbs.test/uploads/images/avatars/202302/17/17_1676626588_jsLEwmQ24h.png';
        $user->save();
    }
}
