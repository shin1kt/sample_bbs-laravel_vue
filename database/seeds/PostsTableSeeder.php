<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for($i=0;$i<100;$i++){
          $data = [
            'title'=>'あいうえお' . "【{$i}】",
            'content' => "【{$i}】".'US仕様のキーボードを使用する場合はCaps Lockキーが「A」の隣にあったり、ことえりを使用する際によく使う Controlキーが異なる位置にあったりするので、日本語キーボードに慣れているとなかなかUS仕様のキーボードは操作しづらい場合が多いです。
そこで、ControlキーとCaps Lockキーを相互に入れ替える小技を紹介します。
US仕様のキーボードを使用する場合はCaps Lockキーが「A」の隣にあったり、ことえりを使用する際によく使う Controlキーが異なる位置にあったりするので、日本語キーボードに慣れているとなかなかUS仕様のキーボードは操作しづらい場合が多いです。
そこで、ControlキーとCaps Lockキーを相互に入れ替える小技を紹介します。',
            'created_at' => new Carbon(Carbon::now()),
            'updated_at' => new Carbon(Carbon::now()),
          ];
          DB::table('posts')->insert($data);
        }
    }
}
